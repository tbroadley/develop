<?php namespace ZN\Services;

interface RestfulInterface
{
    //--------------------------------------------------------------------------------------------------------
    // Content Type
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $type    = 'json'
    // @param string $charset = 'utf-8'
    //
    //--------------------------------------------------------------------------------------------------------
    public function contentType(String $type = 'json', String $charset = 'utf-8') : Restful;

    //--------------------------------------------------------------------------------------------------------
    // Http Status
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $code
    //
    //--------------------------------------------------------------------------------------------------------
    public function httpStatus(Int $code = NULL) : Restful;

    //--------------------------------------------------------------------------------------------------------
    // Info
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function info(String $key = NULL);

    //--------------------------------------------------------------------------------------------------------
    // Url
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    //
    //--------------------------------------------------------------------------------------------------------
    public function url(String $url) : Restful;

    //--------------------------------------------------------------------------------------------------------
    // Data
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function data(Array $data) : Restful;

    //--------------------------------------------------------------------------------------------------------
    // SSL Verify Peer
    //--------------------------------------------------------------------------------------------------------
    //
    // @param bool $type = false
    //
    //--------------------------------------------------------------------------------------------------------
    public function sslVerifyPeer(Bool $type = false) : Restful;

    //--------------------------------------------------------------------------------------------------------
    // Get
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    //
    //--------------------------------------------------------------------------------------------------------
    public function get(String $url = NULL);

    //--------------------------------------------------------------------------------------------------------
    // Post
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    // @param array  $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function post(String $url = NULL, Array $data = []);

    //--------------------------------------------------------------------------------------------------------
    // Put
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    // @param array  $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function put(String $url = NULL, Array $data = []);

    //--------------------------------------------------------------------------------------------------------
    // Delete
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    // @param array  $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function delete(String $url = NULL, Array $data = []);
}
