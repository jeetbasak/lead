@extends('admin.layouts.app')
@section('title')
<title>Admin | Add Target</title>
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
            
                       <form action="{{route('admin.edit.targets-update')}}" method="post" id="frm">
                        @csrf
                        <input type="hidden" name="id" value="{{@$data->id}}">
                        <div class="top-row">
                            <div class="flx-row my-3">
                                <div class="flx-col">
                                    <label class="form-label">Year</label>
                                     <select class="form-control custom_select" id="year" name="year">
                                      <option selected value="">Select year</option>
                                      @for($i=(date('Y'));$i<=date('Y')+10;$i++)
                                      <option value="{{$i}}" @if(@$data->year==$i) selected @endif>{{$i}}</option>
                                      @endfor
                                    </select>
                                </div>
                                @php
                                $month=array('January','February','March','April','May','June','July','August','September','October','November','December');
                                @endphp
                                <div class="flx-col">
                                    <label class="form-label">Month</label>
                                    <select class="form-control custom_select" id
                                    ="mnt" name="month">
                                      <option selected value="">Select month</option>
                                       @if(date('Y')==$data->year)
                                        @for($i=(date('m'))-1;$i<=count($month)-1;$i++)
                                         <option value="{{@$month[$i]}}" @if(@$data->month==@$month[$i])selected @endif>{{@$month[$i]}}</option>
                                      @endfor
                                      @else
                                      @for($i=0;$i<=count($month)-1;$i++)
                                      <option value="{{@$month[$i]}}" @if(@$data->month==@$month[$i])selected @endif>{{@$month[$i]}}</option>
                                      @endfor
                                      @endif
                                    </select>
                                </div>
                               
                                <div class="flx-col">
                                    <label class="form-label">Salary</label>
                                    <input class="form-control" placeholder="Enter salary" type="text" name="salary" value="{{@$data->salary}}">
                                </div>
                            </div>

                            <div class="flx-row my-3">
                                <div class="flx-col">
                                    <label class="form-label">From Target</label>
                                    <input class="form-control" placeholder="From target" type="text" name="from" id="from" value="{{@$data->from_target}}">
                                </div>

                                <div class="flx-col">
                                    <label class="form-label">To Target</label>
                                    <input class="form-control" placeholder="To target" type="text" name="to" id="to" value="{{@$data->to_target}}">
                                </div>
                                
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
year:{
    required:true,
},
month:{
required:true,
},
salary:{
required:true,
min:1,
},
from:{
required:true,
},
to:{
required:true,
},

},
messages:{

},
submitHandler:function(form){
  var from = parseInt($('#from').val());
  var to = parseInt($('#to').val());
  console.log(from);
  console.log(to);
  if (from>to) {
    alert('From target should be less than to target1');
  } else if(from == to){
        alert('From target should be less than to target2');
  }
  else{
    form.submit();
  }
} 
});
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#year').on('change',function(e){
      e.preventDefault();
      var id = $(this).val();
      $.ajax({
        url:'{{route('admin.get.months')}}',
        type:'GET',
        data:{year:id},
        success:function(data){
          console.log(data);
          $('#mnt').html(data);
        }
      })
    })
  })
</script>
@endsection