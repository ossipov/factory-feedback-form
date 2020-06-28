<?php namespace App\Http\Factories;

use Exception;

class StoreDataFactory {
    public static function in($provider) {
        $provider = 'App\\Http\\Factories\\StorageProviders\\'.$provider;

        if(class_exists($provider)) {
            return new $provider;
        }
        else {
            throw new Exception(sprintf("Store factory could not create the object %s", $provider));
        }
    }
}
