<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id'  => 'required',
            'title'        => 'required',
            'description'  => 'required',
            'ingredients'  => 'required',
            'instructions' => 'required',
            'image'        => 'required',
            'tags'         => 'required',
        ];
    }
}
