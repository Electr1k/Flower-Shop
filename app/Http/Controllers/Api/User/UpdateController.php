<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\User\BaseController;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $request, User $user)
   {
       $data = $request->validated();
       $userFromToken = auth()->user();
       if (!$userFromToken->isAdmin){
           unset($data['isAdmin'], $data['balance']);
       }
       $user = $this->service->update($user, $data);
       return $user;
   }
}
