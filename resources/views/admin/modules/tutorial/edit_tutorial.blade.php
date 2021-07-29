@extends('admin.layouts.app')
@section('title')
<title>Admin | Edit tutorial</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
<style type="text/css">
    .custom_select{
        padding: 10px;
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
                                <h2 class="my-1">Add Target</h2>
            
                                <div class="right-sec">
                                   <ul>
                                   
                                    <li>
                                        <a href="{{route('tutorial.list')}}" class="link">Back</a>
                                    </li>
                                   </ul>
                                </div>
                          </div>
                        </div>
            
                       <form action="{{route('tutorial.update')}}" method="post" id="frm">
                        @csrf
                        <div class="top-row">
                           <input type="hidden" name="id" value="{{@$tutorial->id}}">
                            <div class="flx-row my-3">
                                <div class="flx-col">
                                    <label class="form-label">Title</label>
                                    <input class="form-control" placeholder="From target" type="text" name="title" id="title" value="{{$tutorial->title}}">
                                </div>
                            </div>

                             <div class="row">

                              
                                      <label for="CategoryName">Video</label>
                                        
                                        <textarea id="mytextarea2" style="width: 100%;height: 350px" name="video" id="video" >{!!@$tutorial->video!!}</textarea>
                             
                                <style>
                                    .tox.tox-tinymce{
                                    height: 400px !important;
                                    width: 100% !important;
                                    }
                                    </style>
                                
                                <div class="flx-col">
                                    
                                </div>
                                
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
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.0/tinymce.min.js" integrity="sha512-XaygRY58e7fVVWydN6jQsLpLMyf7qb4cKZjIi93WbKjT6+kG/x4H5Q73Tff69trL9K0YDPIswzWe6hkcyuOHlw==" crossorigin="anonymous"></script>
<script>
tinymce.init({
selector: "#mytextarea2",
forced_root_block : "",

plugins: [

"insertdatetime media nonbreaking save  contextmenu directionality",

],

toolbar2: "print preview media ",
image_advtab: true,
templates: [
{title: 'Test template 1', content: 'Test 1'},
{title: 'Test template 2', content: 'Test 2'}
]
});


</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
   jQuery.validator.addMethod("emailonly", function(value, element) {
    return this.optional(element) || /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(value.toLowerCase());
    }, "Enter valid email");

$('#frm').validate({
rules:{

title:{
required:true,
},
to:{
required:true,
},

},
messages:{

},

});
});
</script>

@endsection