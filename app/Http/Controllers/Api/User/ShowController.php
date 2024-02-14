<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Web\Flower\BaseController;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class ShowController extends BaseController
{
   public function __invoke(User $user)
   {
       return new UserResource($user);
   }
}
