<!doctype html>
<html class="fixed has-top-menu">
<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title><?php echo $page_title;?>BNFB Online Reporting &amp; Data Repository Tool | CIP</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/font-awesome/css/font-awesome.css" />

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/pnotify/pnotify.custom.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/stylesheets/theme.css" />

		<!-- Head Libs -->
		<script src="<?php echo base_url(); ?>assets/be/vendor/modernizr/modernizr.js"></script>		
		<script src="<?php echo base_url(); ?>assets/be/vendor/style-switcher/style.switcher.localstorage.js"></script>

		<style type="text/css">
			img {
  				display: -dompdf-image !important;
			}
		</style>
	</head>
	<body>
		<section class="body">


			<div class="">
				<section role="main" class="">
					<!-- start: page -->
					<div class="row">
						<div class="col-md-12 col-lg-12 col-xl-12">
							<section class="panel">
								<?php if (isset($biweekly_report)): ?>									
									<?php foreach ($biweekly_report as $row): ?>
										<div class="panel-body">
											<section class="panel">
												<div class="panel-body">
													<div class="invoice">
														<header class="clearfix">
															<div class="row">
																<div class="col-sm-12 mt-md mb-lg">
																	<h3 class="h3 mt-none text-dark text-weight-bold text-center">Building Nutritious Food Baskets Project</h3>
																</div>
																<!--<div class="clearfix"></div>
																<div class="col-sm-12 mt-md mb-lg" style="display: block">
																	<img class="img-center img-report-logo" src="<?php echo base_url(); ?>assets/be/images/bnfb-logo.png" alt="" />					
																</div>
																<div class="clearfix"></div>-->
																<div class="col-sm-12 mt-md mb-md">
																	<h4 class="h4 m-none text-dark text-weight-bold text-center"><?php echo $row->biweekly_report_title; ?></h4>
																</div>
																<div class="col-sm-12 mt-sm mb-xlg">
																	<h4 class="h5 m-none text-dark text-weight-bold text-center"><?php echo $row->biweekly_period_from . ' - ' . $row->biweekly_period_to; ?></h4>
																</div>
																<div class="col-sm-12 mt-md mb-xs">
																	<h4 class="h5 m-none text-dark text-center"><b>Report Date:</b> <?php echo date('M j Y g:i A', strtotime($row->created_on)); ?></h4>
																</div>
																<div class="col-sm-12 mt-xs mb-xlg">
																	<h4 class="h5 m-none text-dark text-center"><b>Report Owner:</b> <?php echo $row->first_name . ' ' . $row->last_name; ?></h4>
																</div>
															</div>
														</header>
														<div class="bill-info">
															<div class="row">
																<div class="col-md-12">
																	<div class="bill-to">
																		<!--<h4 class="h4 mb-md text-dark text-weight-bold">1. Report Summary</h4>
																		<div class="clearfix"></div>
																		<?php echo $row->biweekly_report_summary; ?>
																		<hr>
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">2. Report Remark</h4>
																		<div class="clearfix"></div>
																		<?php echo $row->biweekly_report_remark; ?>
																		<hr>-->
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">1. Accomplishments from the Reporting Period (<?php echo $row->biweekly_period_from . ' - ' . $row->biweekly_period_to; ?>)</h4>
																		<div class="clearfix"></div>
																		<table class="table table-bordered">
																			<thead>
																				<tr class="h5 text-dark">
																					<th class="text-weight-semibold">Milestone</th>
																					<th class="text-weight-semibold">Accomplished Tasks</th>		
																				</tr>
																			</thead>
																			<tbody>
																				<?php foreach ($biweekly_tasks as $row2): ?>
																					<tr>						
																						<td><?php echo $row2->milestone_name; ?></td>
																						<td><?php echo $row2->biweekly_task_description; ?></td>	
																					</tr>
																				<?php endforeach; ?>
																			</tbody>
																		</table>
																		<div class="clearfix"></div>
																		<hr>
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">2. What are the major challenges you are facing?</h4>
																		<div class="clearfix"></div>
																		<table class="table table-bordered">
																			<thead>
																				<tr class="h5 text-dark">
																					<th class="text-weight-semibold">Milestone</th>
																					<th class="text-weight-semibold">Challenges</th>		
																				</tr>
																			</thead>
																			<tbody>
																				<?php foreach ($biweekly_challenges as $row2): ?>
																					<tr>						
																						<td><?php echo $row2->milestone_name; ?></td>
																						<td><?php echo $row2->biweekly_challenge_description; ?></td>	
																					</tr>
																				<?php endforeach; ?>
																			</tbody>
																		</table>
																		<div class="clearfix"></div>
																		<hr>
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">3. Any major events planned for the next two months?</h4>
																		<div class="clearfix"></div>
																		<table class="table table-bordered">
																			<thead>
																				<tr class="h5 text-dark">
																					<th class="text-weight-semibold">Milestone</th>
																					<th class="text-weight-semibold">Events</th>		
																				</tr>
																			</thead>
																			<tbody>
																				<?php foreach ($biweekly_events as $row2): ?>
																					<tr>						
																						<td><?php echo $row2->milestone_name; ?></td>
																						<td><?php echo $row2->biweekly_event_description; ?></td>	
																					</tr>
																				<?php endforeach; ?>
																			</tbody>
																		</table>
																		<div class="clearfix"></div>
																		<hr>
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">4. What are the major five things your team will undertake in the next two months?</h4>
																		<div class="clearfix"></div>
																		<table class="table table-bordered">
																			<thead>
																				<tr class="h5 text-dark">
																					<th class="text-weight-semibold">Milestone</th>
																					<th class="text-weight-semibold">Activities</th>		
																				</tr>
																			</thead>
																			<tbody>
																				<?php foreach ($biweekly_activities as $row2): ?>
																					<tr>						
																						<td><?php echo $row2->milestone_name; ?></td>
																						<td><?php echo $row2->biweekly_activity_description; ?></td>	
																					</tr>
																				<?php endforeach; ?>
																			</tbody>
																		</table>
																		<div class="clearfix"></div>
																		<hr>
																	</div>
																</div>
												

																<!--<div class="text-right mr-lg">
																	<a href="#" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
																</div>-->
															</div>
														</div>
													</div>
												</div>
											</section>
										</div>
									</section>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>	
					</div>
					<!-- end: page -->
				</section>
			</div>



		</section>

		<!-- Vendor -->
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-cookie/jquery-cookie.js"></script>
		<!--<script src="<?php echo base_url(); ?>assets/be/vendor/style-switcher/style.switcher.js"></script>-->
		<script src="<?php echo base_url(); ?>assets/be/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-ui/jquery-ui.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-appear/jquery-appear.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/flot/jquery.flot.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/flot.tooltip/flot.tooltip.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/flot/jquery.flot.pie.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/flot/jquery.flot.categories.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/flot/jquery.flot.resize.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-sparkline/jquery-sparkline.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/raphael/raphael.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/morris.js/morris.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/gauge/gauge.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/snap.svg/snap.svg.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/chartist/chartist.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/select2/js/select2.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

		<script src="<?php echo base_url(); ?>assets/be/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/pnotify/pnotify.custom.js"></script>
		
		<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/lib/codemirror.js"></script>
		<!--<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/addon/selection/active-line.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/addon/edit/matchbrackets.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/mode/javascript/javascript.js"></script>-->
		<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/mode/xml/xml.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/mode/css/css.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/ckeditor/ckeditor-custom.js"></script>

		<script src="<?php echo base_url(); ?>assets/be/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/ios7-switch/ios7-switch.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/bootstrap-confirmation/bootstrap-confirmation.js"></script>

    	<script src="<?php echo base_url();?>assets/be/vendor/oLoader/js/jquery.oLoader.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-validation/additional-methods.js"></script>



		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url(); ?>assets/be/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url(); ?>assets/be/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>assets/be/javascripts/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		

		<!--<script src="<?php echo base_url(); ?>assets/be/javascripts/layouts/examples.header.menu.js"></script>-->
		<script src="<?php echo base_url(); ?>assets/be/javascripts/dashboard/examples.dashboard.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/javascripts/tables/examples.datatables.tabletools.js"></script>		
		<script src="<?php echo base_url(); ?>assets/be/javascripts/forms/validation.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/javascripts/forms/examples.wizard.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/javascripts/forms/script.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/javascripts/ui-elements/examples.charts.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/javascripts/ui-elements/examples.modals.js"></script>		

		<script type="text/javascript">
    		//$(document).ready(function() {

			//CKEDITOR.replace("quarterly_executive_summary",{
        		//height: 400
    		//});
    		//});
		</script>
	</body>
</html>