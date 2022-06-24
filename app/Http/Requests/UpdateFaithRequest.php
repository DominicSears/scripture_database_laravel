<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFaithRequest extends FormRequest
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
        return [
            'religion_id' => ['required', 'integer'],
            'start_of_faith' => ['required', 'date'],
            'end_of_faith' => ['sometimes', 'date'],
            'note' => ['string', 'max:255'],
            'reason_left' => ['string', 'max:255'],
        ];
    }
}
