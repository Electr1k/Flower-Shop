<?php

namespace App\Http\Controllers\Web\Flower;

use App\Http\Requests\Flower\StoreRequest;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();

       $this->service->store($data);

       return redirect()->route('flower.index');
   }
}
