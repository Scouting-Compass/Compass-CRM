<?php

namespace ActivismeBe\Http\Requests\CityMonitor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CharterValidator
 *
 * @package ActivismeBe\Http\Requests\CityMonitor
 */
class CharterValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Authorization is registered to true because the authorization happens on controller level.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return ['charter' => 'required|mimes:pdf'];
    }
}
