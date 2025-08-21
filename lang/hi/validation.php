<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    */

    'required' => 'यह फ़ील्ड आवश्यक है।',
    'numeric' => 'यह फ़ील्ड केवल अंकों में होना चाहिए।',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Messages
    |--------------------------------------------------------------------------
    |
    */

    'custom' => [
        'district' => [
            'required' => 'यह फ़ील्ड आवश्यक है।',
        ],
        'tehsil' => [
            'required' => 'यह फ़ील्ड आवश्यक है।',
        ],
        'village' => [
            'required' => 'यह फ़ील्ड आवश्यक है।',
        ],
        'khsra' => [
            'required' => 'यह फ़ील्ड आवश्यक है।',
        ],
        'type_of_land' => [
            'required' => 'यह फ़ील्ड आवश्यक है।',
        ],
        'proposed_area' => [
            'required' => 'यह फ़ील्ड आवश्यक है।',
        ],
        'land_surrendered' => [
            'required' => 'यह फ़ील्ड आवश्यक है।',
        ],
        'land_surrender_description' => [
            'required' => 'यह फ़ील्ड आवश्यक है।',
        ],
        'copy_khasra_map_doc' => [ 'required' => 'यह फ़ील्ड आवश्यक है।' ],
        'original_copy_challan_doc' => [ 'required' => 'यह फ़ील्ड आवश्यक है।' ],
        'project_cost_copy_doc' => [ 'required' => 'यह फ़ील्ड आवश्यक है।' ],
        'copies_revenue_map_doc' => [ 'required' => 'यह फ़ील्ड आवश्यक है।' ],

        'org_name.required_if' => 'जब आवेदक प्रकार संस्था हो तब संस्था का नाम आवश्यक है।',
        'dep_name.required_if' => 'जब आवेदक प्रकार विभाग हो तब विभाग का नाम आवश्यक है।',
        'app_des.required_if'  => 'यह फ़ील्ड आवश्यक है।',
        'required_if' => 'यह फ़ील्ड आवश्यक है।',
        'original_copy_challan' => [
            'required_if' => 'यह फ़ील्ड आवश्यक है।',
            'mimes'       => 'केवल PDF फ़ाइलें मान्य हैं।',
            'max'         => 'फ़ाइल का आकार 2 MB से अधिक नहीं होना चाहिए।',
        ],
        'copy_khasra_map' => [
            'required_if' => 'यह फ़ील्ड आवश्यक है।',
            'mimes'       => 'केवल PDF फ़ाइलें मान्य हैं।',
            'max'         => 'फ़ाइल का आकार 2 MB से अधिक नहीं होना चाहिए।',
        ],
        'project_cost_copy' => [
            'required_if' => 'यह फ़ील्ड आवश्यक है।',
            'mimes'       => 'केवल PDF फ़ाइलें मान्य हैं।',
            'max'         => 'फ़ाइल का आकार 2 MB से अधिक नहीं होना चाहिए।',
        ],
        'copies_revenue_map' => [
            'required_if' => 'यह फ़ील्ड आवश्यक है।',
            'mimes'       => 'केवल PDF फ़ाइलें मान्य हैं।',
            'max'         => 'फ़ाइल का आकार 2 MB से अधिक नहीं होना चाहिए।',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    */

    'attributes' => [
        'district' => 'ज़िला',
        'tehsil' => 'तहसील',
        'village' => 'गांव',
        'khsra' => 'खसरा नंबर',
        'type_of_land' => 'भूमि का प्रकार',
        'proposed_area' => 'प्रस्तावित क्षेत्र',
        'land_surrendered' => 'अर्पित भूमि',
        'land_surrender_description' => 'अर्पण विवरण',
        'khatadari' => 'खातेदारी',
        'khatadariDetails' => 'खातेदारी विवरण',
        'act_1894' => 'अधिनियम 1894',
        'landacc' => 'भूमि अधिग्रहण',
        'irrigation_means' => 'सिंचाई के साधन',
        'irrigationDetails' => 'सिंचाई विवरण',
        'development_fee' => 'विकास शुल्क',
        'development_rate' => 'विकास दर',
        'invoice_no' => 'चालान संख्या',
        'date' => 'तारीख',
        'project_cost' => 'परियोजना लागत',
        'relevant_info' => 'सुसंगत जानकारी',
        'railway_distance' => 'रेलवे से दूरी',
        'national_highway_distance' => 'राष्ट्रीय राजमार्ग से दूरी',
        'state_highway' => 'राज्य राजमार्ग से दूरी',
        'distance_from_town_city' => 'कस्बे/शहर से दूरी',
        'copy_khasra_map_doc' => 'खसरे के नक्शे की प्रति',
        'original_copy_challan_doc' => 'मूल चालान की प्रति',
        'project_cost_copy_doc' => 'परियोजना लागत दस्तावेज़ की प्रति',
        'copies_revenue_map_doc' => 'राजस्व नक्शे की प्रतियाँ',
    ],

    /*
    |--------------------------------------------------------------------------
    | Additional Section Messages
    |--------------------------------------------------------------------------
    */

    'khatadariDetails_required' => 'खातेदारी विवरण आवश्यक है।',
    'landacc_required' => 'भूमि अधिग्रहण विवरण आवश्यक है।',
    'irrigationDetails_required' => 'सिंचाई विवरण आवश्यक है।',

    /*
    |--------------------------------------------------------------------------
    | Other Field-Specific Validation Messages
    |--------------------------------------------------------------------------
    */

    'khatedari_land_required' => 'खातेदारी भूमि आवश्यक है।',
    'act_1894_required' => 'अधिनियम 1894 आवश्यक है।',
    'irrigation_means_required' => 'सिंचाई का साधन आवश्यक है।',
    'development_fee_required' => 'विकास शुल्क आवश्यक है।',
    'development_rate_required' => 'विकास दर आवश्यक है।',
    'invoice_no_required' => 'चालान संख्या आवश्यक है।',
    'date_required' => 'तारीख आवश्यक है।',
    'project_cost_required' => 'परियोजना लागत आवश्यक है।',
    'relevant_info_required' => 'सुसंगत जानकारी आवश्यक है।',
    'railway_distance_required' => 'रेलवे से दूरी आवश्यक है।',
    'national_highway_distance_required' => 'राष्ट्रीय राजमार्ग से दूरी आवश्यक है।',
    'state_highway_required' => 'राज्य राजमार्ग से दूरी आवश्यक है।',
    'distance_from_town_city_required' => 'कस्बे/शहर से दूरी आवश्यक है।',

    'only_numbers' => 'केवल अंक दर्ज करें।',
];
