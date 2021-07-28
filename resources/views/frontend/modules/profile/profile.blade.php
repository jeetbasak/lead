@extends('admin.layouts.app')
@section('title')
<title>User | Profile</title>
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
                                <h2 class="my-1">Profile</h2>
            
                          </div>
                        </div>
            
                       <form action="{{route('user.my.profile-edit')}}" method="post" id="frm" enctype="multipart/form-data">
                        @csrf
                        <div class="top-row">
                            <div class="flx-row my-3">
                                <div class="flx-col">
                                    <label class="form-label">Name</label>
                                    <input class="form-control" value="{{auth()->user()->name}}" placeholder="Enter name" type="text" name="name">
                                </div>

                                {{-- <div class="flx-col">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" placeholder="Enter email" value="{{auth()->user()->email}}" type="text" name="email">
                                </div> --}}
                                <div class="flx-col">
                                    <label class="form-label">Phone Number</label>
                                    <input class="form-control" value="{{auth()->user()->ph}}" placeholder="Enter phone number" type="text" name="ph">
                                </div>
                                 <div class="flx-col">
                                    <label class="form-label">Address</label>
                                    <input class="form-control" value="{{auth()->user()->address}}" placeholder="Enter address" type="text" name="address">
                                </div>
                            </div>
                            <div class="flx-row my-3">
                               

                                <div class="flx-col">
                                    <label class="form-label">City Name</label>
                                    <input class="form-control" value="{{auth()->user()->city_name}}" placeholder="Enter city" type="text" name="city">
                                </div>

                                <div class="flx-col">
                                    <label class="form-label">Pin Code</label>
                                    <input class="form-control" value="{{auth()->user()->pin_code}}" placeholder="Enter pincode" type="text" name="pin_code">
                                </div>

                                 <div class="flx-col"> 
                                    <label>Any work experience?</label>
                                    <div class="d-flex">
                                        <div class="custom-redio">
                                            <input class="custom-control-input" @if(auth()->user()->work_exp=="Y") checked @endif type="radio" name="work_exp" value="Y"> <label>Yes</label>
                                        </div> 
                                        <div class="custom-redio">
                                            <input class="custom-control-input" @if(auth()->user()->work_exp=="N") checked @endif  type="radio" name="work_exp" value="N"> <label>No</label>
                                        </div>
                                    </div>                                                     
                                </div>


                            </div>

                            <div class="flx-row my-3">
                            <div class="flx-col"> 
                                    <label>Any work experience?</label>
                                    <div class="d-flex">
                                        <div class="custom-redio">
                                            <input class="custom-control-input" @if(auth()->user()->work_exp=="Y") checked @endif type="radio" name="work_exp" value="Y"> <label>Yes</label>
                                        </div> 
                                        <div class="custom-redio">
                                            <input class="custom-control-input" @if(auth()->user()->work_exp=="N") checked @endif  type="radio" name="work_exp" value="N"> <label>No</label>
                                        </div>
                                    </div>                                                     
                                </div>

                        <div class="flx-col"> 
                             <label class="form-label">Country</label>
                            <select class="form-control form-select" name="country" id="country">
                            <option value="">Select Country</option>
                                @foreach(@$country as $value)
                                <option value="{{@$value->id}}" @if(auth()->user()->country_id==@$value->id) selected @endif>{{@$value->name}}</option>
                                @endforeach
                            </select>                                       
                        </div>

                        <div class="flx-col"> 
                             <label class="form-label">State</label>
                            <select class="form-control form-select" name="state" id="states">
                                <option value="" >Select Country</option>
                                @foreach(@$state as $value)
                                <option value="{{@$value->id}}" @if(auth()->user()->state_id==@$value->id) selected @endif>{{@$value->name}}</option>
                                @endforeach
                            </select>                                       
                        </div>
                    </div>


                    <div class="flx-row my-3">
                         <div class="flx-col"> 
                             <label class="form-label">Your Last Qualification?</label>
                              <select class="form-control form-select" name="qualification" >
                             <option selected value="">Select</option>
                                <option value="Class 10" @if(auth()->user()->last_qualification=='Class 10') selected @endif>Class 10?</option>
                                <option value="Class 12" @if(auth()->user()->last_qualification=='Class 12') selected @endif>Class 12?</option>
                                <option value="Graduated?" @if(auth()->user()->last_qualification=='Graduated') selected @endif>Graduated?</option>
                                </select>                                       
                        </div>

                        <div class="flx-col">
                                    <label class="form-label">Company Phone</label>
                                    <input class="form-control" value="{{auth()->user()->company_ph}}" placeholder="Enter company number" type="text" name="company_ph">
                         </div>

                         <div class="flx-col"> 
                                    <label>Laptop Access ?</label>
                                    <div class="d-flex">
                                        <div class="custom-redio">
                                            <input class="custom-control-input" @if(auth()->user()->laptop_access=="Y") checked @endif checked type="radio" name="laptop" value="Y"> <label>Yes</label>
                                        </div> 
                                        <div class="custom-redio">
                                            <input class="custom-control-input" @if(auth()->user()->laptop_access=="N") checked @endif  type="radio" name="laptop" value="N"> <label>No</label>
                                        </div>
                                    </div>                                                     
                                </div>
                    </div>

                    <div class="flx-row my-3">
                        <div class="flx-col"> 
                                    <label>Profile Image</label>
                                    <input type="file" class="upload" data-multiple-caption="{count} files selected" multiple="" name="profile" id="file-2" onChange="fun2();" accept="image/*">
                    </div>  

                     <div class="flx-col"> 
                            
                                <div class="uplodimgfilimg profile_img ad_rbn_001" style="display: none;width: 100%;height: 100px;" >
                                    <img src="" alt=""id="img3"  style="height: 150px;width: 150px" >
                                </div>
                               
                   </div>  
                    <div class="flx-col">
                     <label>Previous Profile Image</label> 
                        @if(auth()->user()->image!="")
                        <div style="width: 100%;height: 100px;"> 
                            <img src="{{ URL::to('storage/app/public/profile')}}/{{auth()->user()->image}}" alt="" style="height: 150px;width: 150px">
                        </div>
                        @else
                        No Image
                        @endif
                         </div>
                     </div>

                 






                    <div class="flx-row" style="margin-top: 100px; margin-bottom: 100px">
                         <div class="flx-col"> 
                                    <label>Adhar Image</label>
                                    <input type="file" class="upload" data-multiple-caption="{count} files selected" multiple="" name="adhar" id="file-1" onChange="fun();" accept="image/*">
                         </div>  
                         
                         <div class="flx-col"> 
                            
                                <div class="uplodimgfilimg adhar ad_rbn_001" style="display: none;width: 100%;height: 100px;" >
                                    <img src="" alt=""id="img2"  style="height: 150px;width: 150px" >
                                </div>
                               
                         </div> 
                          <div class="flx-col"> 
                            <div class="flx-col">
                             <label>Previous Adhar</label> 
                                @if(auth()->user()->adher!="")
                                <div style="width: 100%;height: 100px;"> 
                                    <img src="{{ URL::to('storage/app/public/adhar')}}/{{auth()->user()->adher}}" alt="" style="height: 150px;width: 150px">
                                </div>
                                @else
                                No Image
                                @endif
                                 </div>
                         </div>
                    </div>  

                    <div class="flx-row my-3" style="margin-top: 100px;">
                         <div class="flx-col"> 
                                    <label>Pan Image</label>
                                    <input type="file" class="upload" data-multiple-caption="{count} files selected" multiple="" name="pan" id="file-3" onChange="fun3();" accept="image/*">
                         </div>  
                         <div class="flx-col"> 
                            
                                <div class="uplodimgfilimg pan ad_rbn_001" style="display: none;width: 100%;height: 100px;" >
                                    <img src="" alt=""id="img1"  style="height: 150px;width: 150px" >
                                </div>
                               
                         </div> 
                          <div class="flx-col"> 
                            <div class="flx-col">
                             <label>Previous Pan</label> 
                                @if(auth()->user()->pan!="")
                                <div style="width: 100%;height: 100px;"> 
                                    <img src="{{ URL::to('storage/app/public/pan')}}/{{auth()->user()->pan}}" alt="" style="height: 150px;width: 150px">
                                </div>
                                @else
                                No Image
                                @endif
                                 </div>
                         </div>
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
 <script type="text/javascript">
   
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
  <script>
        function fun(){
        var i=document.getElementById('file-1').files[0];
        //console.log(i);
        var b=URL.createObjectURL(i);
        $(".adhar").show();
        $("#img2").attr("src",b);
    }
    </script>

      <script>
        function fun2(){
        var i=document.getElementById('file-2').files[0];
        //console.log(i);
        var b=URL.createObjectURL(i);
        $(".profile_img").show();
        $("#img3").attr("src",b);
    }
    </script>

   <script>
        function fun3(){
        var i=document.getElementById('file-3').files[0];
        //console.log(i);
        var b=URL.createObjectURL(i);
        $(".pan").show();
        $("#img1").attr("src",b);
    }
    </script>
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
},
ph:{
required:true,
minlength:10,

},
address:{
required:true,
minlength:3,
},
city:{
    required:true,
},
country:{
    required:true,
},
state:{
    required:true,
},
qualification:{
    required:true,
},
company_ph:{
    required:true,
},
profile:{
   required: function(element){
            var img ='{{auth()->user()->image}}';
            if(img == null || img == "")
            return true;
            else
            return false;
        },
},
},
messages:{

}
});
});
</script>
    <script type="text/javascript">
  $(document).ready(function(){
    $('#country').on('change',function(e){
      e.preventDefault();
      var id = $(this).val();
      // alert(id);
      $.ajax({
        url:'{{route('dashboard.get.state')}}',
        type:'GET',
        data:{country:id,state:'{{auth()->user()->state_id}}'},
        success:function(data){
          console.log(data);
          $('#states').html(data.state);
        }
      })
    })
  })
</script>
@endsection