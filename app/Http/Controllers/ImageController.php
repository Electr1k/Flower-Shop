<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function store(Flower $flower)
    {
        $data = request()->validate([
            'image' => 'string',
        ]);
        $data['flower_id'] = $flower->id;
        Image::create($data);
        return redirect()->route('flower.show', $flower->id);
    }

    public function destroy(Flower $flower, Image $image)
    {
        $flower_id = $image->flower;
        $image->delete();
        return redirect()->route('flower.show', $flower_id);
    }
}
