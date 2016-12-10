<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">
		<link rel="shortcut icon" href="<?php echo base_url(''); ?>assets/images/favicon_1.ico">
		<title>GOOL - Futsal reservation</title>
		<!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?php echo base_url(''); ?>assets/plugins/morris/morris.css">
		<!--Form Wizard-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/plugins/jquery.steps/css/jquery.steps.css" />
		<link href="<?php echo base_url(''); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(''); ?>assets/css/core.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(''); ?>assets/css/components.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(''); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(''); ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(''); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(''); ?>assets/plugins/custombox/css/custombox.css" rel="stylesheet">
		<link href="<?php echo base_url(''); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="<?php echo base_url(''); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
		<link href="<?php echo base_url(''); ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<link href="<?php echo base_url(''); ?>assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
		<link href="<?php echo base_url(''); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<link href="<?php echo base_url(''); ?>assets/plugins/tablesaw/css/tablesaw.css" rel="stylesheet" type="text/css" />
		<!-- DataTables -->
		<link href="<?php echo base_url(''); ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(''); ?>assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(''); ?>assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(''); ?>assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(''); ?>assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(''); ?>assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(''); ?>assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(''); ?>assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url(''); ?>assets/plugins/magnific-popup/css/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url(''); ?>assets/plugins/jquery-datatables-editable/datatables.css" />
		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url(''); ?>assets/js/modernizr.min.js"></script>
		<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-69506598-1', 'auto');
			ga('send', 'pageview');
		</script>
	</head>
	<body class="fixed-left">
		<!-- Begin page -->
		<div id="wrapper">
		<!-- Top Bar Start -->
		<div class="topbar">
			<!-- LOGO -->
			<div class="topbar-left">
				<div class="text-center">
					<a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span></a>
					<!-- Image Logo here -->
					<!--<a href="index.html" class="logo">-->
					<!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
					<!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
					<!--</a>-->
				</div>
			</div>
			<!-- Button mobile view to collapse sidebar menu -->
			<div class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="">
						<div class="pull-left">
							<button class="button-menu-mobile open-left waves-effect waves-light">
							<i class="md md-menu"></i>
							</button>
							<span class="clearfix"></span>
						</div>
						<ul class="nav navbar-nav navbar-right pull-right">
							<li class="dropdown top-menu-item-xs">
								<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
								<i class="icon-bell"></i> <span class="badge badge-xs badge-danger">3</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-lg">
									<li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
									<li class="list-group slimscroll-noti notification-list">
										<!-- list item-->
										<a href="javascript:void(0);" class="list-group-item">
											<div class="media">
												<div class="pull-left p-r-10">
													<em class="fa fa-diamond noti-primary"></em>
												</div>
												<div class="media-body">
													<h5 class="media-heading">A new order has been placed A new order has been placed</h5>
													<p class="m-0">
														<small>There are new settings available</small>
													</p>
												</div>
											</div>
										</a>
										<!-- list item-->
										<a href="javascript:void(0);" class="list-group-item">
											<div class="media">
												<div class="pull-left p-r-10">
													<em class="fa fa-cog noti-warning"></em>
												</div>
												<div class="media-body">
													<h5 class="media-heading">New settings</h5>
													<p class="m-0">
														<small>There are new settings available</small>
													</p>
												</div>
											</div>
										</a>
										<!-- list item-->
										<a href="javascript:void(0);" class="list-group-item">
											<div class="media">
												<div class="pull-left p-r-10">
													<em class="fa fa-bell-o noti-custom"></em>
												</div>
												<div class="media-body">
													<h5 class="media-heading">Updates</h5>
													<p class="m-0">
														<small>There are <span class="text-primary font-600">2</span> new updates available</small>
													</p>
												</div>
											</div>
										</a>
										<!-- list item-->
										<a href="javascript:void(0);" class="list-group-item">
											<div class="media">
												<div class="pull-left p-r-10">
													<em class="fa fa-user-plus noti-pink"></em>
												</div>
												<div class="media-body">
													<h5 class="media-heading">New user registered</h5>
													<p class="m-0">
														<small>You have 10 unread messages</small>
													</p>
												</div>
											</div>
										</a>
										<!-- list item-->
										<a href="javascript:void(0);" class="list-group-item">
											<div class="media">
												<div class="pull-left p-r-10">
													<em class="fa fa-diamond noti-primary"></em>
												</div>
												<div class="media-body">
													<h5 class="media-heading">A new order has been placed A new order has been placed</h5>
													<p class="m-0">
														<small>There are new settings available</small>
													</p>
												</div>
											</div>
										</a>
										<!-- list item-->
										<a href="javascript:void(0);" class="list-group-item">
											<div class="media">
												<div class="pull-left p-r-10">
													<em class="fa fa-cog noti-warning"></em>
												</div>
												<div class="media-body">
													<h5 class="media-heading">New settings</h5>
													<p class="m-0">
														<small>There are new settings available</small>
													</p>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="list-group-item text-right">
										<small class="font-600">See all notifications</small>
										</a>
									</li>
								</ul>
							</li>
							<li class="hidden-xs">
								<a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
							</li>
							<li class="hidden-xs">
								<a href="#" class="right-bar-toggle waves-effect waves-light"><i class="icon-settings"></i></a>
							</li>
							<li class="dropdown top-menu-item-xs">
								<a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(''); ?>assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
								<ul class="dropdown-menu">
									<li><a href="javascript:void(0)"><i class="ti-user m-r-10 text-custom"></i> Profile</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo base_url(''); ?>admin/logout"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<!-- Top Bar End -->
		<!-- ========== Left Sidebar Start ========== -->
		<div class="left side-menu">
			<div class="sidebar-inner slimscrollleft">
				<!--- Divider -->
				<div id="sidebar-menu">
					<ul>
						<li class="text-muted menu-title">Navigation</li>
						<li class="has_sub">
						  <a href="<?php echo base_url(''); ?>admin/landing" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span></a>
						</li>
						<li class="has_sub">
						  <a href="<?php echo base_url(''); ?>admin/checkout" class="waves-effect"><i class="ti-shopping-cart"></i><span class="label label-warning pull-right">6</span><span> Cart </span></a>
						</li>
						<li class="has_sub">
						  <a href="<?php echo base_url(''); ?>admin/paymentlist" class="waves-effect"><i class="ti-menu-alt"></i><span> Reservation List   </span></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- Left Sidebar End -->
