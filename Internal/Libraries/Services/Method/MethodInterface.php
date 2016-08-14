<?php namespace ZN\Services;

interface MethodInterface
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
    // Post
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name
    // @param mixed  $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function post(String $name, $value); 
    
    //--------------------------------------------------------------------------------------------------------
    // Get
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name
    // @param mixed  $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function get(String $name, $value);
    
    //--------------------------------------------------------------------------------------------------------
    // Env
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name
    // @param mixed  $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function env(String $name, $value);
    
    //--------------------------------------------------------------------------------------------------------
    // Server
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name
    // @param mixed  $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function server(String $name, $value);
    
    //--------------------------------------------------------------------------------------------------------
    // Request
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name
    // @param mixed  $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function request(String $name, $value);
    
    //--------------------------------------------------------------------------------------------------------
    // Files
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $filename
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function files(String $fileName, String $type);
    
    //--------------------------------------------------------------------------------------------------------
    // Delete
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function delete(String $input, String $name);
}