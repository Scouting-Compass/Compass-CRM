<?php

namespace ActivismeBe\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PageValidator
 *
 * @package ActivismeBe\Http\Requests
 */
class PageValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
