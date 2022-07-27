<?php

namespace App\Http\Requests\Specialization;

use App\Http\Requests\BaseFormRequest;

class SpecializationCreateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->setRules([
            'name' => ['required', 'max:255'],
            'code' => ['required', 'max:255'],
            'image' => ['string'],
            'icon' => ['string'],
            'color' => ['required', 'max:255']
        ]);
        return true;
    }
}
