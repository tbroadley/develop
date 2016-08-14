<?php namespace ZN\Services;

interface EmailInterface
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
    // Settings
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param array $settings
    //
    //--------------------------------------------------------------------------------------------------------
    public function settings(Array $settings = NULL) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Content Type
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $type: plain, html
    //
    //--------------------------------------------------------------------------------------------------------
    public function contentType(String $type = 'plain') : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Charset
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $charset
    //
    //--------------------------------------------------------------------------------------------------------
    public function charset(String $charset = 'UTF-8') : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Priority
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param int $count
    //
    //--------------------------------------------------------------------------------------------------------
    public function priority(Int $count = 3) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Add Header
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $header
    // @param string $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function addHeader(String $header, String $value) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Encoding Type
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function encodingType(String $type = '8bit') : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Multi Part
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $multiPart
    //
    //--------------------------------------------------------------------------------------------------------
    public function multiPart(String $multiPart = 'related') : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // SMTP Host
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $host
    //
    //--------------------------------------------------------------------------------------------------------
    public function smtpHost(String $host) : InternalEmail;

    //--------------------------------------------------------------------------------------------------------
    // SMTP User
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $user
    //
    //--------------------------------------------------------------------------------------------------------
    public function smtpUser(String $user) : InternalEmail;

    //--------------------------------------------------------------------------------------------------------
    // SMTP DNS
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param bool $dsn
    //
    //--------------------------------------------------------------------------------------------------------
    public function smtpDsn(Bool $dsn = true) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // SMTP Password
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $pass
    //
    //--------------------------------------------------------------------------------------------------------
    public function smtpPassword(String $pass) : InternalEmail;

    //--------------------------------------------------------------------------------------------------------
    // SMTP Port
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param int $port
    //
    //--------------------------------------------------------------------------------------------------------
    public function smtpPort(Int $port = 587) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // SMTP Timeout
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param int $timeout
    //
    //--------------------------------------------------------------------------------------------------------
    public function smtpTimeout(Int $timeout = 10) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // SMTP Keep Alive
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param bool $keepAlive
    //
    //--------------------------------------------------------------------------------------------------------
    public function smtpKeepAlive(Bool $keepAlive = true) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // SMTP Encode
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $encode
    //
    //--------------------------------------------------------------------------------------------------------
    public function smtpEncode(String $encode) : InternalEmail;

    //--------------------------------------------------------------------------------------------------------
    // To
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param mixed  $to
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function to($to, String $name) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Receiver
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param mixed  $to
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function receiver($to, String $name) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Reply To
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param mixed  $to
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function replyTo($replyTo, String $name) : InternalEmail;
    
    
    //--------------------------------------------------------------------------------------------------------
    // CC
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param mixed  $to
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function cc($cc, String $name) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // BCC
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param mixed  $to
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function bcc($bcc, String $name) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // From
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $from
    // @param string $name
    // @param string $returnPath
    //
    //--------------------------------------------------------------------------------------------------------
    public function from(String $from, String $name = NULL, String $returnPath = NULL) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Sender
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $from
    // @param string $name
    // @param string $returnPath
    //
    //--------------------------------------------------------------------------------------------------------
    public function sender(String $from, String $name = NULL, String $returnPath = NULL) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Subject
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $subject
    //
    //--------------------------------------------------------------------------------------------------------
    public function subject(String $subject) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Message
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $message
    //
    //--------------------------------------------------------------------------------------------------------
    public function message(String $message) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Content
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $message
    //
    //--------------------------------------------------------------------------------------------------------
    public function content(String $message) : InternalEmail;

    //--------------------------------------------------------------------------------------------------------
    // Attachment
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $file
    // @param string $disposition
    // @param string $newName
    // @param mixed  $mime
    //
    //--------------------------------------------------------------------------------------------------------
    public function attachment(String $file, String $disposition = NULL, String $newName = NULL, $mime = NULL) : InternalEmail;
    
    //--------------------------------------------------------------------------------------------------------
    // Attachment Content ID
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $filename
    //
    //--------------------------------------------------------------------------------------------------------
    public function attachmentContentId(String $filename);
    
    //--------------------------------------------------------------------------------------------------------
    // Send
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $subject
    // @param string $message
    //
    //--------------------------------------------------------------------------------------------------------
    public function send(String $subject = NULL, String $message = NULL) : Bool;

    //--------------------------------------------------------------------------------------------------------
    // Driver                                                                       
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $driver
    // @return object                                    
    //                                                                                           
    //--------------------------------------------------------------------------------------------------------
    public function driver(String $driver) : InternalEmail;
}