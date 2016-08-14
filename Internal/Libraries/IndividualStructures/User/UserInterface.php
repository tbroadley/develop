<?php namespace ZN\IndividualStructures;

interface UserInterface
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
    // Register
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  array       $data
    // @param  bool/string $autoLogin
    // @param  string      $activationReturnLink
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function register(Array $data, $autoLogin = false, String $activationReturnLink = NULL) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Update
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $old
    // @param  string $new
    // @param  string $newAgain
    // @param  array  $data
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function update(String $old, String $new, String $newAgain = NULL, Array $data = []) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Login
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $un
    // @param  string $pw
    // @param  bool   $rememberMe
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function login(String $un, String $pw, $rememberMe = false) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Logout
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string  $redirectUrl
    // @param  numeric $time
    // @return void
    //
    //--------------------------------------------------------------------------------------------------------
        public function logout(String $redirectUrl = NULL, Int $time = 0);
    
    //--------------------------------------------------------------------------------------------------------
    // Is Login
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  void
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function isLogin() : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Forgot Password
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $email
    // @param  string $returnLinkPath
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function forgotPassword(String $email = NULL, String $returnLinkPath = NULL) : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Activation Complete
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  void
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function activationComplete() : Bool;
    
    //--------------------------------------------------------------------------------------------------------
    // Data
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $tbl
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function data(String $tbl = NULL);
    
    //--------------------------------------------------------------------------------------------------------
    // Active Count
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  void
    // @return numeric
    //
    //--------------------------------------------------------------------------------------------------------
    public function activeCount() : Int;
    
    //--------------------------------------------------------------------------------------------------------
    // Banned Count
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  void
    // @return numeric
    //
    //--------------------------------------------------------------------------------------------------------
    public function bannedCount() : Int;
    
    //--------------------------------------------------------------------------------------------------------
    // Count
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  void
    // @return numeric
    //
    //--------------------------------------------------------------------------------------------------------
    public function count() : Int;
}