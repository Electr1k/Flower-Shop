<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\User\BaseController;
use App\Http\Requests\User\LoginRequest;

class LoginController extends BaseController
{
   public function __invoke(LoginRequest $request)
   {
       $data = $request->validated();
       $token = $this->service->login($data);
       return ['token' => $token];
   }
}
