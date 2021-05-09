<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            // 'name' => 'required|min:2',
            // 'date_of_prod' => 'date',
            // 'class_id' => 'required|int',
            // 'num_of_seats' => 'min:1|max:8',
            // 'price_per_day' => 'required|numeric',
            // 'vehicle_photo' => 'image',
        ];
    }
}
