<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $request = request();
        return [
            'id' => ['required', 'numeric'],
            'first-name' => ['required', 'string', 'max:100'],
            'last-name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100',
                Rule::unique('users')->ignore($request->input('id'))],
            'old-password' => ['required_if:password,1|current_password|string|min:8'],
            'password' => ['required_if:old-password,1|string|min:8|confirmed'],
        ];
    }

    public function attributes()
    {
        return [
            'first-name' => 'first name',
            'last-name' => 'last name',
        ];
    }
    
}
