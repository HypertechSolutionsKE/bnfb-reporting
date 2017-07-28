
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
								<li><a href="<?php echo base_url(); ?>be/biweekly">Biweekly Reports</a></li>
								<li><span>View Report</span></li>

							</ol>
					
							<a href="<?php echo base_url(); ?>be" class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-9 col-xl-6">
							<section class="panel">
								<?php if (isset($biweekly_report)): ?>									
									<?php foreach ($biweekly_report as $row): ?>
										<header class="panel-heading">
											<h2 class="panel-title">
												<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-bar-chart"></i></span>
												<span class="va-middle">Biweekly Report View</span>
												<span class="pull-right"><a href="<?php echo base_url(); ?>be/biweekly" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Biweekly Reports List"><i class="fa fa-long-arrow-left"></i></a></span>
												<span class="pull-right"><a href="javascript:PrintElem();" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Print Report"><i class="fa fa-print"></i></a></span>
												<span class="pull-right"><a href="<?php echo base_url(); ?>be/biweekly/export_to_pdf/<?php echo $row->biweekly_report_id; ?>" class="btn btn-default btn-sm" target="_blank" data-toggle="tooltip" data-placement="top" title="Export to .pdf"><i class="fa fa-file-pdf-o"></i></a></span>
												<span class="pull-right"><a href="<?php echo base_url(); ?>be/biweekly/export_to_word/<?php echo $row->biweekly_report_id; ?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Export to .doc"><i class="fa fa-file-word-o"></i></a></span>
											</h2>
										</header>							
										<div class="panel-body">
											<section class="panel">
												<div class="panel-body">
													<div class="invoice myDivToPrint" id="myDivToPrint">
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
						<div class="col-md-6 col-lg-3 col-xl-6">
							<?php if (isset($biweekly_report)): ?>									
								<?php foreach ($biweekly_report as $row): ?>
									<?php if ($row->system_user_id == $this->session->userdata('user_id') || $this->session->userdata('is_admin') == 1): ?>
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">
													<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-comments-o"></i></span>
													<span class="va-middle">Report Comments</span>
												</h2>
											</header>							
											<div class="panel-body">
												<?php if ($biweekly_num_comments > 0): ?>
													<div class="timeline timeline-simple changelog">
														<div class="tm-body">
															<ol class="tm-items">
																<?php foreach ($biweekly_comments as $row2): ?>
																	<li>
																		<div class="tm-box <?php if ($row2->sender_user_id != $this->session->userdata('user_id')){ echo 'bg-info2';} ?>">
																			<h4><?php echo $row2->first_name . ' ' . $row2->last_name; ?></h4> – <span class="release-date"><?php echo date('M j Y H:i', strtotime($row2->created_on)); ?></span>
																			<p class="text-italicize"><?php echo $row2->biweekly_comment; ?></p>
																		</div>
																	</li>
																<?php endforeach; ?>
															</ol>												
														</div>
													</div>
												<hr>
												<input type="hidden" id="biweekly_report_id" name="biweekly_report_id" value="<?php echo $row->biweekly_report_id; ?>">
                                				<div class="alert alert-danger block-inner" style="display: none;" id="div_biweekly_comment_error">
                                    				<button type="button" class="close" data-dismiss="alert">×</button>
                                        			Error
                                				</div>
                                
                                				<div class="alert alert-success block-inner" style="display: none;" id="div_biweekly_comment_success">
                                    				<button type="button" class="close" data-dismiss="alert">×</button>
                                        			Success
                                				</div>

												<div class="form-group">
													<label class="control-label"><?php if ($row->system_user_id == $this->session->userdata('user_id')){echo 'Reply';}else{echo 'Make Comment';} ?></label>
													<textarea class="form-control" name="biweekly_comment_area" id="biweekly_comment_area" rows="4"></textarea>
												</div>
												<div class="form-group">
													<button type="button" id="btn_biweekly_comment" class="btn btn-success btn-sm pull-right">
					                           			<i class="fa fa-save"></i> <b>Submit</b><i id="biweekly_comment_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
					                        		</button>
					                        	</div>	

												<?php else: ?>
													<p><i>This report has no comments</i></p>
													<?php if ($row->system_user_id != $this->session->userdata('user_id') && $this->session->userdata('is_admin') == 1): ?>

														<hr>
														<input type="hidden" id="biweekly_report_id" name="biweekly_report_id" value="<?php echo $row->biweekly_report_id; ?>">
		                                				<div class="alert alert-danger block-inner" style="display: none;" id="div_biweekly_comment_error">
		                                    				<button type="button" class="close" data-dismiss="alert">×</button>
		                                        			Error
		                                				</div>
		                                
		                                				<div class="alert alert-success block-inner" style="display: none;" id="div_biweekly_comment_success">
		                                    				<button type="button" class="close" data-dismiss="alert">×</button>
		                                        			Success
		                                				</div>

														<div class="form-group">
															<label class="control-label"><?php if ($row->system_user_id == $this->session->userdata('user_id')){echo 'Reply';}else{echo 'Make Comment';} ?></label>
															<textarea class="form-control" name="biweekly_comment_area" id="biweekly_comment_area" rows="4"></textarea>
														</div>
														<div class="form-group">
															<button type="button" id="btn_biweekly_comment" class="btn btn-success btn-sm pull-right">
							                           			<i class="fa fa-save"></i> <b>Submit</b><i id="biweekly_comment_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
							                        		</button>
							                        	</div>	
	

													<?php endif; ?>
												<?php endif; ?>

					                        </div>								

										</section>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>						

						</div>						
					</div>
					<!-- end: page -->
				</section>
			</div>
