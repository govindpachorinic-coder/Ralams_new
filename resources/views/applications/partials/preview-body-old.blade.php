<!-- Application Details -->
<h5>Application Details</h5>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td>{{ $application->id ?? '-' }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $application->applicant_name ?? '-' }}</td>
    </tr>
</table>

<!-- Land Details -->
<h5>Land Details</h5>
<table class="table table-bordered">
    <thead><tr><th>Khasra</th><th>Area</th><th>Type</th></tr></thead>
    <tbody>
        @foreach($landDetails as $land)
        <tr>
            <td>{{ $land->khasra_number }}</td>
            <td>{{ $land->area }}</td>
            <td>{{ $land->land_type }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Owner Details -->
<h5>Owner Details</h5>
<table class="table table-bordered">
    <thead><tr><th>Name</th><th>Father</th><th>Address</th></tr></thead>
    <tbody>
        @foreach($landOwners as $owner)
        <tr>
            <td>{{ $owner->owner_name }}</td>
            <td>{{ $owner->father_name }}</td>
            <td>{{ $owner->address }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
