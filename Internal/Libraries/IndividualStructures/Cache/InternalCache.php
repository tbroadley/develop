<?php namespace ZN\IndividualStructures;

use Support, CLController, DriverAbility;

class InternalCache extends CLController implements InternalCacheInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    use DriverAbility;

    //--------------------------------------------------------------------------------------------------------
    // Consts
    //--------------------------------------------------------------------------------------------------------
    //
    // @const string
    //
    //--------------------------------------------------------------------------------------------------------
    const config = 'IndividualStructures:cache';
    const driver =
    [
        'options'   => ['file', 'apc', 'memcache', 'redis', 'wincache'],
        'namespace' => 'ZN\IndividualStructures\Cache\Drivers'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Select
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $key
    // @param  mixed $expressed
    // @return mixed
    //
    //--------------------------------------------------------------------------------------------------------
    public function select(string $key, $compressed = false)
    {
        return $this->driver->select($key, $compressed);
    }

    //--------------------------------------------------------------------------------------------------------
    // Insert
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $key
    // @param  variable $var
    // @param  numeric $time
    // @param  mixed $expressed
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function insert(string $key, $var, int $time = 60, $compressed = false) : bool
    {
        return $this->driver->insert($key, $var, $time, $compressed);
    }

    //--------------------------------------------------------------------------------------------------------
    // Delete
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $key
    // @return mixed
    //
    //--------------------------------------------------------------------------------------------------------
    public function delete(string $key) : bool
    {
        return $this->driver->delete($key);
    }

    //--------------------------------------------------------------------------------------------------------
    // Increment
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string  $key
    // @param  numeric $increment
    // @return void
    //
    //--------------------------------------------------------------------------------------------------------
    public function increment(string $key, int $increment = 1) : int
    {
        return $this->driver->increment($key, $increment);
    }

    //--------------------------------------------------------------------------------------------------------
    // Deccrement
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string  $key
    // @param  numeric $decrement
    // @return void
    //
    //--------------------------------------------------------------------------------------------------------
    public function decrement(string $key, int $decrement = 1) : int
    {
        return $this->driver->decrement($key, $decrement);
    }

    //--------------------------------------------------------------------------------------------------------
    // Clean
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  void
    // @return void
    //
    //--------------------------------------------------------------------------------------------------------
    public function clean() : bool
    {
        return $this->driver->clean();
    }

    //--------------------------------------------------------------------------------------------------------
    // Info
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  mixed  $info
    // @return mixed
    //
    //--------------------------------------------------------------------------------------------------------
    public function info($type = NULL) : array
    {
        return $this->driver->info($type);
    }

    //--------------------------------------------------------------------------------------------------------
    // Get Meta Data
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string  $key
    // @return mixed
    //
    //--------------------------------------------------------------------------------------------------------
    public function getMetaData(string $key) : array
    {
        return $this->driver->getMetaData($key);
    }
}
