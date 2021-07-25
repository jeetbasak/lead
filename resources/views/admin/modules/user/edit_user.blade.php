@extends('admin.layouts.app')
@section('title')
<title>Admin | Edit lead</title>
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
                                <h2 class="my-1">Edit Lead</h2>
            
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
            
                       <form action="{{route('admin.user.update')}}" method="post" id="frm">
                        @csrf
                        <input type="hidden" name="id" value="{{@$data->id}}">
                        <div class="top-row">
                            <div class="flx-row my-3">
                                <div class="flx-col">
                                    <label class="form-label">Name</label>
                                    <input class="form-control" placeholder="Enter name" type="text" name="name" value="{{@$data->name}}">
                                </div>

                                <div class="flx-col">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" placeholder="Enter email" id="email" type="text" name="email" value="{{@$data->email}}">
                                </div>
                                <div class="flx-col"></div>
                            </div>
                                

                            <div class="flx-row my-3">
                                <button type="submit" class="btn btn-primary mb-2"> Edit </button>
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

    jQuery.validator.addMethod("emailonly", function(value, element) {
    return this.optional(element) || /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(value.toLowerCase());
    }, "Enter valid email");

$('#frm').validate({
rules:{
name:{
required:true,
minlength:3,
},
email:{
required:true,
minlength:3,
emailonly: true,
remote: {
                          url:  '{{route('admin.user.check.email')}}',
                          type: "POST",
                          data: {
                            email: function() {
                              return $( "#email").val() ;
                            },
                            _token: '{{ csrf_token() }}',
                            id:'{{@$data->id}}',
                          },
                   },
},

},
messages:{
email:{
    required:'Please enter email',
    remote:'Email already added',
}
}
});
});
</script>
@endsection