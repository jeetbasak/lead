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