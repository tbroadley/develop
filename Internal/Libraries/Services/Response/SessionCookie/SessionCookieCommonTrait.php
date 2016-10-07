<?php namespace ZN\Services\Response;

trait SessionCookieCommonTrait
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
    // Regenerate
    //--------------------------------------------------------------------------------------------------------
    //
    // @var bool
    //
    //--------------------------------------------------------------------------------------------------------
    protected $regenerate = true;

    //--------------------------------------------------------------------------------------------------------
    // Encode
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $encode = [];

    //--------------------------------------------------------------------------------------------------------
    // Encode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function encode( ? string $nameAlgo = NULL, string $valueAlgo = NULL)
    {
        $this->encode['name']  = $nameAlgo;
        $this->encode['value'] = $valueAlgo;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Decode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $nameAlgo
    //
    //--------------------------------------------------------------------------------------------------------
    public function decode(string $nameAlgo)
    {
        $this->encode['name'] = $nameAlgo;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Regenerate
    //--------------------------------------------------------------------------------------------------------
    //
    // @param bool $regenerate
    //
    //--------------------------------------------------------------------------------------------------------
    public function regenerate(bool $regenerate = true)
    {
        $this->regenerate = $regenerate;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Methods
    //--------------------------------------------------------------------------------------------------------
    //
    // defaultVariable()
    //
    //--------------------------------------------------------------------------------------------------------
    protected function defaultVariable()
    {
        $this->name       = NULL;
        $this->value      = NULL;
        $this->encode     = [];
        $this->regenerate = true;
    }
}
