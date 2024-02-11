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

    public function store($data): void
    {
        $tagsIds = $data['tags'];
        $images = $data['images'];
        unset($data['images']);
        unset($data['tags']);
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
        } catch (\Exception $exception) {
            Db::rollBack();
        }
    }

    public function update(Flower $flower, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $images = $data['images'] ?? [];

        unset($data['images']);
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
        }
        catch ( \Exception $e){
            DB::rollBack();
        }
    }
}
