<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->email_verified_at != null) && (
            ($this->user()->email === 'ed1ezac@gmail.com')||
            ($this->user()->email === 'edgarsrs@yahoo.com')||
            ($this->user()->email === 'ekealeboga@yahoo.com')||
            ($this->user()->email === 'buffaloitbotswana@gmail.com')         
        );
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
