<?php namespace ZN\IndividualStructures;

use CLController, InformationAbility, Encode, DB, Session, Cookie, Method, Import, Email, URI;

class InternalUser extends CLController implements InternalUserInterface, InternalUserPropertiesInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    const config = 'IndividualStructures:user';

    //--------------------------------------------------------------------------------------------------------
    // Information Ability
    //--------------------------------------------------------------------------------------------------------
    //
    // Information Ability Methods
    //
    //--------------------------------------------------------------------------------------------------------
    use InformationAbility;

    //--------------------------------------------------------------------------------------------------------
    // User Properties
    //--------------------------------------------------------------------------------------------------------
    //
    // User Properties
    //
    //--------------------------------------------------------------------------------------------------------
    use InternalUserPropertiesTrait;

    //--------------------------------------------------------------------------------------------------------
    // Username
    //--------------------------------------------------------------------------------------------------------
    //
    // @var  string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $username;

    //--------------------------------------------------------------------------------------------------------
    // Password
    //--------------------------------------------------------------------------------------------------------
    //
    // @var  string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $password;

    //--------------------------------------------------------------------------------------------------------
    // Parameters
    //--------------------------------------------------------------------------------------------------------
    //
    // @var  array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $parameters;

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
    public function register(Array $data = NULL, $autoLogin = false, String $activationReturnLink = NULL) : Bool
    {
        $data                 = $this->parameters['column']     ?? $data;
        $autoLogin            = $this->parameters['autoLogin']  ?? $autoLogin;
        $activationReturnLink = $this->parameters['returnLink'] ?? $activationReturnLink;
        $this->parameters     = [];

        // ------------------------------------------------------------------------------
        // Settings
        // ------------------------------------------------------------------------------
        $getColumns         = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns'];
        $getJoining         = INDIVIDUALSTRUCTURES_USER_CONFIG['joining'];
        $tableName          = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];
        $joinTables         = $getJoining['tables'];
        $joinColumn         = $getJoining['column'];
        $usernameColumn     = $getColumns['username'];
        $passwordColumn     = $getColumns['password'];
        $emailColumn        = $getColumns['email'];
        $activeColumn       = $getColumns['active'];
        $activationColumn   = $getColumns['activation'];
        // ------------------------------------------------------------------------------

        if( ! empty($joinTables) )
        {
            $joinData = $data;
            $data     = isset($data[$tableName])
                      ? $data[$tableName]
                      : [$tableName];
        }

        if( ! isset($data[$usernameColumn]) ||  ! isset($data[$passwordColumn]) )
        {
            return ! $this->error = lang('IndividualStructures', 'user:registerUsernameError');
        }

        $loginUsername   = $data[$usernameColumn];
        $loginPassword   = $data[$passwordColumn];
        $encodeType      = INDIVIDUALSTRUCTURES_USER_CONFIG['encode'];
        $encodePassword  = ! empty($encodeType) ? Encode::type($loginPassword, $encodeType) : $loginPassword;

        $usernameControl = DB::where($usernameColumn, $loginUsername)
                             ->get($tableName)
                             ->totalRows();

        // Daha önce böyle bir kullanıcı
        // yoksa kullanıcı kaydetme işlemini başlat.
        if( empty($usernameControl) )
        {
            $data[$passwordColumn] = $encodePassword;

            if( ! DB::insert($tableName , $data) )
            {
                return ! $this->error = lang('IndividualStructures', 'user:registerUnknownError');
            }

            if( ! empty($joinTables) )
            {
                $joinCol = DB::where($usernameColumn, $loginUsername)->get($tableName)->row()->$joinColumn;

                foreach( $joinTables as $table => $joinColumn )
                {
                    $joinData[$table][$joinTables[$table]] = $joinCol;

                    DB::insert($table, $joinData[$table]);
                }
            }

            $this->success = lang('IndividualStructures', 'user:registerSuccess');

            if( ! empty($activationColumn) )
            {
                if( ! isEmail($loginUsername) )
                {
                    $email = $data[$emailColumn];
                }
                else
                {
                    $email = NULL;
                }

                $this->_activation($loginUsername, $encodePassword, $activationReturnLink, $email);
            }
            else
            {
                if( $autoLogin === true )
                {
                    $this->login($loginUsername, $loginPassword);
                }
                elseif( is_string($autoLogin) )
                {
                    redirect($autoLogin);
                }
            }

            return true;
        }
        else
        {
            return ! $this->error = lang('IndividualStructures', 'user:registerError');
        }
    }

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
    public function update(String $old = NULL, String $new = NULL, String $newAgain = NULL, Array $data = []) : Bool
    {
        if( $this->isLogin() )
        {
            $old      = $this->parameters['oldPassword']   ?? $old;
            $new      = $this->parameters['newPassword']   ?? $new;
            $newAgain = $this->parameters['passwordAgain'] ?? $newAgain;
            $data     = $this->parameters['column']        ?? $data;

            $this->parameters = [];

            if( empty($newAgain) )
            {
                $newAgain = $new;
            }

            $getColumns = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns'];
            $getJoining = INDIVIDUALSTRUCTURES_USER_CONFIG['joining'];
            $joinTables = $getJoining['tables'];
            $jc         = $getJoining['column'];
            $pc         = $getColumns['password'];
            $uc         = $getColumns['username'];
            $tn         = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];
            $encodeType = INDIVIDUALSTRUCTURES_USER_CONFIG['encode'];

            $oldPassword      = ! empty($encodeType) ? Encode::type($old, $encodeType)      : $old;
            $newPassword      = ! empty($encodeType) ? Encode::type($new, $encodeType)      : $new;
            $newPasswordAgain = ! empty($encodeType) ? Encode::type($newAgain, $encodeType) : $newAgain;

            if( ! empty($joinTables) )
            {
                $joinData = $data;
                $data     = $data[$tn] ?? [$tn];
            }

            $username = $this->data($tn)->$uc;
            $password = $this->data($tn)->$pc;

            if( $oldPassword != $password )
            {
                return ! $this->error = lang('IndividualStructures', 'user:oldPasswordError');
            }
            elseif( $newPassword != $newPasswordAgain )
            {
                return ! $this->error = lang('IndividualStructures', 'user:passwordNotMatchError');
            }
            else
            {
                $data[$pc] = $newPassword;
                $data[$uc] = $username;

                if( ! empty($joinTables) )
                {
                    $joinCol = DB::where($uc, $username)->get($tn)->row()->$jc;

                    foreach( $joinTables as $table => $joinColumn )
                    {
                        if( isset($joinData[$table]) )
                        {
                            DB::where($joinColumn, $joinCol)->update($table, $joinData[$table]);
                        }
                    }
                }
                else
                {
                    if( ! DB::where($uc, $username)->update($tn, $data) )
                    {
                        return ! $this->error = lang('IndividualStructures', 'user:registerUnknownError');
                    }
                }

                return $this->success = lang('IndividualStructures', 'user:updateProcessSuccess');
            }
        }
        else
        {
            return false;
        }
    }

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
    public function login(String $un = NULL, String $pw = NULL, $rememberMe = false) : Bool
    {
        $un         = $this->parameters['username'] ?? $un;
        $pw         = $this->parameters['password'] ?? $pw;
        $rememberMe = $this->parameters['remember'] ?? $rememberMe;

        $this->parameters = [];

        if( ! is_scalar($rememberMe) )
        {
            $rememberMe = false;
        }

        $username   = $un;
        $encodeType = INDIVIDUALSTRUCTURES_USER_CONFIG['encode'];

        $password   = ! empty($encodeType) ? Encode::type($pw, $encodeType) : $pw;

        // ------------------------------------------------------------------------------
        // Settings
        // ------------------------------------------------------------------------------
        $tableName          = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];
        $getColumns         = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns'];
        $passwordColumn     = $getColumns['password'];
        $usernameColumn     = $getColumns['username'];
        $emailColumn        = $getColumns['email'];
        $bannedColumn       = $getColumns['banned'];
        $activeColumn       = $getColumns['active'];
        $activationColumn   = $getColumns['activation'];
        // ------------------------------------------------------------------------------

        $r = DB::where($usernameColumn, $username)
               ->get($tableName)
               ->row();

        if( ! isset($r->$passwordColumn) )
        {
            return ! $this->error = lang('IndividualStructures', 'user:loginError');
        }

        $passwordControl   = $r->$passwordColumn;
        $bannedControl     = '';
        $activationControl = '';

        if( ! empty($bannedColumn) )
        {
            $banned = $bannedColumn ;
            $bannedControl = $r->$banned ;
        }

        if( ! empty($activationColumn) )
        {
            $activationControl = $r->$activationColumn ;
        }

        if( ! empty($r->$usernameColumn) && $passwordControl == $password )
        {
            if( ! empty($bannedColumn) && ! empty($bannedControl) )
            {
                return ! $this->error = lang('IndividualStructures', 'user:bannedError');
            }

            if( ! empty($activationColumn) && empty($activationControl) )
            {
                return ! $this->error = lang('IndividualStructures', 'user:activationError');
            }

            Session::insert($usernameColumn, $username);
            Session::insert($passwordColumn, $password);

            if( Method::post($rememberMe) || ! empty($rememberMe) )
            {
                if( Cookie::select($usernameColumn) != $username )
                {
                    Cookie::insert($usernameColumn, $username);
                    Cookie::insert($passwordColumn, $password);
                }
            }

            if( ! empty($activeColumn) )
            {
                DB::where($usernameColumn, $username)->update($tableName, [$activeColumn  => 1]);
            }

            return $this->success = lang('IndividualStructures', 'user:loginSuccess');
        }
        else
        {
            return ! $this->error = lang('IndividualStructures', 'user:loginError');
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Logout
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string  $redirectUrl
    // @param  numeric $time
    // @return void
    //
    //--------------------------------------------------------------------------------------------------------
    public function logout(String $redirectUrl = NULL, Int $time = 0)
    {
        $getColumns = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns'];
        $tableName  = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];
        $username   = $getColumns['username'];
        $password   = $getColumns['password'];
        $active     = $getColumns['active'];

        if( isset($this->data($tableName)->$username) )
        {
            if( $active )
            {
                DB::where($username, $this->data($tableName)->$username)
                  ->update($tableName, [$active => 0]);
            }

            Cookie::delete($username);
            Cookie::delete($password );
            Session::delete($username);

            redirect($redirectUrl, $time);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Is Login
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  void
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function isLogin() : Bool
    {
        $getColumns = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns'];
        $tableName  = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];
        $username   = $getColumns['username'];
        $password   = $getColumns['password'];

        $cUsername  = Cookie::select($username);
        $cPassword  = Cookie::select($password);

        $result     = NULL;

        if( ! empty($cUsername) && ! empty($cPassword) )
        {
            $result = DB::where($username, $cUsername, 'and')
                        ->where($password, $cPassword)
                        ->get($tableName)
                        ->totalRows();
        }

        if( isset($this->data($tableName)->$username) )
        {
            $isLogin = true;
        }
        elseif( ! empty($result) )
        {
            Session::insert($username, $cUsername);

            $isLogin = true;
        }
        else
        {
            $isLogin = false;
        }

        return $isLogin;
    }

    //--------------------------------------------------------------------------------------------------------
    // Forgot Password
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $email
    // @param  string $returnLinkPath
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function forgotPassword(String $email = NULL, String $returnLinkPath = NULL) : Bool
    {
        $email            = $this->parameters['email']      ?? $email;
        $returnLinkPath   = $this->parameters['returnLink'] ?? $returnLinkPath;
        $this->parameters = [];

        // ------------------------------------------------------------------------------
        // Settings
        // ------------------------------------------------------------------------------
        $tableName      = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];
        $senderInfo     = INDIVIDUALSTRUCTURES_USER_CONFIG['emailSenderInfo'];
        $getColumns     = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns'];
        $usernameColumn = $getColumns['username'];
        $passwordColumn = $getColumns['password'];
        $emailColumn    = $getColumns['email'];
        // ------------------------------------------------------------------------------

        if( ! empty($emailColumn) )
        {
            DB::where($emailColumn, $email);
        }
        else
        {
            DB::where($usernameColumn, $email);
        }

        $row = DB::get($tableName)->row();

        if( isset($row->$usernameColumn) )
        {
            if( ! isUrl($returnLinkPath) )
            {
                $returnLinkPath = siteUrl($returnLinkPath);
            }

            $encodeType     = INDIVIDUALSTRUCTURES_USER_CONFIG['encode'];
            $newPassword    = Encode::create(10);
            $encodePassword = ! empty($encodeType) ? Encode::type($newPassword, $encodeType) : $newPassword;

            $templateData = array
            (
                'usernameColumn' => $row->$usernameColumn,
                'newPassword'    => $newPassword,
                'returnLinkPath' => $returnLinkPath
            );

            $message = Import::template('UserEmail/ForgotPassword', $templateData, true);

            Email::sender($senderInfo['mail'], $senderInfo['name'])
                 ->receiver($email, $email)
                 ->subject(lang('IndividualStructures', 'user:newYourPassword'))
                 ->content($message);

            if( Email::send() )
            {
                if( ! empty($emailColumn) )
                {
                    DB::where($emailColumn, $email);
                }
                else
                {
                    DB::where($usernameColumn, $email);
                }

                if( DB::update($tableName, [$passwordColumn => $encodePassword]) )
                {
                    return $this->success = lang('IndividualStructures', 'user:forgotPasswordSuccess');
                }

                return ! $this->error = lang('Database', 'updateError');
            }
            else
            {
                return ! $this->error = lang('IndividualStructures', 'user:emailError');
            }
        }
        else
        {
            return ! $this->error = lang('IndividualStructures', 'user:forgotPasswordError');
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Activation Complete
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  void
    //
    //--------------------------------------------------------------------------------------------------------
    public function activationComplete() : Bool
    {
        // ------------------------------------------------------------------------------
        // Settings
        // ------------------------------------------------------------------------------
        $getColumns         = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns'];
        $tableName          = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];
        $usernameColumn     = $getColumns['username'];
        $passwordColumn     = $getColumns['password'];
        $activationColumn   = $getColumns['activation'];
        // ------------------------------------------------------------------------------

        // Aktivasyon dönüş linkinde yer alan segmentler -------------------------------
        $user = URI::get('user');
        $pass = URI::get('pass');
        // ------------------------------------------------------------------------------

        if( ! empty($user) && ! empty($pass) )
        {
            $row = DB::where($usernameColumn, $user, 'and')
                     ->where($passwordColumn, $pass)
                     ->get($tableName)
                     ->row();

            if( ! empty($row) )
            {
                DB::where($usernameColumn, $user)
                  ->update($tableName, [$activationColumn => '1']);

                return $this->success = lang('IndividualStructures', 'user:activationComplete');
            }
            else
            {
                return ! $this->error = lang('IndividualStructures', 'user:activationCompleteError');
            }
        }
        else
        {
            return ! $this->error = lang('IndividualStructures', 'user:activationCompleteError');
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Activation
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $user
    // @param  string $pass
    // @param  string $activationReturnLink
    // @param  string $email
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _activation($user, $pass, $activationReturnLink, $email)
    {
        $url = suffix($activationReturnLink);

        if( ! isUrl($url) )
        {
            $url = siteUrl($url);
        }

        $senderInfo = INDIVIDUALSTRUCTURES_USER_CONFIG['emailSenderInfo'];

        $templateData =
        [
            'url'  => $url,
            'user' => $user,
            'pass' => $pass
        ];

        $message = Import::template('UserEmail/Activation', $templateData, true);

        $user = $email ?? $user;

        Email::sender($senderInfo['mail'], $senderInfo['name'])
             ->receiver($user, $user)
             ->subject(lang('IndividualStructures', 'user:activationProcess'))
             ->content($message);

        if( Email::send() )
        {
            return $this->success = lang('IndividualStructures', 'user:activationEmail');
        }
        else
        {
            return ! $this->error = lang('IndividualStructures', 'user:emailError');
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Data
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $tbl
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function data(String $tbl = NULL)
    {
        $usernameColumn = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns']['username'];
        $passwordColumn = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns']['password'];

        if( $sessionUserName = Session::select($usernameColumn) )
        {
            $joinTables      = INDIVIDUALSTRUCTURES_USER_CONFIG['joining']['tables'];
            $usernameColumn  = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns']['username'];
            $joinColumn      = INDIVIDUALSTRUCTURES_USER_CONFIG['joining']['column'];
            $tableName       = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];

            $this->username  = $sessionUserName;
            $sessionPassword = Session::select($passwordColumn);

            $r[$tbl] = DB::where($usernameColumn, $this->username, 'and')
                         ->where($passwordColumn, $sessionPassword)
                         ->get($tableName)
                         ->row();

            if( ! empty($joinTables) )
            {
                $joinCol = DB::where($usernameColumn, $this->username, 'and')
                             ->where($passwordColumn, $sessionPassword)
                             ->get($tableName)
                             ->row()
                             ->$joinColumn;

                foreach( $joinTables as $table => $joinColumn )
                {
                    $r[$table] = DB::where($joinColumn, $joinCol)
                                   ->get($table)
                                   ->row();
                }
            }

            if( empty($joinTables) )
            {
                return (object) $r[$tbl];
            }
            else
            {
                if( ! empty($tbl) )
                {
                    return (object) $r[$tbl];
                }
                else
                {
                    return (object) $r;
                }
            }
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Active Count
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  void
    // @return numeric
    //
    //--------------------------------------------------------------------------------------------------------
    public function activeCount() : Int
    {
        $activeColumn = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns']['active'];
        $tableName    = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];

        if( ! empty($activeColumn) )
        {
            $totalRows = DB::where($activeColumn, 1)
                           ->get($tableName)
                           ->totalRows();

            if( ! empty($totalRows) )
            {
                return $totalRows;
            }
            else
            {
                return 0;
            }
        }

        return 0;
    }

    //--------------------------------------------------------------------------------------------------------
    // Banned Count
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  void
    // @return numeric
    //
    //--------------------------------------------------------------------------------------------------------
    public function bannedCount() : Int
    {
        $bannedColumn = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns']['banned'];
        $tableName    = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];

        if( ! empty($bannedColumn) )
        {
            $totalRows = DB::where($bannedColumn, 1)
                           ->get($tableName)
                           ->totalRows();

            if( ! empty($totalRows) )
            {
                return $totalRows;
            }
            else
            {
                return 0;
            }
        }

        return 0;
    }

    //--------------------------------------------------------------------------------------------------------
    // Count
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  void
    // @return numeric
    //
    //--------------------------------------------------------------------------------------------------------
    public function count() : Int
    {
        $tableName = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];

        $totalRows = DB::get($tableName)->totalRows();

        if( ! empty($totalRows) )
        {
            return $totalRows;
        }
        else
        {
            return 0;
        }
    }
}