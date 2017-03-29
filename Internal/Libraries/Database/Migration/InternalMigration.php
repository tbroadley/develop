<?php namespace ZN\Database;

use DB, DBForge, Config, Folder, File, Date;
use ZN\Database\Exception\DatabaseErrorException;

class InternalMigration extends \CallController implements InternalMigrationInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Migration Path
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string -- Application/Model/Migrations/
    //
    //--------------------------------------------------------------------------------------------------------
    private $path;

    //--------------------------------------------------------------------------------------------------------
    // Config
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    private $config;

    //--------------------------------------------------------------------------------------------------------
    // Class Fix
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string -- Migrate
    //
    //--------------------------------------------------------------------------------------------------------
    private $classFix;

    //--------------------------------------------------------------------------------------------------------
    // Extends Fix
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string -- Migration
    //
    //--------------------------------------------------------------------------------------------------------
    private $extendsFix;

    //--------------------------------------------------------------------------------------------------------
    // Table
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    private $tbl;

    //--------------------------------------------------------------------------------------------------------
    // Version
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    private $versionDir = 'Version/';

    //--------------------------------------------------------------------------------------------------------
    // Construct
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        $this->config = Config::get('Database', 'migration');
        $this->path   = MODELS_DIR.'Migrations/';

        if( ! is_dir($this->path) )
        {
            Folder::create($this->path, 0755);
        }

        $this->tbl = defined('static::table')
                   ? static::table
                   : false;

        $this->_create();

        $this->classFix   = INTERNAL_ACCESS.'Migrate';
        $this->extendsFix = __CLASS__;
    }

    //--------------------------------------------------------------------------------------------------------
    // Create Table
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function createTable(Array $data) : Bool
    {
        DBForge::createTable($this->_tableName(), $data);

        return $this->_action(__FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // Drop Table
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function dropTable() : Bool
    {
        DBForge::dropTable($this->_tableName());

        return $this->_action(__FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // Add Column
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $column
    //
    //--------------------------------------------------------------------------------------------------------
    public function addColumn(Array $column) : Bool
    {
        DBForge::addColumn($this->_tableName(), $column);

        return $this->_action(__FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // Drop Column
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $column
    //
    //--------------------------------------------------------------------------------------------------------
    public function dropColumn($column) : Bool
    {
        DBForge::dropColumn($this->_tableName(), $column);

        return $this->_action(__FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // Modify Column
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $columns
    //
    //--------------------------------------------------------------------------------------------------------
    public function modifyColumn(Array $column) : Bool
    {
        DBForge::modifyColumn($this->_tableName(), $column);

        return $this->_action(__FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // Rename Column
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $columns
    //
    //--------------------------------------------------------------------------------------------------------
    public function renameColumn(Array $column) : Bool
    {
        DBForge::renameColumn($this->_tableName(), $column);

        return $this->_action(__FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // Truncate
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function truncate() : Bool
    {
        DBForge::truncate($this->_tableName());

        return $this->_action(__FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // Path
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string path: NULL
    //
    //--------------------------------------------------------------------------------------------------------
    public function path(String $path = NULL) : InternalMigration
    {
        $this->path = suffix($path);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Create
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name -- Migrasyon Adı
    //
    //--------------------------------------------------------------------------------------------------------
    public function create(String $name, Int $ver = 0) : Bool
    {
        if( $version = $this->_version($ver) )
        {
            $dir  = $this->path.$name.$this->versionDir;

            if( ! Folder::exists($dir) )
            {
                Folder::create($dir);
            }

            $file = $dir.suffix($version, '.php');
            $name = $name.$version;
        }
        else
        {
            $file = $this->path.suffix($name, '.php');
        }

        if( ! File::exists($file) )
        {
            $eol  = EOL;
            $str  = '<?php'.$eol;
            $str .= 'class '.$this->classFix.$name.' extends '.$this->extendsFix.$eol;
            $str .= '{'.$eol;
            $str .= "\t".'//--------------------------------------------------------------------------------------------------------'.$eol;
            $str .= "\t".'// Class/Table Name'.$eol;
            $str .= "\t".'//--------------------------------------------------------------------------------------------------------'.$eol;
            $str .= "\t".'const table = __CLASS__;'.$eol.$eol;
            $str .= "\t".'//--------------------------------------------------------------------------------------------------------'.$eol;
            $str .= "\t".'// Up'.$eol;
            $str .= "\t".'//--------------------------------------------------------------------------------------------------------'.$eol;
            $str .= "\t".'public function up()'.$eol;
            $str .= "\t".'{'.$eol;
            $str .= "\t\t".'// Queries'.$eol;
            $str .= "\t".'}'.$eol.$eol;
            $str .= "\t".'//--------------------------------------------------------------------------------------------------------'.$eol;
            $str .= "\t".'// Down'.$eol;
            $str .= "\t".'//--------------------------------------------------------------------------------------------------------'.$eol;
            $str .= "\t".'public function down()'.$eol;
            $str .= "\t".'{'.$eol;
            $str .= "\t\t".'// Queries'.$eol;
            $str .= "\t\t".'$this->dropTable(); // Varsayılan işlem.'.$eol;
            $str .= "\t".'}'.$eol;
            $str .= '}';

            return File::write($file, $str);
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Delete
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $name
    // @param numeric $version
    //
    //--------------------------------------------------------------------------------------------------------
    public function delete(String $name, Int $ver = 0) : Bool
    {
        if( $version = $this->_version($ver) )
        {
            $dir  = $this->path.$name.$this->versionDir;
            $file = $dir.suffix($version, '.php');

            if( $ver === 'all' && is_dir($this->path.$name.$this->versionDir) )
            {
                Folder::delete($this->path.$name.$this->versionDir);
            }
        }
        else
        {
            $file = $this->path.suffix($name, '.php');
        }

        return File::delete($file);
    }

    //--------------------------------------------------------------------------------------------------------
    // Delete All
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function deleteAll() : Bool
    {
        if( is_dir($this->path) )
        {
            return Folder::delete($this->path);
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Version
    //--------------------------------------------------------------------------------------------------------
    //
    // @param numeric $numeric
    //
    //--------------------------------------------------------------------------------------------------------
    public function version(Int $version = 0)
    {
        if( empty($this->tbl) )
        {
            return false;
        }

        $name = $this->classFix.$this->_tableName();

        if( $version <= 0 )
        {
            return uselib($name);
        }

        $name .= $this->_version($version);

        return uselib($name);
    }

    //--------------------------------------------------------------------------------------------------------
    // Action
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _action($type)
    {
        if( $type === '' )
        {
            $type = 'noAction';
        }

        $table   = $this->_tableName();
        $version = $this->_getVersion();

        if( ! DBForge::error() )
        {
            return DB::insert($this->config['table'],
            [
                'name'    => $table,
                'type'    => $type,
                'version' => $version,
                'date'    => Date::set('Ymdhis')
            ]);
        }

        return false;
    }

    //--------------------------------------------------------------------------------------------------------
    // Migrations Table Create
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _create()
    {
        $table   = $this->config['table'];

        DBForge::createTable('IF NOT EXISTS '.$table, array
        (
            'name'    => [DB::varchar(512), DB::notNull()],
            'type'    => [DB::varchar(256), DB::notNull()],
            'version' => [DB::varchar(3),   DB::notNull()],
            'date'    => [DB::varchar(15),  DB::notNull()]
        ));
    }

    //--------------------------------------------------------------------------------------------------------
    // Table Name
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _tableName()
    {
        $table = preg_replace('/[0-9][0-9][0-9]/', '', $this->tbl);

        return str_replace($this->classFix, '', $table);
    }

    //--------------------------------------------------------------------------------------------------------
    // Get Version
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _getVersion()
    {
        preg_match('(\w+([0-9][0-9][0-9]))', $this->tbl, $match);

        return $match[1] ?? '000';
    }

    //--------------------------------------------------------------------------------------------------------
    // Version
    //--------------------------------------------------------------------------------------------------------
    //
    // @param numeric $numeric
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _version($numeric)
    {
        $length = strlen((string)$numeric);

        if( (int)$numeric > 999 || (int)$numeric < 0 )
        {
            return false;
        }

        switch( $length )
        {
            case 1 : $numeric = '00'.$numeric; break;
            case 2 : $numeric = '0'.$numeric;  break;
        }

        if( $numeric === '000' )
        {
            return false;
        }

        return $numeric;
    }
}
