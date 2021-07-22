@section('head')
@include('admin.include.head')
@endsection


<!-- Sidebar-->
<div class="border-end bg-deepblue" id="sidebar-wrapper">
	<div class="sidebar-heading"><span>TaskAffix  <a class="menuclose"><i class="fa fa-close"></i></a></span></div>
	
	<div class="list-group list-group-flush">
		<a class="list-group-item-action left-nav" href="#"><i class="fa fa-home-b"></i> <span>Home</span></a>
		<a class="list-group-item-action left-nav" href="#"><i class="fa fa-bell-n"></i><span>Notifications</span></a>
		<a class="list-group-item-action left-nav" href="#"><i class="fa fa-users-mng"></i><span>Users Management</span></a>
		<a class="list-group-item-action left-nav" href="#"><i class="fa fa-target"></i><span>Target Management</span></a>
		<a class="list-group-item-action left-nav" href="#"><i class="fa fa-users-achiv"></i><span>Users Achivement</span></a>
		<a class="list-group-item-action left-nav" href="#"><i class="fa fa-lead"></i><span>Lead Management</span></a>
		<a class="list-group-item-action left-nav" href="#"><i class="fa fa-reports"></i><span>Reports</span></a>
		<a class="list-group-item-action left-nav" href="#"><i class="fa fa-tutorials"></i><span>Tutorials</span></a>
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
			<li><a href="#"><i class="fa help-icon">?</i> <span> FAQ</span></a></li>
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
							<p class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">My Tasks</p>
							<ul class="dropdown-menu">
								<li><a href="#">Phantom</a></li>
								<li><a href="#">Cluster</a></li>
								<li><a href="#">Phantom</a></li>
								<li><a href="#">Cluster</a></li>
							</ul>
						</div>
						
						<ul>
							<li><a href="#" class="active">List</a></li>
							<li><a href="#">Board</a></li>
							<li><a href="#">Calendar</a></li>
							<li><a href="#">Files</a></li>
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
									<input name="search" placeholder="Search" type="text">
								</form>
							</li>
							<li><a href="#" class="plus-icon">+</a></li>
							<li><a href="#">
								<div class="time-col">
									<p>Trial: 19 days left</p>
									<p class="link">Select plan</p>
								</div>
							</a>
						</li>
						<li><a href="#" class="user"><div>DE</div></a></li>
					</ul>
				</div>
			</div>
					
		</div>
	</nav>