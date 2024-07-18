<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateAccountRequest;
use App\Http\Resources\Auth\AuthenticatedUserResource;

class UpdateAccountController extends Controller
{
    public function __invoke(UpdateAccountRequest $request): AuthenticatedUserResource
    {
        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
        ]);

        return new AuthenticatedUserResource($request->user());
    }
}
