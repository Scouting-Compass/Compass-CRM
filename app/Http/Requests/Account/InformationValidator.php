<?php

namespace ActivismeBe\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class InformationValidator 
 * 
 * @package ActivismeBe\Http\Requests\Account
 */
class InformationValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge($this->basicRules(), $this->methodSpecificRules());
    }

    /**
     * The basic validation rules for the ongoing request. 
     * 
     * @return array
     */
    public function basicRules(): array 
    {
        return ['name' => 'required|string|max:255'];
    }

    /**
     * The method specific validation rules for the ongoing request.
     * 
     * @return array 
     */
    public function methodSpecificRules(): array 
    {
        switch ($this->method()) {
            case 'PATCH': 
            case 'POST':

            default: return [];
        }
    }
}
