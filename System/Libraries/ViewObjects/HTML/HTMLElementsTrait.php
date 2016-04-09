<?php
namespace HTML;

trait ElementsTrait
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
	// href()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function href($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// accessKey()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function accessKey($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// aria()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $type
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function aria($type = '', $element = '')
	{
		$this->settings['attr']['aria-'.$type] = $element;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// charset()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function charset($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// contentEditable()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function contentEditable($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// contextMenu()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function contextMenu($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// coords()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function coords($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// data()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $type
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function data($type = '', $element = '')
	{
		$this->settings['attr']['data-'.$type] = $element;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// dir()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function dir($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// hidden()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function hidden($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// iceRepeating()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function iceRepeating($element = '')
	{
		$this->settings['attr']['ice:repeating'] = $element;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// lang()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function lang($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// media()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function media($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// rel()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function rel($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// rel()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function rev($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// shape()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function shape($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// spellcheck()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function spellcheck($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// spry()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $type
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function spry($type = '', $element = '')
	{
		$this->settings['attr']['spry-'.$type] = $element;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// tabindex()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function tabIndex($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// target()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function target($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// src()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function src($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// source()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function source($element = '')
	{
		$this->settings['attr']['src'] = $element;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// title()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $vspace
	//
	//----------------------------------------------------------------------------------------------------
	public function title($title = '')
	{
		$this->settings['attr']['title'] = $title;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// alt()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function alt($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// dynsrc()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function dynsrc($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// longdesc()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function longdesc($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// loop()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function loop($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// lowsrc()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function lowsrc($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// start()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function start($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// usemap()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function usemap($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// face()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function face($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// pointsize()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $element
	//
	//----------------------------------------------------------------------------------------------------
	public function pointSize($element = '')
	{
		$this->_element(__FUNCTION__, $element);
		
		return $this;
	}
}