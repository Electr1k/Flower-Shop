<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\User\BaseController;
use Illuminate\Http\Request;

class CheckEmailController extends BaseController
{
   public function __invoke(Request $request)
   {
        $email = $request->input('email');
        return response()->json($this->service->checkEmail($email));
   }
}
