<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentTypeRequest extends FormRequest
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
            'paymentGatewayId' => 'uuid|exists:payment_gateways,id',
            'paymentTypeCategoryId' => 'uuid|exists:payment_type_categories,id',
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'image' => 'required',
            'isAvailable' => 'required|boolean',
            'fixedFee' => 'required|numeric',
            'percentageFee' => 'required|numeric'
        ];
    }
}
