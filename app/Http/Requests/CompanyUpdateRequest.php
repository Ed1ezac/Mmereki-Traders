<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//active member
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['required','numeric'],
            'company-name' => ['required', 'string', 'max:100'],
            'intro' => ['required', 'string', 'max:160'],
            'about' => ['required', 'string', 'max:160'],
            'address' => ['required','string', 'max:100'],
            'location' => ['required','string', 'max:60'],
            'trades' => ['required',],
            'tel' => ['required', 'numeric', 'min:7'],
            'mobile' => ['required', 'numeric', 'min:8'],
            'company-email'=> ['required', 'email'],
        ];
    }

    public function attributes()
    {
        return [
            'company-email' => 'company email',
            'company-name' => 'company name',
        ];
    }
}
