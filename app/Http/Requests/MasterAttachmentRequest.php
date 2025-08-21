<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterAttachmentRequest extends FormRequest {
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
            'document_id'        => 'required|string|max:50',
            'document_title'     => 'required|string|max:255',
            'document_details'   => 'nullable|string',
            'applicant_display'  => 'required|in:Y,N',
            'dm_display'         => 'required|in:Y,N',
            'sdm_display'        => 'required|in:Y,N',
            'patwari_display'    => 'required|in:Y,N',
        ];
    }
}
