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
       $userFromToken->refresh(); // Обновить данные пользователя
       if($userFromToken->id != $user->id){
           return response()->json([
               'message' => 'Forbidden. You can\'t update other users'
           ], 403);
       }
       $user = $this->service->update($user, $data);
       return $user;
   }
}
