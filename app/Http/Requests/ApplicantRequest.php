<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'purpose_type'         => 'required|string|max:255',
            'land_allotment_rule'  => 'required',
            'applicant_name'       => 'required|string|max:255',
            'father_name'          => 'required|string|max:255',
            'applicantt_address'   => 'required|string|max:255',
            'mobile'               => 'required|digits:10',
            'email'                => 'required|email|max:255',
            'org_type'             => 'required',
            'org_name'             => 'required|string|max:255',
            'registered'           => 'required',
            'reg_number'           => 'required_if:registered,Yes|string|max:255',
            'reg_date'             => 'required_if:registered,Yes|date',
            'area'                 => 'required|string|max:255',
            'remarks'              => 'nullable|string|max:500',
            'budget_announcement'  => 'required',
            'budget_file'          => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ];
    }

     /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'purpose_type.required'         => 'Please select purpose type.',
            'land_allotment_rule.required'  => 'Please select land allotment rule.',
            'applicant_name.required'       => 'Please enter applicant name.',
            'father_name.required'          => 'Please enter father name.',
            'applicantt_address.required'   => 'Please enter address.',
            'mobile.required'               => 'Please enter mobile number.',
            'mobile.digits'                 => 'Mobile number must be 10 digits.',
            'email.required'                => 'Please enter email address.',
            'email.email'                   => 'Please enter a valid email address.',
            'org_type.required'             => 'Please select organisation type.',
            'org_name.required'             => 'Please enter organisation name.',
            'registered.required'           => 'Please select whether organisation is registered.',
            'reg_number.required_if'        => 'Please enter registration number.',
            'reg_date.required_if'          => 'Please enter registration date.',
            'area.required'                 => 'Please enter area.',
            'budget_announcement.required'  => 'Please select budget announcement option.',
            'budget_file.mimes'             => 'Budget file must be a PDF, JPG, JPEG or PNG.',
            'budget_file.max'               => 'Budget file must be less than 2MB.',
        ];
    }
}
