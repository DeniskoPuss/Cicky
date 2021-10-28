<?php

namespace App\Http\Requests\Review;

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
            'rating' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($value < 0 || $value > 5) {
                        $fail('Rating must be between 0 and 5');
                    }
                },
            ],
            'review' => [
                'required',
                'string',
            ],
        ];
    }
}
