<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'room_number' => ['required', 'string', 'max:255'],
            'capacity' => ['required', 'integer'],
            'bed_count' => ['required', 'integer'],
            'bathroom_count' => ['required', 'integer'],
            'short_description' => ['required', 'string', 'max:255', 'min:5'],
            'long_description' => ['required', 'max:65535', 'min:5'],
            'active' => 'nullable'
        ];
    }
}
