@extends('layouts.front_layout')

@section('title', __('labels.project_short_name'))
@section('pagetitle', __('labels.dashboard'))

@section('role_name', 'Admin')
<style>
    .pagination {
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        color: #007bff;
        border: 1px solid #dee2e6;
        padding: 8px 14px;
        font-weight: 500;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination .page-item .page-link:hover {
        background-color: #e9ecef;
    }

    .text-muted {
        display: none;
    }



    .main-content {
        flex: 1;
    }

    .fa {
        color: #ffffff;
    }



    .hover_none {
        text-decoration: none !important;
        color: inherit !important;
    }

    .hover_none:hover {
        text-decoration: none !important;
        color: inherit !important;
    }

    /* Responsive 5-column layout for fixed width cards */
    .col-custom {
        width: 20%;
        float: left;
        padding: 10px;
    }

    @media (max-width: 992px) {
        .col-custom {
            width: 50%;
        }
    }

    @media (max-width: 576px) {
        .col-custom {
            width: 100%;
        }
    }

   .card-container {
        align-items: start;
        display: grid;
        justify-content: center;
    }

    @media (min-width:768px) {
        .card-container {
            grid-template-columns: repeat(auto-fit, 200px);
            grid-gap: 50px;
        }

        .serviceBox {
            width: 200px;
        }
    }

    @media (min-width:1024px) {
        .card-container {
            grid-template-columns: repeat(auto-fit, 220px);
            grid-gap: 70px;
        }

        .serviceBox {
            width: 220px;
        }
    }

    @media (min-width:1690px) {
        .card-container {
            grid-template-columns: repeat(auto-fit, 250px);
            grid-gap: 100px;
        }

        .serviceBox {
            width: 250px;
        }
    }
    .accordion-button:not(.collapsed) {
        border-bottom: 1px solid #0c63e4;
    }

    .accordion-button:not(.collapsed)::after {
        background-image: url(../images/minus.png);
        transform: rotate(-180deg);
    }

    .accordion-button::after {
        flex-shrink: 0;
        width: 1.25rem;
        height: 1.25rem;
        margin-left: auto;
        content: "";
        background-image: url(../images/plus.png);
        background-repeat: no-repeat;
        background-size: 1.25rem;
        transition: transform .2s ease-in-out;
    }
    
    .accordion-button:after {
        order: -1;
        margin-left: 0;
        margin-right: 0.5em;
    }

    .a{
        text-decoration:none;
    }
    
    .serviceBox {
        background: #fff;
        font-family: 'Montserrat', sans-serif;
        text-align: center;
        /* padding: 0px 0px 30px;*/
        /*  margin: 40px auto;*/
        border-radius: 20px;
        box-shadow: 0 7px 5px -3px rgba(0, 0, 0, 0.3);
        position: relative;
        transition: all 0.3s ease;
        margin-bottom: 15px;
        min-height: 165px;
        margin: 0 auto;
    }

    .MainBox:nth-child(1) div {
        border: 2px solid #8f34cf;
    }

    .MainBox:nth-child(2) div {
        border: 2px solid #F39436;
    }

    .MainBox:nth-child(3) div {
        border: 2px solid #038bec;
    }

    .MainBox:nth-child(4) div {
        border: 2px solid #f53986;
    }

    .MainBox:nth-child(5) div {
        border: 0px solid #fff;
        /*border: 2px solid #019694;*/
    }

    .MainBox:nth-child(6) div {
        border: 2px solid #bfc027;
        /*border: 2px solid #019694;*/
    }

    .serviceBox:hover {
        box-shadow: 0 10px 10px rgba(0,0,0,0.2);
    }

    .serviceBox:before,
    .serviceBox:after {
        content: "";
        background: linear-gradient(to top,#008d86,#01a2a6);
        width: 8px;
        border-radius: 0 100px 100px 0;
        position: absolute;
        top: 16px;
        bottom: 18px;
        left: 0;
    }

    .serviceBox:after {
        border-radius: 100px 0 0 100px;
        left: auto;
        right: 0;
    }

    .serviceBox .service-icon {
        color: #fff;
        background: linear-gradient(-45deg, #008d86 49%, #01a2a6 50%);
        font-size: 30px;
        line-height: 62px;
        width: 70px;
        height: 70px;
        margin: -13px auto;
        border-radius: 100px;
        border: 5px solid #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        transform: translateY(-20px);
        transition: all 0.3s ease;
    }

    .serviceBox:hover .service-icon i {
        transform: rotateX(360deg);
        transition: all 0.3s;
    }

    .serviceBox .title {
        color: #008d86;
        font-size: 17px;
        font-weight: 700;
        margin: 10px;
    }

    .serviceBox .description {
        color: #000;
        font-size: 34px;
        line-height: 24px;
        margin: 0;
        font-family: 'digital-7';
    }

    .serviceBox .descriptionPercent {
        color: #000;
        font-size: 20px;
        line-height: 24px;
        margin: 0;
        font-family: Arial;
        padding-top: 7px;
    }

    .serviceBox .description1 {
        margin: 0;
        font-family: Source Sans Pro, sans-serif;
        font-weight: 400;
        font-size: 1rem;
        line-height: 1.5;
        letter-spacing: 0.00938em;
        color: #404040;
        font-size: 12px;
        font-style: italic;
        text-align: center;
    }

    .serviceBox.pink:before,
    .serviceBox.pink:after {
        background: rgb(220, 53, 69);
    }

    .serviceBox.pink .service-icon {
        background: rgb(220, 53, 69);
    }

    .serviceBox.pink .title {
        color:rgb(220, 53, 69);
    }

    .serviceBox.purple:before,
    .serviceBox.purple:after {
        background: rgb(240, 173, 78);
    }

    .serviceBox.purple .service-icon {
        background: rgb(240, 173, 78);
    }

    .serviceBox.purple .title {
        color: rgb(240, 173, 78);
    }

    .serviceBox.blue:before,
    .serviceBox.blue:after {
        background: rgb(92, 184, 92);
    }

    .serviceBox.blue .service-icon {
        background: rgb(92, 184, 92);
    }

    .serviceBox.blue .title {
        color: rgb(92, 184, 92);
    }

    .serviceBox.orange:before,
    .serviceBox.orange:after {
        background: rgb(13, 202, 240);
    }

    .serviceBox.orange .service-icon {
        background: rgb(13, 202, 240);
    }

    .serviceBox.orange .title {
        color: rgb(13, 202, 240);
    }

    .serviceBox.reddishbrown:before,
    .serviceBox.reddishbrown:after {
        background: linear-gradient(to top,#bfc027 49%,#bfc027);
    }

    .serviceBox.reddishbrown .service-icon {
        background: linear-gradient(-45deg,#797901 49%,#bfc027 50%);
    }

    .serviceBox.reddishbrown .title {
        color: #797901;
    }

    @media only screen and (max-width:990px) {
        .serviceBox {
            width: 260px;
        }
    }
  

    .row.mt-5 {
    margin-top: 80px !important;  /* उदाहरण के लिए 80px ऊपर की जगह, आप जरूरत के हिसाब से बढ़ा-घटा सकते हैं */
}
    .wrapper {
      min-height: 50vh;     /* Poori screen ka height */
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;               /* Jitni bachi hui jagah hai, wo le lega */
    }
</style>




@section('content')
    <div class="wrapper">
        <main>
        <div class="my-1" id="b-homedb">
            <div class="container mt-5">
                <div class="container mt-5">
                    <div class="row g-3">
                        <!-- नया आवेदन -->
                        <div class="col-md-4 col-sm-6 col-12 MainBox">
                            <a href="{{ route('new.application') }}" title="">
                                <div class="serviceBox purple">
                                    <div class="service-icon pt-3">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                    <h3 class="title">{{ __('labels.new_application') }}</h3>
                                </div>
                            </a>
                        </div>

                        <!-- लंबित आवेदन -->
                        <div class="col-md-4 col-sm-6 col-12 MainBox">
                            <a href="{{ route('user.get_application', ['type' => 'pending']) }}" title="">
                                <div class="serviceBox orange">
                                    <div class="service-icon pt-3">
                                        <span><i class="fa fa-spinner" aria-hidden="true"></i></span>
                                    </div>
                                    <h3 class="title">{{ __('labels.pending_application') }}</h3>                                                    
                                    <p class="description">
                                        <asp:Label ID="LblMotions" runat="server">{{ $counts->pendingCount ?? 0 }}</asp:Label>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <!-- मेरा नया कार्ड -->
                        <div class="col-md-4 col-sm-6 col-12 MainBox">
                            <a href="{{ route('user.get_application', ['type' => 'processing']) }}" title="">
                                <div class="serviceBox blue">
                                    <div class="service-icon pt-3">
                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    </div>
                                    <h3 class="title">{{ __('labels.processing_application') }}</h3>                                                    
                                    <p class="description">
                                        <asp:Label ID="LblBills" runat="server">{{ $counts->processingCount ?? 0 }}</asp:Label>
                                    </p>
                                </div>
                            </a>
                        </div>

                        <!-- संशोधन के लिए आवेदन -->
                        <div class="col-md-4 col-sm-6 col-12 MainBox">
                            <a href="{{ route('user.get_application', ['type' => 'error']) }}" title="">
                                <div class="serviceBox pink">
                                    <div class="service-icon pt-3">
                                        <span><i class="fa fa-ban" aria-hidden="true"></i></span>
                                    </div>
                                    <h3 class="title">{{ __('labels.error_application') }}</h3>                                                    
                                    <p class="description">
                                        <asp:Label ID="LblHouseSittings" runat="server">{{ $counts->errorCount ?? 0 }}</asp:Label>
                                    </p>
                                </div>
                            </a>
                        </div>

                        <!-- अस्वीकार आवेदन -->
                        <div class="col-md-4 col-sm-6 col-12 MainBox">
                            <a href="{{ route('user.get_application', ['type' => 'reject']) }}" title="">
                                <div class="serviceBox pink">
                                    <div class="service-icon pt-3">
                                        <span><i class="fa fa-ban" aria-hidden="true"></i></span>
                                    </div>
                                    <h3 class="title">{{ __('labels.reject_application') }}</h3>                                                    
                                    <p class="description">
                                        <asp:Label ID="LblHouseSittings" runat="server">{{ $counts->rejectCount ?? 0 }}</asp:Label>
                                    </p>
                                </div>
                            </a>
                        </div>

                        <!-- पूर्ण आवेदन -->
                        <div class="col-md-4 col-sm-6 col-12 MainBox">
                            <a href="{{ route('user.get_application', ['type' => 'complete']) }}" title="">
                                <div class="serviceBox pink">
                                    <div class="service-icon pt-3">
                                        <span><i class="fa fa-ban" aria-hidden="true"></i></span>
                                    </div>
                                    <h3 class="title">{{ __('labels.completed_application') }}</h3>                                                    
                                    <p class="description">
                                        <asp:Label ID="LblHouseSittings" runat="server">{{ $counts->completedCount ?? 0 }}</asp:Label>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>



                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (!empty($getApplication))
                    <div class="container">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-12 p-4">
                                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                    <div class="card-body">
                                        @if ($type == 'pending')
                                            <h2 class="mb-3 text-center text-primary">
                                                {{ __('labels.pending_application_list') }}</h2>
                                        @elseif($type == 'processing')
                                            <h2 class="mb-3 text-center text-primary">
                                                {{ __('labels.processing_application_list') }}</h2>
                                        @elseif($type == 'error')
                                            <h2 class="mb-3 text-center text-primary">
                                                {{ __('labels.error_application_list') }}</h2>
                                        @elseif($type == 'reject')
                                            <h2 class="mb-3 text-center text-primary">
                                                {{ __('labels.rejected_application_list') }}</h2>
                                        @else
                                            <h2 class="mb-3 text-center text-primary">
                                                {{ __('labels.completed_application_list') }}</h2>
                                        @endif

                                        <!-- Added heading with some margin below -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th style="border: 1px solid #dee2e6;">{{ __('labels.S_no') }}</th>
                                                        <th style="border: 1px solid #dee2e6;">{{ __('labels.app_no') }}
                                                        </th>
                                                        <th style="border: 1px solid #dee2e6;">
                                                            {{ __('labels.applicant_purpose') }}</th>
                                                        <th style="border: 1px solid #dee2e6;">
                                                            {{ __('labels.application_date') }}</th>
                                                        <th style="border: 1px solid #dee2e6;">{{ __('labels.rules') }}
                                                        </th>
                                                        <th style="border: 1px solid #dee2e6;">{{ __('labels.action') }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="applicant_details">
                                                    @if (count($getApplication) > 0)
                                                        @foreach ($getApplication as $k => $application)
                                                            <tr id="row_101">
                                                                <td>{{ ($getApplication->currentPage() - 1) * $getApplication->perPage() + $loop->iteration }}
                                                                </td>
                                                               <td><a href="javascript:void();"
                                                                            onclick="loadPreview('{{ $application->application_number }}')"
                                                                            title="View">
                                                                            {{ $application->application_number }}
                                                                        </a>

                                                                    </td>
                                                                <td>{{ $application->purpose->purpose_name ?? '-' }}</td>
                                                                <td>{{ $application->created_at->format('d-m-Y') }}</td>
                                                                <td>{{ $application->rule->application_rule_name ?? '-' }}
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void();"
                                                                        onclick="loadPreview('{{ $application->application_number }}')"
                                                                        class="btn btn-sm btn-info" title="View">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    </a>

                                                                    <!-- Delete Button with Icon -->
                                                                    @if ($type == 'pending')
                                                                        <form
                                                                            action="{{ route('user.delete_application', $application->id) }}"
                                                                            method="POST" class="d-inline"
                                                                            onsubmit="return confirm('Are you sure?')">
                                                                            @csrf

                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-danger"
                                                                                title="Delete">
                                                                                <i class="fa fa-trash"
                                                                                    aria-hidden="true"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="6" style="text-align: center">
                                                                {{ __('labels.records_not_found') }}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {!! $getApplication->links('pagination::bootstrap-5') !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        </main>
        </div>   
@endsection
