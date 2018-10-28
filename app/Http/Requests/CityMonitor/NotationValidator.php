<?php

namespace ActivismeBe\Http\Requests\CityMonitor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class NotationValidator
 * 
 * @package ActivismeBe\Http\Requests\CityMonitor
 */
class NotationValidator extends FormRequest
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
        return ['title' => 'required|string|max:191'];
    }
}
