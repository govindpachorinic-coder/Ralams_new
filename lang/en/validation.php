<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required' => 'This field is required.',
    'numeric' => 'This field must be a number.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Messages
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention 'attribute.rule' to name the lines.
    |
    */

    'custom' => [
        'district' => [
            'required' => 'This field is required.',
        ],
        'tehsil' => [
            'required' => 'This field is required.',
        ],
        'village' => [
            'required' => 'This field is required.',
        ],
        'khsra' => [
            'required' => 'This field is required.',
        ],
        'type_of_land' => [
            'required' => 'This field is required.',
        ],
        'proposed_area' => [
            'required' => 'This field is required.',
        ],
        'land_surrendered' => [
            'required' => 'This field is required.',
        ],
        'land_surrender_description' => [
            'required' => 'This field is required.',
        ],
        'copy_khasra_map_doc' => [
            'fileRequiredIfYes' => 'Please upload the Copy of Khasra Map document.',
        ],
        'original_copy_challan_doc' => [
            'fileRequiredIfYes' => 'Please upload the Original Challan copy.',
        ],
        'project_cost_copy_doc' => [
            'fileRequiredIfYes' => 'Please upload the Project Cost copy.',
        ],
        'copies_revenue_map_doc' => [
            'fileRequiredIfYes' => 'Please upload the Revenue Map copy.',
        ],
        'original_copy_challan' => [
            'required_if' => 'This field is required .',
            'mimes'       => 'Only PDF files are allowed.',
            'max'         => 'The file size must not exceed 2 MB.',
        ],
        'copy_khasra_map' => [
            'required_if' => 'This field is required .',
            'mimes'       => 'Only PDF files are allowed.',
            'max'         => 'The file size must not exceed 2 MB.',
        ],
        'project_cost_copy' => [
            'required_if' => 'This field is required .',
            'mimes'       => 'Only PDF files are allowed.',
            'max'         => 'The file size must not exceed 2 MB.',
        ],
        'copies_revenue_map' => [
            'required_if' => 'This field is required .',
            'mimes'       => 'Only PDF files are allowed.',
            'max'         => 'The file size must not exceed 2 MB.',
        ],

        

        

        

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as 'E-Mail Address' instead
    | of 'email'. This helps make messages cleaner and more expressive.
    |
    */

    'attributes' => [
        'district' => 'District',
        'tehsil' => 'Tehsil',
        'village' => 'Village',
        'khsra' => 'Khasra Number',
        'type_of_land' => 'Type of Land',
        'proposed_area' => 'Proposed Area',
        'land_surrendered' => 'Land Surrendered',
        'land_surrender_description' => 'Land Surrender Description',
        'khatadari' => 'Khatadari',
        'khatadariDetails' => 'Khatadari Details',
        'act_1894' => 'act 1894',
        'landacc' => 'land acquisition',
        'irrigation_means' => 'irrigation means',
        'irrigationDetails' => 'irrigation details',
        'development_fee' => 'development fee',
        'development_rate' => 'development rate',
        'invoice_no' => 'invoice number',
        'date' => 'date',
        'project_cost' => 'project cost',
        'relevant_info' => 'relevant information',
        'railway_distance' => 'railway distance',
        'national_highway_distance' => 'national highway distance',
        'state_highway' => 'state highway distance',
        'distance_from_town_city' => 'distance from town or city',
        'copy_khasra_map_doc' => 'Copy of Khasra Map Document',
        'original_copy_challan_doc' => 'Original Copy of Challan',
        'project_cost_copy_doc' => 'Project Cost Copy',
        'copies_revenue_map_doc' => 'Revenue Map Copy',
    ],

    /*
    |--------------------------------------------------------------------------
    | Additional Section Messages
    |--------------------------------------------------------------------------
    */

    'khatadariDetails_required' => 'Khatedari details are required.',
    'landacc_required' => 'Land acquisition details are required.',
    'irrigationDetails_required' => 'Irrigation details are required.',

    'file_invalid_extension' => 'Please upload a valid file (pdf, jpg, png).',

    'khatedari_land_required' => 'Khatedari land is required.',
    'act_1894_required' => 'Act 1894 is required.',
    'irrigation_means_required' => 'Irrigation means is required.',
    'development_fee_required' => 'Development fee is required.',
    'development_rate_required' => 'Development rate is required.',
    'invoice_no_required' => 'Invoice number is required.',
    'date_required' => 'Date is required.',
    'project_cost_required' => 'Project cost is required.',
    'relevant_info_required' => 'Relevant information is required.',
    'railway_distance_required' => 'Railway distance is required.',
    'national_highway_distance_required' => 'National highway distance is required.',
    'state_highway_required' => 'State highway distance is required.',
    'distance_from_town_city_required' => 'Distance from town or city is required.',

    'only_numbers' => 'Only numbers are allowed.',
];
