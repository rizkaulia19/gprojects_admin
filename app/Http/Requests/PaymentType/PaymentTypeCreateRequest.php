<?php

namespace App\Http\Requests\PaymentType;

use App\Http\Requests\BaseFormRequest;

class PaymentTypeCreateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->setRules([
            'paymentGatewayId' => [
                'uuid',
                'exists:payment_gateways',
                'id'
            ],
            'paymentTypeCategoryId' => [
                'uuid',
                'exists:payment_type_categories',
                'id'
            ],
            'name' => [
                'required',
                'max:255'
            ],
            'code' => [
                'required',
                'max:255'
            ],
            'image' => ['required'],
            'isAvailable' => [
                'required',
                'boolean'
            ],
            'fixedFee' => [
                'required',
                'numeric'
            ],
            'percentageFee' => [
                'required',
                'numeric'
            ]
        ]);
        return true;
    }
}
