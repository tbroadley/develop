<?php namespace ZN\EncodingSupport;

interface InternalMBInterface
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
    // Split
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    // @param string $pattern
    // @param int    $limit
    //
    //--------------------------------------------------------------------------------------------------------
    public function split(string $string, string $pattern, int $limit = -1) : array;

    //--------------------------------------------------------------------------------------------------------
    // Split
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    // @param string $needle
    // @param string $type
    // @param bool   $case
    //
    //--------------------------------------------------------------------------------------------------------
    public function search(string $str, string $needle, string $type = 'str', bool $case = true) : string;

    //--------------------------------------------------------------------------------------------------------
    // Section
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    // @param int    $starting
    // @param int    $count
    // @param string $encoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function section(string $str, int $starting = 0, int $count = NULL, string $encoding = 'UTF-8') : string;

    //--------------------------------------------------------------------------------------------------------
    // Parse Get
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //
    //--------------------------------------------------------------------------------------------------------
    public function parseGet(string $string) : array;

    //--------------------------------------------------------------------------------------------------------
    // Check Encoding
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    // @param string $encoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function checkEncoding(string $string = NULL, string $encoding = 'UTF-8') : bool;

    //--------------------------------------------------------------------------------------------------------
    // Casing
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    // @param string $flag
    // @param string $encoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function casing(string $string, string $flag = 'upper', string $encoding = 'UTF-8') : string;

    //--------------------------------------------------------------------------------------------------------
    // Convert Encoding
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    // @param string $toEnoding
    // @param string $fromEncoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function convertEncoding(string $string, string $toEncoding = 'UTF-8', string $fromEncoding = 'ASCII, UTF-8') : string;

    //--------------------------------------------------------------------------------------------------------
    // Mime Decode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //
    //--------------------------------------------------------------------------------------------------------
    public function mimeDecode(string $string) : string;

    //--------------------------------------------------------------------------------------------------------
    // Mime Encode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    // @param string $encoding
    // @param string $transferEncoding
    // @param string $crlf
    // @param int    $indent
    //
    //--------------------------------------------------------------------------------------------------------
    public function mimeEncode(string $string, string $encoding = 'UTF-8', string $transferEncoding = 'B', string $crlf = "\r\n", int $indent = 0) : string;

    //--------------------------------------------------------------------------------------------------------
    // Html To Numeric
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    // @param array  $convertMap
    // @param string $encoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function htmlToNumeric(string $string, array $convertMap = NULL, string $encoding = 'UTF-8') : string;

    //--------------------------------------------------------------------------------------------------------
    // Numeric To Html
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    // @param array  $convertMap
    // @param string $encoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function numericToHtml(string $string, array $convertMap = NULL, string $encoding = 'UTF-8') : string;

    //--------------------------------------------------------------------------------------------------------
    // Detect Encoding
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    // @param mixed  $encodingList
    // @param bool   $strict
    //
    //--------------------------------------------------------------------------------------------------------
    public function detectEncoding(string $string, $encodingList = ['ASCII', 'UTF-8'], bool $strict = false) : string;

    //--------------------------------------------------------------------------------------------------------
    // Detect Order
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  mixed  $encodingList
    // @return mixed
    //
    //--------------------------------------------------------------------------------------------------------
    public function detectOrder($encodingList);

    //--------------------------------------------------------------------------------------------------------
    // Encoding Aliases
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  mixed  $encodingList
    //
    //--------------------------------------------------------------------------------------------------------
    public function encodingAliases(string $string) : array;

    //--------------------------------------------------------------------------------------------------------
    // Info
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $string
    //
    //--------------------------------------------------------------------------------------------------------
    public function info(string $string = 'all');

    //--------------------------------------------------------------------------------------------------------
    // Http Input
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function httpInput(string $type = 'I');

    //--------------------------------------------------------------------------------------------------------
    // Http Output
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $encoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function httpOutput(string $encoding = 'UTF-8');

    //--------------------------------------------------------------------------------------------------------
    // Lang
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $lang
    //
    //--------------------------------------------------------------------------------------------------------
    public function lang(string $lang = 'neutral');

    //--------------------------------------------------------------------------------------------------------
    // Encodings
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function encodings() : array;

    //--------------------------------------------------------------------------------------------------------
    // Output Handler
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $contents
    // @param int    $status
    //
    //--------------------------------------------------------------------------------------------------------
    public function outputHandler(string $contents, int $status = 0) : string;

    //--------------------------------------------------------------------------------------------------------
    // Preferred Mime Name
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $encoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function preferredMimeName(string $encoding = 'UTF-8') : string;
}
