<?php

namespace App\Http\Requests;

class DeletePageRequest extends BaseFormRequest
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
            'id' => [
                'required',
                'uuid'
            ]
        ]);
        return true;
    }
}
