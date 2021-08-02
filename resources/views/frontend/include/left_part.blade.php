@section('head')
@include('admin.include.head')
@endsection


<!-- Sidebar-->
<div class="border-end bg-deepblue" id="sidebar-wrapper">
	<div class="sidebar-heading"><span>{{-- TaskAffix --}} {{auth()->user()->name}} <a class="menuclose"><i class="fa fa-close"></i></a></span></div>
	
	<div class="list-group list-group-flush">
		<a class="{{request()->segment(2)=='dashboard'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href=""><i class="fa fa-home-b"></i> <span>Home</span></a>

@php
@$noti=DB::table('notification')->where('is_read','UR1')->where('user_type','U')->where('user_id',auth()->user()->id)->count();
@endphp

		<a class="{{request()->segment(2)=='notifications'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('notification')}}"><i class="fa fa-bell-n"></i><span>Notifications <span class="badge" style="background-color: red">{{@$noti}}</span></span></a>





		<a class="{{request()->segment(1)=='target'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.target')}}"><i class="fa fa-target"></i><span>My Target</span></a>


		<a class="{{request()->segment(1)=='lead'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.lead')}}"><i class="fa fa-users-achiv"></i><span>My Lead</span></a>

		
		<a class="{{request()->segment(1)=='salary'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.salary')}}"><i class="fa fa-lead"></i><span>My Monthly Salary </span></a>

        <a class="{{request()->segment(1)=='profile'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('user.my.profile')}}"><i class="fa fa-lead"></i><span>My Profile </span></a>


		<a class="list-group-item-action left-nav" href="#"><i class="fa fa-reports"></i><span>Reports</span></a>

		<a class="{{request()->segment(1)=='tutorial'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.tutorial')}}"><i class="fa fa-tutorials"></i><span>Tutorials</span></a>

        <a class="{{request()->segment(1)=='reffer'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.share')}}"><i class="fa fa-tutorials"></i><span>Share</span></a>


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
			<li><a class="{{request()->segment(1)=='faq'?'list-group-item-action left-nav custom_active':'list-group-item-action left-nav'}}" href="{{route('my.faq.list')}}"><i class="fa help-icon">?</i> <span> FAQ</span></a></li>
			<li><a href="#"><i class="fa term-icon"></i> <span> Terms & condiotion</span></a></li>
			<li><a href="#"><i class="fa affiliate-icon"></i> <span> Affiliate</span></a></li>
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
                                        <p class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">{{ucfirst(request()->segment(1))}} Management</p>                                                      
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Phantom</a></li>
                                            <li><a href="#">Cluster</a></li>
                                            <li><a href="#">Phantom</a></li>
                                            <li><a href="#">Cluster</a></li>
                                        </ul>
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
                                            <li><a href="#" class="share-btn"><i class="fa fa-lock"></i>Share</a></li>
                                            <li class="search">
                                                <form>
                                                    <input type="text" id="myInputTextField">
                                                </form>
                                            </li>
                                            <li><a href="#" class="plus-icon">+</a></li>                                            
                                            <li><a href="#" class="user"><div>DE</div></a></li>                                            
                                        </ul>                                
                                    </div>                            
                            </div>
                        
                        
                    </div>
                </nav>