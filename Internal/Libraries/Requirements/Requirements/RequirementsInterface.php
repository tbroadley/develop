<?php namespace ZN\Requirements;

interface RequirementsInterface
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
    // Initialize
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function initialize();

    //--------------------------------------------------------------------------------------------------------
    // config()                                                                       
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  mixed  $settings: empty
    // @param  string $path    : empty
    // @return object                                
    //                                                                                           
    //--------------------------------------------------------------------------------------------------------
    public function config();

    //--------------------------------------------------------------------------------------------------------
    // lang()                                                                       
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $key
    // @param mixed  $options                                
    //                                                                                           
    //--------------------------------------------------------------------------------------------------------
    public function lang();

    //--------------------------------------------------------------------------------------------------------
    // error()                                                                       
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void                               
    //                                                                                           
    //--------------------------------------------------------------------------------------------------------
    public function error();
    
    //--------------------------------------------------------------------------------------------------------
    // success()                                                                       
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void                               
    //                                                                                           
    //--------------------------------------------------------------------------------------------------------
    public function success();
    
    //--------------------------------------------------------------------------------------------------------
    // Status
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  void
    // @return string
    //
    //--------------------------------------------------------------------------------------------------------
    public function status();
}