<?php

namespace App\Services\Flower;

use App\Models\Flower;

class Service
{

    public function store($data): void
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $flower = Flower::create($data);
        $flower->tags()->attach($tags);
    }

    public function update(Flower $flower, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $flower->update($data);
        $flower->tags()->sync($tags);
    }
}
