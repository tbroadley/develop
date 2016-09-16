<?php namespace ZN\IndividualStructures\Buffer;

interface CallbackInterface
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
    // Do
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string/callable $func
    // @param  array           $params
    // @return callable
    //
    //--------------------------------------------------------------------------------------------------------
    public static function do($func, Array $params = []);
}
