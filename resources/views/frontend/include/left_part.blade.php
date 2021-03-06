@section('head')
@include('admin.include.head')
{{-- for modal --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
{{-- modal end --}}


{{-- for share --}}
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
{{-- for share end--}}
<style>

</style>


@endsection
 <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">                     
                      <h4 class="modal-title">Share with people</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <p>your refferal link: <b style="font-size: 10px">{{url('/')}}/register-reffer/{{auth()->user()->email}}/{{auth()->user()->id}}</b></p>
                      <div id="share1"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
<!-- Sidebar-->
@php
@$splitName = explode(' ',  Auth::user()->name, 2);
@$first_name = $splitName[0];
@endphp
<div class="border-end bg-deepblue" id="sidebar-wrapper">
 <div class="sidebar-heading"><a class="logo" href="{{route('dashboard.home')}}"><img src="{{url('/')}}/public/admin/assets/images/logo-task.png"></a>  <a class="menuclose"><i class="fa fa-close"></i></a></div>
  
  <div class="list-group list-group-flush">
    <a class="{{request()->segment(1)=='home'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('dashboard.home')}}"><i class="fa fa-home-b"></i> <span>Home</span></a>

    @php
    @$noti=DB::table('notification')->where('is_read','UR1')->where('user_type','U')->where('user_id',auth()->user()->id)->count();
    @endphp


    <a class="{{request()->segment(1)=='notification'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.notification')}}"><i class="fa fa-bell-n"></i><span>Notifications <span class="badge" style="background-color: red" id="count_noti">{{@$noti}}</span></span></a>


    <a class="{{request()->segment(1)=='target'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.target')}}"><i class="fa fa-target"></i><span>My Target</span></a>


    <a class="{{request()->segment(1)=='my-lead'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.lead')}}"><i class="fa lead-icon"></i><span>My Lead</span></a>

    
    <a class="{{request()->segment(1)=='salary'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.salary')}}"><i class="fa mony-icon"></i><span>My Monthly Salary </span></a>


    <a class="{{request()->segment(1)=='profile'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('user.my.profile')}}"><i class="fa user-icon"></i><span>My Profile </span></a>

    {{-- 
    <a class="list-group-item-action left-nav" href="#"><i class="fa fa-reports"></i><span>Reports</span></a> --}}


    <a class="{{request()->segment(1)=='tutorial'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.tutorial')}}"><i class="fa fa-tutorials"></i><span>Tutorials</span></a>


   {{--  <a class="{{request()->segment(1)=='reffer'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.share')}}"><i class="fa fa-tutorials"></i><span>Share</span></a>

 --}}    


 <a class="list-group-item-action left-nav" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      <i class="fa fa-sign-out" aria-hidden="true"></i>
      &nbsp;Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
  
  <div class="bottom-nav">
    <ul>
      {{-- <li><a class="{{request()->segment(1)=='faq'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.faq.list')}}"><i class="fa help-icon">?</i> <span> FAQ</span></a></li> --}}
      <li><a href="{{route('tc')}}"><i class="fa term-icon"></i> <span> Terms & condiotion</span></a></li>
     
    </ul>
  </div>
</div>
<!-- Page content wrapper-->
<div id="page-content-wrapper">
  <!-- Top navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-shadow border-bottom">
    <div class="container-fluid">
      <div id="sidebarToggle"><a onclick="w3_open()"><i class="fa fa-bars"></i></a></div>
      <div class="flx-row">
        <div class="head-left">
          <div class="task-img"><img src="{{url('/')}}/storage/app/public/profile/{{Auth::user()->image}}" style="width:100%;height:50px !important " alt="DP"></div>
          <div class="task-nemu">
            <div class="dropdown">
              <p class="nav-link" href="#" role="button">{{ucfirst(request()->segment(1))}} Management</p>
            {{--   <ul class="dropdown-menu">
                <li><a href="#">Phantom</a></li>
                <li><a href="#">Cluster</a></li>
                <li><a href="#">Phantom</a></li>
                <li><a href="#">Cluster</a></li>
              </ul> --}}
            </div>
            
            <ul>
              {{-- for lead start --}}
              {{--  @if(request()->segment(2)=='lead')
              <li><a href="{{route('lead.list')}}" @if(!request()->segment(3)) class="active"  @endif>List</a></li>
              @endif
              @if(request()->segment(2)=='lead')
              <li><a href="{{route('lead.completed')}}" @if(request()->segment(3)=='completed') class="active" @endif>Completed </a></li>
              @endif --}}
              {{-- for lead end --}}
              {{-- <li><a href="#">Target</a></li> --}}
              <li><a href="#" class="active">List</a></li>
              {{-- <li><a href="#">Pending</a></li>
              <li><a href="#">Target</a></li> --}}
            </ul>
          </div>
        </div>
         <span style="margin-top: 12px;color: black;text-align: left;font-size: 20px" > <b>Hello  {{@$first_name}}</b></span>
        <div class="head-right">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">...</button>
         
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mt-lg-0">
            
              <li><a href="#" class="share-btn" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock" style="color:lime"></i>Share</a></li>
              <!-- Modal -->
             
              <li class="search">
                <form>
                  <input type="text" id="myInputTextField">
                </form>
              </li>
              
            </ul>
          </div>
        </div>
        
        
      </div>
    </nav>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
{{url('/')}}/register-reffer/{{auth()->user()->email}}/{{auth()->user()->id}} --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    <script>
        $("#share1").jsSocials({
          url:"{{url('/')}}/register-reffer/{{auth()->user()->email}}/{{auth()->user()->id}}",
          text:"\n Regester using this refferal link\n",
          
            shares: ["email", "twitter", "facebook", "googleplus", "whatsapp"]
        });
    </script>

    {{-- <script>
      $("#share1").jsSocials({
    shares: [{
        renderer: function() {
            var $result = $("<div>");

            var script = document.createElement("script");
            script.src = "https://apis.google.com/js/platform.js";
            $result.append(script);

            $("<div>").addClass("g-plus")
                .attr({
                    "data-action": "share",
                    "data-annotation": "bubble"
                })
                .appendTo($result);

            return $result;
        }
    }]
});
    </script> --}}
    <script>

$( document ).ready(function() {
   setInterval(function(){
        $.ajax({
        url:'{{route('not.count')}}',
        type:'GET',
        
        success:function(res){
        $("#count_noti").html(res.noti);
       // alert(res.noti)
        
        }
        });
        }, 5000);

});

</script>