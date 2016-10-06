<?php class DebugException
{
    public function __construct(string $file, string $message = NULL, $changed = NULL)
    {
        if( $data = lang($file, $message, $changed) )
        {
            $message = $data;
        }
        else
        {
            $message = $file;
        }

        $debug = Debug::next();

        echo Exceptions::continue($message, $debug->file, $debug->line);
    }
}
