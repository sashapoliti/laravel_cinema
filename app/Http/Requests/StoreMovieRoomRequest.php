<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRoomRequest extends FormRequest
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
            'date_projection' => 'required|date',
            /* 'ticket_price' => 'required|numeric', */
            'movie_id' => 'required|integer',
            'room_id' => 'required|integer',
            'slot_id' => 'required|integer',
        ];
    }
}
