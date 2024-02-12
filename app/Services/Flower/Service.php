<?php

namespace App\Services\Flower;

use App\Models\Flower;
use App\Models\FlowerTag;
use App\Models\Image;
use Illuminate\Database\DatabaseTransactionRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function store($data): Flower|null
    {
        $tagsIds = $data['tags'] ?? [];
        $images = $data['images'] ?? [];
        unset($data['images'], $data['tags']);
        try {
            DB::beginTransaction();
            $flower = Flower::firstOrCreate([
                'title' => $data['title']
            ], $data);
            foreach ($images as $image){
                $img = [];
                $img['image'] = url('storage', Storage::disk('public')->put('/images', $image));
                $img['flower_id'] = $flower->id;
                Image::firstOrCreate($img);
            }

            foreach ($tagsIds as $tag){
                FlowerTag::firstOrCreate([
                    'flower_id' => $flower->id,
                    'tag_id' => $tag
                ]);
            }
            Db::commit();
            return $flower;
        } catch (\Exception $exception) {
            Db::rollBack();
        }
        return null;
    }

    public function update(Flower $flower, $data): Flower
    {
        $tags = $data['tags'] ?? [];
        $images = $data['images'] ?? [];
        unset($data['tags'], $data['images']);
        try {
            DB::beginTransaction();
            foreach ($images as $image) {
                $img = [];
                $img['image'] = url('storage', Storage::disk('public')->put('/images', $image));
                $img['flower_id'] = $flower->id;
                Image::firstOrCreate($img);
            }
            $flower->update($data);
            $flower->tags()->sync($tags);
            DB::commit();
            return $flower;
        }
        catch ( \Exception $e){
            DB::rollBack();
        }
        return $flower;
    }
}
