<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Helpers\Helper;
use App\Http\Resources\UserResource;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(RegisterRequest $reguest)
    {
        $user = User::create([
            'name' => $reguest->name,
            'email' => $reguest->email,
            'password' => bcrypt($reguest->password)
        ]);

        $operations_role = Role::where(['name' => 'operations'])->first();

        if ($operations_role) {
            $user->assignRole($operations_role);
        }

        return new UserResource($user);
    }
}
