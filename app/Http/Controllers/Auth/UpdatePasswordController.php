<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function __invoke(UpdatePasswordRequest $request): string
    {
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return 'Password Updated Successfully!';
    }
}
