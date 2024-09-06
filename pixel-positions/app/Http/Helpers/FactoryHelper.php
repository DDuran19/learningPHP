<?php

namespace App\Http\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FactoryHelper
{
    /**
     * Get a random ID or create a new instance of the given model.
     *
     * @param  string  $modelClass
     * @return int
     */
    public static function getRandomIdOrCreate(string $modelClass): int
    {
        $model = new $modelClass;

        $all = $model::all();
        
        if ($model::count() > 0) {
            return $all->random()->id;
        }
            
        return $model::factory()->create()->id;
    }
}
