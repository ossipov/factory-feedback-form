<?php namespace App\Http\Factories\StorageProviders;

use App\Http\Factories\StoreDataInterface;

class Database implements StoreDataInterface {

    static function save()
    {
        return [
            'data' => 'Database class'
        ];
    }
}
