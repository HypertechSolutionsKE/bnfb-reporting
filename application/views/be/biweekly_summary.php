
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Biweekly Summary Report</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><a href="<?php echo base_url(); ?>be/biweekly">
										Biweekly Reports
									</a></li>
								<li><span>Summary Report</span></li>
							</ol>
					
							<a href="<?php echo base_url(); ?>be" class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">
										<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-calendar"></i></span>
										<span class="va-middle">Biweekly Summary Report</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go Back Home"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
									</h2>
								</header>							
								<div class="panel-body">
									<form id="frm_training_sessions_add" action="" method="post">
										<div class="form-group col-md-5">
											<label class="control-label">Date Range</label>
											<div class="input-daterange input-group" data-plugin-datepicker>
												<span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</span>
												<input type="text" class="form-control" name="biweekly_summary_period_from" id="biweekly_summary_period_from">
												<span class="input-group-addon">to</span>
												<input type="text" class="form-control" name="biweekly_summary_period_to" id="biweekly_summary_period_to">
											</div>
										</div>
										<!--<div class="form-group col-md-4">
											<label class="control-label hidden-sm" style="display: block;">&nbsp;</label>
											<div class="">
												<div class="radio-custom radio-primary radio-inline">
													<input type="radio" id="biweekly_summary_outputs" name="biweekly_summary_type" value="outputs" checked>
													<label for="biweekly_summary_outputs">Summary by Outputs</label>
												</div>
												<div class="radio-custom radio-primary radio-inline">
													<input type="radio" id="biweekly_summary_reporters" name="biweekly_summary_type" value="reporters">
													<label for="biweekly_summary_reporters">Summary by Reporters</label>
												</div>
											</div>
										</div>-->

										<div class="form-group col-md-4">
											<label class="control-label hidden-sm" style="display: block;">&nbsp;</label>
											<div class="">
												<button id="generate_biweekly_summary_report" type="button" class="btn btn-success"><i class="fa fa-cogs"></i> Generate Summary Report <i id="biweekly_summary_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i></button>
												<button id="clear_biweekly_summary_report" type="button" class="btn btn-danger"><i class="fa fa-times"></i> Clear</button>
											</div>
										</div>
										<div class="clearfix"></div>
										<hr>
									</form>

									<div id="div_load_biweekly_summary_report" style="min-height: 100px">

									</div>
								</div>
							</section>
						</div>

					</div>
					<!-- end: page -->
				</section>
			</div>
