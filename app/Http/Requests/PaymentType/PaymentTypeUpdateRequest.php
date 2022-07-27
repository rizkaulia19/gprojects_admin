<?php

namespace App\Http\Requests\PaymentType;

use App\Http\Requests\BaseFormRequest;

class PaymentTypeUpdateRequest extends BaseFormRequest
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
            ],
            'paymentGatewayId' => [
                'uuid',
                'exists:payment_gateways,id'
            ],
            'paymentTypeCategoryId' => [
                'uuid',
                'exists:payment_type_categories,id'
            ],
            'name' => [
                'max:255'
            ],
            'code' => [
                'max:255'
            ],
            'image' => ['nullable'],
            'isAvailable' => [
                'boolean'
            ],
            'fixedFee' => [
                'numeric'
            ],
            'percentageFee' => [
                'numeric'
            ]
        ]);
        return true;
    }
}
