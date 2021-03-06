<?php 

use ZN\IndividualStructures\Lang;
use ZN\ErrorHandling\Exceptions;

class DebugException
{
    //--------------------------------------------------------------------------------------------------------
    // DebugException -> 4.0.0
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Magic Construct
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    // @param string $message
    // @param mixed  $changed
    //
    //--------------------------------------------------------------------------------------------------------
    public function __construct(String $file, String $message = NULL, $changed = NULL)
    {
        if( $data = Lang::select($file, $message, $changed) )
        {
            $message = $data;
        }
        else
        {
            $message = $file;
        }

        $debug = (object) debug_backtrace(2)[1];

        echo Exceptions::continue($message, $debug->file, $debug->line);
    }
}
