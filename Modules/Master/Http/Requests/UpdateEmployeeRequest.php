<?php

namespace Modules\Master\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Master\Models\Employee;

class UpdateEmployeeRequest extends FormRequest
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
            'user_id' => 'nullable|integer',
            'address' => 'required|string|max:125',
            'phone' => 'required|string|max:15',
            'warehouse' => 'required',
        ];
        
        return $rules;
    }
}
