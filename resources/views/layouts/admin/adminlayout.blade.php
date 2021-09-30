<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title> Dashboard</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }}  ">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}  ">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('css/feathericon.min.css') }}  ">
		
		<link rel="stylesheet" href="{{ asset('public/plugins/morris/morris.css') }}  ">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href=" {{ asset('css/style.css') }}  ">

        <link rel="stylesheet" href="{{ asset('public/icon/themify-icons/themify-icons.css') }}  ">
		
		
			
		
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="index.html" class="logo">
						<img src=" {{ asset('public/img/logo.png') }} " alt="Logo">
					</a>
					<a href="index.html" class="logo logo-small">
						<img src=" {{ asset('public/public/img/logo-small.png') }}  " alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="ti-align-justify "></i>
				</a>
				
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="ti-search"></i></button>
					</form>
				</div>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fe ti-bell"></i> <span class="badge badge-pill">3</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src=" public/img/doctors/doctor-thumb-01.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src=" public/img/patients/patient1.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
													<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src=" public/img/patients/patient2.jpg">
												</span>
												<div class="media-body">
												<p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src=" public/img/patients/patient3.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Carl Kelly</span> send a message <span class="noti-title"> to his doctor</span></p>
													<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="{{ asset('public/img/profiles/avatar-01.jpg') }} " width="31" alt="Ryan Taylor"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="{{ asset('public/img/profiles/avatar-01.jpg') }}  " alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									{{-- <h6>{{ Auth::user()->name }}</h6> --}}
									<p class="text-muted mb-0"></p>
								</div>
							</div>
                            <div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            
            @include('layouts.admin.sidebar')



			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                
                @yield('content')
               
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }} "></script>
		
		<!-- Bootstrap Core JS -->
        <script src=" {{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{ asset('public/plugins/slimscroll/jquery.slimscroll.min.js') }} "></script>
		
		<script src="{{ asset('public/plugins/raphael/raphael.min.js') }} "></script>    
		<script src=" {{ asset('public/plugins/morris/morris.min.js') }}"></script>  
		<script src="{{ asset('js/chart.morris.js') }} "></script>
		
		<!-- Custom JS -->
		<script  src="{{ asset('js/script.js') }} "></script>

        <script type="text/javascript">
 
            function ChangeToSlug()
                {
                    var slug;
                 
                    //Lấy text từ thẻ input title 
                    slug = document.getElementById("slug").value;
                    slug = slug.toLowerCase();
                    //Đổi ký tự có dấu thành không dấu
                        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                        slug = slug.replace(/đ/gi, 'd');
                        //Xóa các ký tự đặt biệt
                        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                        //Đổi khoảng trắng thành ký tự gạch ngang
                        slug = slug.replace(/ /gi, "-");
                        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                        slug = slug.replace(/\-\-\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-/gi, '-');
                        //Xóa các ký tự gạch ngang ở đầu và cuối
                        slug = '@' + slug + '@';
                        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                        //In slug ra textbox có id “slug”
                    document.getElementById('convert_slug').value = slug;
                }
         
        </script>
        
		
    </body>

</html>