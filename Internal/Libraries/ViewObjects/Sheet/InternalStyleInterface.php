<?php namespace ZN\ViewObjects;

interface InternalStyleInterface
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
    // Type
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function type(String $type);

    //--------------------------------------------------------------------------------------------------------
    // Library
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string ...$args
    //
    //--------------------------------------------------------------------------------------------------------
    public function library(...$libraries);

    //--------------------------------------------------------------------------------------------------------
    // Open
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function open() : String;

    //--------------------------------------------------------------------------------------------------------
    // Close
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function close() : String;
}
