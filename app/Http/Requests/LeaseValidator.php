<?php

namespace ActivismeBe\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LeaseValidator
 * 
 * @package ActivismeBe\Http\Requests
 */
class LeaseValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // This is true because all the policies are binded
        // to the Dashboard contstructor from the leases.

        return true;
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
    private function basicRules(): array 
    {
        return [
            'firstname' => 'required|string|max:120',
            'lastname'  => 'required|string|max:120',
        ];
    }

    /**
     * The HTTP method specific validation rules for the ongoing request. 
     * 
     * @return array
     */
    private function methodSpecificRules(): array 
    {
        switch ($this->method()) {
            case 'POST':    return ['email' => 'required|string|email|max:255|unique:tenants'];
            default:        return [];
        } 
    }
}
