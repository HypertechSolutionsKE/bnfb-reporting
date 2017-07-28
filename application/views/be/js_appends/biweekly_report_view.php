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
																				<img class="img-center img-report-logo" src="<?php echo base_url(); ?>assets/be/images/bnfb-logo.png" alt=""/>					
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
												

																<div class="text-right mr-lg">
																	<a href="#" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</section>
										<?php endforeach; ?>
									<?php endif; ?>
