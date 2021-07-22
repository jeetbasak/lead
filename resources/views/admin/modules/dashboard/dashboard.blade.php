@extends('admin.layouts.app')
@section('title')
<title>Admin | Dashboard</title>

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
                                <div class="dropdown">                                   
                                    <button class="add-btn dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" type="button" data-toggle="dropdown"><span class="plus">+</span> <div class="br-r">Add task</div>
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Phantom</a></li>
                                        <li><a href="#">Cluster</a></li>
                                        <li><a href="#">Phantom</a></li>
                                        <li><a href="#">Cluster</a></li>
                                    </ul>
                                </div>
            
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
                            <div class="t-mid-row">
                                <div class="name-col">Task name</div>
                                <div class="date-col">Date</div>
                                <div class="pro-col">Projects</div>
                            </div>
                        </div>
            
                        <div class="top-row">
                            <div id="accordionExample">
                                <div class="accordion-item">
                                  <p class="panel-title" id="headingOne">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                        Recently assigned
                                    </a>
                                </p>
                                  <div id="collapseOne" class="accordion-collapse collapse show">
                                    <div class="t-mid-row b-0">
                                        <div class="name-col"><i class="fa incomplete-icon"></i> Satish Sarkar</div>
                                        <div class="date-col dt">Jul-15 today</div>
                                        <div class="pro-col"><span class="tean-bg"><i class="fa fa-dot"></i> TEAM123</span></div>
                                    </div>
                                  </div>
                                </div>

                                <div class="accordion-item">
                                    <p class="panel-title" id="headingOne">
                                      <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true">
                                        Do today
                                      </a>
                                  </p>
                                    <div id="collapseTwo" class="accordion-collapse collapse">
                                      <div class="t-mid-row b-0">
                                          <div class="name-col"><i class="fa incomplete-icon"></i> Satish Sarkar</div>
                                          <div class="date-col dt">Jul-15 today</div>
                                          <div class="pro-col"><span class="tean-bg"><i class="fa fa-dot"></i> TEAM123</span></div>
                                      </div>
                                    </div>
                                  </div> 

                                  <div class="accordion-item">
                                    <p class="panel-title" id="headingOne">
                                      <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true">
                                        Do next week
                                      </a>
                                  </p>
                                    <div id="collapseThree" class="accordion-collapse collapse">
                                      <div class="t-mid-row b-0">
                                          <div class="name-col"><i class="fa incomplete-icon"></i> Satish Sarkar</div>
                                          <div class="date-col dt">Jul-15 today</div>
                                          <div class="pro-col"><span class="tean-bg"><i class="fa fa-dot"></i> TEAM123</span></div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="accordion-item">
                                    <p class="panel-title" id="headingOne">
                                      <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true">
                                        Do later
                                      </a>
                                  </p>
                                    <div id="collapseFour" class="accordion-collapse collapse">
                                      <div class="t-mid-row b-0">
                                          <div class="name-col"><i class="fa incomplete-icon"></i> Satish Sarkar</div>
                                          <div class="date-col dt">Jul-15 today</div>
                                          <div class="pro-col"><span class="tean-bg"><i class="fa fa-dot"></i> TEAM123</span></div>
                                      </div>
                                    </div>
                                  </div> 
                               
                                
                              </div>
                        </div>
            
                        <div class="top-row">
                            <div class="add-row">
                                <p><a href="#">+ Add section</a></p>
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