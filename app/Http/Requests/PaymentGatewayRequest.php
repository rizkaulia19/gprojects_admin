<?php

namespace App\Http\Requests;

class PaymentGatewayRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->setRules([
            'name' => 'required|max:255',
            'code' => 'required|max:255'
        ]);
        return true;
    }
}
