<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityLogRequest extends FormRequest {
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
            'application_id'    => 'required|integer|exists:applications,id',
            'ralams_id'         => 'required|integer|exists:users,ralams_id',
            'activity'          => 'required|string|max:255',
            'activity_details'  => 'required|string'
        ];
    }
}
