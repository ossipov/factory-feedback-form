<?php namespace App\Http\Factories\StorageProviders;

use App\Http\Factories\StoreDataInterface;

class File implements StoreDataInterface {

    static function save()
    {
        // TODO: Implement save() method.
        return [
            'data' => 'File class'
        ];
    }
}
