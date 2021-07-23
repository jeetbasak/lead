@extends('admin.layouts.app')
@section('title')
<title>Admin | Add lead</title>
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
                            <div class="task-mg-row">
                                <h2 class="my-1">Add User</h2>
            
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
            
                       
                        <div class="top-row">
                            <div class="flx-row my-3">
                                <div class="flx-col">
                                    <label class="form-label">Name</label>
                                    <input class="form-control" placeholder="Enter your name" type="text">
                                </div>
                                <div class="flx-col">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" placeholder="Enter your email" type="text">
                                </div>
                                <div class="flx-col">
                                    <label class="form-label">Phone Number</label>
                                    <input class="form-control" placeholder="Enter your phone number" type="text">
                                </div>
                            </div>
                            <div class="flx-row my-3">
                                <div class="flx-col">
                                    <label class="form-label">Month</label>
                                    <div class="flx-row">
                                        <select class="form-select form-control">
                                            <option>Select Month</option>
                                        </select>
                                        <div class="dd">To</div>
                                        <select class="form-select form-control">
                                            <option>Select Month</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flx-col">
                                    <label class="form-label">Year</label>
                                    <div class="flx-row">
                                        <select class="form-select form-control">
                                            <option>Select Year</option>
                                        </select>
                                        <div class="dd">To</div>
                                        <select class="form-select form-control">
                                            <option>Select Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flx-col">
                                    <label class="form-label">Salary</label>
                                    <div class="flx-row">
                                        <div class="product-dtl-quantity">
                                            <input class="form-control" type="text" value="1">
                                            <button class="increase">+</button>
                                        </div>                                       
                                        <div class="dd">To</div>
                                        <div class="product-dtl-quantity">
                                            <input class="form-control" type="text" value="100">
                                            <button class="decrease">-</button>
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>

                            <div class="flx-row my-3">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
            
                       
            
            
                        
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
@endsection