$(document).ready(function () {
    // Common validation settings
    $.validator.setDefaults({
        errorElement: "div",
        errorClass: "error-msg text-danger mt-1",
        errorPlacement: function (error, element) {
            if (element.parent(".input-group").length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        ignore: ":hidden:not(:file)",
    });

    // Step 1: Applicant Details
    $("#applicant-form").validate({
        rules: {
            allotment_purpose: { required: true },
            //purpose_details: { required: true },
            app_name: { required: true },
            app_fname: { required: true },
            address_app: { required: true },
            app_mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
            app_email: { required: true, email: true },
            org_name: { required: "#org_name:visible" },
            dep_name: { required: "#dep_name:visible" },
            app_des: { required: "#app_des:visible" },
            land_alloted_details: { required: "#land_alloted_details:visible" },
            society_benefits: { required: "#society_benefits:visible" },
            society_benefits_file: {
                required: "#society_benefits_file:visible",
            },
            org_statement: { required: "#org_statement:visible" },
            project_report: { required: "#project_report:visible" },
            project_report_file: { required: "#project_report_file:visible" },
            income_expenditure: { required: "#income_expenditure:visible" },
            ins_allot_purpose: { required: "#ins_allot_purpose:visible" },
            experience_detail: { required: "#experience_detail:visible" },
            reg_number: { required: "#reg_number:visible" },
            reg_date: { required: "#reg_date:visible" },
            prev_allot_land_file: { required: "#prev_allot_land_file:visible" },
            org_reg_certificate: { required: "#org_reg_certificate:visible" },
            org_reg_certificate_file: {
                required: "#org_reg_certificate_file:visible",
            },
        },
        messages: {
            allotment_purpose: window.validationMessages.allotment_purpose,
            //purpose_details: window.validationMessages.purpose_details,
            app_name: window.validationMessages.app_name,
            app_fname: window.validationMessages.app_fname,
            address_app: window.validationMessages.address_app,
            app_mobile: window.validationMessages.app_mobile,
            app_email: window.validationMessages.app_email,
            org_name: window.validationMessages.org_name,
            dep_name: window.validationMessages.dep_name,
            app_des: window.validationMessages.app_des,
            land_alloted_details:
                window.validationMessages.land_alloted_details,
            society_benefits: window.validationMessages.society_benefits,
            project_report: window.validationMessages.project_report,
            project_report_file: window.validationMessages.project_report_file,
            org_statement: window.validationMessages.org_statement,
            income_expenditure: window.validationMessages.income_expenditure,
            ins_allot_purpose: window.validationMessages.ins_allot_purpose,
            org_reg_certificate: window.validationMessages.org_reg_certificate,
            org_reg_certificate_file:
                window.validationMessages.org_reg_certificate_file,
            experience_detail: window.validationMessages.experience_detail,
            prev_allot_land_file:
                window.validationMessages.prev_allot_land_file,
            reg_number: window.validationMessages.reg_number,
            reg_date: window.validationMessages.reg_date,
            society_benefits_file:
                window.validationMessages.society_benefits_file,
        },
    });

    // Step 2: Land Selection
    $("#land_selection_form").validate({
        rules: {
            district: { required: true },
            tehsil: { required: true },
            village: { required: true },
            khsra: { required: true },
            type_of_land: { required: true },
            proposed_area: { required: true },
        },
        messages: {
            district: window.validationMessages.district,
            tehsil: window.validationMessages.tehsil,
            village: window.validationMessages.village,
            khsra: window.validationMessages.khsra,
            type_of_land: window.validationMessages.type_of_land,
            proposed_area: window.validationMessages.proposed_area,
        },
    });

    // Step 3: Land Details
    $("#land_detail_form").validate({
        rules: {
            railway_distance: { required: true, number: true },
            national_highway_distance: { required: true, number: true },
            state_highway: { required: true, number: true },
            distance_from_town_city: { required: true, number: true },
            project_cost: { required: true, number: true },
            khatadariDetails: { required: true },
            landacc: { required: true },
            irrigationDetails: { required: true },
            relevant_info: { required: true },
        },
        messages: {
            railway_distance: window.validationMessages.railway_distance,
            national_highway_distance:
                window.validationMessages.national_highway_distance,
            state_highway: window.validationMessages.state_highway,
            distance_from_town_city:
                window.validationMessages.distance_from_town_city,
            project_cost: window.validationMessages.project_cost,
            khatadariDetails: window.validationMessages.khatadariDetails,
            landacc: window.validationMessages.landacc,
            irrigationDetails: window.validationMessages.irrigationDetails,
            relevant_info: window.validationMessages.relevant_info,
        },
    });

    // ---------- STEP 4: Document Uploads  ----------
    (function () {
        $.validator.addMethod("pdfOnly", function (value, element) {
            if (this.optional(element)) {
                return true;
            }
            var ext = value.split('.').pop().toLowerCase();
            return ext === "pdf";
        }, "Only PDF files are allowed.");

        var $docForm = $("#doc_upload_form");
        if (!$docForm.length) $docForm = $("#docUploadForm");
        if (!$docForm.length) $docForm = $("#DocumentsUploadform");

        var docValidator = $docForm.validate({
            ignore: [],
        });

        $(".fileInput").each(function () {
            var $file = $(this);
            var name = $file.attr("name");
            var radioName = "is_" + name;

            $file.rules("add", {
                required: {
                    depends: function () {
                        var val = $("input[name='" + radioName + "']:checked").val();
                        return val === "yes"; // required only if "Yes"
                    }
                },
                pdfOnly: true,
                messages: {
                    required: (window.validationMessages && window.validationMessages[name]) || "This file is required.",
                    pdfOnly: (window.validationMessages && window.validationMessages.valid_file_required) || "Only PDF files are allowed."
                }
            });
        });

        $(document).on("change", ".doc-radio", function () {
            var isYes = $(this).val() === "yes";
            var target = $(this).data("target");
            var $wrap = $(target);
            var $file = $wrap.find(".fileInput");

            if (isYes) {
                $wrap.show();
            } else {
                $wrap.hide();
                $file.val("");
                docValidator.element($file);
            }
        });

        $(".doc-radio:checked").trigger("change");
    })();
});
