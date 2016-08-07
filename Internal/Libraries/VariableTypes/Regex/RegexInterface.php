<?php
namespace ZN\VariableTypes;

interface RegexInterface
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
	// Match                                                                
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $pattern
	// @param string $str
	// @param string $ex
	// @param string $delimiter
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function match(String $pattern, String $str, String $ex = NULL, String $delimiter = '/') : Array;
	
	//----------------------------------------------------------------------------------------------------
	// Match All                                                                
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $pattern
	// @param string $str
	// @param string $ex
	// @param string $delimiter
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function matchAll(String $pattern, String $str, String $ex = NULL, String $delimiter = '/') : Array;
	
	//----------------------------------------------------------------------------------------------------
	// Replace                                                                
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $pattern
	// @param string $rep
	// @param string $str
	// @param string $ex
	// @param string $delimiter
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function replace(String $pattern, String $rep, String $str, String $ex = NULL, String $delimiter = '/');
	
	//----------------------------------------------------------------------------------------------------
	// Group                                                                
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $str
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function group(String $str) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Recount                                                                
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $str
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function recount(String $str) : String;
	
	//----------------------------------------------------------------------------------------------------
	// To                                                                
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $str
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function to(String $str) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Quote                                                                
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $data
	// @param string $delimiter
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function quote(String $data, String $delimiter = NULL) : String;
}