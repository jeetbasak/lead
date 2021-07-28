@extends('admin.layouts.app')
@section('title')
<title>Admin | View lead</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
<style type="text/css">
    p{
        font-weight: 600;
        font-size: 13px;
    }
</style>
@endsection
@section('content')






<!-- Start right Content here -->
<!-- ============================================================== -->
 @include('admin.include.errors')
  <div class="container-fluid">
                    <div class="body-main">
                        <div class="top-row">
                            <div class="task-mg-row">
                                <h2 class="my-1">View User</h2>
            
                                <div class="right-sec">
                                   <ul>
                                    <li>
                                        <a href="#"><i class="fa incomplete-icon"></i> Incomplete task</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa sort-icon"></i> Sort</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa customize-icon"></i> Customize</a>
                                    </li>
                                    <li>
                                        <a href="#" class="link">Send feedback</a>
                                    </li>
                                   </ul>
                                </div>
                          </div>
                        </div>
            
                      <div class="card text-white bg-danger">
                            <div class="row" style="padding: 15px;">
                                <div class="col-md-3 pt-4">
                                    <p>Name : {{@$data->name}}</p>
                                </div>
                                <div class="col-md-3 pt-4">
                                    <p>Email : {{@$data->email}}</p>
                                </div>
                                <div class="col-md-3 pt-4">
                                    <p>Phone Number : {{@$data->ph}}</p>
                                </div>
                                @if(@$data->last_qualification!="")
                                <div class="col-md-3 pt-4">
                                    <p>Last Qualification : {{@$data->last_qualification}}</p>
                                </div>
                                @endif

                                <div class="col-md-3 pt-4">
                                    <p>Country : {{@$data->country_user->name}}</p>
                                </div>
                                <div class="col-md-3 pt-4">
                                    <p>State : {{@$data->state_user->name}}</p>
                                </div>
                                <div class="col-md-3 pt-4">
                                    <p>Pin Code : {{@$data->pin_code}}</p>
                                </div>
                                <div class="col-md-3 pt-4">
                                    <p>Status : @if(@$data->status=="AA")Awating Approval @elseif(@$data->status=="A")Active @elseif(@$data->status=="I")Inactive @endif</p>
                                </div>

                                @if(@$data->work_exp!="")
                                <div class="col-md-3 pt-4">
                                    <p>Work Experience : @if(@$data->work_exp=='Y')Yes @else No @endif</p>
                                </div>
                                @endif

                                @if(@$data->laptop_access!="")
                                <div class="col-md-3 pt-4">
                                    <p>Laptop Access : @if(@$data->laptop_access=='Y')Yes @else No @endif</p>
                                </div>
                                @endif

                                @if(@$data->company_ph!="")
                                <div class="col-md-3 pt-4">
                                    <p>Company Phone : {{@$data->company_ph}}</p>
                                </div>
                                @endif

                                @if(@$data->image!="")
                                <div class="col-md-12 pt-4">
                                    <p>Profile Image: <img src="{{ URL::to('storage/app/public/profile')}}/{{@$data->image}}" alt="" style="height: 150px;width: 150px"></p>
                                </div>
                                @endif


                                 @if(@$data->image!="")
                                <div class="col-md-12 pt-4">
                                    <p>Adhar Image: <img src="{{ URL::to('storage/app/public/adhar')}}/{{@$data->adher}}" alt="" style="height: 150px;width: 150px"></p>
                                </div>
                                @endif

                                @if(@$data->pan!="")
                                <div class="col-md-12 pt-4">
                                    <p>Adhar Image: <img src="{{ URL::to('storage/app/public/pan')}}/{{@$data->pan}}" alt="" style="height: 150px;width: 150px"></p>
                                </div>
                                @endif


                            </div>
                        


                      </div>  
            
                       
            
            
                        
                      </div>
                </div>
            </div>
        </div>

<!-- ============================================================== -->
<!-- End Right content here -->






{{-- @section('footer')
@include('admin.include.footer')
@endsection --}}
@endsection
{{-- end content --}}
@section('script')
@include('admin.include.script')

@endsection