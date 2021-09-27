<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta property="og:image" content="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg" />
        <title>TaskAffix</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{url('/')}}/public/admin/assets/favicon.ico" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{url('/')}}/public/admin/assets/css/font-awesome.min.css">
        <!-- Core theme CSS (Bootstrap CSS)-->
        <link href="{{url('/')}}/public/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Custome CSS -->
        <link href="{{url('/')}}/public/admin/assets/css/styles.css" rel="stylesheet" />
        <!-- Font Link -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-shadow border-bottom">
                    <div class="container">
                        <div class="flx-row p-3 p-l-r-0">
                            <div class="head-left">
                                <h2 class="logo"><a href="{{route('hm')}}"><img src="{{url('/')}}/public/admin/assets/images/TaskAffix.png" style="width: 110px;padding: 0px 0px;"></a></h2>
                                <button class="navbar-toggler lnd-menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse lnd-drop" id="navbarSupportedContent">
                                    <ul class="navbar-nav mt-lg-0 login-menu">
                                        <li><a href="{{route('faq')}}">Faq</a></li>
                                        <li><a href="{{route('tc')}}">Terms & conditions</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="head-right">
                                <ul class="login-menu">
                                    {{--  <li><a href="#">Login</a></li> --}}
                                    @if (Route::has('login'))
                                    
                                    @auth
                                    <li>  <a href="{{ url('/home') }}">Home</a> </li>
                                    @else
                                    <li> <a href="{{ route('login') }}">Login</a> </li>
                                    @if (Route::has('register'))
                                    {{-- <li>    <a href="{{ route('register') }}">Register</a></li> --}}
                                    <li class="get-btn"><a href="{{ route('register') }}">Get Started <span> > </span></a></li>
                                    @endif
                                    @endauth
                                </div>
                                @endif
                                
                            </ul>
                        </div>
                        
                        
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container">
                    <div class="body-main">
                        {{-- <div class="top-row">
                            <h2 class="my-4 border-bottom p-b10">Terms and Conditions</h2>
                            <div class="terms">
                                <h5>Leaves and attendance</h5>
                                <p>
                                    Working days will be 6 days in a week.
                                    <br>
                                    There is no permanent leave. (Excluding National Holidays only)
                                    <br>
                                    Login must be a minimum of 8 hours between 10 am and 10 pm.
                                    <br>
                                    Inform leave 5 days a month.
                                    <br>
                                    If didn't login 7hrs, it will be count as a half day.
                                    <br>
                                    If didn't login minimum 4hrs it will be count as a leave.
                                </p>
                                
                                <h5>Termination (ZTP)</h5>
                                <p>If caller used abusing language it will be ZTP.
                                    <br>
                                    Without inform 3days leave company have to terminated the caller or salary will be hold in 45days.
                                    <br>
                                    If caller provide wrong information it will be ZTP.
                                    <br>
                                Company has the right to terminate anytime.</p>
                                <h5>Salary/Billing Conditions</h5>
                                <p>Phone bill will be providing the company.
                                    <br>
                                    If target is not completed company didn't pay any phone bill.
                                    <br>
                                    If target is not completed salary will be 50% reduced.
                                    <br>
                                    Target will be to complete 3 customers in a day.
                                    <br>
                                    If employee leaves the company, employee has to serve 15 days notice period.
                                    <br>
                                Employee didn't serve notice period salary will be hold 45days.</p>
                                <h5>Working Rules</h5>
                                <p>
                                    Employee have to manage laptop, desktop, android phone and iphone.<br>
                                    Work must be from company's own dashboard.
                                    <br>
                                    Company wants to sell call recordings.
                                    <br>
                                    Without company permission you did not post anything in your social media site.
                                    <br>
                                    Company can have changed your project anytime.
                                    <br>
                                Employee has to comfortable any project anytime.</p>
                                
                                
                            </div>
                        </div> --}}
                        
                        
<h1 style="font-size: 72px; line-height: 72px; word-break: break-word;">ABOUT</h1>
<div>&nbsp;</div>
<div><strong>Work from home Without Limits with us, run and scale your dream workflows on one platform.</strong></div>
<div>&nbsp;</div>
<div><strong>"Hi, Impact"</strong></div>
<div>&nbsp;</div>
<div><strong>THE ORIGIN &amp; JOURNEY<br /></strong>TaskAffix started up in 2020, and we&rsquo;ve been on an epic ride ever since. From our beginnings as a consulting company to launching the first web in 2021, we&rsquo;ve tried to stay true to our core beliefs and to deliver an exceptional experience for our community and subscribers.<br /><br /><strong>"Hi, Impact"</strong></div>
<div><strong><br /></strong>TaskAffix solves our clients' toughest challenges by providing unmatched services in strategy, consulting, digital, technology, and operations. We partner with more than 500+ SMEs and big MNCs as well, driving innovation to improve the way the world works and lives. With expertise in more than 14 industries and all business functions, we deliver transformational outcomes for a demanding new digital world. We owe huge thanks to our community for joining us on this awesome journey, and we hope that you&rsquo;ll continue to be a part of our story.</div>
<div><strong>&nbsp;</strong></div>
<div><strong>"Hi, Impact"</strong></div>
<div><strong>&nbsp;</strong></div>
<div>We have different options to maximize your payouts! Especially for members who are more active through our platform than the rest as we unlock exclusive features with big rewards.</div>
<div>&nbsp;</div>
<div><strong>WHAT DO WE DO</strong><br />TaskAffix&nbsp;connects thousands of freelancers and people who are looking for skilled people for their small projects. We at&nbsp; TaskAffix&nbsp;encourage online workers who possess basic computing skills to come on board and make use of those skills.<br /><strong><br /></strong></div>
<div><strong>"Hi, Impact"</strong></div>
<div><strong><br /></strong>Through&nbsp; TaskAffix, freelancers from all age groups are earning a handsome amount of money. People from all areas of society, i.e. Retired Persons, Housewives, Students, Teenagers are completing hundreds of projects every hour.&nbsp;</div>
<div>&nbsp;</div>
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            
        </div>
        <div class="footer">
            <p>Copyright © taskaffix.com. All Rights Reserved</p>
        </div>
        <!-- JS Start here -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
        <!-- Bootstrap core JS-->
        <script src="{{url('/')}}/public/admin/assets/js/bootstrap.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{url('/')}}/public/admin/assets/js/scripts.js"></script>
        <script>
        $('.menuclose').click(function () {
        $('body').removeClass('sb-sidenav-toggled');
        
        });
        </script>
    </body>
</html>