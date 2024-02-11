<?php

namespace App\Http\Controllers\Web\Admin\Image;

use App\Http\Controllers\Controller;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class DestroyController extends Controller
{
   public function __invoke(Image $image)
   {
//       (str_replace('http://127.0.0.1:8000/storage/images%2F', '', $image->image));
       Storage::delete(parse_url($image->image, PHP_URL_PATH));
       $image->delete();
       return redirect()->route('flower.index');
   }
}
