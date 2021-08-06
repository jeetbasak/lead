@extends('admin.layouts.app')
@section('title')
<title>Admin | Add Faq</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
@endsection
@section('content')






<!-- Start right Content here -->
<!-- ============================================================== -->
 @include('admin.include.errors')
  <div class="container-fluid">
                    <div class="body-main">
                        <div class="top-row">
                            <div class="task-mg-row">
                                <h2 class="my-1">Add Faq</h2>
            
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
                                        <a href="{{route('faq.list')}}" class="link">Back</a>
                                    </li>
                                   </ul>
                                </div>
                          </div>
                        </div>
            
                       <form action="{{route('insert.faq')}}" method="post" id="frm">
                        @csrf
                        <div class="top-row faq-sec">
                            <div class="form-group my-3">
                               <label class="form-label">Question:</label>
                                    {{-- <input class="form-control" placeholder="Enter question" type="text" name="name"> --}}
                                    <textarea class="half-height" name="qus"></textarea>
                              
                                
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label">Answer:</label>
                                    {{-- <input class="form-control" placeholder="Enter answer" type="text" name="address"> --}}
                                    <textarea class="full-width" name="ans"></textarea>
                            </div>

                            <div class="flx-row my-3">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
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
 <script type="text/javascript">
   
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

    

$('#frm').validate({
rules:{
qus:{
required:true,
minlength:5,
},
ans:{
required:true,
minlength:2,

},

},
messages:{
/*   old_password:{
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
},*/
}
});
});
</script>
@endsection