<?php namespace ZN\ErrorHandling;

interface ExceptionsInterface
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
    // Throws
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param string $key
    // @param mixed  $send
    //
    //--------------------------------------------------------------------------------------------------------
    public function throws(String $message = NULL, String $key = NULL, $send = NULL);

    //--------------------------------------------------------------------------------------------------------
    // Table
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $msg
    // @param string $file
    // @param string $line
    // @param string $no
    // @param array $trace
    //
    //--------------------------------------------------------------------------------------------------------
    public function table(String $no = NULL, String $msg = NULL, String $file = NULL, String $line = NULL, Array $trace = NULL);

    //--------------------------------------------------------------------------------------------------------
    // Restore
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function restore() : Bool;

    //--------------------------------------------------------------------------------------------------------
    // Handler
    //--------------------------------------------------------------------------------------------------------
    //
    // @param callable $handler
    //
    //--------------------------------------------------------------------------------------------------------
    public function handler($handler);
}