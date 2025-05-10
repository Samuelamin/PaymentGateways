<?php

namespace App\Singleton;

use Exception;
use Illuminate\Support\Facades\Log;

class SingletonLogger
{
    private static $instance = null;

    // Prevent the instance from being created using the 'new' operator from outside of this class
    private function __construct()
    {

    }

    // Prevent the instance from being dublicated
    private function __clone()
    {
        throw new  Exception("Cannot clone instance of SingletonLogger");
    }

    private function __wakeup()
    {
        throw new  Exception("Cannot unserialize instance of SingletonLogger");
    }

    static function get_instance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    function dump_log($message)  {
        $object_id = spl_object_id($this);
        Log::info("Singleton Logger: {$object_id} - {$message}");
    }
}
