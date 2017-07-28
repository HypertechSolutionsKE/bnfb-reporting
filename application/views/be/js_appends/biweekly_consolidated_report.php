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
												<h4 class="h4 m-none text-dark text-weight-bold text-center">Bi-Weekly Summary Report</h4>
											</div>
											<div class="col-sm-12 mt-sm mb-xlg">
												<h4 class="h5 m-none text-dark text-weight-bold text-center">Reporting Period: <span class="text-weight-normal"><?php echo $biweekly_consolidated_period_from . ' - ' . $biweekly_consolidated_period_to; ?></span></h4>
											</div>
										</div>
									</header>
									<div class="bill-info">
										<div class="row">
											<div class="col-md-12">
												<div class="bill-to">
													<table class="table table-bordered">
														<thead>
															<tr class="h4 text-dark">
																<th class="text-weight-semibold" style="background: #D7E4BD;">Major Accomplishments</th>
															</tr>
														</thead>
														<tbody>

															<?php foreach ($milestones as $row): ?>
																<tr class="h5 text-dark" style="background: #95B3D7;">
																	<th style="padding-left: 40px"><b><?php echo $row->milestone_name; ?></b></th>
																</tr>
																<tr style="background: #FCD5B5;">
																	<td style="padding-left: 80px">
																		<?php foreach ($reporters as $row3): ?>
																			<b><?php echo $row3->first_name . ' ' . $row3->last_name; ?> <span class="">- <?php echo $row3->user_title_name; ?></span></b>
																					<br>							
																			<?php foreach ($tasks as $row2): ?>
																				<?php if ($row3->system_user_id == $row2->system_user_id && $row->milestone_id == $row2->milestone_id): ?>					
																					<!--<b>Tasks Accomplished:</b><br>-->
																					<?php echo $row2->biweekly_task_description; ?>
																					
																				<?php endif; ?>
																			<?php endforeach; ?>
																			<hr>						
																		<?php endforeach; ?>
																	</td>
																</tr>
															<?php endforeach; ?>


															<!--<?php foreach ($reporters as $row): ?>
																<tr class="h5 text-dark" style="background: #95B3D7;">
																	<th style="padding-left: 40px"><b><?php echo $row->first_name . ' ' . $row->last_name; ?></b> <span class="text-weight-normal">- <?php echo $row->user_title_name; ?></span></th>
																</tr>
																<tr style="background: #FCD5B5;">
																	<td style="padding-left: 80px">
																		<?php foreach ($tasks as $row2): ?>
																			<?php if ($row->system_user_id == $row2->system_user_id): ?>					
																				<b>Milestone:</b>
																				<?php echo $row2->milestone_name; ?>
																				<br>
																				<b>Tasks Accomplished:</b><br>
																				<?php echo $row2->biweekly_task_description; ?>
																				<hr>
																			<?php endif; ?>
																		<?php endforeach; ?>
																	</td>
																</tr>
															<?php endforeach; ?>-->
														</tbody>
														<thead>
															<tr class="h4 text-dark" style="background: #D7E4BD;">
																<th class="text-weight-semibold">Major Challenges</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($reporters as $row): ?>
																<tr class="h5 text-dark" style="background: #95B3D7;">
																	<th style="padding-left: 40px"><b><?php echo $row->first_name . ' ' . $row->last_name; ?></b> <span class="text-weight-normal">- <?php echo $row->user_title_name; ?></span></th>
																</tr>
																<tr style="background: #FCD5B5;">
																	<td style="padding-left: 80px">
																		<?php foreach ($challenges as $row2): ?>
																			<?php if ($row->system_user_id == $row2->system_user_id): ?>					
																				<b>Milestone:</b>
																				<?php echo $row2->milestone_name; ?>
																				<br>
																				<b>Challenges:</b><br>
																				<?php echo $row2->biweekly_challenge_description; ?>
																				<hr>
																			<?php endif; ?>
																		<?php endforeach; ?>
																	</td>
																</tr>
															<?php endforeach; ?>
														</tbody>
														<thead>
															<tr class="h4 text-dark" style="background: #D7E4BD;">
																<th class="text-weight-semibold">Major events planned for the next two months</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($reporters as $row): ?>
																<tr class="h5 text-dark" style="background: #95B3D7;">
																	<th style="padding-left: 40px"><b><?php echo $row->first_name . ' ' . $row->last_name; ?></b> <span class="text-weight-normal">- <?php echo $row->user_title_name; ?></span></th>
																</tr>
																<tr style="background: #FCD5B5;">
																	<td style="padding-left: 80px">
																		<?php foreach ($events as $row2): ?>
																			<?php if ($row->system_user_id == $row2->system_user_id): ?>					
																				<b>Milestone:</b>
																				<?php echo $row2->milestone_name; ?>
																				<br>
																				<b>Events Planned:</b><br>
																				<?php echo $row2->biweekly_event_description; ?>
																				<hr>
																			<?php endif; ?>
																		<?php endforeach; ?>
																	</td>
																</tr>
															<?php endforeach; ?>
														</tbody>
														<thead>
															<tr class="h4 text-dark" style="background: #D7E4BD;">
																<th class="text-weight-semibold">Major Activities to undertake in the next two months</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($reporters as $row): ?>
																<tr class="h5 text-dark" style="background: #95B3D7;">
																	<th style="padding-left: 40px"><b><?php echo $row->first_name . ' ' . $row->last_name; ?></b> <span class="text-weight-normal">- <?php echo $row->user_title_name; ?></span></th>
																</tr>
																<tr style="background: #FCD5B5;">
																	<td style="padding-left: 80px">
																		<?php foreach ($activities as $row2): ?>
																			<?php if ($row->system_user_id == $row2->system_user_id): ?>					
																				<b>Milestone:</b>
																				<?php echo $row2->milestone_name; ?>
																				<br>
																				<b>Activities:</b><br>
																				<?php echo $row2->biweekly_activity_description; ?>
																				<hr>
																			<?php endif; ?>
																		<?php endforeach; ?>
																	</td>
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
