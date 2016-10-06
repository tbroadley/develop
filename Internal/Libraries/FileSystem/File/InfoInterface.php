<?php namespace ZN\FileSystem\File;

interface InfoInterface
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
    // Required
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  void
    // @return array
    //
    //--------------------------------------------------------------------------------------------------------
    public function required() : Array;

    //--------------------------------------------------------------------------------------------------------
    // Access
    //--------------------------------------------------------------------------------------------------------
    //
    // @param bool $realPath = true
    // @param bool $parentDirectoryAccess = false
    //
    // @param FileSystemCommon
    //
    //--------------------------------------------------------------------------------------------------------
    public function access($realPath = true, $parentDirectoryAccess = false) : Info;

    //--------------------------------------------------------------------------------------------------------
    // Rpath
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    //
    // @param string
    //
    //--------------------------------------------------------------------------------------------------------
    public function rpath(String $file) : String;

    //--------------------------------------------------------------------------------------------------------
    // Exists
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    //
    // @param bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function exists(String $file) : Bool;

    //--------------------------------------------------------------------------------------------------
    // Orgin Path
    //--------------------------------------------------------------------------------------------------
    //
    // @param  string $string
    //
    // @return string
    //
    //--------------------------------------------------------------------------------------------------
    public function originpath(String $string) : String;

    //--------------------------------------------------------------------------------------------------
    // Relative Path
    //--------------------------------------------------------------------------------------------------
    //
    // @param  string $string
    //
    // @return string
    //
    //--------------------------------------------------------------------------------------------------
    public function relativepath(String $string) : String;

    //--------------------------------------------------------------------------------------------------
    // Absolute Path
    //--------------------------------------------------------------------------------------------------
    //
    // @param  string $string
    //
    // @return string
    //
    //--------------------------------------------------------------------------------------------------
    public function absolutePath(String $string) : String;

    //--------------------------------------------------------------------------------------------------------
    // Available
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    //
    // @param bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function available(String $file) : Bool;

    //--------------------------------------------------------------------------------------------------------
    // Info
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    //
    //--------------------------------------------------------------------------------------------------------
    public function get(String $file) : \stdClass;

    //--------------------------------------------------------------------------------------------------------
    // Size
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    // @param string $type
    // @param int    $decimal
    //
    //--------------------------------------------------------------------------------------------------------
    public function size(String $file, String $type = 'b', Int $decimal = 2) : Float;

    //--------------------------------------------------------------------------------------------------------
    // Create Date
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function createDate(String $file, String $type = 'd.m.Y G:i:s') : String;


    //--------------------------------------------------------------------------------------------------------
    // Change Date
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function changeDate(String $file, String $type = 'd.m.Y G:i:s') : String;

    //--------------------------------------------------------------------------------------------------------
    // Owner
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    //
    //--------------------------------------------------------------------------------------------------------
    public function owner(String $file);

    //--------------------------------------------------------------------------------------------------------
    // Group
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    //
    //--------------------------------------------------------------------------------------------------------
    public function group(String $file);

    //--------------------------------------------------------------------------------------------------------
    // rowCount()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $file
    // @param  bool   $recursive
    //
    //--------------------------------------------------------------------------------------------------------
    public function rowCount(String $file = '/', Bool $recursive = true) : Int;
}
