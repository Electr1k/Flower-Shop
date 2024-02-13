<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\User\BaseController;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();
       $user = $this->service->store($data);
       return $user;
   }
}
