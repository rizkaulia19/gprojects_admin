<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest
{
    private array $params = [];
    private array $rules = [];

    public function setRules(array $rules): BaseFormRequest
    {
        $this->rules = $rules;
        return $this;
    }
    public function setParams(array $params): BaseFormRequest
    {
        $this->params = $params;
        return $this;
    }

    public function rules()
    {
        return $this->rules;
    }

    public function getValidatorInstance(): Validator
    {
        if ($this->params) {
            $this->merge(array_replace_recursive($this->all(), $this->params));
        }
        return parent::getValidatorInstance();
    }

    protected function regexUuid(string $segment)
    {
        return filter_var($segment, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/'
            ]
        ]);
    }
}
