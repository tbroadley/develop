<?php namespace ZN\DataTypes;

use Arrays;

class InternalCollection implements CollectionInterface
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
    // Magic Call
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $method
    // @param array  $parameters
    //
    //--------------------------------------------------------------------------------------------------------
    public function __call($method, $parameters)
    {
        $this->data = Arrays::$method($this->data, ...$parameters);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Data
    //--------------------------------------------------------------------------------------------------------
    // 
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $data = [];
    
    //--------------------------------------------------------------------------------------------------------
    // Data
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function data(Array $data) : InternalCollection
    {
        $this->data = $data;
        
        return $this;
    }   

    //--------------------------------------------------------------------------------------------------------
    // Get
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  void
    //
    //--------------------------------------------------------------------------------------------------------
    public function get()
    {
        $data = $this->data;
        
        $this->data = [];
        
        return $data;
    }
}