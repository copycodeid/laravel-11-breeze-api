<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string', 'min:5', 'max:255',
            ],
            'username' => [
                'required', 'string', 'min:5', 'max:35', 'lowercase', 'alpha_dash', Rule::unique(User::class, 'username')->ignore($this->user()->id),
            ],
            'email' => [
                'required', 'string', 'email', 'lowercase', 'max:255', Rule::unique(User::class, 'email')->ignore($this->user()->id),
            ],
        ];
    }
}
