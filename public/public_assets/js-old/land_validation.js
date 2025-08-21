// $(document).ready(function () {
//     $("#ralamsForm").validate({
//         ignore: [],  // Ensure all are validated including hidden fields
//         rules: {
//             purpose_details: { 
//                 required: function() { return $('#purpose_details').is(':visible'); }
//             },
//             applicant_type: { required: true },
//             app_name: { 
//                 required: function() { return $('#app_name').is(':visible'); }
//             },
//             app_fname: { 
//                 required: function() { return $('#app_fname').is(':visible'); }
//             },
//             address_app: { 
//                 required: function() { return $('#address_app').is(':visible'); }
//             },
//             app_mobile: { 
//                 required: function() { return $('#app_mobile').is(':visible'); },
//                 digits: true,
//                 minlength: 10,
//                 maxlength: 10
//             },
//             app_email: {
//                 required: function() { return $('#app_email').is(':visible'); },
//                 email: true
//             },
//             district: { required: true },
//             tehsil: { required: true },
//             village: { required: true },
//             "khsra[]": { required: true },
//             type_of_land: { required: true },
//             proposed_area: { required: true, number: true },
//             land_surrendered: { required: true },
//             land_surrender_description: {
//                 required: function () {
//                     return $("input[name='land_surrendered']:checked").val() === "yes";
//                 }
//             }
//         },
//         messages: validationMessages,
//         errorPlacement: function (error, element) {
//             var name = element.attr("name");
//             if (element.attr("type") === "radio") {
//                 error.insertAfter($("input[name='" + name + "']").last().parent());
//             } else {
//                 let errorId = name.replace(/\[\]/g, '').replace(/_/g, '-') + "-error";
//                 const $errorContainer = $("#" + errorId);
//                 if ($errorContainer.length) {
//                     $errorContainer.html(error.text()).removeClass("d-none").show();
//                 } else {
//                     error.insertAfter(element);
//                 }
//             }
//         },
//         highlight: function (element) {
//             $(element).addClass("is-invalid");
//         },
//         unhighlight: function (element) {
//             $(element).removeClass("is-invalid");
//         }
//     });
// });


// // land detail client-side validation
// $(document).ready(function () {
//     $("#LandDetailform").validate({
//         ignore: [],
//         rules: {
//             khatadari: { required: true },
//             khatadariDetails: {
//                 required: function () {
//                     return $("input[name='khatadari']:checked").val() === "yes";
//                 }
//             },
//             act_1894: { required: true },
//             landacc: {
//                 required: function () {
//                     return $("input[name='act_1894']:checked").val() === "yes";
//                 }
//             },
//             irrigation_means: { required: true },
//             irrigationDetails: {
//                 required: function () {
//                     return $("input[name='irrigation_means']:checked").val() === "yes";
//                 }
//             },
//             development_fee: { required: true, number: true },
//             development_rate: { required: true, number: true },
//             invoice_no: { required: true },
//             date: { required: true },
//             project_cost: { required: true, number: true },
//             relevant_info: { required: true },
//             railway_distance: { required: true, number: true },
//             national_highway_distance: { required: true, number: true },
//             state_highway: { required: true, number: true },
//             distance_from_town_city: { required: true, number: true }
//         },
//         messages: validationMessages,
//         errorPlacement: function (error, element) {
//             const name = element.attr("name");
//             const errorId = name.replace(/\[\]/g, '').replace(/_/g, '-') + "-error";
//             const $errorContainer = $("#" + errorId);

//             if ($errorContainer.length) {
//                 $errorContainer.html(error.text()).removeClass("d-none").show();  // just message
//             } else {
//                 error.insertAfter(element);
//             }
//         },
//         success: function (label, element) {
//             const name = $(element).attr("name");
//             const errorId = name.replace(/\[\]/g, '').replace(/_/g, '-') + "-error";
//             $("#" + errorId).addClass("d-none").text('');
//         }
//     });
// });

// // document upload client-side validation
// $(document).ready(function () {

//     // Custom rule: file is required if corresponding radio = yes
//     $.validator.addMethod("fileRequiredIfYes", function (value, element, params) {
//         const radioName = params.radioName;
//         const allowedExtensions = params.allowedExtensions || [];
//         const isYes = $("input[name='" + radioName + "']:checked").val() === "yes";

//         if (!isYes) return true;
//         if (element.files.length === 0) return false;

//         const fileName = element.files[0].name;
//         const ext = fileName.split('.').pop().toLowerCase();
//         return allowedExtensions.includes(ext);
//     });

//     $("#DocumentsUploadform").validate({
//         ignore: [],

//         rules: {
//             copy_khasra_map_doc: {
//                 fileRequiredIfYes: {
//                     radioName: "copy_khasra_map",
//                     allowedExtensions: ["pdf"]
//                 }
//             },
//             original_copy_challan_doc: {
//                 fileRequiredIfYes: {
//                     radioName: "original_copy_challan",
//                     allowedExtensions: ["pdf", "jpg", "jpeg", "png"]
//                 }
//             },
//             project_cost_copy_doc: {
//                 fileRequiredIfYes: {
//                     radioName: "project_cost_copy",
//                     allowedExtensions: ["pdf", "jpg", "jpeg", "png"]
//                 }
//             },
//             copies_revenue_map_doc: {
//                 fileRequiredIfYes: {
//                     radioName: "copies_revenue_map",
//                     allowedExtensions: ["pdf", "jpg", "jpeg", "png"]
//                 }
//             }
//         },

//         messages: validationMessages,

//         errorPlacement: function (error, element) {
//             const name = element.attr("name");
//             const errorId = name.replace(/_/g, "-") + "-error";
//             const $container = $("#" + errorId);

//             if ($container.length) {
//                 $container.html(error.text()).removeClass("d-none").show();
//             } else {
//                 error.insertAfter(element);
//             }
//         },

//         success: function (label, element) {
//             const name = $(element).attr("name");
//             const errorId = name.replace(/_/g, "-") + "-error";
//             $("#" + errorId).addClass("d-none").text('');
//         }
//     });

//     // Show/Hide file inputs based on radio buttons
//     $("input[type=radio]").on("change", function () {
//         const name = $(this).attr("name");
//         const value = $(this).val();
//         const fileTdId = "#" + name + "_td";

//         if (value === "yes") {
//             $(fileTdId).show();
//         } else {
//             $(fileTdId).hide();
//             const fileInputName = name + "_doc";
//             const errorId = fileInputName.replace(/_/g, "-") + "-error";
//             $("#" + errorId).addClass("d-none").text('');
//         }
//     });

// });


$(document).ready(function () {

    $("#form").validate({ 
        ignore: [],
        rules: {
            purpose_details: { 
                required: function() { return $('#purpose_details').is(':visible'); }
            },
            applicant_type: { required: true },
            app_name: { 
                required: function() { return $('#app_name').is(':visible'); }
            },
            app_fname: { 
                required: function() { return $('#app_fname').is(':visible'); }
            },
            address_app: { 
                required: function() { return $('#address_app').is(':visible'); }
            },
            app_mobile: { 
                required: function() { return $('#app_mobile').is(':visible'); },
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            app_email: {
                required: function() { return $('#app_email').is(':visible'); },
                email: true
            },
            app_des: {
                required: function() { return $('#app_des').is(':visible'); }
            },
            org_name: {
                required: function() { return $('#org_name').is(':visible'); }
            },
            district: { required: true },
            tehsil: { required: true },
            village: { required: true },
            // "khsra[]": { required: true },
            "khsra[]": { 
                required: function(element) {
                    // Check if at least one option is selected
                    var val = $('#khsra').val();
                    return !(val && val.length > 0); // returns true if none selected => validation error
                }
            },
            type_of_land: { required: true },
            proposed_area: { required: true, number: true },
            dep_name: { required: true },
            land_surrendered: { required: true },
            land_surrender_description: {
                required: function () {
                    return $("input[name='land_surrendered']:checked").val() === "yes";
                }
            }
        },
        errorPlacement: function (error, element) {
        },
        highlight: function (element) {
            if ($(element).attr('name') === "khsra[]") {
                $('#khsra').addClass("is-invalid");
                // For select2 UI border highlight
                if ($('#khsra').data('select2')) {
                    $('#khsra').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                }
            } else {
                $(element).addClass("is-invalid");
            }
        },
        unhighlight: function (element) {
            if ($(element).attr('name') === "khsra[]") {
                $('#khsra').removeClass("is-invalid");
                if ($('#khsra').data('select2')) {
                    $('#khsra').next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                }
            } else {
                $(element).removeClass("is-invalid");
            }
        }
    });
    $('#khsra').on('change', function() {
        $(this).valid();
    });
});



$(document).ready(function () {
    $("#LandDetailform").validate({
        ignore: [],
        rules: {
            khatadari: { required: true },
            khatadariDetails: {
                required: function () {
                    return $("input[name='khatadari']:checked").val() === "yes";
                }
            },
            act_1894: { required: true },
            landacc: {
                required: function () {
                    return $("input[name='act_1894']:checked").val() === "yes";
                }
            },
            irrigation_means: { required: true },
            irrigationDetails: {
                required: function () {
                    return $("input[name='irrigation_means']:checked").val() === "yes";
                }
            },
            development_fee: { required: true, number: true },
            development_rate: { required: true, number: true },
            invoice_no: { required: true },
            date: { required: true },
            project_cost: { required: true, number: true },
            relevant_info: { required: true },
            railway_distance: { required: true, number: true },
            national_highway_distance: { required: true, number: true },
            state_highway: { required: true, number: true },
            distance_from_town_city: { required: true, number: true }
        },
        errorPlacement: function (error, element) {
            // Do not show error text ANYWHERE
        },
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        }
    });
});

$(document).ready(function () {
    // Custom rule: file is required if corresponding radio = yes
    $.validator.addMethod("fileRequiredIfYes", function (value, element, params) {
        const radioName = params.radioName;
        const allowedExtensions = params.allowedExtensions || [];
        const isYes = $("input[name='" + radioName + "']:checked").val() === "yes";
        if (!isYes) return true;
        if (element.files.length === 0) return false;
        const fileName = element.files[0].name;
        const ext = fileName.split('.').pop().toLowerCase();
        return allowedExtensions.includes(ext);
    });

    $("#DocumentsUploadform").validate({
        ignore: [],
        rules: {
            copy_khasra_map_doc: {
                fileRequiredIfYes: {
                    radioName: "copy_khasra_map",
                    allowedExtensions: ["pdf"]
                }
            },
            original_copy_challan_doc: {
                fileRequiredIfYes: {
                    radioName: "original_copy_challan",
                    allowedExtensions: ["pdf", "jpg", "jpeg", "png"]
                }
            },
            project_cost_copy_doc: {
                fileRequiredIfYes: {
                    radioName: "project_cost_copy",
                    allowedExtensions: ["pdf", "jpg", "jpeg", "png"]
                }
            },
            copies_revenue_map_doc: {
                fileRequiredIfYes: {
                    radioName: "copies_revenue_map",
                    allowedExtensions: ["pdf", "jpg", "jpeg", "png"]
                }
            }
        },
        errorPlacement: function (error, element) {
            // Do not show error text ANYWHERE
        },
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        }
    });

    // Radio select par fileInput show/hide
    $("input[type=radio]").on("change", function () {
        const name = $(this).attr("name");
        const value = $(this).val();
        const fileTdId = "#" + name + "_td";
        if (value === "yes") {
            $(fileTdId).show();
        } else {
            $(fileTdId).hide();
            const fileInputName = name + "_doc";
        }
    });
    
});
