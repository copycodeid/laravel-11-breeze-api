<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthenticatedUserResource;
use Illuminate\Http\Request;

class AuthenticatedUserController extends Controller
{
    public function __invoke(Request $request): AuthenticatedUserResource
    {
        return new AuthenticatedUserResource($request->user()->load(['roles:id,name']));
    }
}
