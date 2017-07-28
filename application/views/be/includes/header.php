<!doctype html>
<html class="fixed has-top-menu">
<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title><?php echo $page_title;?>BNFB Online Reporting &amp; Data Repository Tool | CIP</title>
		<meta name="keywords" content="" />
		<meta name="description" content="BNFB Online Reporting &amp; Data Repository Tool | CIP">
		<meta name="author" content="">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  --
		<link href="../../../fonts.googleapis.com/cssf1e9.css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">-->

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/jquery-ui/jquery-ui.css" />		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/jquery-ui/jquery-ui.theme.css" />		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/morris.js/morris.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/pnotify/pnotify.custom.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/codemirror/theme/monokai.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/morris.js/morris.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/chartist/chartist.min.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/stylesheets/theme.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/stylesheets/theme-custom.css">
	    
	    <script type="text/javascript">
	    	var baseDir = '<?php echo base_url(); ?>';
	    	var taskID = 0;
	    	var challengeID = 0;
	    	var eventID = 0;
	    	var activityID = 0;

	    	//var cur_city_id = '';
	   	</script>

		<!-- Head Libs -->
		<script src="<?php echo base_url(); ?>assets/be/vendor/modernizr/modernizr.js"></script>		
		<script src="<?php echo base_url(); ?>assets/be/vendor/style-switcher/style.switcher.localstorage.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header header-nav-menu header-nav-top-line">
				<div class="logo-container">
					<a href="<?php echo base_url(); ?>be" class="logo">
						<img src="<?php echo base_url(); ?>assets/be/images/bnfb-logo.png" height="35" alt="BNFB" />
					</a>
					<button class="btn header-btn-collapse-nav hidden-md hidden-lg" data-toggle="collapse" data-target=".header-nav">
						<i class="fa fa-bars"></i>
					</button>
			
					<!-- start: header nav menu -->
					<div class="header-nav collapse">
						<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 header-nav-main-square">
							<nav>
								<ul class="nav nav-pills" id="mainNav">
									<li class="<?php if ($cur == 'Dashboard'){echo 'active'; } ?>">
										<a href="<?php echo base_url(); ?>be">Dashboard</a>
									</li>
									<li class="dropdown <?php if ($cur == 'Biweekly'){echo 'active'; } ?>">
										<a href="#" class="dropdown-toggle">Bi-Weekly</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url(); ?>be/biweekly/create">Create New Report</a></li>
											<li><a href="<?php echo base_url(); ?>be/biweekly">Reports List</a></li>
											<li><a href="<?php echo base_url(); ?>be/biweekly/consolidated">Generate Consolidated Report</a></li>
										</ul>
									</li>
									<li class="dropdown <?php if ($cur == 'Quarterly'){echo 'active'; } ?>">
										<a href="#" class="dropdown-toggle">Quarterly</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url(); ?>be/quarterly/create">Create New Report</a></li>
											<li><a href="<?php echo base_url(); ?>be/quarterly">Reports List</a></li>
											<!--<li><a href="<?php echo base_url(); ?>be/quarterly/summary">Generate Report Summary</a></li>-->
										</ul>
									</li>
									<li class="dropdown <?php if ($cur == 'Bi-Annual'){echo 'active'; } ?>">
										<a href="#" class="dropdown-toggle">Bi-Annual</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url(); ?>be/biannual/create">Create New Report</a></li>
											<li><a href="<?php echo base_url(); ?>be/biannual">Reports List</a></li>
											<!--<li><a href="<?php echo base_url(); ?>be/quarterly/summary">Generate Report Summary</a></li>-->
										</ul>
									</li>
									<li class="dropdown <?php if ($cur == 'Annual'){echo 'active'; } ?>">
										<a href="#" class="dropdown-toggle">Annual</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url(); ?>be/annual/create">Create New Report</a></li>
											<li><a href="<?php echo base_url(); ?>be/annual">Reports List</a></li>
											<!--<li><a href="<?php echo base_url(); ?>be/quarterly/summary">Generate Report Summary</a></li>-->
										</ul>
									</li>

									<li class="<?php if ($cur == 'Outcomes'){echo 'active'; } ?>">
										<a href="<?php echo base_url(); ?>be/outcomes">Outputs/Outcomes</a>
									</li>
									<li class="<?php if ($cur == 'Performance Dashboard'){echo 'active'; } ?>">
										<a href="<?php echo base_url(); ?>be/performance_dashboard">Performance Dashboard</a>
									</li>
									<li class="dropdown <?php if ($cur == 'Settings'){echo 'active'; } ?>">
										<a href="#" class="dropdown-toggle">Settings</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url(); ?>be/project_purpose"><i class="fa fa-caret-right"></i> Project Purpose</a></li>
											<li><a href="<?php echo base_url(); ?>be/project_objectives"><i class="fa fa-caret-right"></i> Project Objectives</a></li>
											<li><a href="<?php echo base_url(); ?>be/implementor_types"><i class="fa fa-caret-right"></i> Implementor Types</a></li>					
											<li><a href="<?php echo base_url(); ?>be/implementors"><i class="fa fa-caret-right"></i> Implementors</a></li>

											<li><a href="<?php echo base_url(); ?>be/indicators"><i class="fa fa-caret-right"></i> Indicators</a></li>
											<li><a href="<?php echo base_url(); ?>be/milestones"><i class="fa fa-caret-right"></i> Milestones</a></li>
											<li><a href="<?php echo base_url(); ?>be/thematic_areas"><i class="fa fa-caret-right"></i> Thematic Areas</a></li>
											<li><a href="<?php echo base_url(); ?>be/intermediate_results"><i class="fa fa-caret-right"></i> Intermediate Results</a></li>
											<li><a href="<?php echo base_url(); ?>be/trainings"><i class="fa fa-caret-right"></i> Trainings</a></li>					
											<li><a href="<?php echo base_url(); ?>be/disaggregation_levels"><i class="fa fa-caret-right"></i> Disaggregation Levels</a></li>
											<li><a href="<?php echo base_url(); ?>be/countries"><i class="fa fa-caret-right"></i> Countries/Regions</a></li>
											<li><a href="<?php echo base_url(); ?>be/districts"><i class="fa fa-caret-right"></i> Districts/Provinces</a></li>
											<li><a href="<?php echo base_url(); ?>be/crops"><i class="fa fa-caret-right"></i> Crops</a></li>

											<li><a href="<?php echo base_url(); ?>be/user_titles"><i class="fa fa-caret-right"></i> User Titles</a></li>
											<li><a href="<?php echo base_url(); ?>be/system_users"><i class="fa fa-caret-right"></i> System Users</a></li>
										</ul>
									</li>

								</ul>
							</nav>
						</div>
					</div>
					<!-- end: header nav menu -->
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?php echo base_url();?>assets/be/images/default-user.png" alt="" class="img-circle" data-lock-picture="<?php echo base_url();?>assets/be/images/default-user.png" />
							</figure>
							<div class="profile-info" data-lock-name="<?php echo $this->session->userdata('user_name'); ?>" data-lock-email="<?php echo $this->session->userdata('user_email'); ?>">
								<span class="name"><?php echo $this->session->userdata('user_name'); ?></span>
								<span class="role">
									<?php 
										if ($this->session->userdata('is_admin') == 1){
											echo 'Administrator';
										}else{
											echo 'Limited User';
										}
									?>
								</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url();?>be/auth/logout"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->
