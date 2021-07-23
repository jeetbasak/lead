@extends('admin.layouts.app')
@section('title')
<title>Admin | Lead list</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
@endsection
@section('content')






<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="container-fluid">
	<div class="body-main">
		<div class="top-row">
			<div class="task-mg-row b-b-n">
				<div class="dropdown">
				<a href="{{route('lead.add.form')}}" class="add-btn dropdown-toggle" style=" color: white; ">	{{-- <button class="add-btn dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" type="button"> --}}<span class="plus">+</span> <div class="br-r">Add Lead</div>
				</a>
					<span class="caret"></span></button>
				</div>
				
				
			</div>
		</div>
		<div class="top-row">
			<table>
				<thead>
					<tr>
						<th scope="col"><input type="checkbox"></th>
						<th scope="col">Name</th>
						<th scope="col">Mail ID</th>
						<th scope="col">Phone Number</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">Karishma Begam</td>
						<td data-label="Mail ID">contact@gmail.com</td>
						<td data-label="Phone Number">+91 234 4566 789</td>
						<td data-label="Action"><a href="#"><i class="fa add-round">+</i></a> <a href="#"><i class="fa fa-edit edit-round"></i></a> <a href="#"><i class="fa fa-trash-o del-round"></i></a></td>
					</tr>
					<tr>
						<td scope="row" data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">Piyush Sircar</td>
						<td data-label="Mail ID">piyushsircar@gmail.com</td>
						<td data-label="Phone Number">+91 234 4566 456</td>
						<td data-label="Action"><a href="#"><i class="fa add-round">+</i></a> <a href="#"><i class="fa fa-edit edit-round"></i></a> <a href="#"><i class="fa fa-trash-o del-round"></i></a></td>
					</tr>
					<tr>
						<td scope="row" data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">Aman Nahar</td>
						<td data-label="Mail ID">amannahar@gmail.com</td>
						<td data-label="Phone Number">+91 234 4566 123</td>
						<td data-label="Action"><a href="#"><i class="fa add-round">+</i></a> <a href="#"><i class="fa fa-edit edit-round"></i></a> <a href="#"><i class="fa fa-trash-o del-round"></i></a></td>
					</tr>
					<tr>
						<td scope="row" data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">Jayanta Karmakar</td>
						<td data-label="Mail ID">jkarmakar@gmail.com</td>
						<td data-label="Phone Number">+91 234 4566 159</td>
						<td data-label="Action"><a href="#"><i class="fa add-round">+</i></a> <a href="#"><i class="fa fa-edit edit-round"></i></a> <a href="#"><i class="fa fa-trash-o del-round"></i></a></td>
					</tr>
					<tr>
						<td data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">Karishma Begam</td>
						<td data-label="Mail ID">contact@gmail.com</td>
						<td data-label="Phone Number">+91 234 4566 789</td>
						<td data-label="Action"><a href="#"><i class="fa add-round">+</i></a> <a href="#"><i class="fa fa-edit edit-round"></i></a> <a href="#"><i class="fa fa-trash-o del-round"></i></a></td>
					</tr>
					<tr>
						<td scope="row" data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">Piyush Sircar</td>
						<td data-label="Mail ID">piyushsircar@gmail.com</td>
						<td data-label="Phone Number">+91 234 4566 456</td>
						<td data-label="Action"><a href="#"><i class="fa add-round">+</i></a> <a href="#"><i class="fa fa-edit edit-round"></i></a> <a href="#"><i class="fa fa-trash-o del-round"></i></a></td>
					</tr>
					<tr>
						<td scope="row" data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">Aman Nahar</td>
						<td data-label="Mail ID">amannahar@gmail.com</td>
						<td data-label="Phone Number">+91 234 4566 123</td>
						<td data-label="Action"><a href="#"><i class="fa add-round">+</i></a> <a href="#"><i class="fa fa-edit edit-round"></i></a> <a href="#"><i class="fa fa-trash-o del-round"></i></a></td>
					</tr>
					<tr>
						<td scope="row" data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">Jayanta Karmakar</td>
						<td data-label="Mail ID">jkarmakar@gmail.com</td>
						<td data-label="Phone Number">+91 234 4566 159</td>
						<td data-label="Action"><a href="#"><i class="fa add-round">+</i></a> <a href="#"><i class="fa fa-edit edit-round"></i></a> <a href="#"><i class="fa fa-trash-o del-round"></i></a></td>
					</tr>
					<tr>
						<td data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">Karishma Begam</td>
						<td data-label="Mail ID">contact@gmail.com</td>
						<td data-label="Phone Number">+91 234 4566 789</td>
						<td data-label="Action"><a href="#"><i class="fa add-round">+</i></a> <a href="#"><i class="fa fa-edit edit-round"></i></a> <a href="#"><i class="fa fa-trash-o del-round"></i></a></td>
					</tr>
					<tr>
						<td scope="row" data-label="Select"><input type="checkbox"></td>
						<td data-label="Name">Piyush Sircar</td>
						<td data-label="Mail ID">piyushsircar@gmail.com</td>
						<td data-label="Phone Number">+91 234 4566 456</td>
						<td data-label="Action"><a href="#"><i class="fa add-round">+</i></a> <a href="#"><i class="fa fa-edit edit-round"></i></a> <a href="#"><i class="fa fa-trash-o del-round"></i></a></td>
					</tr>
					
				</tbody>
			</table>
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
@endsection