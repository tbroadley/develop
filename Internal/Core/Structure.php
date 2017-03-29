<?php namespace ZN\Core;

use Errors, Restoration;

class Structure
{
    //--------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------
    // DATAS
    //--------------------------------------------------------------------------------------------------
    //
    // Genel Kullanım: Çalıştırılmak istenen yapının ihtiyaç duyduğu verileri döndürür.
    //
    //--------------------------------------------------------------------------------------------------
    public static function data($requestUri = NULL)
    {
        //----------------------------------------------------------------------------------------------
        // Namespace
        //----------------------------------------------------------------------------------------------
        //
        // @var string
        //
        //----------------------------------------------------------------------------------------------
        $namespace      = PROJECT_CONTROLLER_NAMESPACE;

        //----------------------------------------------------------------------------------------------
        // Page
        //----------------------------------------------------------------------------------------------
        //
        // @var string
        //
        //----------------------------------------------------------------------------------------------
        $page           = '';

        //----------------------------------------------------------------------------------------------
        // Open Function
        //----------------------------------------------------------------------------------------------
        //
        // @var string
        //
        //----------------------------------------------------------------------------------------------
        $openFunction   = Config::get('Services', 'route')['openFunction'];

        //----------------------------------------------------------------------------------------------
        // Function
        //----------------------------------------------------------------------------------------------
        //
        // @var string
        //
        //----------------------------------------------------------------------------------------------
        $function       = $openFunction
                        ? $openFunction
                        : 'main';

        //----------------------------------------------------------------------------------------------
        // Parameters
        //----------------------------------------------------------------------------------------------
        //
        // @var array
        //
        //----------------------------------------------------------------------------------------------
        $parameters     = [];

        //----------------------------------------------------------------------------------------------
        // Segments
        //----------------------------------------------------------------------------------------------
        //
        // @var string
        //
        //----------------------------------------------------------------------------------------------
        $segments       = '';

        //----------------------------------------------------------------------------------------------
        // Is File
        //----------------------------------------------------------------------------------------------
        //
        // @var string
        //
        //----------------------------------------------------------------------------------------------
        $isFile         = '';

        //----------------------------------------------------------------------------------------------
        // Request Uri
        //----------------------------------------------------------------------------------------------
        //
        // @var string
        //
        //----------------------------------------------------------------------------------------------
        if( $requestUri === NULL )
        {
            $requestUri = internalRequestURI();
        }

        //----------------------------------------------------------------------------------------------
        //  $_GET kontrolü yapılarak temel URL bilgisi elde ediliyor.
        //----------------------------------------------------------------------------------------------
        $url            = explode('?', $requestUri);

        //----------------------------------------------------------------------------------------------
        //  Temel URL adresi / karakteri ile bölümlere ayrılıyor.
        //----------------------------------------------------------------------------------------------
        $segments       = explode('/', $url[0]);

        //----------------------------------------------------------------------------------------------
        //  Controller/Sayfa: Controller/ dizini içinde çalıştırılacak dosya adı.
        //----------------------------------------------------------------------------------------------
        if( isset($segments[0]) )
        {
            $page   = $segments[0];
            $isFile = CONTROLLERS_DIR.suffix($page, '.php');

            if( ! is_file($isFile) )
            {
                $if        = '';
                $nsegments = $segments;

                for( $i = 0; $i < count($segments); $i++ )
                {
                    $if    .= $segments[$i].'/';
                    $ifTrim = rtrim($if, '/');
                    $isF    = CONTROLLERS_DIR.suffix($ifTrim , '.php');

                    if( is_file($isF) )
                    {
                        $page     = divide($ifTrim, '/', -1);
                        $isFile   = $isF;
                        $segments = $nsegments;

                        break;
                    }

                    array_shift($nsegments);
                }
            }

            unset($segments[0]);

            $pageControl = strtolower($page);

            if( $pageControl === $openFunction)
            {
                report('Error', lang('Error', 'controllerNameError', $pageControl), 'ControllerNameError');

                die(Errors::message('Error', 'controllerNameError', $pageControl));
            }
        }

        //----------------------------------------------------------------------------------------------
        //  Restore Modu
        //----------------------------------------------------------------------------------------------
        if( PROJECT_MODE === 'restoration' )
        {
            Restoration::mode();
        }

        //----------------------------------------------------------------------------------------------
        //  Fonksiyon: Çalıştırılacak dosyaya ait yöntem adı.
        //----------------------------------------------------------------------------------------------
        if( isset($segments[1]) )
        {
            $function = $segments[1];

            unset($segments[1]);
        }

        //----------------------------------------------------------------------------------------------
        //  Parametreler: Çalıştırılacak yönteme gönderilecek parametreler.
        //----------------------------------------------------------------------------------------------
        if( isset($segments[2]) )
        {
            $parameters = $segments;
        }

        //----------------------------------------------------------------------------------------------
        // Return Array
        //----------------------------------------------------------------------------------------------
        //
        // @key array  $parameters
        // @key string $page
        // @key string $file
        // @key string $function
        // @key string $openFunction
        //
        //----------------------------------------------------------------------------------------------
        return
        [
            'parameters'   => $parameters,
            'page'         => $page,
            'file'         => str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $isFile),
            'function'     => $function,
            'namespace'    => $namespace,
            'openFunction' => $openFunction
        ];
    }
}
