<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user),
            ],
            'password' => 'same:confirm-password',
            'roles' => 'required|array',
            'warehouse' => 'required|array',
        ];
        
        return $rules;
    }
}
