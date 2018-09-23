<?php

namespace ActivismeBe\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LockValidator
 * 
 * @package ActivismeBe\Http\Requests\Users
 */
class LockValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return ['confirmation' => 'required|string'];
    }
}
