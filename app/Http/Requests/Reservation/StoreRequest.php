<?php

namespace App\Http\Requests\Reservation;

use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
                'after:now',

                function ($attribute, $value, $fail) {
                    $dateTimeFrom=Carbon::make($value);
                    $dateTimeTo= Carbon::make($value);
                    $table = Table::where('id', $this->table_id)->whereHas('reservations', function (Builder $query) use ($dateTimeFrom,$dateTimeTo) {
                        $query->whereBetween('since', [$dateTimeFrom->subMinutes(119), $dateTimeTo->addMinutes(119)]);
                    })->get();

                    if($table->isNotEmpty()){
                        $fail('Rezervácia už je vytvorená a platí 2 hodiny, prosím vyberte iný čas');
                    }
                }
            ],

            'table_id' => [
                'required',
                'numeric'
            ]
        ];

    }
}
