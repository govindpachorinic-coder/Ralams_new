<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLogRequest extends FormRequest {
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
            'application_id' => 'nullable|integer|exists:applications,id', // if Application model exists
            'ralams_id'      => 'nullable|integer|exists:users,ralams_id',
            'ipaddress'      => 'nullable|ip',
            'macaddress'     => 'nullable|string|max:20',
            'login_time'     => 'nullable|date',
            'logout_time'    => 'nullable|date|after_or_equal:login_time',
        ];
    }
}
