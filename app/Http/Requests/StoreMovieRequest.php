<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:200|unique:movies',
            'description' => 'nullable',
            'minutes' => 'required|integer|max:400',
            'language' => 'required|string|max:20',
            'thumb' => 'string|nullable|max:255',
            'trailer' => 'nullable|max:255|string',
            'release_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Questo campo è obbligatorio',
            'title.unique' => 'Il titolo scelto è più esistente',
            'title.max' => 'Il campo deve avere massimo :max caratteri',
            'title.min' => 'Il campo deve avere minimo :min caratteri',
            'description.max' => 'Il campo deve avere massimo :max caratteri',
            'minutes.max' => 'Il campo deve avere massimo :max caratteri',
            'language.max' => 'Il campo deve avere massimo :max caratteri',
            'thumb.max' => 'Il campo deve avere massimo :max caratteri',
            'trailer.max' => 'Il campo deve avere massimo :max caratteri',
            'release_date.required' => 'Questo campo è obbligatorio',
            'release_date.date' => 'Inserire una data valida',
        ];
    }
}
