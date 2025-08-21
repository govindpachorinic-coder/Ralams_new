<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VillageRequest extends FormRequest {
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
            'village_code'      => 'nullable|string',
            'village_name_eng'  => 'nullable|string|max:255',
            'village_name_reg'  => 'nullable|string|max:255',
            'village_lgd_code'  => 'nullable|string',
            'patwar_code'       => 'nullable|string',
            'block_code'        => 'nullable|string',
            'is_active'         => 'required|in:0,1'
        ];
    }
}
