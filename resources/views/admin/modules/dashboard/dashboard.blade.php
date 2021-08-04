@extends('admin.layouts.app')
@section('title')
<title>Admin | Dashboard</title>

@endsection
@section('left_part')
@include('admin.include.left_part')
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
                                        <a href="{{route('admin.change.password')}}" class="link">Change password</a>
                                    </li>
                                   </ul>
                                </div>
                          </div>
                        </div>
            
                  
                        <div class="row">
                          <div class="col-md-6 col-lg-6 col-sm-12 pt-5">
                            <div class="card text-white bg-danger mb-3" style="max-width: 100%;height: 200px">
                              <div class="card-header">Users</div>
                              <div class="card-body">
                                @php 
                                $users=DB::table('users')->whereIn('status',['A','AA','I'])->count();
                                @endphp
                                <h5 class="card-title">Total Users : {{@$users}}</h5>
                              </div>
                          </div>
                        </div>

                          <div class="col-md-6 col-lg-6 col-sm-12 pt-5">
                            <div class="card text-dark bg-warning mb-3" style="max-width: 100%;height: 200px">
                              <div class="card-header">Targets</div>
                              <div class="card-body">
                                @php 
                                $targtes=DB::table('target_management')->where('status','!=','D')->count();
                                @endphp
                                <h5 class="card-title">Total Number Of Targets : {{@$targtes}}</h5>
                               </div>
                            </div>
                          </div>

                          <div class="col-md-6 col-lg-6 col-sm-12 pt-5">
                            <div class="card text-dark bg-info mb-3" style="max-width: 100%;height: 200px">
                              <div class="card-header">Leads</div>
                              <div class="card-body">
                                @php 
                                $leads=DB::table('lead_management')->where('status','!=','D')->count();
                                @endphp
                                <h5 class="card-title">Total Number Of Leads : {{@$leads}} </h5>
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6 col-lg-6 col-sm-12 pt-5">
                            <div class="card text-white bg-primary mb-3" style="max-width: 100%;height: 200px">
                              <div class="card-header">Tutorials</div>
                              <div class="card-body">
                                @php 
                                $tutorial=DB::table('tutorial')->where('status','!=','D')->count();
                                @endphp
                                <h5 class="card-title">Total Number Of Tutorials : {{@$tutorial}} </h5>
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