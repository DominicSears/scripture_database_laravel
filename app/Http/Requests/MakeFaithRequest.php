<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeFaithRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->hasPermissionTo('create_new_faith');
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
            'denomination_id' => ['somtimes', 'integer'],
            'start_of_faith' => ['required', 'date'],
            'note' => ['string', 'max:255'],
            'reason_left' => ['string', 'max:255'],
        ];
    }
}
