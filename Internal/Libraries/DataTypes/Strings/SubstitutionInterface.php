<?php namespace ZN\DataTypes\Strings;

interface SubstitutionInterface
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
    // Reshuffle
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    // @param string $shuffle
    // @param string $reshuffle
    //
    //--------------------------------------------------------------------------------------------------------
    public function reshuffle(string $str, string $shuffle, string $reshuffle) : string;

    //--------------------------------------------------------------------------------------------------------
    // Placement
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    // @param string $delimiter
    // @param array  $array
    //
    //--------------------------------------------------------------------------------------------------------
    public function placement(string $str, string $delimiter, array $array) : string;

    //--------------------------------------------------------------------------------------------------------
    // Replace
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    // @param mixed  $oldChar
    // @param mixed  $newChar
    // @param bool   $case = true
    //
    //--------------------------------------------------------------------------------------------------------
    public function replace(string $string, $oldChar, $newChar = NULL, bool $case = true) : string;
}
