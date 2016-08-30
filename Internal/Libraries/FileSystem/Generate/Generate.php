<?php namespace ZN\FileSystem;

use CallController, Folder, File, DBTool, Config;

class InternalGenerate extends CallController implements GenerateInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------
    
    //--------------------------------------------------------------------------------------------------------
    // Settings
    //--------------------------------------------------------------------------------------------------------
    // 
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $settings = [];
    
    //--------------------------------------------------------------------------------------------------------
    // Grand Vision
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param mixed $database = NULL
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function grandVision($database = NULL)
    {
        $databases = [];

        if( is_string($database) )
        {
            $databases[0] = $database;
        }
        else
        {
            $databases = $database;
        }

        if( empty($database) )
        {
            $databases = DBTool::listDatabases();
        }

        $visionPath = 'Visions'.DS;

        $defaultDB = config('Database', 'database')['database'];
        
        foreach( $databases as $connection => $database )
        {
            $configs = [];

            if( is_array($database) )
            {
                $configs  = $database; 
                $database = $connection; 
            }
            
            $configs['database'] = $database; 

            $tables   = DBTool::differentConnection(['database' => $database])->listTables();
            $database = ucfirst($database);
            $filePath = $visionPath.$database;

            Folder::create(MODELS_DIR.$filePath);

            foreach( $tables as $table )
            {
                $table = ucfirst($table);

                $this->model(INTERNAL_ACCESS.( strtolower($database) === strtolower($defaultDB) ? NULL : $database ).$table.'Vision',
                [
                    'path'      => $filePath,
                    'namespace' => 'Visions\\'.$database,
                    'use'       => ['GrandModel'],
                    'extends'   => 'GrandModel',
                    'constants' => ['table' => "'".$table."'"],
                    'vars'      => ['protected static:connection' => $this->_stringArray($configs)] 
                ]);
            }
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Settings
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param array $settings: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function settings(Array $settings) : InternalGenerate
    {
        $this->settings = $settings;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Model
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name    : empty
    // @param array  $settings: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function model(String $name, Array $settings = []) : Bool
    {
        return $this->_object($name, __FUNCTION__, $settings);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Controller
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name: empty
    // @param array  $settings: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function controller(String $name, Array $settings = []) : Bool
    {
        return $this->_object($name, __FUNCTION__, $settings);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Library
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name: empty
    // @param array  $settings: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function library(String $name, Array $settings = []) : Bool
    {
        return $this->_object($name, __FUNCTION__, $settings);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Delete
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name: empty
    // @param string $type: 'controller', 'model', 'library'
    // @param string $app : empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function delete(String $name, String $type = 'controller', String $app = NULL) : Bool
    {
        if( ! empty($app) )
        {
            $this->settings['application'] = $app;
        }
        
        $file = $this->_path($name, $type);
        
        if( File::exists($file) )
        {
            return File::delete($file);    
        }
        
        return false;
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected String Array
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param array $data
    //
    // @return string
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _stringArray($data)
    {
        $str = EOL.HT.'['.EOL;
        foreach( $data as $key => $val )
        {
            $str .= HT.HT."'".$key."' => '".$val."',".EOL;
        }
        $str = rtrim($str, ','.EOL);
        $str .= EOL.HT.']';
        
        return $str;
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Object
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name    : empty
    // @param string $type    : empty
    // @param array  $settings: empty
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _object($name, $type, $settings)
    {
        if( ! empty($settings) )
        {
            $this->settings = $settings;
        }
        
        return $this->_contentWrite($name, $type);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected Path
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name: empty
    // @param string $type: empty
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _path($name, $type)
    {
        if( empty($this->settings['application']) )
        {
            $this->settings['application'] = divide(rtrim(PROJECT_DIR, DS), DS, -1);
        }

        return PROJECTS_DIR.$this->settings['application'].$this->_type($type).suffix($name, '.php');
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected Content Write
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name: empty
    // @param string $type: empty
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _contentWrite($name, $type)
    {   
        if( empty($name) )
        {
            $this->error = getErrorMessage('Error', 'emptyParameter', '1.(name)');
        }
            
        $eol = EOL;
        $ht  = HT;
        $parameters = '';
        
        $controller  = "<?php".$eol;
        
        // Object Data
        if( empty( $this->settings['object']) )
        {
            $this->settings['object'] = 'class';
        }
        
        // Namespace Data
        $namespace = NULL;

        if( ! empty($this->settings['namespace']) )
        {
            $namespace   = $this->settings['namespace'];
            $controller .= "namespace ".$namespace.";".$eol.$eol;
        }
        
        // Use Data
        if( ! empty($this->settings['use']) )
        {
            foreach( $this->settings['use'] as $key => $use )
            {
                if( is_numeric($key) )
                {
                    $controller .= "use {$use};".$eol;
                }
                else
                {
                    $controller .= "use {$key} as {$use};".$eol;
                }
            }
            
            $controller .= $eol;
        }

        if( ! empty($this->settings['name']) )
        {
            $name = $this->settings['name'];
        }
        
        $controller .= $this->settings['object']." ".$name;
        
        // Extends Data
        if( ! empty($this->settings['extends']) )
        {
            $controller .= " extends ".$this->settings['extends'];
        }
        
        // Implements Data
        if( ! empty($this->settings['implements']) )
        {
            $controller .= " implements ".( is_array($this->settings['implements']) 
                                            ? implode(', ', $this->settings['implements']) 
                                            : $this->settings['implements']
                                          );
        }
        
        $controller .= $eol."{".$eol;
        
        // Traits Data
        if( ! empty($this->settings['traits']) )
        {
            if( is_array($this->settings['traits']) ) foreach( $this->settings['traits'] as $trait )
            {
                $controller .= $ht."use {$trait};".$eol;
            }
            else
            {
                $controller .= $ht."use ".$this->settings['traits'].";".$eol;
            }
            
            $controller .= $eol;
        }
        
        // Constants Data
        if( ! empty($this->settings['constants']) )
        {
            foreach( $this->settings['constants'] as $key => $val )
            {
                $controller .= $ht."const {$key} = {$val};".$eol;
            }
            
            $controller .= $eol;
        }
        
        // Vars Data
        if( ! empty($this->settings['vars']) )
        {
            $var = '';
            foreach( $this->settings['vars'] as $isKey => $var )
            {
                if( ! is_numeric($isKey) )
                {
                    $value = $var;
                    $var   = $isKey;
                }
                
                $vars = $this->_varType($var);
                $controller .= $ht.$vars->priority.' $'.$vars->var.( ! empty($value) ? " = ".$value : '' ).";".$eol;
            }
            
            $controller .= $eol;
        }
        
        // Functions Data
        if( ! empty($this->settings['functions']) ) foreach( $this->settings['functions'] as $isKey => $function )
        {
            if( ! empty($function) )
            {
                if( ! is_numeric($isKey) )
                {
                    if( is_array($function) )
                    {   
                        $subValue = '';
                        
                        foreach( $function as $key => $val )
                        {
                            if( ! is_numeric($key) )
                            {
                                $subValue = $val;
                                $val      = $key;
                            }
                            
                            if( strpos($val, '...') === 0 )
                            {
                                $varprefix = str_replace('...', '...$', $val);
                                $subValue  = ''; 
                            }
                            else
                            {
                                $varprefix = '$'.$val;
                            }
                            
                            $parameters .= $varprefix.( ! empty($subValue) ? ' = '.$subValue : '').', ';
                        }
                        
                        $parameters = rtrim($parameters, ', ');
                    }
                    
                    $function = $isKey;
                }   
                
                $function = $this->_varType($function);
                
                $controller .= $ht.$function->priority." function {$function->var}({$parameters})".$eol;
                $controller .= $ht."{".$eol;
                $controller .= $ht.$ht."// Your codes...".$eol;
                $controller .= $ht."}".$eol.$eol;
            }
        }

        $controller  = rtrim($controller, $eol);
        $controller .= $eol."}";

        if( ! empty($this->settings['alias']) )
        {
            $controller .= $eol.$eol.'class_alias("'.suffix($namespace, '\\').$name.'", "'.$this->settings['alias'].'");';
        }

        if( ! empty($this->settings['path']) )
        {
            $filePath = suffix($this->settings['path'], DS).$name;
        }
        else
        {
            $filePath = $name;
        }

        $file = $this->_path($filePath, $type);
                
        if( ! File::exists($file) )
        {
            if( File::write($file, $controller) )
            {
                return true;
            }   
            else
            {
                return false;
            }
        }   
        else
        {
            return false; 
        }
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected Var Type
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $var: empty
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _varType($var)
    {
        $static = NULL;

        if( strstr($var, 'static') )
        {
            $static = ' static';
        }

        if( stripos($var, 'protected'.$static.':') === 0 )
        {
            $priority = 'protected';
            $var      = str_ireplace('protected'.$static.':', '', $var);
        }
        elseif( stripos($var, 'public'.$static.':') === 0 )
        {
            $priority = 'public';
            $var      = str_ireplace('public'.$static.':', '', $var);
        }
        elseif( stripos($var, 'private'.$static.':') === 0 )
        {
            $priority = 'private';
            $var     = str_ireplace('private'.$static.':', '', $var);
        }
        else
        {
            $priority = 'public';
            $var      = $var;
        }
        
        return (object) 
        [
            'priority' => $priority.$static, 
            'var'      => $var
        ];
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected Type
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $type: empty
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _type($type)
    {
        $return = '';
        
        if( $type === 'model' )
        {
            $return = 'Models';
        }
        elseif( $type === 'controller' )
        {
            $return = 'Controllers';
        }
        elseif( $type === 'library' )
        {
            $return = 'Libraries';
        }
        
        return presuffix($return, DS);
    }
}