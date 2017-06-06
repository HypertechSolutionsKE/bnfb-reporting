
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Biweekly Reports</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="<?php echo base_url(); ?>be/biweekly">Biweekly Reports</a></span></li>
								<?php if (isset($biweekly)): ?>
									<li><span>Edit Report</span></li>
								<?php else: ?>
									<li><span>Create Report</span></li>
								<?php endif; ?>
							</ol>
					
							<a href="<?php echo base_url(); ?>be" class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>											
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<section class="panel form-wizard" id="w1">
								<header class="panel-heading">
									<h2 class="panel-title">
										<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-bar-chart"></i></span> <span class="va-middle">New Biweekly Report</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be/biweekly" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Biweekly Reports list"><i class="fa fa-long-arrow-left"></i> <span class="hidden-sm"></span></a></span>
									</h2>
								</header>

								<div class="panel-body">
									<div class="wizard-progress">
										<div class="steps-progress">
												<div class="progress-indicator"></div>
											</div>
										<ul class="wizard-steps">
											<li class="active">
												<a href="#w1-account" data-toggle="tab" class="text-center">
													<!--<span data-toggle="tooltip" data-placement="top" title="General Report Information">-->
														<span class="badge">1</span>
														Report Summary
													<!--</span>-->
												</a>
											</li>
											<li>
												<a href="#w1-profile" data-toggle="tab" class="text-center">
														<span class="badge">2</span>
														Accomplished Tasks
												</a>
											</li>
											<li>
												<a href="#w1-confirm" data-toggle="tab" class="text-center">
														<span class="badge">3</span>
														Major Challenges
												</a>
											</li>
											<li>
												<a href="#w1-events" data-toggle="tab" class="text-center">
														<span class="badge">4</span>
														Major Events
												</a>
											</li>
											<li>
												<a href="#w1-activities" data-toggle="tab" class="text-center">
														<span class="badge">5</span>
														Activities to Undertake
													</a>
											</li>
											<li>
												<a href="#w1-finish" data-toggle="tab" class="text-center">
														<span class="badge">6</span>
														Preview &amp; Submit
													</a>
											</li>

										</ul>
									</div>
									<form class="" novalidate="novalidate" method="post" action="<?php echo base_url(); ?>be/biweekly/save">
												<?php if (isset($success)): ?>
								 					<div class="alert alert-success block-inner">
								 						<button type="button" class="close" data-dismiss="alert">×</button><i class="fa fa-info-circle	"></i>&nbsp;
								                     	<?php echo $success; ?>
								        			</div>               
								                <?php endif; ?>
												<?php if (isset($error)): ?>
								 					<div class="alert alert-danger block-inner">
								 						<button type="button" class="close" data-dismiss="alert">×</button>	
								                     	<?php echo $error; ?>
								        			</div>               
								                <?php endif; ?>

												<?php if ($this->session->flashdata('success')): ?>
								 					<div class="alert alert-success block-inner">
								 						<button type="button" class="close" data-dismiss="alert">×</button>	
								                     	<?php echo $this->session->flashdata('success'); ?>
								        			</div>               
								                <?php endif; ?>						         
												<?php if ($this->session->flashdata('error')): ?>
								 					<div class="alert alert-danger block-inner">
								 						<button type="button" class="close" data-dismiss="alert">×</button>
								                     	<?php echo $this->session->flashdata('error'); ?>
								        			</div>               
								                <?php endif; ?>						         

										<div class="tab-content">
											<div id="w1-account" class="tab-pane active">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="16.7" aria-valuemin="0" aria-valuemax="100" style="width: 16.7%;">
													16.7%
													</div>
												</div>											
												<?php if (isset($biweekly_report)): ?>
													<?php foreach ($biweekly_report as $row): ?>
														<div class="form-group col-md-12">
															<label class="control-label">Report Title <span class="required">*</span></label>
															<input type="text" name="biweekly_report_title" id="biweekly_report_title" class="form-control" value="<?php echo $row->biweekly_report_title; ?>" required/>
														</div>
														<div class="clearfix"></div>
														<div class="form-group col-sm-6">
															<label class="control-label">Period: From <span class="required">*</span></label>													
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input type="text" name="biweekly_period_from" id="biweekly_period_from" data-plugin-datepicker class="form-control" value="<?php echo $row->biweekly_period_from; ?>" required>
															</div>													
														</div>
														<div class="form-group col-sm-6">
															<label class="control-label">To <span class="required">*</span></label>
															<div class="">
																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="fa fa-calendar"></i>
																	</span>
																	<input type="text" name="biweekly_period_to" id="biweekly_period_to" data-plugin-datepicker class="form-control" value="<?php echo $row->biweekly_period_to; ?>" required>
																</div>
															</div>
														</div>
														<div class="clearfix"></div>

														<div class="form-group col-md-12">
															<label class="control-label">Report Summary</label>
															<div class="">
															<textarea class="ckeditor form-control" name="biweekly_report_summary" id="biweekly_report_summary"><?php echo $row->biweekly_report_summary; ?></textarea>
															</div>

														</div>
														<div class="clearfix"></div>
														<div class="form-group col-md-12">
															<label class="control-label">Report Remark</label>
															<div class="">
																<textarea class="ckeditor form-control" name="biweekly_report_remark" id="biweekly_report_remark"><?php echo $row->biweekly_report_remark; ?></textarea>
															</div>
														</div>
														<div class="clearfix"></div>
													<?php endforeach; ?>
												<?php else: ?>
													<div class="form-group col-md-12">
														<label class="control-label">Report Title <span class="required">*</span></label>
														<input type="text" name="biweekly_report_title" id="biweekly_report_title" class="form-control" required/>
													</div>
													<div class="clearfix"></div>
													<div class="form-group col-sm-6">
														<label class="control-label">Period: From <span class="required">*</span></label>													
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</span>
															<input type="text" name="biweekly_period_from" id="biweekly_period_from" data-plugin-datepicker class="form-control" required>
														</div>													
													</div>
													<div class="form-group col-sm-6">
														<label class="control-label">To <span class="required">*</span></label>
														<div class="">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input type="text" name="biweekly_period_to" id="biweekly_period_to" data-plugin-datepicker class="form-control" required>
															</div>
														</div>
													</div>
													<div class="clearfix"></div>

													<div class="form-group col-md-12">
														<label class="control-label">Report Summary</label>
														<div class="">
														<textarea class="ckeditor form-control" name="biweekly_report_summary" id="biweekly_report_summary"></textarea>
														</div>

													</div>
													<div class="clearfix"></div>
													<div class="form-group col-md-12">
														<label class="control-label">Report Remark</label>
														<div class="">
															<textarea class="ckeditor form-control" name="biweekly_report_remark" id="biweekly_report_remark"></textarea>
														</div>
													</div>
													<div class="clearfix"></div>
												<?php endif; ?>											
											</div>

											<div id="w1-profile" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="33.4" aria-valuemin="0" aria-valuemax="100" style="width: 33.4%;">
													33.4%
													</div>
												</div>
												<div class="clearfix"></div>
												<div class="col-md-6">
													<section id="biweekly_taskss" class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Accomplished Tasks</h2>
														</header>
														<div class="panel-body">

															<div class="form-group">
																<label class="control-label">Milestone <span class="required">*</span></label>
				                                                <select data-plugin-selectTwo class="form-control" id="biweekly_tasks_milestone_id" name="biweekly_tasks_milestone_id">
				                                                    <option value="">Select Milestone</option> 
				                                                    <?php foreach($milestones as $row): ?>
				                                                        <option value="<?php echo $row->milestone_id; ?>" ><?php echo $row->milestone_name; ?></option>
				                                                    <?php endforeach; ?>                       
				                                                </select> 
															</div>
															<div class="clearfix"></div>
															<div class="form-group">
																<label class="control-label">Enter activities</label>
																<div class="">
																	<textarea class="ckeditor form-control" name="biweekly_tasks" id="biweekly_tasks"></textarea>
																</div>
															</div>
															<div class="clearfix"></div>
															<hr>
															<div class="clearfix"></div>
															<div class="form-group">
																<button type="button" id="btn_biweekly_save_tasks" class="btn btn-success btn-sm pull-right">
		                                            			<i class="fa fa-save"></i> <b>Save Accomplished Tasks</b><i id="biweekly_tasks_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		                                        				</button>
		                                        			</div>
		                                        			<div class="clearfix"></div>
														</div>
													</section>
												</div>
												<div class="col-md-6">
													<section class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Saved Accomplished Tasks</h2>
														</header>
														<div class="panel-body">
															<div id="div_biweekly_saved_tasks">
																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Milestone</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($biweekly_tasks)): ?>
																			<?php foreach ($biweekly_tasks as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo character_limiter($row->milestone_name,55); ?></td>
																					<td>
																						<div class="btn-group">
																							<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
																							<ul class="dropdown-menu" role="menu">
																								<li><a href="#"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
																								<li><a href="#"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
																							</ul>
																						</div>
																					</td>
																				</tr>
																			<?php endforeach; ?>
																		<?php endif; ?>
																	</tbody>
																</table>
															</div>
														</div>
													</section>
												</div>

											</div>
											<!-- CHALLENGES -->
											<div id="w1-confirm" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50.1" aria-valuemin="0" aria-valuemax="100" style="width: 50.1%;">
													50.1%
													</div>
												</div>
												<div class="clearfix"></div>						
												<div class="col-md-6">
													<section id="biweekly_challengess" class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Major Challenges</h2>
														</header>
														<div class="panel-body">

															<div class="form-group">
																<label class="control-label">Milestone <span class="required">*</span></label>
				                                                <select data-plugin-selectTwo class="form-control" id="biweekly_challenges_milestone_id" name="biweekly_challenges_milestone_id">
				                                                    <option value="">Select Milestone</option> 
				                                                    <?php foreach($milestones as $row): ?>
				                                                        <option value="<?php echo $row->milestone_id; ?>" ><?php echo $row->milestone_name; ?></option>
				                                                    <?php endforeach; ?>                       
				                                                </select> 
															</div>
															<div class="clearfix"></div>
															<div class="form-group">
																<label class="control-label">Enter challenges</label>
																<div class="">
																	<textarea class="ckeditor form-control" name="biweekly_challenges" id="biweekly_challenges"></textarea>
																</div>
															</div>
															<div class="clearfix"></div>
															<hr>
															<div class="clearfix"></div>
															<div class="form-group">
																<button type="button" id="btn_biweekly_save_challenges" class="btn btn-success btn-sm pull-right">
		                                            			<i class="fa fa-save"></i> <b>Save Major Challenges</b><i id="biweekly_challenges_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		                                        				</button>
		                                        			</div>
		                                        			<div class="clearfix"></div>
														</div>
													</section>
												</div>
												<div class="col-md-6">
													<section class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Saved Major Challenges</h2>
														</header>
														<div class="panel-body">
															<div id="div_biweekly_saved_challenges">
																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Milestone</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($biweekly_challenges)): ?>
																			<?php foreach ($biweekly_challenges as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo character_limiter($row->milestone_name,55); ?></td>
																					<td>
																						<div class="btn-group">
																							<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
																							<ul class="dropdown-menu" role="menu">
																								<li><a href="#"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
																								<li><a href="#"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
																							</ul>
																						</div>
																					</td>
																				</tr>
																			<?php endforeach; ?>
																		<?php endif; ?>
																	</tbody>
																</table>
															</div>
														</div>
													</section>
												</div>

											</div>
											<!-- EVENTS -->
											<div id="w1-events" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="66.8" aria-valuemin="0" aria-valuemax="100" style="width: 66.8%;">
													66.8%
													</div>
												</div>
												<div class="clearfix"></div>						
												<div class="col-md-6">
													<section id="biweekly_eventss" class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Major Events</h2>
														</header>
														<div class="panel-body">

															<div class="form-group">
																<label class="control-label">Milestone <span class="required">*</span></label>
				                                                <select data-plugin-selectTwo class="form-control" id="biweekly_events_milestone_id" name="biweekly_events_milestone_id">
				                                                    <option value="">Select Milestone</option> 
				                                                    <?php foreach($milestones as $row): ?>
				                                                        <option value="<?php echo $row->milestone_id; ?>" ><?php echo $row->milestone_name; ?></option>
				                                                    <?php endforeach; ?>                       
				                                                </select> 
															</div>
															<div class="clearfix"></div>
															<div class="form-group">
																<label class="control-label">Enter events</label>
																<div class="">
																	<textarea class="ckeditor form-control" name="biweekly_events" id="biweekly_events"></textarea>
																</div>
															</div>
															<div class="clearfix"></div>
															<hr>
															<div class="clearfix"></div>
															<div class="form-group">
																<button type="button" id="btn_biweekly_save_events" class="btn btn-success btn-sm pull-right">
		                                            			<i class="fa fa-save"></i> <b>Save Major Events</b><i id="biweekly_events_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		                                        				</button>
		                                        			</div>
		                                        			<div class="clearfix"></div>
														</div>
													</section>
												</div>
												<div class="col-md-6">
													<section class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Saved Major events</h2>
														</header>
														<div class="panel-body">
															<div id="div_biweekly_saved_events">
																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Milestone</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($biweekly_events)): ?>
																			<?php foreach ($biweekly_events as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo character_limiter($row->milestone_name,55); ?></td>
																					<td>
																						<div class="btn-group">
																							<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
																							<ul class="dropdown-menu" role="menu">
																								<li><a href="#"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
																								<li><a href="#"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
																							</ul>
																						</div>
																					</td>
																				</tr>
																			<?php endforeach; ?>
																		<?php endif; ?>
																	</tbody>
																</table>
															</div>
														</div>
													</section>
												</div>
											</div>
											<!-- ACTIVITIES -->
											<div id="w1-activities" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="83.5" aria-valuemin="0" aria-valuemax="100" style="width: 83.5%;">
													83.5%
													</div>
												</div>
												<div class="clearfix"></div>						
												<div class="col-md-6">
													<section id="biweekly_activitiess" class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Activities to undertake in the next 2 months</h2>
														</header>
														<div class="panel-body">

															<div class="form-group">
																<label class="control-label">Milestone <span class="required">*</span></label>
				                                                <select data-plugin-selectTwo class="form-control" id="biweekly_activities_milestone_id" name="biweekly_activities_milestone_id">
				                                                    <option value="">Select Milestone</option> 
				                                                    <?php foreach($milestones as $row): ?>
				                                                        <option value="<?php echo $row->milestone_id; ?>" ><?php echo $row->milestone_name; ?></option>
				                                                    <?php endforeach; ?>                       
				                                                </select> 
															</div>
															<div class="clearfix"></div>
															<div class="form-group">
																<label class="control-label">Enter activities</label>
																<div class="">
																	<textarea class="ckeditor form-control" name="biweekly_activities" id="biweekly_activities"></textarea>
																</div>
															</div>
															<div class="clearfix"></div>
															<hr>
															<div class="clearfix"></div>
															<div class="form-group">
																<button type="button" id="btn_biweekly_save_activities" class="btn btn-success btn-sm pull-right">
		                                            			<i class="fa fa-save"></i> <b>Save Activities</b><i id="biweekly_activities_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		                                        				</button>
		                                        			</div>
		                                        			<div class="clearfix"></div>
														</div>
													</section>
												</div>
												<div class="col-md-6">
													<section class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Saved activities</h2>
														</header>
														<div class="panel-body">
															<div id="div_biweekly_saved_activities">
																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Milestone</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($biweekly_activities)): ?>
																			<?php foreach ($biweekly_activities as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo character_limiter($row->milestone_name,55); ?></td>
																					<td>
																						<div class="btn-group">
																							<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
																							<ul class="dropdown-menu" role="menu">
																								<li><a href="#"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
																								<li><a href="#"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
																							</ul>
																						</div>
																					</td>
																				</tr>
																			<?php endforeach; ?>
																		<?php endif; ?>
																	</tbody>
																</table>
															</div>
														</div>
													</section>
												</div>
											</div>

											<!-- SUBMIT -->
											<div id="w1-finish" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
													100%
													</div>
												</div>
												<div class="clearfix"></div>						
												
												<div id="biweekly_report_preview">
												<?php if (isset($biweekly_report)): ?>									
													<?php foreach ($biweekly_report as $row): ?>
														<section class="panel">
															<div class="panel-body">
																<div class="invoice">
																	<header class="clearfix">
																		<div class="row">
																			<div class="col-sm-12 mt-md mb-lg">
																				<h3 class="h3 mt-none text-dark text-weight-bold text-center">Building Nutritious Food Baskets Project</h3>
																			</div>
																			<div class="col-sm-12 mt-md mb-lg">
																				<img class="img-center img-report-logo" src="<?php echo base_url(); ?>assets/be/images/cip-logo.jpg" alt=""/>					
																			</div>
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
																					<h4 class="h4 mb-md text-dark text-weight-bold">1. Report Summary</h4>
																					<div class="clearfix"></div>
																					<?php echo $row->biweekly_report_summary; ?>
																					<hr>
																					<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">2. Report Remark</h4>
																					<div class="clearfix"></div>
																					<?php echo $row->biweekly_report_remark; ?>
																					<hr>
																					<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">3. Accomplishments from the Reporting Period (<?php echo $row->biweekly_period_from . ' - ' . $row->biweekly_period_to; ?>)</h4>
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
																					<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">4. What are the major challenges you are facing?</h4>
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
																					<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">5. Any major events planned for the next two months?</h4>
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
																					<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">6. What are the major five things your team will undertake in the next two months?</h4>
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
												

																<div class="text-right mr-lg">
																	<a href="#" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
																</div>
															</div>
														</section>

													<?php endforeach; ?>
												<?php endif; ?>
												</div>



											</div>
										</div>
									</form>
								</div>
								<div class="panel-footer">
									<ul class="pager">
										<li class="previous disabled">
											<a><i class="fa fa-angle-left"></i> Previous</a>
										</li>
										<li class="finish hidden pull-right">
											<a>Submit Report</a>
										</li>
										<li class="next">
											<a>
												Save Report Progress &amp; Proceed <i class="fa fa-angle-right"></i>
												<i id="biweekly_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
											</a>
										</li>
									</ul>
								</div>
							</section>
						</div>

						<!--<div class="col-md-6 col-lg-3 col-xl-6">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">
										<span class="label label-primary label-sm text-weight-normal va-middle mr-sm"><i class="fa fa-gear"></i></span>
										<span class="va-middle">Settings</span>
									</h2>
								</header>
								<div class="panel-body">
									<div class="sidebar-widget widget-tasks">
										<ul class="list-unstyled m-none">
											<li><a href="<?php echo base_url(); ?>be/milestones">Milestones</a></li>
											<li><a href="<?php echo base_url(); ?>be/indicators">Indicators</a></li>
											<li><a href="<?php echo base_url(); ?>be/implementor_types">Implementor Types</a></li>			

										</ul>
									</div>
								</div>
							</section>
						</div>-->





					</div>
				</section>
			</div>								
