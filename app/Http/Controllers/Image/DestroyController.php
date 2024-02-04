<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Flower;
use App\Models\Image;
use App\Models\Tag;

class DestroyController extends Controller
{
    public function __invoke(Flower $flower, Image $image)
    {
        $flower_id = $image->flower;
        $image->delete();
        return redirect()->route('flower.show', $flower_id);
    }
}
