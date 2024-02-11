<?php

namespace App\Http\Controllers\Web\Admin\Flower;

use App\Http\Requests\Flower\StoreRequest;

class StoreController extends BaseController
{

   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();
       $this->flowerService->store($data);
       return redirect()->route('flower.index');
   }
}
