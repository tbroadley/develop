<?php namespace Project\Controllers;

use Collection, Import;

trait ViewTrait
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
    // Static $data
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    public static $data = [];

    //--------------------------------------------------------------------------------------------------------
    // Static $data
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    public static $usableMethods =
    [
        'view', 'script', 'style', 'font', 'template', 'page', 'something', 'theme', 'resource', 'plugin'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Magic Call Static
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $method
    // @param array  $parameters
    //
    //--------------------------------------------------------------------------------------------------------
    public static function __callStatic($method, $parameters)
    {
        self::call($method, $parameters);

        return new self;
    }

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
        self::call($method, $parameters);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Call
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $method
    // @param array  $parameters
    //
    //--------------------------------------------------------------------------------------------------------
    protected static function call($method, $parameters)
    {
        if( is_scalar($parameters[0]) )
        {
            $ex = explode(':', $parameters[0]);

            if( in_array($met = $ex[0], self::$usableMethods) )
            {
                $pr = Collection::data($parameters)->removeFirst()->addLast(true)->get();

                if( strstr('page|view|something', $met) && ! is_array($pr[0]) )
                {
                    array_unshift($pr, NULL);
                }

                self::$data[$method] = $value = Import::$met($ex[1] ?? NULL, ...$pr);
            }
        }

        if( empty($value) )
        {
            self::$data[$method] = $parameters[0] ?? false;
        }
    }
}
