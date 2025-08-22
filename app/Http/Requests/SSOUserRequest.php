<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SSOUserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'master_key_id'        => 'required|string',
            'citizen_name'         => 'required|string|unique:sso_users,citizen_name',
            'citizen_hf_name'      => 'nullable|string',
            'pincode'              => 'required|string',
            'citizen_address'      => 'required|string',
            'mobile_number'        => 'required|string',
            'user_id'              => 'required|string',
            'password_encryption'  => 'required|string',
            'password'             => 'required|string',
            'aadhaar_no'           => 'required|string',
            'state'                => 'required|string',
            'district'             => 'required|string',
            'entry_date'           => 'required|date',
            'first_login'          => 'nullable|date',
            'ip_address'           => 'required|string',
            'mac_address'          => 'required|string',
            'updated_date'         => 'nullable|date',
        ];
    }
}
