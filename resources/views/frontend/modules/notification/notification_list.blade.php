@extends('layouts.app')
@section('title')
<title>Admin | Target list</title>
@endsection
@section('left_part')
@include('frontend.include.left_part')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')






<!-- Start right Content here -->
<!-- ============================================================== -->
@include('frontend.include.errors')
<div class="container-fluid">
  <div class="body-main">
    <div class="top-row">
      <div class="task-mg-row b-b-n">
        <div class="dropdown">
       
        
      </div>
    </div>
    <div class="top-row">
      <table id="example">
        <thead>
          <tr>
            <th scope="col"><input type="checkbox"></th>
            <th scope="col">Id</th>
            <th scope="col">Type</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($notification as $key=> $value)
          <tr  @if($value->is_read=="UR2") style="background-color: pink" @endif>
            <td data-label="Select"><input type="checkbox"></td>
            <td data-label="Name">{{@$value->id}}</td>
            <td data-label="Mail ID">{{@$value->not_type}}</td>
            <td data-label="Phone Number">{{@$value->created_at->format('Y-m-d')}}</td>
            <td data-label="Action">

              <a href="#" type="button"  data-toggle="modal" data-target="#myModal{{@$value->id}}"><i class="fa add-round" onclick="abc({{@$value->id}})">V</i></a>


             
            </td>
          </tr>

          {{-- for assing --}}
        <div class="modal" id="myModal{{@$value->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Details notification of {{@$value->id}}</h4>
                
              </div>
              <!-- Modal body -->
              <div class="modal-body">

                
                
                <h5>Id</h5>
                <p>{{$value->id}}</p>

                <h5>Type</h5>
                <p>{{$value->not_type}}</p>

                <h5>Message</h5>
                <p>{{$value->message}}</p>

                <h5>Date</h5>
                <p>{{$value->created_at}}</p>
               
                
                
                
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                
                
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
            @endforeach
          
        </tbody>
      </table>
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
{{-- for datatable --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
{{-- for modal --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
{{-- for select2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2.min.js" integrity="sha512-cvmdmfILScvBOUbgWG7UbDsR1cw8zuaVlafXQ3Xu6LbgE0Ru6n57nWbKSJbQcRmkQodGdDoAaZOzgP4CK6d4yA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  
oTable = $('#example').DataTable({
"bSort": false
});  
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
</script>
<script>
  function abc($id){
    //alert($id);
    $('#slct1'+$id).select2({
    placeholder: 'Select an user'/*+$id*/,
  }); 
  }
</script>
@endsection