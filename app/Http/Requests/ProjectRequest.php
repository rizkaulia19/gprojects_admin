<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'currencyId' => 'uuid|exists:currencies,id',
            'userId' => 'uuid|exists:users,id',
            'advertiseId' => 'uuid|exists:advertises,id',
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer'
        ];
    }
}
