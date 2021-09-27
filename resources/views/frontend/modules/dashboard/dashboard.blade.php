@extends('layouts.app')
@section('title')
<title>User | Home</title>
@endsection
@section('left_part')
@include('frontend.include.left_part')
@endsection
@section('content')


<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="container-fluid">
  <div class="body-main">
    <div class="top-row">
      <div class="task-mg-row">
        <div class="dropdown">
          
        </div>
        
        <div class="right-sec">
          <ul>
            
            <li>
              <a href="{{route('user.change.password')}}" class="link">Change password</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    
    
    
    
    <div class="top-row">
      <div id="accordionExample">
        <div class="accordion-item">
          <p class="panel-title" id="headingOne">
            <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
              Recently assigned lead
            </a>
          </p>
          @php
          @$lead=DB::table('lead_management')->where('tagging_id',Auth()->user()->id)->orderBy('id','desc')->first();
          @endphp
          <div id="collapseOne" class="accordion-collapse collapse show">
            <div class="t-mid-row b-0">
              <div class="name-col"><i class="fa incomplete-icon"></i> {{@$lead->user_name}} ( Email: {{@$lead->user_email}} , Mobile: {{@$lead->ph}}  )</div>
              <div class="date-col dt">{{ date('d-M-Y', strtotime(@$lead->application_date)) }}</div>
              <div class="pro-col"><span class="tean-bg"><i class="fa fa-dot"></i> </span></div>
            </div>
          </div>
        </div>
        @php

        $user=DB::table('users')->where('id',Auth()->user()->id)->first();
        $offer=$user->offer_latter;

        @endphp
        @if($offer)
        <div class="accordion-item">
          <p class="panel-title" id="headingOne">
            <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true">
              Offer Letter
            </a>
          </p>
          <div id="collapseTwo" class="accordion-collapse collapse">
            <div class="t-mid-row b-0">
              <div class="name-col"><i class="fa incomplete-icon"></i><img src="{{ URL::to('public/storage/offerlatter/')}}/{{@$offer}}" alt="" style="height: 150px;width: 200px"></div>
              
              <div class="pro-col"><span class="tean-bg"><i class="fa fa-dot"></i> <a href="{{route('download',$user->id)}}">Download</a> </span></div>
            </div>
          </div>
        </div>
        @endif
        
        {{--   <div class="accordion-item">
          <p class="panel-title" id="headingOne">
            <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true">
              Do next week
            </a>
          </p>
          <div id="collapseThree" class="accordion-collapse collapse">
            <div class="t-mid-row b-0">
              <div class="name-col"><i class="fa incomplete-icon"></i> Satish Sarkar</div>
              <div class="date-col dt">Jul-15 today</div>
              <div class="pro-col"><span class="tean-bg"><i class="fa fa-dot"></i> TEAM123</span></div>
            </div>
          </div>
        </div> --}}
        {{--     <div class="accordion-item">
          <p class="panel-title" id="headingOne">
            <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true">
              Do later
            </a>
          </p>
          <div id="collapseFour" class="accordion-collapse collapse">
            <div class="t-mid-row b-0">
              <div class="name-col"><i class="fa incomplete-icon"></i> Satish Sarkar</div>
              <div class="date-col dt">Jul-15 today</div>
              <div class="pro-col"><span class="tean-bg"><i class="fa fa-dot"></i> TEAM123</span></div>
            </div>
          </div>
        </div>  --}}
        
        
      </div>
    </div>
    {{-- end top row --}}
    <div class="top-row flx-box-row" style="margin-top: 20px">
      
      <div class="card text-dark mb-3" style="height: 170px;">
        <div class="card-header bg-deepblue text-white">
          Recent Month Target
        </div>
        <div class="card-body bg-light ">
          <h6 class="card-title"> @if(@$user_to_targets) total targets range:  [ {{@$user_to_targets->targett->from_target}} - {{@$user_to_targets->targett->to_target}} ]</h6>
          <h6 class="card-title">achived targets : {{@$user_to_targets->user_target_achived}}</h6>
          @else
          <p> No target given </p>
          @endif
          {{-- <a href="#" class="btn btn-success">Go To</a> --}}
        </div>
      </div>
      <div class="card mb-3" style="height: 170px;">
        <div class="card-header text-white bg-success">
          Total Salary (overall)
        </div>
        <div class="card-body bg-light text-dark">
          <h6 class="card-title">total salary : {{@$total_salary}}</h6>
          {{-- <a href="#" class="btn btn-primary">Go To</a> --}}
        </div>
      </div>
      
      <div class="card text-dark mb-3" style="height: 170px;">
        <div class="card-header bg-primary text-white">
          Total Completed Lead ( overall )
        </div>
        <div class="card-body bg-light">
          <h6 class="card-title">total completed lead : {{@$Manage_lead}}</h6>
          {{-- <a href="#" class="btn btn-primary">Go To</a>
        --}}                                </div>
      </div>
      <div class="card text-dark mb-3" style="height: 170px;">
        <div class="card-header bg-warning">
          Total Achived Targets (overall)
        </div>
        <div class="card-body bg-light">
          <h6 class="card-title">total achivement : {{@$total_achive}}</h6>
          {{-- <a href="#" class="btn btn-danger">Go To</a> --}}
        </div>
      </div>
      
      
      
    </div>
  </div>
</div>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->

{{-- @section('footer')
@include('frontend.include.footer')
@endsection --}}
@endsection
{{-- end content --}}
@section('script')
@include('frontend.include.script')
@endsection