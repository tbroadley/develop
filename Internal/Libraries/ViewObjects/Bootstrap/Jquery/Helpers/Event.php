<?php namespace ZN\ViewObjects\Bootstrap\Jquery\Helpers;

use ZN\ViewObjects\Bootstrap\JqueryTrait;
use CallController, Support, Arrays;

class Event
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
    // Jquery Trait
    //--------------------------------------------------------------------------------------------------------
    //
    // @methods
    //
    //--------------------------------------------------------------------------------------------------------
    use JqueryTrait;

    //--------------------------------------------------------------------------------------------------------
    // Type
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $type = '';

    //--------------------------------------------------------------------------------------------------------
    // Params
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $params = '';

    //--------------------------------------------------------------------------------------------------------
    // Property
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $property = 'bind';

    //--------------------------------------------------------------------------------------------------------
    // Events
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $events =
    [
        'click'     , 'dblclick' , 'blur'    , 'change'    , 'resize'   ,
        'scroll'    , 'unload'   , 'load'    , 'ready'     , 'focus'    ,
        'focusin'   , 'focusout' , 'keypress', 'keydown'   , 'keyup'    ,
        'mouseenter', 'mousedown', 'mouseup' , 'mouseleave', 'mousemove',
        'mouseout'  , 'mouseover', 'hover'   , 'select'    , 'submit'   ,
        'error'     , 'toggle'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Properties
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $properties =
    [
        'bind', 'unbind', 'trigger', 'triggerhandler', 'delegate',
        'one' , 'on'    , 'off'    , 'live'          , 'die'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Magic Call
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $method
    // @param array  $parameters
    //
    //--------------------------------------------------------------------------------------------------------
    public function __call($method, $parameters)
    {
        $method = strtolower($method);

        if( in_array($method, $this->events) )
        {
            $this->_event($method, ...$parameters);
        }
        elseif( in_array($method, $this->properties) )
        {
            $this->property = $method;
            $this->selector = $parameters[0];
            $this->params   = Arrays::removeFirst($parameters);
        }
        else
        {
            Support::classMethod('Jquery::event()', $method);
        }

        return $this->create();
    }

    //--------------------------------------------------------------------------------------------------------
    // Type
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function type(string $type = 'click') : Event
    {
        $this->property = $type;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Complete
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function complete() : string
    {
        if( isset($this->callback) )
        {
            $this->params[] = $this->callback;
        }

        $event = \JQ::property($this->property, $this->params);

        $this->_defaultVariable();

        return $event;
    }

    //--------------------------------------------------------------------------------------------------------
    // Create
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string variadic $args
    //
    //--------------------------------------------------------------------------------------------------------
    public function create(...$args) : string
    {
        $combineEvent = $args;

        $event  = EOL.\JQ::selector($this->selector);
        $event .= $this->complete();
        if( ! empty($combineEvent))foreach($combineEvent as $e)
        {
            $event .= $e;
        }

        $event .= ";";

        return $this->_tag($event);
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected
    //--------------------------------------------------------------------------------------------------------
    protected function _event($type, $selector, $callback)
    {
        $this->property = strtolower($type);

        if( ! empty($selector))
        {
            $this->selector($selector);
        }

        if( ! empty($callback))
        {
            $this->callback('e', $callback);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected
    //--------------------------------------------------------------------------------------------------------
    protected function _defaultVariable()
    {
        $this->selector = 'this';
        $this->type     = '';
        $this->callback = '';
        $this->property = 'bind';
        $this->params   = '';
    }
}
