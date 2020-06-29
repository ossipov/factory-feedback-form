<?php namespace App\Http\Factories\StorageProviders;

use App\Http\Factories\StoreDataInterface;
use Illuminate\Support\Facades\Storage;

class File implements StoreDataInterface {

    static function save($data)
    {
        try {
            Storage::append('feedback.csv',
                'Date: ' . date("Y-m-d h:i:sa") . PHP_EOL
                . 'Name: ' . $data['name'] . PHP_EOL
                . 'E-Mail: ' . $data['email'] . PHP_EOL
                . 'Feedback: ' . PHP_EOL . $data['feedback']
                . PHP_EOL . PHP_EOL
                . '----------------------------------------------------------------'
                . PHP_EOL
            );
        } catch (\Exception $e) {
            return $e;
        }

        return [ 'data' => 'submitted' ];
    }
}
