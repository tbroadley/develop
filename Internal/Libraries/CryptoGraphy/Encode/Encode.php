<?php namespace ZN\CryptoGraphy;

class InternalEncode extends EncodeCommon implements EncodeInterface
{
    //--------------------------------------------------------------------------------------------------------
    // Create
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int    $count
    // @param string $chars
    //
    //--------------------------------------------------------------------------------------------------------
    public function create(Int $count = 6, String $chars = 'all') : String
    {
        return EncodeFactory::class('RandomPassword')->create($count, $chars);
    }

    //--------------------------------------------------------------------------------------------------------
    // Golden
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    // @param string $additional
    //
    //--------------------------------------------------------------------------------------------------------
    public function golden(String $data, String $additional = 'default') : String
    {
        return EncodeFactory::class('GoldenAlgorithm')->create($data, $additional);
    }

    //--------------------------------------------------------------------------------------------------------
    // Super
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function super(String $data) : String
    {
        return EncodeFactory::class('SuperAlgorithm')->create($data);
    }

    //--------------------------------------------------------------------------------------------------------
    // Data
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function data(String $data, String $type = 'md5') : String
    {
        return $this->type($data, $type);
    }

    //--------------------------------------------------------------------------------------------------------
    // Type
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function type(String $data, String $type = 'md5') : String
    {
        return EncodeFactory::class('Type')->create($data, $type);
    }
}
