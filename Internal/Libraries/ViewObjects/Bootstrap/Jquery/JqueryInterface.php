<?php namespace ZN\ViewObjects;

interface JqueryInterface
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
    // Selector                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $selector
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function selector(String $selector = 'this');
    
    //--------------------------------------------------------------------------------------------------------
    // Property                                                                 
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string   $property
    // @param variadic $attr
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function property(String $property, ...$attr) : InternalJquery;
    
    //--------------------------------------------------------------------------------------------------------
    // Complete                                                                 
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function complete() : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Complete                                                                 
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function create(...$args) : String ;
    
    //--------------------------------------------------------------------------------------------------------
    // Ajax
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function ajax(Bool $tag = false, Bool $jq = false, Bool $jqui = false) : Jquery\Helpers\Ajax;
    
    //--------------------------------------------------------------------------------------------------------
    // Action
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function action(Bool $tag = false, Bool $jq = false, Bool $jqui = false) : Jquery\Helpers\Action;
    
    //--------------------------------------------------------------------------------------------------------
    // Animate
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function animate(Bool $tag = false, Bool $jq = false, Bool $jqui = false) : Jquery\Helpers\Animate;
    
    //--------------------------------------------------------------------------------------------------------
    // Event
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function event(Bool $tag = false, Bool $jq = false, Bool $jqui = false) : Jquery\Helpers\Event;
}