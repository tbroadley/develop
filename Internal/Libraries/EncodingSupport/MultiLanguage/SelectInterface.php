<?php namespace ZN\EncodingSupport\MultiLanguage;

interface SelectInterface
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
    // Select
    //--------------------------------------------------------------------------------------------------------
    //
    // Dil dosyasın yer alan istenilen kelimeye erişmek için kullanılır.
    // @param mixed $key
    // @return string
    //
    //--------------------------------------------------------------------------------------------------------
    public function do(string $key, $convert = NULL) : string;

    //--------------------------------------------------------------------------------------------------------
    // Select All
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  mixed $app
    // @return array
    //
    //--------------------------------------------------------------------------------------------------------
    public function all($app = NULL) : array;
}
