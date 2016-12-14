<?php
//--------------------------------------------------------------------------------------------------
// Base Level
//--------------------------------------------------------------------------------------------------
//
// Author     : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
// Site       : www.znframework.com
// License    : The MIT License
// Copyright  : Copyright (c) 2012-2016, ZN Framework
//
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Internal Constants Dir
//--------------------------------------------------------------------------------------------------
//
// Internal/Constants/
//
//--------------------------------------------------------------------------------------------------
define('INTERNAL_CONSTANTS_DIR', INTERNAL_DIR . 'Constants' . DS);

//--------------------------------------------------------------------------------------------------
// Internal Functions Dir
//--------------------------------------------------------------------------------------------------
//
// Internal/Functions/
//
//--------------------------------------------------------------------------------------------------
define('INTERNAL_FUNCTIONS_DIR', INTERNAL_DIR . 'Functions' . DS);

//--------------------------------------------------------------------------------------------------
// Required Priorty File
//--------------------------------------------------------------------------------------------------
//
// Constants & Functions
//
//--------------------------------------------------------------------------------------------------
require INTERNAL_CONSTANTS_DIR . 'Base.php';
require INTERNAL_CONSTANTS_DIR . 'BasePaths.php';
require INTERNAL_FUNCTIONS_DIR . 'BaseLevel.php';
