
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Biannual Reports</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><a href="<?php echo base_url(); ?>be/biannual">Biannual Reports</a></li>
								<li><span>View Report</span></li>

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
										<span class="va-middle">Biannual Report View</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span><span class="pull-right"><a href="<?php echo base_url(); ?>be/biannual" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Biannual Reports List"><i class="fa fa-long-arrow-left"></i></a></span>
										<span class="pull-right"><a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Print Report"><i class="fa fa-print"></i></a></span>
									</h2>
								</header>							
								<div class="panel-body">
									<?php if (isset($biannual_report)): ?>									
										<?php foreach ($biannual_report as $row): ?>
											<section class="panel">
												<div class="panel-body">
													<div class="invoice">
														<header class="clearfix">
															<div class="row">
																<div class="col-sm-12 mt-md mb-lg">
																	<h3 class="h3 mt-none text-dark text-weight-bold text-center">Building Nutritious Food Baskets Project</h3>
																</div>
																<div class="col-sm-12 mt-md mb-lg">
																	<img class="img-center img-report-logo" src="<?php echo base_url(); ?>assets/be/images/bnfb-logo.png" alt=""/>					
																</div>
																<div class="col-sm-12 mt-md mb-md">
																	<h4 class="h4 m-none text-dark text-weight-bold text-center"><?php echo $row->biannual_report_title; ?></h4>
																</div>
																<div class="col-sm-12 mt-sm mb-xlg">
																	<h4 class="h5 m-none text-dark text-weight-bold text-center"><?php echo $row->biannual_period_from . ' - ' . $row->biannual_period_to; ?></h4>
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
																		<h4 class="h4 mb-md text-dark text-weight-bold">1. Executive Summary</h4>
																		<div class="clearfix"></div>
																		<?php echo $row->biannual_executive_summary; ?>
																		<hr>
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">2. Accomplishments in last three months (<?php echo $row->biannual_period_from . ' - ' . $row->biannual_period_to; ?>)</h4>
																		<div class="clearfix"></div>
																		<table class="table table-bordered">
																			<thead>
																				<tr class="h5 text-dark">
																					<th class="text-weight-semibold">Project Purpose</th>
																					<th class="text-weight-semibold">Project Objectives</th>
																					<th class="text-weight-semibold">Intermediate Results</th>
																					<th class="text-weight-semibold">Deliverables/outputs during the reporting period</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td rowspan="<?php echo $row->num_objectives + 1; ?>"><?php echo $row->biannual_project_purpose; ?></td>
																					<?php foreach ($biannual_objectives as $row2): ?>
																							<td  rowspan="<?php echo $row2->num_intermediate_results; ?>"><?php echo $row2->biannual_objective_name; ?></td>
																							<?php foreach ($biannual_intermediate_results as $row3): ?>
																								<?php if ($row2->biannual_objective_id == $row3->biannual_objective_id): ?>
																									<td><?php echo $row3->intermediate_result_name; ?></td>
																									<td><?php echo $row3->deliverables; ?></td>
																									</tr><tr>			
																											<?php endif; ?>
																										<?php endforeach; ?>
																							</tr><tr>
																					<?php endforeach; ?>
																				</tr>
																			</tbody>
																		</table>
																		<div class="clearfix"></div>
																		<hr>
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">3. Resources (<?php echo $row->biannual_period_from . ' - ' . $row->biannual_period_to; ?>)</h4>
																		<div class="clearfix"></div>
																		<table class="table table-bordered">
																			<thead>
																				<tr class="h5 text-dark">
																					<th class="text-weight-semibold">Partner</th>
																					<th class="text-weight-semibold">Actual expenditure during the reporting period</th>
																					<th class="text-weight-semibold">Planned expenditure during the reporting period</th>
																					<th class="text-weight-semibold">% spent</th>
																					<th class="text-weight-semibold">Variance</th>
																					<th class="text-weight-semibold">Comment on variance</th>				
																				</tr>
																			</thead>
																			<tbody>
																				<?php foreach ($biannual_resources as $row2): ?>
																					<tr>						
																						<td><?php echo $row2->implementor_type_name; ?></td>
																						<td><?php echo number_format($row2->biannual_actual_expenditure); ?></td>	
																						<td><?php echo number_format($row2->biannual_planned_expenditure); ?></td>	
																						<td><?php echo number_format($row2->biannual_percentage_spent); ?></td>	
																						<td><?php echo number_format($row2->biannual_variance); ?></td>	
																						<td><?php echo $row2->biannual_variance_comment; ?></td>
																					</tr>
																				<?php endforeach; ?>
																			</tbody>
																		</table>
																		<div class="clearfix"></div>
																		<hr>
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">4. Planned Deliverables/outputs in the next three months</h4>
																		<div class="clearfix"></div>
																		<table class="table table-bordered">
																			<thead>
																				<tr class="h5 text-dark">
																					<th class="text-weight-semibold">Partner</th>
																					<th class="text-weight-semibold">Major deliverables/outputs planned for the next three months</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php foreach ($biannual_deliverables as $row2): ?>
																					<tr>						
																						<td>
																							<?php
																								if ($row2->biannual_deliverables_cause != ''){
																									echo $row2->implementor_type_name . " (" . $row2->biannual_deliverables_cause . ")";
																								}else{
																									echo $row2->implementor_type_name;
																								}
																							?>
																						</td>
																						<td><?php echo $row2->biannual_deliverables; ?></td>	
																					</tr>
																				<?php endforeach; ?>
																			</tbody>
																		</table>
																		<div class="clearfix"></div>
																		<hr>
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">5. Management Issues</h4>
																		<p>State key challenges encountered in the last three months; steps taken to overcome the respective challenges; and pending matters for resolution</p>
																		<div class="clearfix"></div>
																		<table class="table table-bordered">
																			<thead>
																				<tr class="h5 text-dark">
																					<th class="text-weight-semibold">PartnerKey Management Issues and Challenges</th>
																					<th class="text-weight-semibold">Action(s) Taken</th>
																					<th class="text-weight-semibold">Recommendation or Pending matters for resolution</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php foreach ($biannual_management_issues as $row2): ?>
																					<tr>						
																						<td><?php echo $row2->biannual_management_issues; ?></td>
																						<td><?php echo $row2->biannual_management_action; ?></td>	
																						<td><?php echo $row2->biannual_management_recommendation; ?></td>					
																					</tr>
																				<?php endforeach; ?>
																			</tbody>
																		</table>
																		<div class="clearfix"></div>
																		<hr>
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">6. Strategic Outlook</h4>
																		<div class="clearfix"></div>
																		<?php echo $row->biannual_strategic_outlook; ?>
																		<div class="clearfix"></div>
																		<hr>
																		<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">7. Key Lessons</h4>
																		<div class="clearfix"></div>
																		<?php echo $row->biannual_key_lessons; ?>
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
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
							</section>
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>
