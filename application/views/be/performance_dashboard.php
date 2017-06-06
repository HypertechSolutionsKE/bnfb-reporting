
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Performance Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Performance Dashboard</span></li>
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
											<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-line-chart"></i></span>
											Trainings <!--<span class="text-weight-normal text-success"> Number of policy documents incorporating biofortification</span>-->
										</h2>
									</header>
									<div class="panel-body">
									<form id="" action="" method="post">
										<div class="form-group col-md-4">
											<label class="control-label">Date Range</label>
											<div class="input-daterange input-group">
												<span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</span>
												<input type="text" class="form-control" name="pd_trainings_from" id="pd_trainings_from" readonly>
												<span class="input-group-addon">to</span>
												<input type="text" class="form-control" name="pd_trainings_to" id="pd_trainings_to" readonly>
											</div>
										</div>
										<div class="form-group col-md-3">
											<label class="control-label">Performance Indicator</label>
											<select id="pd_trainings_indicator_id" name="pd_trainings_indicator_id" data-plugin-selectTwo class="form-control populate" required>
														<option value="All">- All -</option>
			                                	<?php foreach($indicators as $row): ?>
			                                       	<option value="<?php echo $row->indicator_id; ?>" ><?php echo $row->indicator_name; ?></option>
			                                	<?php endforeach; ?>                       
											</select>
										</div>	
										<div class="form-group col-md-3">
											<label class="control-label">Country</label>
											<select id="pd_trainings_country_id" name="pd_trainings_country_id" data-plugin-selectTwo class="form-control populate" required>
												<option value="All">- All -</option>
			                               		<?php foreach($countries as $row): ?>
			                                       	<option value="<?php echo $row->country_id; ?>" ><?php echo $row->country_name; ?></option>
			                            		<?php endforeach; ?>                       
											</select>
										</div>

										<div class="form-group col-md-2">
											<label class="control-label hidden-xs" style="display: block;">&nbsp;</label>
											<div class="">
												<button id="pd_trainings_refresh" type="button" class="btn btn-danger"><i class="fa fa-refresh"></i> Refresh<i id="pd_trainings_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i></button>
											</div>
										</div>
										<div class="clearfix"></div>
									</form>
									<div class="chart chart-md" id="div_trainings_bar"></div>
									<div id="legend"></div>
										<!-- Morris: Bar -->
										<!--<div class="chart chart-md" id="morrisBar"></div>-->
									</div>							
							</section>
						</div>

					</div>
					<!-- end: page -->
				</section>
			</div>
