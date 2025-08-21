<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true; // allow all for now
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'district_code'      => 'required|string',
            'center_code'        => 'required|string',
            'state_code'         => 'required|string',
            'district_name_eng'  => 'required|string|max:255',
            'district_name_reg'  => 'required|string|max:255',
            'div_code'           => 'required|string',
            'district_lgd_code'  => 'nullable|string',
            'district_location'  => 'nullable|string',
            'is_active'          => 'required|in:0,1'
        ];
    }
}
