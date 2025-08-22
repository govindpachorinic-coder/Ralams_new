
    $(document).ready(function () {
    var currentGfgStep, nextGfgStep, previousGfgStep;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    // $(".next-step").click(function () {

    //     currentGfgStep = $(this).parent();
    //     nextGfgStep = $(this).parent().next();

    //     $("#progressbar li").eq($("fieldset")
    //         .index(nextGfgStep)).addClass("active");

    //     nextGfgStep.show();
    //     currentGfgStep.animate({ opacity: 0 }, {
    //         step: function (now) {
    //             opacity = 1 - now;

    //             currentGfgStep.css({
    //                 'display': 'none',
    //                 'position': 'relative'
    //             });
    //             nextGfgStep.css({ 'opacity': opacity });
    //         },
    //         duration: 500
    //     });
    //     setProgressBar(++current);
    // });

    $(".previous-step").click(function () {

        currentGfgStep = $(this).parent();
        previousGfgStep = $(this).parent().prev();

        $("#progressbar li").eq($("fieldset")
            .index(currentGfgStep)).removeClass("active");

        previousGfgStep.show();

        currentGfgStep.animate({ opacity: 0 }, {
            step: function (now) {
                opacity = 1 - now;

                currentGfgStep.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previousGfgStep.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(currentStep) {
        var percent = parseFloat(100 / steps) * current;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    $(".submit").click(function () {
        return false;
    })
    });

   var coll = document.getElementsByClassName("collapsible");

    for (var i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            var content = this.nextElementSibling;
            var plusMinus = this.querySelector(".plus-minus");
            var isAlreadyOpen = content.style.display === "block";

            var allContents = document.getElementsByClassName("content");
            var allPlusMinus = document.querySelectorAll(".collapsible .plus-minus");
            for (var j = 0; j < allContents.length; j++) {
                allContents[j].style.display = "none";
            }
            for (var k = 0; k < allPlusMinus.length; k++) {
                allPlusMinus[k].textContent = "+";
            }

            if (!isAlreadyOpen) {
                content.style.display = "block";
                plusMinus.textContent = "-";
            }
        });
    }
   

    document.querySelectorAll('input[name="more_land"]').forEach((elem) => {
        elem.addEventListener("change", function() {
        document.getElementById('moreDetails').style.display = (this.value === "yes") ? 'block' : 'none';
        });
    });

    function openModal(modalId) {
    var modal = new bootstrap.Modal(document.getElementById(modalId));
    modal.show();
    }


    /* Radio Show Hide */

    document.querySelectorAll('input[name="land_surrendered"]').forEach((elem) => {
        elem.addEventListener("change", function () {
            document.getElementById('landSurrDetails').style.display = (this.value === "yes") ? 'block' :
                'none';
        });
    });

    document.querySelectorAll('input[name="khatadari"]').forEach(function (elem) {
        elem.addEventListener('change', function () {
            document.getElementById('khatadariDetails').style.display = this.value === 'yes' ? 'flex' : 'none';
        });
    });

    document.querySelectorAll('input[name="act_1894"]').forEach(function (elem) {
        elem.addEventListener('change', function () {
            document.getElementById('landacc').style.display = this.value === 'yes' ? 'flex' : 'none';
        });
    });

    document.querySelectorAll('input[name="irrigation_means"]').forEach((elem) => {
        elem.addEventListener("change", function () {
            document.getElementById('irrigationDetails').style.display = (this.value === "yes") ? 'block' :
                'none';
        });
    });


    /* Applicant Purpose Script 

    $(document).ready(function () 
    {
        $('#land_selection + .content').hide();
        $('#land_selection .plus-minus').text('+');
        var autoSetRule = {
            @foreach($purpose as $item)
                "{{ $item->id }}": "{{ $item->application_rule_id }}",
            @endforeach
        };
        var orgRequiredPurposeIds = [
                @foreach($purpose as $item)
                    @if(in_array($item->purpose_name, ['पर्यटन', 'उद्योग']))
                        "{{ $item->id }}",
                    @endif
                @endforeach
        ];


        $('#purpose_types').on('change', function () {
            var purposeTypeId = $(this).val();
            $('#land_selection + .content').slideDown();
            $('#land_selection .plus-minus').text('-');
            $('#land_selection').addClass('active');

            if (autoSetRule[purposeTypeId]) {
                $('#land_allotment_rule').val(autoSetRule[purposeTypeId]).trigger('change');
                $('#land_allot_rule').val(autoSetRule[purposeTypeId]);
            } 
            else{
                $('#land_allotment_rule').val('').trigger('change');
                $('#land_allot_rule').val('');
            }
            console.log('purposeTypeId', purposeTypeId);

            if (orgRequiredPurposeIds.includes(purposeTypeId)) {
                $('#org_status').closest('.col-md-12').show();
                $('#app_name').closest('.col-md-4').show();
                $('#app_fname').closest('.col-md-4').show();
                $('#address_app').closest('.col-md-4').show();
                $('#app_mobile').closest('.col-md-4').show();
                $('#app_email').closest('.col-md-4').show();
                $('#purpose_details').closest('.col-md-12').show();
                }
            else if (purposeTypeId == '') { // Empty option
                $('#org_status').closest('.col-md-12').hide();
                $('#app_name').closest('.col-md-4').hide();
                $('#app_fname').closest('.col-md-4').hide();
                $('#address_app').closest('.col-md-4').hide();
                $('#app_mobile').closest('.col-md-4').hide();
                $('#app_email').closest('.col-md-4').hide();
                $('#dep_name').closest('.col-md-4').hide();
                $('#org_name').closest('.col-md-4').hide();
                $('#app_des').closest('.col-md-4').hide();
                $('#purpose_details').closest('.col-md-12').hide();
                } 
            else {
                $('#org_status').closest('.col-md-4').show();
                $('#app_name').closest('.col-md-4').show();
                $('#app_fname').closest('.col-md-4').show();
                $('#address_app').closest('.col-md-4').show();
                $('#app_mobile').closest('.col-md-4').show();
                $('#app_email').closest('.col-md-4').show();
                }
                });
    });



    /* Applicant type radio show hide */

     $(document).on('change', 'input[name="applicant_type"]', function () {
            const selected = $(this).val();

            if (selected === 'personal') {
                $('#app_name').closest('.col-md-4').show();
                $('#app_fname').closest('.col-md-4').show();
                $('#address_app').closest('.col-md-4').show();
                $('#app_mobile').closest('.col-md-4').show();
                $('#app_email').closest('.col-md-4').show();
                $('#dep_name').closest('.col-md-4').hide();
                $('#org_name').closest('.col-md-4').hide();
                $('#app_des').closest('.col-md-4').hide();
                $('#land_alloted_details').closest('.col-md-6').hide();
                $('#org_statement').closest('.col-md-6').hide();
                $('#project_report').closest('.col-md-6').hide();
                $('#ins_allot_purpose').closest('.col-md-6').hide();
                $('#society_benefits').closest('.col-md-6').hide();
                $('#previous_alloted').closest('.col-md-6').hide();
                $('#experience').closest('.col-md-6').hide();
                $('#registered').closest('.col-md-6').hide();
                 $('#reg_number').closest('.col-md-6').hide();
                $('#reg_date').closest('.col-md-6').hide();
                $('#org_reg_certificate_file').closest('.col-md-12').hide();
                $('#inst_reg_registrar').closest('.col-md-6').hide();
                $('#sanstha_vivran').hide();
                $('#sanstha_vivran').next('.content').slideUp();
                $('#sanstha_vivran .plus-minus').text('+');
                $('#sanstha_vivran').removeClass('active');


            } else if (selected === 'orgnization') {
                $('#org_name').closest('.col-md-4').show();
                $('#app_des').closest('.col-md-4').show();
                $('#app_name').closest('.col-md-4').show();
                $('#app_fname').closest('.col-md-4').show();
                $('#address_app').closest('.col-md-4').show();
                $('#app_mobile').closest('.col-md-4').show();
                $('#app_email').closest('.col-md-4').show();
                $('#dep_name').closest('.col-md-4').hide();
                $('#land_alloted_details').closest('.col-md-6').show();
                $('#org_statement').closest('.col-md-6').show();
                $('#project_report').closest('.col-md-6').show();
                $('#ins_allot_purpose').closest('.col-md-6').show();
                $('#society_benefits').closest('.col-md-6').show();
                $('#previous_alloted').closest('.col-md-6').show();
                $('#experience').closest('.col-md-6').show();
                $('#registered').closest('.col-md-6').show();
                 $('#reg_number').closest('.col-md-6').show();
                $('#reg_date').closest('.col-md-6').show();
                $('#org_reg_certificate_file').closest('.col-md-12').show();
                $('#inst_reg_registrar').closest('.col-md-6').show();
                $('#sanstha_vivran').show();
                $('#sanstha_vivran').next('.content').slideDown();
                $('#sanstha_vivran .plus-minus').text('-');
                $('#sanstha_vivran').addClass('active');
                // $('#application_no_sanstha').val(data.data);

            } else if (selected === 'department') {
                $('#dep_name').closest('.col-md-4').show();
                $('#app_des').closest('.col-md-4').show();
                $('#app_name').closest('.col-md-4').show();
                $('#app_fname').closest('.col-md-4').show();
                $('#address_app').closest('.col-md-4').show();
                $('#app_mobile').closest('.col-md-4').show();
                $('#app_email').closest('.col-md-4').show();
                $('#org_name').closest('.col-md-4').hide();
                $('#land_alloted_details').closest('.col-md-6').hide();
                $('#org_statement').closest('.col-md-6').hide();
                $('#project_report').closest('.col-md-6').hide();
                $('#ins_allot_purpose').closest('.col-md-6').hide();
                $('#society_benefits').closest('.col-md-6').hide();
                $('#previous_alloted').closest('.col-md-6').hide();
                $('#experience').closest('.col-md-6').hide();
                $('#registered').closest('.col-md-6').hide();
                 $('#reg_number').closest('.col-md-6').hide();
                $('#reg_date').closest('.col-md-6').hide();
                $('#org_reg_certificate_file').closest('.col-md-12').hide();
                $('#inst_reg_registrar').closest('.col-md-4').hide();
                $('#sanstha_vivran').hide();
                $('#sanstha_vivran').next('.content').slideUp();
                $('#sanstha_vivran .plus-minus').text('+');
                $('#sanstha_vivran').removeClass('active');
            }

        });


    // $(document).on('change', 'input[name="applicant_type"]', function () {
    //         const selected = $(this).val();

    //         if (selected === 'personal') {
    //             $('#app_name').closest('.col-md-4').show();
    //             $('#app_fname').closest('.col-md-4').show();
    //             $('#address_app').closest('.col-md-4').show();
    //             $('#app_mobile').closest('.col-md-4').show();
    //             $('#app_email').closest('.col-md-4').show();
    //             $('#dep_name').closest('.col-md-4').hide();
    //             $('#org_name').closest('.col-md-4').hide();
    //             $('#app_des').closest('.col-md-4').hide();

    //             $('#sanstha_vivran').hide();


    //             $('#sanstha_vivran').next('.content').slideUp();
    //             $('#sanstha_vivran .plus-minus').text('+');

    //             $('#sanstha_vivran').removeClass('active');


    //         } else if (selected === 'orgnization') {
    //             $('#org_name').closest('.col-md-4').show();
    //             $('#app_des').closest('.col-md-4').show();
    //             $('#app_name').closest('.col-md-4').show();
    //             $('#app_fname').closest('.col-md-4').show();
    //             $('#address_app').closest('.col-md-4').show();
    //             $('#app_mobile').closest('.col-md-4').show();
    //             $('#app_email').closest('.col-md-4').show();
    //             $('#dep_name').closest('.col-md-4').hide();

    //             $('#sanstha_vivran').show();
    //             $('#sanstha_vivran').next('.content').slideDown();
    //             $('#sanstha_vivran .plus-minus').text('-');
    //             $('#sanstha_vivran').addClass('active');
    //             $('#application_no_sanstha').val(data.data);

    //         } else if (selected === 'department') {
    //             $('#dep_name').closest('.col-md-4').show();
    //             $('#app_des').closest('.col-md-4').show();
    //             $('#app_name').closest('.col-md-4').show();
    //             $('#app_fname').closest('.col-md-4').show();
    //             $('#address_app').closest('.col-md-4').show();
    //             $('#app_mobile').closest('.col-md-4').show();
    //             $('#app_email').closest('.col-md-4').show();
    //             $('#org_name').closest('.col-md-4').hide();

    //             $('#sanstha_vivran').hide();


    //             $('#sanstha_vivran').next('.content').slideUp();
    //             $('#sanstha_vivran .plus-minus').text('+');

    //             $('#sanstha_vivran').removeClass('active');
    //         }

    //     });

    