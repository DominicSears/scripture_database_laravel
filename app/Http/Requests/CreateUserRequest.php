<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{
    use PasswordValidationRules;

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
        return [
            'first_name' => ['required'],
            'last_name' => ['string'],
            'username' => ['max:32', Rule::unique('users', 'username')],
            'email' => [Rule::unique('users', 'email')],
            'email_confirm' => ['required', 'same:email'],
            'password' => $this->passwordRules(),
            'gender' => ['required', 'max:1'],
            'country_iso_code' => ['integer', 'required'],
            'religion_id' => ['required', 'integer'],
            'denomination_id' => ['integer', 'sometimes'],
            'start_of_faith' => ['date', 'required'],
            'note' => ['sometimes', 'string']
        ];
    }
}
