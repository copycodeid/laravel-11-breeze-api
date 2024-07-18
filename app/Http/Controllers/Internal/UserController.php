<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $offset = $request->offset ?? 0;
        $limit = 5;

        $users = User::query()
            // ->where('id', '!=', $request->user()->id)
            ->offset($offset)
            ->limit($limit)
            ->get();

        return response()->json($users);
    }
}
