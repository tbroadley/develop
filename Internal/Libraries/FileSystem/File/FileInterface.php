<?php
namespace ZN\FileSystem;

interface FileInterface
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
	// Read
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	//
	//----------------------------------------------------------------------------------------------------
	public function read(String $file) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Contents
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	//
	//----------------------------------------------------------------------------------------------------
	public function contents(String $file) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Find
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	// @param string $data
	//
	//----------------------------------------------------------------------------------------------------
	public function find(String $file, String $data) : \Objects;

	//----------------------------------------------------------------------------------------------------
	// Write
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	// @param string $data
	//
	//----------------------------------------------------------------------------------------------------
	public function write(String $file, String $data) : Int;
	
	//----------------------------------------------------------------------------------------------------
	// Append
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	// @param string $data
	//
	//----------------------------------------------------------------------------------------------------
	public function append(String $file, String $data) : Int;

	//----------------------------------------------------------------------------------------------------
	// Create
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function create(String $name) : Bool;

	//----------------------------------------------------------------------------------------------------
	// Delete
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function delete(String $name) : Bool;

	//----------------------------------------------------------------------------------------------------
	// Size
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	// @param string $type
	// @param int    $decimal
	//
	//----------------------------------------------------------------------------------------------------
	public function size(String $file, String $type = 'b', Int $decimal = 2) : Float;

	//----------------------------------------------------------------------------------------------------
	// Create Date
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	// @param string $type
	//
	//----------------------------------------------------------------------------------------------------
	public function createDate(String $file, String $type = 'd.m.Y G:i:s') : String;

	//----------------------------------------------------------------------------------------------------
	// Change Date
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	// @param string $type
	//
	//----------------------------------------------------------------------------------------------------
	public function changeDate(String $file, String $type = 'd.m.Y G:i:s') : String;

	//----------------------------------------------------------------------------------------------------
	// Owner
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	//
	//----------------------------------------------------------------------------------------------------
	public function owner(String $file);

	//----------------------------------------------------------------------------------------------------
	// Group
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	//
	//----------------------------------------------------------------------------------------------------
	public function group(String $file);

	//----------------------------------------------------------------------------------------------------
	// Zip Extract
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $source
	// @param string $target
	//
	//----------------------------------------------------------------------------------------------------
	public function zipExtract(String $source, String $target = NULL) : Bool;

	//----------------------------------------------------------------------------------------------------
	// Create Zip
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $path
	// @param array  $data
	//
	//----------------------------------------------------------------------------------------------------
	public function createZip(String $path, Array $data) : Bool;

	//----------------------------------------------------------------------------------------------------
	// Rename
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $oldName
	// @param string $newName
	//
	//----------------------------------------------------------------------------------------------------
	public function rename(String $oldName, String $newName) : String;

	//----------------------------------------------------------------------------------------------------
	// Clean Cache
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $fileName
	// @param string $real
	//
	//----------------------------------------------------------------------------------------------------
	public function cleanCache(String $fileName = NULL, Bool $real = false);

	//----------------------------------------------------------------------------------------------------
	// Permission
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	// @param int    $permission
	//
	//----------------------------------------------------------------------------------------------------
	public function permission(String $file, Int $permission = 0755) : Bool;

	//----------------------------------------------------------------------------------------------------
	// Limit
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $file
	// @param int    $limit
	// @param string $mode
	//
	//----------------------------------------------------------------------------------------------------
	public function limit(String $file, Int $limit = 0, String $mode = 'r+');

	//----------------------------------------------------------------------------------------------------
	// rowCount()
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $file     
	// @param  bool   $recursive
	//
	//----------------------------------------------------------------------------------------------------
	public function rowCount(String $file = '/', Bool $recursive = true) : Int;
}