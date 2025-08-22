@extends('application_layout')

@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "Admin")

@section('content')
    <div class="container-fluid">
      	<div class="d-flex clearfix mt-4">
      		<h3 class="d-inline-block" style="font-size:32px;">{{ __("labels.dashboard") }}</h3>
      		<span class="ml-auto d-inline-block align-self-center"><button type="button" class="btn btn-primary b-btn"><span class="fas fa-download fa-sm"></span> Statistic</button></span>
      	</div>

		
        <!-- Content Row -->

        <div class="my-1" id="b-homedb">

			<div class="container">
				<h4 class="text-center mb-3 b-latest-data">Latest Data</h4>
				<div class="pl-4 text-right" style="font-size: 24px">
					<span class="mr-2" id="one-item-row" style="cursor: pointer;">
						<i class="fas fa-bars"></i>
					</span>
					<span class="mr-2" id="two-item-row" style="cursor: pointer;">
						<i class="fas fa-th-large"></i>
					</span>
					<span class="mr-2" id="three-item-row" style="cursor: pointer;">
						<i class="fas fa-th"></i>
					</span>
				</div>
				
				<div class="">
					<div class="row text-center pl-4" id="sortable-cards">
					    <div class="col-lg-6 col-sm-12 p-3 b-customize">
					        <div class="bg-light p-4 b-dbcard">
					        	<i class="fa fa-wheat position-absolute" style="font-size:35px; right: 40px; top: 40px;"></i> 
					        	<div class=""> 
					        		<p class="text-left font-weight-bold" style="font-size: 14px;">Food grain production</p>
					        		<h3 class="text-left font-weight-bold" style="margin-top: -5px">28.337 Cr tonnes</h3>
					        		<div class="text-left" style="margin: 10px 0px 5px;">
					        			<span class="badge badge-success">+4%</span> 
					        			<span style="font-size:13px;"> From previous period</span>
					        		</div>
					        	</div>
					        </div>
					    </div>

					    <div class="col-lg-6 col-sm-12 p-3 b-customize">
					        <div class="bg-light p-4 b-dbcard">
					        	<i class="fas fa-vial position-absolute" style="font-size:35px; right: 40px; top: 40px;"></i> 
					        	<div class=""> 
					        		<p class="text-left font-weight-bold" style="font-size: 14px;">Soil testing laboratories</p>
					        		<h3 class="text-left font-weight-bold" style="margin-top: -5px">3732</h3>
					        		<div class="text-left" style="margin: 10px 0px 5px;">
					        			<span class="badge badge-success">2%</span> 
					        			<span style="font-size:13px;"> From previous period</span>
					        		</div>
					        	</div>
					        </div>
					    </div>

					    <div class="col-lg-6 col-sm-12 p-3 b-customize">
					        <div class="bg-light p-4 b-dbcard">
					        	<i class="fas fa-tractor position-absolute" style="font-size:35px; right: 40px; top: 40px;"></i> 
					        	<div class=""> 
					        		<p class="text-left font-weight-bold" style="font-size: 14px;">Agricultural land</p>
					        		<h3 class="text-left font-weight-bold" style="margin-top: -5px">39.46 Cr acres</h3>
					        		<div class="text-left" style="margin: 10px 0px 5px;">
					        			<span class="badge badge-success">12%</span> 
					        			<span style="font-size:13px;"> From previous period</span>
					        		</div> 
					        	</div>
					        </div>
					    </div>

					    <div class="col-lg-6 col-sm-12 p-3 b-customize">
					        <div class="bg-light p-4 b-dbcard">
					        	<i class="fas fa-rupee-sign position-absolute" style="font-size:35px; right: 40px; top: 40px;"></i> 
					        	<div class=""> 
					        		<p class="text-left font-weight-bold" style="font-size: 14px;">Budget Allotted</p>
					        		<h3 class="text-left font-weight-bold" style="margin-top: -5px">39,891 Cr</h3>
					        		<div class="text-left" style="margin: 10px 0px 5px;">
					        			<span class="badge badge-success">+28%</span> 
					        			<span style="font-size:13px;"> From previous period</span>
					        		</div>
					        	</div>
					        </div>
					    </div>

					</div>
				</div>

			</div>

		</div>

        <div class="row my-5 mx-sm-5">
        	<div class="col-md-6">
        		<h4 class="text-center">Budget Allotted</h4>
        		<canvas id="basicLineChart2" width="400" height="400"></canvas>
        	</div>
        	<div class="col-md-6">
        		<h4 class="text-center">Major Crops (in percent)</h4>
        		<canvas id="doughnutChart2" width="400" height="400"></canvas>
        	</div>
        </div>
@endsection