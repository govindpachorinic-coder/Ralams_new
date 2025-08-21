<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
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
            'sso_id'          => 'required|string|max:50',
            'ralams_id'       => 'required|string|max:50',
            'user_type'       => 'required|string|max:50',
            'display_name'    => 'required|string|max:255',
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'father_name'     => 'required|string|max:255',
            'gender'          => 'required|in:Male,Female,Other',
            'date_of_birth'   => 'required|date',
            'mobile'          => 'required|string|size:10',
            'mail_personal'   => 'required|email|max:255',
            'mail_official'   => 'required|email|max:255',
            'postal_address'  => 'required|string|max:500',
            'postal_code'     => 'required|string|max:10',
            'state'           => 'required|string|max:255',
            'city'            => 'required|string|max:255',
            'block'           => 'required|string|max:255',
            'jpeg_photo'      => 'required|string',
            'designation'     => 'required|string|max:255',
            'department'      => 'required|string|max:255',
            'role_id'         => 'required|integer',
            'active'          => 'required|in:0,1',
            'ip_address'      => 'required|ip',
            'mac_address'     => 'required|string|max:20'
        ];
    }
}
