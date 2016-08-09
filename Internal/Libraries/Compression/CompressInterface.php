<?php
namespace ZN\Compression;

interface CompressInterface
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Extract
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $source
	// @param  string $target
	// @return bool
	//
	//----------------------------------------------------------------------------------------------------
	public function extract(String $source, String $target = NULL, String $password = NULL) : Bool;
	
	//----------------------------------------------------------------------------------------------------
	// Write
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	// @param string $data
	// @param string $mode
	//
	//----------------------------------------------------------------------------------------------------
	public function write(String $file, String $data, String $mode = 'w') : Bool;
	
	//----------------------------------------------------------------------------------------------------
	// Read
	//----------------------------------------------------------------------------------------------------
	//
	// @param string  $file
	// @param numeric $length
	// @param string  $type
	//
	//----------------------------------------------------------------------------------------------------
	public function read(String $file, Int $length = 1024, String $mode = 'r') : String;
	
	//----------------------------------------------------------------------------------------------------
	// Compress
	//----------------------------------------------------------------------------------------------------
	//
	// @param string  $data
	// @param numeric $blockSize
	// @param mixed   $workFactor
	//
	//----------------------------------------------------------------------------------------------------
	public function compress(String $data, Int $level = -1, String $encoding = NULL) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Uncompress
	//----------------------------------------------------------------------------------------------------
	//
	// @param string  $data
	// @param numeric $small
	//
	//----------------------------------------------------------------------------------------------------
	public function uncompress(String $data, Int $length = 0) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Encode
	//----------------------------------------------------------------------------------------------------
	//
	// @param string  $data
	// @param mixed   $encoding
	//
	//----------------------------------------------------------------------------------------------------
	public function encode(String $data, Int $level = -1, String $encoding = NULL) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Decode
	//----------------------------------------------------------------------------------------------------
	//
	// @param string  $data
	// @param string  $length
	//
	//----------------------------------------------------------------------------------------------------
	public function decode(String $data, Int $length = NULL) : String ;
	
	//----------------------------------------------------------------------------------------------------
	// Deflate
	//----------------------------------------------------------------------------------------------------
	//
	// @param string  $data
	// @param numeric $level
	// @param mixed   $encoding
	//
	//----------------------------------------------------------------------------------------------------
	public function deflate(String $data, Int $level = -1, String $encoding = NULL) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Inflate
	//----------------------------------------------------------------------------------------------------
	//
	// @param string  $data
	// @param numeric $length
	//
	//----------------------------------------------------------------------------------------------------
	public function inflate(String $data, Int $length = 0) : String;

	//----------------------------------------------------------------------------------------------------
	// Driver                                                                       
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $driver
	// @return object 	        		     			 
	//          																				 
	//----------------------------------------------------------------------------------------------------
	public function driver(String $driver);
}