<?php

namespace ActivismeBe\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BugValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titel'         => 'required', 
            'beschrijving'  => 'required', 
            'label'         => 'required',
        ];
    }
}
