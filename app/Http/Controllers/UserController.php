<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('auth:api')->except('store');
        $this->userService = $userService;
    }

    public function store(CreateUserRequest $request)
    {
        return $this->userService->createAndLogin($request->validated());
    }

    public function show()
    {
        return $this->userService->getUser();
    }

    public function update(UpdateUserRequest $request)
    {
        return $this->userService->updateUser($request->validated());
    }

    public function destroy()
    {
        return $this->userService->deleteUser();
    }
}
