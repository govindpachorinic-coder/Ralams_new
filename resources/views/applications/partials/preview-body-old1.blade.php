<!-- Application Details -->
<h5>
    Application Details
    <!-- <button class="btn btn-sm btn-primary toggle-edit" data-target="#application-edit">Edit</button> -->
</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Application Number</th>
            <th>Name</th>
            <th>F_Name</th>
            <th>Status</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $application->application_number ?? '-' }}</td>
            <td>{{ $application->applicant_name ?? '-' }}</td>
            <td>{{ $application->applicant_fname ?? '-' }}</td>
            <td>{{ $application->status ?? '-' }}</td>
        </tr>
    </tbody>
</table>

<!-- Land Details -->
<h5>Land Details</h5>
<table class="table table-bordered">
    <thead><tr><th>village_code</th><th>proposed_land_area</th><th>irrigation_land</th><th>irrigation_detail</th><br>
    <th>dist_from_SH</th><th>dist_from_NH</th><th>dist_from_RL</th><th>dist_from_City</th><br>
    <th>is_land_surrendered</th><th>surrender_details</th><th>land_type</th><th>development_fees</th><br>
    <th>premium_rate</th><th>challan_number</th><th>challan_date</th><th>other_details</th></tr></thead>
    <tbody>
        @if(!$landDetails->isEmpty())
        @foreach($landDetails as $land)
        <tr>
            <td>{{ $land->village_code }}</td>
            <td>{{ $land->proposed_land_area }}</td>
            <td>{{ $land->irrigation_land }}</td>
            <td>{{ $land->irrigation_detail }}</td>
            <td>{{ $land->dist_from_SH }}</td>
            <td>{{ $land->dist_from_NH }}</td>
            <td>{{ $land->dist_from_RL }}</td>
            <td>{{ $land->dist_from_City }}</td>
            <td>{{ $land->is_land_surrendered }}</td>
            <td>{{ $land->surrender_details }}</td>
            <td>{{ $land->land_type }}</td>
            <td>{{ $land->development_fees }}</td>
            <td>{{ $land->premium_rate }}</td>
            <td>{{ $land->challan_number }}</td>
            <td>{{ $land->challan_date }}</td>
            <td>{{ $land->other_details }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<!-- Owner Details -->
<h5>Owner Details</h5>
<table class="table table-bordered">
    <thead><tr><th>Name</th><th>Father</th><th>Khasra Number</th><th>Address</th></tr></thead>
    <tbody>
        @if(!$landOwners->isEmpty())
        @foreach($landOwners as $owner)
        <tr>
            <td>{{ $owner->owner_name }}</td>
            <td>{{ $owner->owner_fname }}</td>
            <td>{{ $owner->khasra_number }}</td>
            <td>{{ $owner->owner_add1 }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<!-- Doc Details -->
<h5>Documents Details</h5>
<table class="table table-bordered">
    <thead><tr><th>Application Id</th><th>Document Id</th></tr></thead>
    <tbody>
        @if(!$docUploads->isEmpty())
        @foreach($docUploads as $uploads)
        <tr>
            <td>{{ $uploads->application_id }}</td>
            <td>{{ $uploads->document_id }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="Bootstrap/js/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

    $(document).ready(function () {
        $('.toggle-edit').click(function () {
            var target = $($(this).data('target'));
            target.slideToggle(); // toggle the edit section
            var btnText = $(this).text() === 'Edit' ? 'Close' : 'Edit';
            $(this).text(btnText);
        });

        // Optional: Initially hide all edit sections
        $('.edit-section').hide();
    });


    $('.toggle-edit').click(function () {
        var target = $($(this).data('target'));
        target.slideToggle();
        
        var icon = $(this).find('.plus-minus');
        icon.text(icon.text() === '+' ? '-' : '+');
    });

</script> -->

