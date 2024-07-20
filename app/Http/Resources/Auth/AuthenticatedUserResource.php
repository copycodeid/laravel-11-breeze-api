<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthenticatedUserResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        $role = $this->roles->first();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'avatar' => $this->avatar(),
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'role_permission' => [
                'role' => [
                    'id' => $role->id,
                    'name' => $role->name,
                ],
                'permissions' => $role->id != 1 ? $role->getAllPermissions()->pluck('name') : ['*'],
            ],
        ];
    }
}
