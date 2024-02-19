<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\User\BaseController;
use Illuminate\Http\Request;

class CheckEmailController extends BaseController
{
   public function __invoke(Request $request)
   {
        $data = $request->validate(['email' => 'required|email']);
        return response()->json($this->service->checkEmail($data['email']));
   }
}
