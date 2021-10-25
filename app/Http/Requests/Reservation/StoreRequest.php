<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'number_of_people' => [
                'required',
                'numeric',
                'min:1',

            ],
            'date' => [
                'required',
                'date',
                'after:today'
            ],
            'table_id' => [
                'required',
                'numeric'
            ]
        ];

    }
}
