<link rel="stylesheet" href="wizard/css/style.css" />
<link rel="stylesheet" href="wizard/css/wizard.css" />
@php
    $viewName = Illuminate\Support\Facades\View::getSections()['currentActivePage'];			
    $steps = ['1'=>'निजी जानकारी','2'=>'भूमि चयन','3'=>'संस्था का विवरण','4'=>'भूमि का विवरण','5'=>'दस्तावेज़','6'=>'समाप्त'];
    $activeStepHTML = "class='Active'";
    echo '<ul id="progressbar">';
    foreach($steps as $key=>$value)
    {
        echo "<li>$value</li>";
    }
    echo "</ul>";
@endphp
<!-- 
    <li>भूमि चयन @php echo $viewName == 1 ? 'class="Active"' : '';  @endphp</li>
    <li>संस्था का विवरण</li>
    <li>भूमि का विवरण</li>
    <li>दस्तावेज़</li>
    <li>समाप्त</li>
</ul> -->
<script src="wizard/js/wizard.js"></script>
<script type='text/javascript'>
    setProgress({{ $viewName - 1 }} );
    
// $("#purpose_types").on('change',function(){
//     var purpose_type = $('#purpose_types').val();    
//     var purposeArr = ['Industry','Tourism'];   
//     if(purposeArr.includes(purpose_type)){        
//         $('#land_allotment_rule').val('2').trigger('change');
//         $('#land_allot_rule').val('2');
//         $('#org_type').hide();
//         $('#org_name').hide();
//     }else if(purpose_type == 'Citizen'){        
//         $('#land_allotment_rule').val('1').trigger('change');
//         $('#land_allot_rule').val('1');
//         $('#org_type').show();
//         $('#org_name').show();
//     }    
// });

$(document).ready(function () {
    $('#purpose_types').on('change', function () {
        var purposeType = $(this).val();

        var autoSetRule = {
            'Industry': '2',
            'Tourism': '2',
            'Citizen': '1'
        };

        if (autoSetRule[purposeType]) {
            $('#land_allotment_rule').val(autoSetRule[purposeType]).trigger('change');
            $('#land_allot_rule').val(autoSetRule[purposeType]);
        } else {
            $('#land_allotment_rule').val('').trigger('change');
            $('#land_allot_rule').val('');
        }

        if (purposeType === 'Citizen') {
            $('#org_type').closest('.col-md-4').show();
            $('#org_name').closest('.col-md-4').show();
        } else {
            $('#org_type').closest('.col-md-4').hide();
            $('#org_name').closest('.col-md-4').hide();
        }
    });

    $('#purpose_types').trigger('change');
});


</script>