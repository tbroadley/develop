<?php namespace ZN\EncodingSupport\MultiLanguage;

use File, Json;

class Insert extends MLExtends implements InsertInterface
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
    // Insert
    //--------------------------------------------------------------------------------------------------------
    //
    // Dil dosyasına kelime eklemek için kullanılır.
    // @param string $app
    // @param mixed  $key
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function do(string $app, $key, string $data = NULL) : bool
    {
        $datas = [];

        $createFile = $this->_langFile($app);

        if( ! File::exists($createFile) )
        {
            File::write($createFile, Json::encode([]));
        }

        $datas = Json::decodeArray(File::read($createFile));

        if( ! empty($datas) )
        {
            $json = $datas;
        }

        if( ! is_array($key) )
        {
            $json[$key] = $data;
        }
        else
        {
            foreach( $key as $k => $v )
            {
                $json[$k] = $v;
            }
        }

        if( $json !== $datas )
        {
            return File::write($createFile, Json::encode($json));
        }
        else
        {
            return false;
        }
    }
}
