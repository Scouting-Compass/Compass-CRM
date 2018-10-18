<?php

namespace ActivismeBe\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ArticleValidator
 *
 * @package ActivismeBe\Http\Requests\Articles
 */
class ArticleValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->hasAnyRole(['admin', 'writer']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'   => 'required|string|max:191',
            'content' => 'required|string'
        ];
    }
}
