<?php

namespace App\Http\Requests\Specialization;

use App\Http\Requests\BaseFormRequest;

class SpecializationUpdateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->setParams([
            'id' => $this->regexUuid($this->segment(2))
        ])->setRules([
            'id' => ['required', 'uuid'],
            'name' => ['required', 'max:255'],
            'code' => ['string', 'max:255'],
            'image' => ['string'],
            'icon' => ['string'],
            'color' => ['string', 'max:255']
        ]);
        return true;
    }
}
