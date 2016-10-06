<?php namespace ZN\ErrorHandling;

class InternalErrors implements InternalErrorsInterface
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
    // Errors
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $errors;

    //--------------------------------------------------------------------------------------------------------
    // Message
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $langFile
    // @param string $errorMsg
    // @param mixed  $ex
    //
    //--------------------------------------------------------------------------------------------------------
    public function message(string $langFile, string $errorMsg, $ex = NULL) : string
    {
        return getErrorMessage($langFile, $errorMsg, $ex);
    }

    //--------------------------------------------------------------------------------------------------------
    // Last
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $type
    // @return mixed
    //
    //--------------------------------------------------------------------------------------------------------
    public function last(string $type = NULL)
    {
        return lastError($type);
    }

    //--------------------------------------------------------------------------------------------------------
    // Log
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param int    $type
    // @param string $destination
    // @param string $header
    //
    //--------------------------------------------------------------------------------------------------------
    public function log(string $message, int $type = 0, string $destination = NULL, string $header = NULL) : bool
    {
        return error_log($message, $type, $destination, $header);
    }

    //--------------------------------------------------------------------------------------------------------
    // Report
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int
    //
    //--------------------------------------------------------------------------------------------------------
    public function report(int $level = NULL) : int
    {
        if( ! empty($level) )
        {
            return error_reporting($level);
        }

        return error_reporting();
    }


    //--------------------------------------------------------------------------------------------------------
    // Handler
    //--------------------------------------------------------------------------------------------------------
    //
    // @param callable $handler
    // @param int      $errorTypes
    //
    //--------------------------------------------------------------------------------------------------------
    public function handler($handler, int $errorTypes = E_ALL | E_STRICT)
    {
        if( ! is_callable($handler) )
        {
            return $this->set(lang('Error', 'callableParameter', '1.(handler)'));
        }

        return set_error_handler($handler, $errorTypes);
    }

    //--------------------------------------------------------------------------------------------------------
    // Trigger
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $msg
    // @param int    $errorType
    //
    //--------------------------------------------------------------------------------------------------------
    public function trigger(string $msg, int $errorType = E_USER_NOTICE) : bool
    {
        return trigger_error($msg, $errorType);
    }

    //--------------------------------------------------------------------------------------------------------
    // Restore
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function restore() : bool
    {
        return restore_error_handler();
    }
}
