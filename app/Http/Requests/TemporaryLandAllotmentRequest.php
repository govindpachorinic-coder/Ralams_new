<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemporaryLandAllotmentRequest extends FormRequest {
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
        'ralams_id'                         => 'required|string|max:50',
        'allotment_purpose'                 => 'required|string|max:255',
        'land_owner_type'                   => 'required|in:Individual,Institution,Government',
        'khatedar_name'                     => 'required|string|max:255',
        'khatedar_fname'                    => 'required|string|max:255',
        'khatedar_district_code'            => 'required|string|max:50',
        'khatedar_block_code'               => 'required|string|max:50',
        'khatedar_address'                  => 'required|string|max:500',
        'khatedar_mobile'                   => 'required|string|size:10',
        'district_code'                     => 'required|string|max:50',
        'tehsil_code'                       => 'required|string|max:50',
        'ilr_code'                          => 'required|string|max:50',
        'patwar_mandal'                     => 'required|string|max:100',
        'village_code'                      => 'required|string|max:50',
        'khasra_number'                     => 'required|string|max:255',
        'land_type'                         => 'required|string|max:100',
        'khasra_area'                       => 'required|numeric|min:0',
        'proposed_area'                     => 'required|numeric|min:0',
        'map_doc_file'                      => 'required|string',
        'irrigation_details'                => 'required|string',
        'surrender_land_details'            => 'required|string',
        'registration_certificate_number'  => 'required|string|max:100',
        'registration_certificate_file'    => 'required|string',
        'registration_details'              => 'required|string',
        'finance_3y_file'                   => 'required|string',
        'project_rpt_file'                  => 'required|string',
        'project_rpt_details'               => 'required|string',
        'institutional_experience'          => 'required|in:Yes,No',
        'institutional_experience_details'  => 'required_if:institutional_experience,Yes|string',
        'deptartment_concern_file'          => 'required|string'
        ];
    }
}
