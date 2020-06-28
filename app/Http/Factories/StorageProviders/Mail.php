<?php namespace App\Http\Factories\StorageProviders;

use App\Http\Factories\StoreDataInterface;

class Mail implements StoreDataInterface {

    static function save()
    {
        return [
            'data' => 'Mail class'
        ];
    }
}
