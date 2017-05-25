<?php namespace ZN\ViewObjects\Sheet\Helpers;

interface TransformInterface
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
    // Matrix
    //--------------------------------------------------------------------------------------------------------
    //
    // @param numeric variadic $arguments
    //
    //--------------------------------------------------------------------------------------------------------
    public function matrix(...$arguments) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Matrix 3d
    //--------------------------------------------------------------------------------------------------------
    //
    // @param numeric variadic $arguments
    //
    //--------------------------------------------------------------------------------------------------------
    public function matrix3d(...$arguments) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Rotate
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $argument
    //
    //--------------------------------------------------------------------------------------------------------
    public function rotate(String $argument) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Rotate 3d
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $x
    // @param string $y
    // @param string $z
    // @param string $angle
    //
    //--------------------------------------------------------------------------------------------------------
    public function rotate3d(String $x, String $y, String $z, String $angle) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Rotate X
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $argument
    //
    //--------------------------------------------------------------------------------------------------------
    public function rotateX(String $argument) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Rotate Y
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $argument
    //
    //--------------------------------------------------------------------------------------------------------
    public function rotateY(String $argument) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Rotate Z
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $argument
    //
    //--------------------------------------------------------------------------------------------------------
    public function rotateZ(String $argument) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Scale
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $x
    // @param int $y
    //
    //--------------------------------------------------------------------------------------------------------
    public function scale(Int $x, Int $y) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Scale 3d
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $x
    // @param int $y
    // @param int $z
    //
    //--------------------------------------------------------------------------------------------------------
    public function scale3d(Int $x, Int $y, Int $z) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Scale X
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $x
    //
    //--------------------------------------------------------------------------------------------------------
    public function scaleX(Int $x) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Scale Y
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $y
    //
    //--------------------------------------------------------------------------------------------------------
    public function scaleY(Int $y) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Scale Z
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $z
    //
    //--------------------------------------------------------------------------------------------------------
    public function scaleZ(Int $z) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Skew
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $x
    // @param string $y
    //
    //--------------------------------------------------------------------------------------------------------
    public function skew(String $x, String $y) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Skew X
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $x
    //
    //--------------------------------------------------------------------------------------------------------
    public function skewX(String $x) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Skew Y
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $y
    //
    //--------------------------------------------------------------------------------------------------------
    public function skewY(String $y) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Translate 3d
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $x
    // @param string $y
    // @param string $z
    //
    //--------------------------------------------------------------------------------------------------------
    public function translate3d(String $x, String $y, String $z) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Translate
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $x
    // @param string $y
    //
    //--------------------------------------------------------------------------------------------------------
    public function translate(String $x, String $y) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Translate X
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $x
    //
    //--------------------------------------------------------------------------------------------------------
    public function translateX(String $x) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Translate Y
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $y
    //
    //--------------------------------------------------------------------------------------------------------
    public function translateY(String $y) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Translate Z
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $z
    //
    //--------------------------------------------------------------------------------------------------------
    public function translateZ(String $z) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Perspective
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $n
    //
    //--------------------------------------------------------------------------------------------------------
    public function perspective(String $n) : Transform;

    //--------------------------------------------------------------------------------------------------------
    // Create
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function create() : String;
}