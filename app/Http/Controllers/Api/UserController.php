<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Helpers\Helper;
use App\Http\Resources\UserResource;
use Auth;

class UserController extends Controller
{
    public function list(UserRequest $request)
    {
        return true;
    }

    public function create(UserRequest $request)
    {
        return true;
    }

    public function view(UserRequest $request)
    {
        return true;
    }

    public function delete(UserRequest $request)
    {
        return true;
    }

    public function update(UserRequest $request)
    {
        return true;
    }
}
