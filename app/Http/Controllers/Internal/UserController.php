<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
            ->where('id', '!=', $request->user()->id)
            ->fastPaginate(10)
            ->withQueryString();

        return response()->json(new UserCollection($users));
    }
}
