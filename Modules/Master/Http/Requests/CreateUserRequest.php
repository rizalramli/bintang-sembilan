<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class CreateUserRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:125',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required|array',
            'warehouse' => 'required|array',
            'email_verified_at' => 'nullable',
            'password' => 'required|same:confirm-password',
            'remember_token' => 'nullable|string|max:100',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
        return $rules;
    }
}
