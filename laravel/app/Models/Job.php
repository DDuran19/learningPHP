<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class Job
{
    public static function all(): Collection
    {

        return new Collection([
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => "Programmer",
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ]);
    }

    public static function findFirst(int $id): ?array
    {
        return static::all()->where('id', $id)->first();
    }
}
