<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            
            'name' => 'required|min:3|max:100|unique:rooms',
            'alias' => 'max:100|nullable',
            'seats' => 'integer|max:500',
            'isense' => 'boolean|integer|max:1',
            'base_price' => 'decimal:2',
            'img_room' => 'nullable|image|max:2048'
        ];
    }
    public function messages(){
        return[
            'name.required'=> 'Questo campo è obbligatorio',
            'name.unique'=> 'Il nome scelto è già esistente',
            'name.max'=> 'Il campo deve avere massimo :max caratteri',
            'name.min'=> 'Il campo deve avere minimo :min caratteri',
            'alias.max'=> 'Il campo deve avere massimo :max caratteri',
            'seats.integer'=> 'Questo campo è obbligatorio',
            'isense.boolean' => 'Inserire valore 0 o 1',
            'base_price.decimal' => 'Inserire un valore decimale',
            'img_room.max' => 'Il campo deve avere :max caratteri',
            'img_room.image' => 'Il campo deve contenere un file immagine',
        ];
    } 
}
