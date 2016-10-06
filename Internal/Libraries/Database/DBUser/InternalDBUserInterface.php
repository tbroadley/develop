<?php namespace ZN\Database;

interface InternalDBUserInterface
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
    // name()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name: USER()
    //
    //--------------------------------------------------------------------------------------------------------
    public function name(string $name) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // host()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $host: localhost
    //
    //--------------------------------------------------------------------------------------------------------
    public function host(string $host) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // password()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $authString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function password(string $authString) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // identifiedBy()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $authString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function identifiedBy(string $authString) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // identifiedByPassword()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $hashString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function identifiedByPassword(string $hashString) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // identifiedWith()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $authPlugin: empty
    // @param string $type      : empty
    // @param string $authString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function identifiedWith(string $authPlugin, string $type, string $authString) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // identifiedWithBy()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $authPlugin: empty
    // @param string $authString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function identifiedWithBy(string $authPlugin, string $authString) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // identifiedWithAs()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $hashPlugin: empty
    // @param string $hashString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function identifiedWithAs(string $hashPlugin, string $hashString) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // required()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function required() : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // with()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function with() : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // option()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function option(string $name, string $value) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // encode()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $type     : SSL, X509, CIPHER value, ISSUER value, SUBJECT value
    // @param string $string   : empty value
    // @param string $condition: and, or
    //
    //--------------------------------------------------------------------------------------------------------
    public function encode(string $type, string $string, string $condition) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // resource()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $resource: query       => MAX_QUERIES_PER_HOUR
    //                          update      => 'MAX_UPDATES_PER_HOUR
    //                          connection  => 'MAX_CONNECTIONS_PER_HOUR
    //                          user        => 'MAX_USER_CONNECTIONS
    // @param string $count   : 0
    //
    //--------------------------------------------------------------------------------------------------------
    public function resource(string $resource, $count) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // passwordExpire()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $type: empty, DEFAULT, NEVER, INTERVAL
    // @param numeric $n   : 0
    //
    //--------------------------------------------------------------------------------------------------------
    public function passwordExpire(string $type, $n) : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // lock()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $type: lock, unlock
    //
    //--------------------------------------------------------------------------------------------------------
    public function lock(string $type = 'lock') : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // unlock()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $type: unlock, lock
    //
    //--------------------------------------------------------------------------------------------------------
    public function unlock(string $type = 'unlock') : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // type()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $type: TABLE, FUNCTION, PROCEDURE
    //
    //--------------------------------------------------------------------------------------------------------
    public function type(string $type = 'TABLE') : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // select()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $select: *.*
    //
    //--------------------------------------------------------------------------------------------------------
    public function select(string $select = '*.*') : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // grantOption()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void()
    //
    //--------------------------------------------------------------------------------------------------------
    public function grantOption() : InternalDBUser;

    //--------------------------------------------------------------------------------------------------------
    // alter()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $name: USER()
    //
    //--------------------------------------------------------------------------------------------------------
    public function alter(string $name) : bool;

    //--------------------------------------------------------------------------------------------------------
    // create()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name: USER()
    //
    //--------------------------------------------------------------------------------------------------------
    public function create(string $name) : bool;

    //--------------------------------------------------------------------------------------------------------
    // drop()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $name: USER()
    //
    //--------------------------------------------------------------------------------------------------------
    public function drop(string $name) : bool;

    //--------------------------------------------------------------------------------------------------------
    // grant()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $name  : ALL
    // @param string  $type  : *.*
    // @param string  $select: *.*
    //
    //--------------------------------------------------------------------------------------------------------
    public function grant(string $name = 'ALL', string $type = NULL, string $select = '*.*') : bool;

    //--------------------------------------------------------------------------------------------------------
    // revoke()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $name  : ALL
    // @param string  $type  : *.*
    // @param string  $select: *.*
    //
    //--------------------------------------------------------------------------------------------------------
    public function revoke(string $name = 'ALL', string $type = NULL, string $select = '*.*') : bool;

    //--------------------------------------------------------------------------------------------------------
    // rename()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $oldName: empty
    // @param string  $newName: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function rename(string $oldName, string $newName) : bool;

    //--------------------------------------------------------------------------------------------------------
    // setPassword()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $user: empty
    // @param string  $pass: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function setPassword(string $user, string $pass) : bool;
}
