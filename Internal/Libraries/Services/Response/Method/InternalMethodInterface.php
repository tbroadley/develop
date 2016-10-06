<?php namespace ZN\Services\Response;

interface InternalMethodInterface
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
    // Post
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param mixed  $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function post(string $name, $value);

    //--------------------------------------------------------------------------------------------------------
    // Get
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param mixed  $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function get(string $name, $value);

    //--------------------------------------------------------------------------------------------------------
    // Env
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param mixed  $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function env(string $name, $value);

    //--------------------------------------------------------------------------------------------------------
    // Server
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param mixed  $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function server(string $name, $value);

    //--------------------------------------------------------------------------------------------------------
    // Request
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param mixed  $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function request(string $name, $value);

    //--------------------------------------------------------------------------------------------------------
    // Files
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $filename
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function files(string $fileName, string $type);

    //--------------------------------------------------------------------------------------------------------
    // Delete
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function delete(string $input, string $name) : void;
}
