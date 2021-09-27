@section('head')
@include('admin.include.head')
@endsection


<!-- Sidebar-->
<div class="border-end bg-deepblue" id="sidebar-wrapper">
	<div class="sidebar-heading"><a class="logo" href="{{route('admin.dashboard.home')}}"><img src="{{url('/')}}/public/admin/assets/images/logo-task.png"></a>  <a class="menuclose"><i class="fa fa-close"></i></a></div>
	
	<div class="list-group list-group-flush">
		<a class="{{request()->segment(2)=='dashboard'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('admin.dashboard.home')}}"><i class="fa fa-home-b"></i> <span>Home</span></a>

@php
@$noti=DB::table('notification')->where('is_read','UR1')->where('user_type','A')->count();
@endphp

		<a class="{{request()->segment(2)=='notifications'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('notification.list')}}"><i class="fa fa-bell-n"></i><span>Notifications <span class="badge" style="background-color: red" id="count_noti">{{@$noti}}</span></span></a>



		<a class="{{request()->segment(2)=='user'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('admin.user.list')}}"><i class="fa fa-users-mng"></i><span>Users Management</span></a>


		<a class="{{request()->segment(2)=='target'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('admin.target.list')}}"><i class="fa fa-target"></i><span>Target Management</span></a>



		<a class="{{request()->segment(2)=='achivement'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('achivment.list')}}"><i class="fa fa-users-achiv"></i><span>Users Achivement</span></a>

		
		<a class="{{request()->segment(2)=='lead'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('lead.list')}}"><i class="fa lead-icon"></i><span>Lead Management</span></a>


		<a class="{{request()->segment(2)=='reports'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('admin.manage.report')}}"><i class="fa fa-reports"></i><span>Reports</span></a>


		<a class="{{request()->segment(2)=='tutorial'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('tutorial.list')}}"><i class="fa fa-tutorials"></i><span>Tutorials</span></a>


        
        <a class="{{request()->segment(2)=='offer-latter'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('offer.list')}}"><i class="fa offer-icon"></i><span>Offer Latter Management</span></a>


        <a class="{{request()->segment(2)=='picture'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('picture.list')}}"><i class="fa pic-icon"></i><span>Picture Management</span></a>


         <a class="{{request()->segment(2)=='service'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('service.list')}}"><i class="fa service-icon"></i><span>Service Management</span></a>


          <a class="{{request()->segment(2)=='banner'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('banner.list')}}"><i class="fa banner-icon"></i><span>Banner Management</span></a>






		<a class="list-group-item-action left-nav" href="{{ route('admin.logout') }}"
			onclick="event.preventDefault();
			document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
			<span> &nbsp; Logout</span>
		</a>
		<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
			@csrf
		</form>
		<
	</div>
	<div class="bottom-nav">
		<ul>
			<li><a class="{{request()->segment(2)=='faq'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('faq.list')}}"><i class="fa help-icon">?</i> <span> FAQ</span></a></li>
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
                                <div class="task-img">DE</div>
                                <div class="task-nemu">
                                    <div class="dropdown">
                                        <p class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">{{ucfirst(request()->segment(2))}} Management</p>                                                      
                                       {{--  <ul class="dropdown-menu">
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
                            <div class="head-right">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">...</button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav mt-lg-0">
                                           {{--  <li><a href="#" class="share-btn"><i class="fa fa-lock"></i>Share</a></li> --}}
                                            <li class="search">
                                                <form>
                                                    <input type="text" id="myInputTextField">
                                                </form>
                                            </li>
                                            {{-- <li><a href="#" class="plus-icon">+</a></li>                                            
                                            <li><a href="#" class="user"><div>DE</div></a></li> --}}                                            
                                        </ul>                                
                                    </div>                            
                            </div>
                        
                        
                    </div>
                </nav>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>

$( document ).ready(function() {
   setInterval(function(){
        $.ajax({
        url:'{{route('admin.not.count')}}',
        type:'GET',
        
        success:function(res){
        $("#count_noti").html(res.noti);
        //alert(res.noti)
        
        }
        });


       
        }, 5000);

});

</script>