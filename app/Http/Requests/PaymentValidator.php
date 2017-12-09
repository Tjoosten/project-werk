<?php

namespace ActivismeBe\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentValidator extends FormRequest
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
            'plan'          => 'required|max:10|string',
            'firstname'     => 'required|max:255|string',
            'lastname'      => 'required|max:255|string',
            'email'         => 'required|max:255|string|email',
            'street_name'   => 'required|max:255|string',
            'huis_nr'       => 'required|max:255|string',
            'postal_code'   => 'required|integer',
            'city'          => 'required|max:255|string'
        ];
    }
}
