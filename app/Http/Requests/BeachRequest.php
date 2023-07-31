<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeachRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Set to true to allow all users to make this request.
        // You can implement authorization logic here if needed.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'city' => 'required|string|min:3|max:255',
            'n_umbrellas' => 'required|integer|min:10|max:300',
            'n_seats' => 'required|integer|min:20|max:600',
            'umbrellas_day_price' => 'required|numeric|max:80',
            'opening_date' => 'required|date',
            'closing_date' => 'required|date|after:opening_date',
            'description' => 'required|string|max:300',
            'thumb' => 'required|string'
        ];
    }
}
