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
                           <h2>Grid View</h2>
                      </div>
                    </div>

                    <!-- ----Loop ----->
                        <div class="top-row">
                          <ul class="grid-view-list">
                              <li>Grid View</li>
                              <li>Grid View</li>
                              <li>Grid View</li>
                              <li>Grid View</li>
                              <li>Grid View</li>
                              <li>Grid View</li>
                              <li>Grid View</li>
                              <li>Grid View</li>
                            </ul>
                        </div>
                    <!-- ----Loop ----->                        
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