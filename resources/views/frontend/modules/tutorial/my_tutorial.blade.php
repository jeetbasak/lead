@extends('layouts.app')
@section('title')
<title>User | Tutorials</title>
@endsection
@section('left_part')
@include('frontend.include.left_part')
<style>
.imgsize {
vertical-align: middle !important;
width: 241px !important;
height: 172px !important;
}
.grid-view-list li {

height:210px !important;
}
</style>
@endsection
@section('content')


<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="container-fluid">
	<div class="body-main">
		<div class="top-row">
			<div class="task-mg-row">
				<h2>Grid View</h2>
			</div>
		</div>
		<!-- ----Loop ----->
		<div class="top-row">
			<ul class="grid-view-list">
				@foreach($tutorial as $data)
				<li type="button"  data-toggle="modal" data-target="#myModalressing{{@$data->id}}" > <img src="{{$data->thumbnil}}" alt="" class="imgsize">
					
					{{--  <a href="https://www.youtube.com/watch?v={{@$data->video_short_url}}" class="paly fancybox-media"><img src="{{url('/')}}/public/frontend/assets/images/play.png" alt=""></a>
				--}}               </li>
				<div class="modal" id="myModalressing{{@$data->id}}">
					<div class="modal-dialog">
						<div class="modal-content" style="width:600px">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title"> title: {{@$data->title}}</h4>
								
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								
								
								{!!$data->video!!}
								
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								
								
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				
				
			</ul>
		</div>
		<!-- ----Loop ----->
	</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->

{{-- @section('footer')
@include('frontend.include.footer')
@endsection --}}
@endsection
{{-- end content --}}
@section('script')
@include('frontend.include.script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection