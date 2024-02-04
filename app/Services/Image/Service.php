<?php

namespace App\Services\Image;

use App\Models\Flower;
use App\Models\Image;

class Service
{
    public function store(Flower $flower, $data): void
    {
        $data['flower_id'] = $flower->id;
        Image::create($data);
    }
}
