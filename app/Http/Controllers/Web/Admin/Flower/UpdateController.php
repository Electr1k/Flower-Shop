<?php

namespace App\Http\Controllers\Web\Admin\Flower;

use App\Http\Controllers\Controller;
use App\Http\Requests\Flower\UpdateRequest;
use App\Models\Flower;

class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $request, Flower $flower)
   {
       $data = $request->validated();
       $this->flowerService->update($flower, $data);

       return view('admin.flower.show', compact('flower'));
   }
}
