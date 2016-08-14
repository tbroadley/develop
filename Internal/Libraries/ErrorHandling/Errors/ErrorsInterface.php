<?php namespace ZN\ErrorHandling;

interface ErrorsInterface
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
    // Message
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $langFile
    // @param string $errorMsg
    // @param mixed  $ex
    //
    //--------------------------------------------------------------------------------------------------------
    public function message(String $langFile, String $errorMsg, $ex = NULL) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Last
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $type
    // @return mixed
    //
    //--------------------------------------------------------------------------------------------------------
    public function last(String $type = NULL);
    
    //--------------------------------------------------------------------------------------------------------
    // Log
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param int    $type
    // @param string $destination
    // @param string $header
    //
    //--------------------------------------------------------------------------------------------------------
    public function log(String $message, Int $type = 0, String $destination = NULL, String $header = NULL) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Report
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int
    //
    //--------------------------------------------------------------------------------------------------------  
    public function report(Int $level = NULL) : Int;
        
    //--------------------------------------------------------------------------------------------------------
    // Handler
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int
    //
    //--------------------------------------------------------------------------------------------------------  
    public function handler($handler, Int $errorTypes = E_ALL | E_STRICT);
    
    //--------------------------------------------------------------------------------------------------------
    // Trigger
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $msg
    // @param int    $errorType
    //
    //--------------------------------------------------------------------------------------------------------
    public function trigger(String $msg, Int $errorType = E_USER_NOTICE) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Restore
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function restore() : Bool;
}