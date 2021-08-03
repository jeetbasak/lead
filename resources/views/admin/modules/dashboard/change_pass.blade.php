@extends('admin.layouts.app')
@section('title')
<title>Admin | Change password</title>
@endsection
@section('left_part')
@include('admin.include.left_part')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')






<!-- Start right Content here -->
<!-- ============================================================== -->
@include('admin.include.errors')
 <div class="container-fluid">
                    <div class="body-main">
                        <div class="top-row">
                            <div class="task-mg-row">
                                <h2 class="my-1"> Change password </h2>
            
                                <div class="right-sec">
                                   <ul>
                                  {{--   <li>
                                        <a href="#"><i class="fa incomplete-icon"></i> Incomplete task</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa sort-icon"></i> Sort</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa customize-icon"></i> Customize</a>
                                    </li> --}}
                                    <li>
                                        <a href="{{route('admin.dashboard.home')}}" class="link">Back</a>
                                    </li>
                                   </ul>
                                </div>
                          </div>
                        </div>
            
                       <form action="{{route('admin.pass.update')}}" method="post" id="frm">
                        @csrf
                        <div class="top-row">
                            <div class="flx-row my-3">
                                <div class="flx-col">
                                    <label class="form-label">Old password</label>
                                    <input class="form-control" placeholder="Enter old password" type="text" name="old_password">
                                </div>
                                <div class="flx-col">
                                    <label class="form-label">New password</label>
                                    <input class="form-control" placeholder="Enter new password" type="text" name="newPassword">
                                </div>
                                <div class="flx-col">
                                    <label class="form-label">Confirm new password</label>
                                    <input class="form-control" placeholder="confirm new password" type="text" name="confirm">
                                </div>
                            </div>
                           

                            <div class="flx-row my-3">
                                <button type="submit" class="btn btn-primary mb-2">Change password</button>
                            </div>
                        </div>
                    </form>
            
                       
            
            
                        
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
{{-- for datatable --}}

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script> 
         <script>
            $(document).ready(function(){
                $('#frm').validate({

                    rules:{
                        old_password:{
                            required:true,
                            minlength:6,                           
                        },
                        newPassword:{
                            required:true,
                            minlength:6,                           
                        },
                        confirm:{
                            required:true,
                            minlength:6,
                             equalTo : '[name="newPassword"]'                           
                        },

                    },
                    messages:{
                         old_password:{
                            required:" Old password is mandatory",
                            min:"Enter minimum 6 characters"
                        },
                         newPassword:{
                            required:" New password is mandatory",
                            min:"Enter minimum 6 characters"
                        },
                         confirm:{
                            required:" Confirm password is mandatory",
                            min:"Enter minimum 6 characters",
                            equalTo :"New password and confirm password are not matching"
                        },

                    }


                });

            });
        </script>
@endsection