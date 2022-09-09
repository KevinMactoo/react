<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgeAssesmentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            "user_id"  => "required|Int",
            "place_of_birth" => "required",
            "date_of_birth" => "required",
            "serial_number" => "required",
            "date_of_application" => "required",
            "name_of_applicant" => "required",
            "phone_number" => "required"
        ];
    }
}
