
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Quarterly Reports</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="<?php echo base_url(); ?>be/quarterly">Quarterly Reports</a></span></li>
								<?php if (isset($quarterly)): ?>
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
							<section class="panel form-wizard" id="w2">
								<header class="panel-heading">
									<h2 class="panel-title">
										<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-line-chart"></i></span>
										<span class="va-middle">New Quarterly Report</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be/quarterly" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Quarterly Reports list"><i class="fa fa-long-arrow-left"></i> <span class="hidden-sm"></span></a></span>
									</h2>
								</header>

								<div class="panel-body">
									<div class="wizard-progress">
										<div class="steps-progress">
												<div class="progress-indicator"></div>
											</div>
										<ul class="wizard-steps">
											<li class="active">
												<a href="#w2-account" data-toggle="tab" class="text-center">
													
														<span class="badge">1</span>
														Executive Summary
													
												</a>
											</li>
											<li>
												<a href="#w2-profile" data-toggle="tab" class="text-center">
													
														<span class="badge">2</span>
														Accomplishments

												</a>
											</li>
											<li>
												<a href="#w2-confirm" data-toggle="tab" class="text-center">
													
														<span class="badge">3</span>
														Resources &amp; Finance
													
												</a>
											</li>
											<li>
												<a href="#w2-events" data-toggle="tab" class="text-center">
													
														<span class="badge">4</span>
														Planned Deliverables
													
												</a>
											</li>
											<li>
												<a href="#w2-management" data-toggle="tab" class="text-center">
													
														<span class="badge">5</span>
														Management Issues &amp;  Challenges
													
												</a>
											</li>
											<li>
												<a href="#w2-strategic" data-toggle="tab" class="text-center">
													
														<span class="badge">6</span>
														Strategic Outlook
													
												</a>
											</li>
											<li>
												<a href="#w2-lessons" data-toggle="tab" class="text-center">
													
														<span class="badge">7</span>
														Key Lessons
													
												</a>
											</li>
											<li>
												<a href="#w2-finish" data-toggle="tab" class="text-center">
													
														<span class="badge">8</span>
														Preview &amp; Submit
													
												</a>
											</li>

										</ul>
									</div>
									<form class="" novalidate="novalidate" method="post" action="<?php echo base_url(); ?>be/quarterly/save">
										<div id="quarterly_success" style="display: none" class="alert alert-success block-inner"></div>
										<div id="quarterly_error" style="display: none" class="alert alert-danger block-inner"></div>

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
											<div id="w2-account" class="tab-pane active">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="12.5" aria-valuemin="0" aria-valuemax="100" style="width: 12.5%;">
													12.5%
													</div>
												</div>
												<div class="clearfix"></div>									
												<?php if (isset($quarterly_report)): ?>
													<?php foreach ($quarterly_report as $row): ?>
														<!--<div class="form-group col-md-12">
															<label class="control-label">Report Title <span class="required">*</span></label>
															<input type="text" name="quarterly_report_title" id="quarterly_report_title" class="form-control" value="<?php echo $row->quarterly_report_title; ?>" required/>
														</div>-->

														<div class="form-group col-md-12">		
															<label class="control-label">Partner/Implementor</label>
						                                    <select data-plugin-selectTwo class="form-control" id="quarterly_implementor_id" required name="quarterly_implementor_id">
						                                      	<option value="">-- Select Partner --</option> 
						                                       	<?php foreach($implementors as $row2): ?>
						                                         	<option value="<?php echo $row2->implementor_id; ?>"  <?php if($row->quarterly_implementor_id == $row2->implementor_id){echo 'selected';} ?> ><?php echo $row2->implementor_name; ?></option>
						                                        <?php endforeach; ?>             
						                                    </select>
						                                </div> 

														<div class="clearfix"></div>
														<div class="form-group col-sm-3">
															<label class="control-label">Period: From <span class="required">*</span></label>													
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input type="text" name="quarterly_period_from" id="quarterly_period_from" class="form-control" value="<?php echo $row->quarterly_period_from; ?>" data-plugin-datepicker required>
															</div>													
														</div>
														<div class="form-group col-sm-3">
															<label class="control-label">To <span class="required">*</span></label>
															<div class="">
																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="fa fa-calendar"></i>
																	</span>
																	<input type="text" name="quarterly_period_to" id="quarterly_period_to" class="form-control" value="<?php echo $row->quarterly_period_to; ?>" data-plugin-datepicker required>
																</div>
															</div>
														</div>
														<div class="clearfix"></div>
														<div class="form-group col-md-12">
															<label class="control-label">Executive Summary</label>
															<div class="">
															<textarea class="ckeditor form-control" name="quarterly_executive_summary" id="quarterly_executive_summary"><?php echo $row->quarterly_executive_summary; ?></textarea>
															</div>
														</div>
														<div class="clearfix"></div>
													<?php endforeach; ?>
												<?php else: ?>
													<!--<div class="form-group col-md-12">
														<label class="control-label">Report Title <span class="required">*</span></label>
														<input type="text" name="quarterly_report_title" id="quarterly_report_title" class="form-control" required/>
													</div>-->

													<div class="form-group col-md-12">		
														<label class="control-label">Partner/Implementor</label>
					                                    <select data-plugin-selectTwo class="form-control" id="quarterly_implementor_id" required name="quarterly_implementor_id">
					                                      	<option value="">-- Select Partner --</option> 
					                                       	<?php foreach($implementors as $row2): ?>
					                                         	<option value="<?php echo $row2->implementor_id; ?>" ><?php echo $row2->implementor_name; ?></option>
					                                        <?php endforeach; ?>             
					                                    </select>
					                                </div> 


													<div class="clearfix"></div>
													<div class="form-group col-sm-3">
														<label class="control-label">Period: From <span class="required">*</span></label>													
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</span>
															<input type="text" name="quarterly_period_from" id="quarterly_period_from" class="form-control" data-plugin-datepicker required>
														</div>													
													</div>
													<div class="form-group col-sm-3">
														<label class="control-label">To <span class="required">*</span></label>
														<div class="">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input type="text" name="quarterly_period_to" id="quarterly_period_to" class="form-control" data-plugin-datepicker required>
															</div>
														</div>
													</div>
													<div class="clearfix"></div>
													<div class="form-group col-md-12">
														<label class="control-label">Executive Summary</label>
														<div class="">
														<textarea class="ckeditor form-control" name="quarterly_executive_summary" id="quarterly_executive_summary"></textarea>
														</div>
													</div>
													<div class="clearfix"></div>
												<?php endif; ?>
											</div>

											<div id="w2-profile" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
													25%
													</div>
												</div>
												<div class="clearfix"></div>
												<?php if (isset($quarterly_report)): ?>
													<?php foreach ($quarterly_report as $row): ?>
														<!--<div class="form-group col-md-12">
															<label class="control-label">Project Purpose <span class="required">*</span></label>
															<input type="text" name="quarterly_project_purpose" id="quarterly_project_purpose" class="form-control" value="<?php echo $row->quarterly_project_purpose; ?>" required/>
														</div>-->
														<div class="form-group col-md-12">		
															<label class="control-label">Project Purpose</label>
						                                    <select data-plugin-selectTwo class="form-control" id="quarterly_project_purpose_id" required name="quarterly_iproject_purpose_id">
						                                      	<option value="">-- Select Project Purpose --</option> 
						                                       	<?php foreach($project_purpose as $row2): ?>
						                                         	<option value="<?php echo $row2->project_purpose_id; ?>" <?php if($row->quarterly_project_purpose_id == $row2->project_purpose_id){echo 'selected';} ?> ><?php echo $row2->project_purpose; ?></option>
						                                        <?php endforeach; ?>             
						                                    </select>
						                                </div> 

													<?php endforeach; ?>
												<?php else: ?>
													<!--<div class="form-group col-md-12">
														<label class="control-label">Project Purpose <span class="required">*</span></label>
														<input type="text" name="quarterly_project_purpose" id="quarterly_project_purpose" class="form-control" required/>

													</div>-->
														<div class="form-group col-md-12">		
															<label class="control-label">Project Purpose</label>
						                                    <select data-plugin-selectTwo class="form-control" id="quarterly_project_purpose_id" required name="quarterly_iproject_purpose_id">
						                                      	<option value="">-- Select Project Purpose --</option> 
						                                       	<?php foreach($project_purpose as $row2): ?>
						                                         	<option value="<?php echo $row2->project_purpose_id; ?>" ><?php echo $row2->project_purpose; ?></option>
						                                        <?php endforeach; ?>             
						                                    </select>
						                                </div> 


												<?php endif; ?>
												<div class="clearfix"></div>
												<hr>
												<div class="col-md-6">
													<section class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Project Objectives</h2>
														</header>
														<div class="panel-body">
														<div class="form-group col-md-12">		
															<label class="control-label">Objective</label>
						                                    <select data-plugin-selectTwo class="form-control populate quarterly_project_objective_id" id="quarterly_project_objective_id" name="quarterly_project_objective_id">
						                                      	<option value="">-- Select Project Objective --</option> 
						                                       	<?php foreach($project_objectives as $row2): ?>
						                                         	<option value="<?php echo $row2->project_objective_id; ?>"><?php echo $row2->project_objective_name; ?></option>
						                                        <?php endforeach; ?>             
						                                    </select>
						                                </div> 

															<div class="">
																
																<div style="padding-left: 15px">
																	
																	<div class="form-group col-md-12">		
																		<label class="control-label">Intermediate Result</label>
					                                                	<select data-plugin-selectTwo class="form-control populate quarterly_intermediate_result_id" id="quarterly_intermediate_result_id" name="quarterly_intermediate_result_id">
					                                                    	<option value="">-- Select Intermediate Result --</option> 
					                                                    	<?php foreach($intermediate_results as $row2): ?>
					                                                        	<option value="<?php echo $row2->intermediate_result_id; ?>" ><?php echo $row2->intermediate_result_name; ?></option>
					                                                    	<?php endforeach; ?>             
					                                                	</select>
					                                                </div>
																	<div class="form-group col-md-12">		
																		<label class="control-label">Country/Region</label>
					                                                	<select data-plugin-selectTwo class="form-control populate quarterly_country_id" id="quarterly_country_id" name="quarterly_country_id">
					                                                    	<option value="">-- Select Country/Region --</option> 
					                                                    	<?php foreach($countries as $row2): ?>
					                                                        	<option value="<?php echo $row2->country_id; ?>" ><?php echo $row2->country_name; ?></option>
					                                                    	<?php endforeach; ?>             
					                                                	</select>
					                                                </div>
																	<div class="form-group col-md-12">		
																		<label class="control-label">Thematic Area</label>
					                                                	<select data-plugin-selectTwo class="form-control populate quarterly_thematic_area_id" id="quarterly_thematic_area_id" name="quarterly_thematic_area_id">
					                                                    	<option value="">-- Select Thematic Area --</option> 
					                                                    	<?php foreach($thematic_areas as $row2): ?>
					                                                        	<option value="<?php echo $row2->thematic_area_id; ?>" ><?php echo $row2->thematic_area_name; ?></option>
					                                                    	<?php endforeach; ?>             
					                                                	</select>
					                                                </div>
																	<div class="form-group col-md-12">		
																		<label class="control-label">Milestone</label>
					                                                	<select data-plugin-selectTwo class="form-control populate quarterly_milestone_id" id="quarterly_milestone_id" name="quarterly_milestone_id">
					                                                    	<option value="">-- Select Milestone --</option> 
					                                                    	<?php foreach($milestones as $row2): ?>
					                                                        	<option value="<?php echo $row2->milestone_id; ?>" ><?php echo $row2->milestone_name; ?></option>
					                                                    	<?php endforeach; ?>             
					                                                	</select>
					                                                </div>


																	<div class="form-group col-md-12">	
																		<label class="control-label">Deliverables/Outputs during the reporting period</label>
																		<div class="">
																			<textarea class="ckeditor form-control quarterly_deliverable" name="quarterly_deliverable" id="quarterly_deliverable"></textarea>
																		</div>
																	</div>
																	<!--<div class="clearfix"></div>
																	<div class="form-group col-md-12">
																		<button type="button" id="btn_quarterly_add_intermediate_result" class="btn btn-info btn-sm btn_quarterly_add_intermediate_result">
				                                            			<i class="fa fa-plus-circle"></i> Add Intermediate Result
				                                        				</button>
				                                        			</div>
				                                        			<div class="clearfix"></div>
																	
																	<div id="quarterly_intermediate_results_load">
																			
																	</div>


																	<hr>-->
																	<div class="clearfix"></div>

																	<div class="form-group col-md-12">
																		<button type="button" id="btn_quarterly_save_objective" class="btn btn-success btn-sm pull-right">
				                                            			<i class="fa fa-save"></i> <b>Save Objective</b><i id="quarterly_objective_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
				                                        				</button>
				                                        			</div>
				                                        			<div class="clearfix"></div>
			                                        			</div>
															
															</div>
														</div>
													</section>
												</div>
												<div class="col-md-6">
													<section class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Saved Objectives</h2>
														</header>
														<div class="panel-body">
															<div id="div_quarterly_saved_objectives">
																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Objective</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($quarterly_objectives)): ?>
																			<?php foreach ($quarterly_objectives as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo character_limiter($row->project_objective_name,50); ?></td>
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
											<!-- RESOURCES -->
											<div id="w2-confirm" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="37.5" aria-valuemin="0" aria-valuemax="100" style="width: 37.5%;">
													37.5%
													</div>
												</div>
												<div class="clearfix"></div>						

												<div class="col-md-6">
													<section id="quarterly_project_resource" class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Project Resources</h2>
														</header>
														<div class="panel-body">
															<div class="form-group col-md-12">		
																<label class="control-label">Partner</label>
					                                            <select data-plugin-selectTwo class="form-control populate" id="quarterly_resource_implementor_id" name="quarterly_resource_implementor_id">
					                                               	<option value="">-- Select Partner --</option> 
					                                               	<?php foreach($implementors as $row2): ?>
					                                                   	<option value="<?php echo $row2->implementor_id; ?>" ><?php echo $row2->implementor_name; ?></option>
					                                               	<?php endforeach; ?>             
					                                            </select>
					                                		</div>
					                                		<div class="clearfix"></div>
															<div class="form-group col-sm-6">			
																<label class="control-label">Actual Expenditure</label>
																<input type="text" name="quarterly_resource_actual_expenditure" id="quarterly_resource_actual_expenditure" class="form-control"/>
															</div>										
															<div class="form-group col-sm-6">			
																<label class="control-label">Planned Expenditure</label>
																<input type="text" name="quarterly_resource_planned_expenditure" id="quarterly_resource_planned_expenditure" class="form-control"/>
															</div>										
					                                		<div class="clearfix"></div>
															<div class="form-group col-sm-6">			
																<label class="control-label">Percentage Spent (%)</label>
																<input type="text" name="quarterly_resource_percentage_spent" id="quarterly_resource_percentage_spent" class="form-control"/>
															</div>										
															<div class="form-group col-sm-6">			
																<label class="control-label">Variance</label>
																<input type="text" name="quarterly_resource_variance" id="quarterly_resource_variance" class="form-control"/>
															</div>										
					                                		<div class="clearfix"></div>

															<div class="form-group col-md-12">	
																<label class="control-label">Comment on Variance</label>
																<textarea class="form-control" name="quarterly_resource_variance_comment" id="quarterly_resource_variance_comment" rows="6"></textarea>
															</div>
					                                    	<div class="clearfix"></div>				
															<hr>
															<div class="clearfix"></div>
															<div class="form-group col-md-12">
																<button type="button" id="btn_quarterly_save_resource" class="btn btn-success btn-sm pull-right">
		                                            			<i class="fa fa-save"></i> <b>Save Resource</b><i id="quarterly_resource_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		                                        				</button>
		                                        			</div>
		                                        			<div class="clearfix"></div>
														</div>
													</section>
												</div>
												<div class="col-md-6">
													<section class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Saved Project Resources</h2>
														</header>
														<div class="panel-body">
															<div id="div_quarterly_saved_resources">
																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Partner</th>
																			<th>Actual Exp.</th>
																			<th>Planned Exp.</th>
																			<th>% Spent</th>
																			<th>Variance</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($quarterly_resources)): ?>
																			<?php foreach ($quarterly_resources as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo $row->implementor_name; ?></td>
																					<td><?php echo number_format($row->quarterly_actual_expenditure); ?></td>
																					<td><?php echo number_format($row->quarterly_planned_expenditure); ?></td>
																					<td><?php echo number_format($row->quarterly_percentage_spent); ?>%</td>
																					<td><?php echo number_format($row->quarterly_variance); ?></td>
																					<td>
																						<div class="btn-group">
																							<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
																							<ul class="dropdown-menu" role="menu">
																								<li><a class="modal-with-form modal-with-zoom-anim quarterly_edit_resource" href="#modalEditProjectResource" data-id ="<?php echo $row->quarterly_resource_id; ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
																								<li><a class="quarterly_delete_resource" href="javascript:void(0);" data-id ="<?php echo $row->quarterly_resource_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
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
											<!-- PLANNED DELIVERABLES -->
											<div id="w2-events" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
													50%
													</div>
												</div>
												<div class="clearfix"></div>


												<div class="col-md-6">
													<section class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Planned Deliverables</h2>
														</header>
														<div class="panel-body">
														<div class="form-group col-md-12">		
															<label class="control-label">Objective</label>
						                                    <select data-plugin-selectTwo class="form-control populate quarterly_deliverable_project_objective_id" id="quarterly_deliverable_project_objective_id" name="quarterly_deliverable_project_objective_id">
						                                      	<option value="">-- Select Project Objective --</option> 
						                                       	<?php foreach($project_objectives as $row2): ?>
						                                         	<option value="<?php echo $row2->project_objective_id; ?>"><?php echo $row2->project_objective_name; ?></option>
						                                        <?php endforeach; ?>             
						                                    </select>
						                                </div> 

															<div class="">
																
																<div style="padding-left: 15px">
																	
																	<div class="form-group col-md-12">		
																		<label class="control-label">Intermediate Result</label>
					                                                	<select data-plugin-selectTwo class="form-control populate quarterly_deliverable_intermediate_result_id" id="quarterly_deliverable_intermediate_result_id" name="quarterly_deliverable_intermediate_result_id">
					                                                    	<option value="">-- Select Intermediate Result --</option> 
					                                                    	<?php foreach($intermediate_results as $row2): ?>
					                                                        	<option value="<?php echo $row2->intermediate_result_id; ?>" ><?php echo $row2->intermediate_result_name; ?></option>
					                                                    	<?php endforeach; ?>             
					                                                	</select>
					                                                </div>
																	<div class="form-group col-md-12">		
																		<label class="control-label">Country/Region</label>
					                                                	<select data-plugin-selectTwo class="form-control populate quarterly_deliverable_country_id" id="quarterly_deliverable_country_id" name="quarterly_deliverable_country_id">
					                                                    	<option value="">-- Select Country/Region --</option> 
					                                                    	<?php foreach($countries as $row2): ?>
					                                                        	<option value="<?php echo $row2->country_id; ?>" ><?php echo $row2->country_name; ?></option>
					                                                    	<?php endforeach; ?>             
					                                                	</select>
					                                                </div>
																	<div class="form-group col-md-12">		
																		<label class="control-label">Thematic Area</label>
					                                                	<select data-plugin-selectTwo class="form-control populate quarterly_deliverable_thematic_area_id" id="quarterly_deliverable_thematic_area_id" name="quarterly_deliverable_thematic_area_id">
					                                                    	<option value="">-- Select Thematic Area --</option> 
					                                                    	<?php foreach($thematic_areas as $row2): ?>
					                                                        	<option value="<?php echo $row2->thematic_area_id; ?>" ><?php echo $row2->thematic_area_name; ?></option>
					                                                    	<?php endforeach; ?>             
					                                                	</select>
					                                                </div>
																	<div class="form-group col-md-12">		
																		<label class="control-label">Milestone</label>
					                                                	<select data-plugin-selectTwo class="form-control populate quarterly_deliverable_milestone_id" id="quarterly_deliverable_milestone_id" name="quarterly_deliverable_milestone_id">
					                                                    	<option value="">-- Select Milestone --</option> 
					                                                    	<?php foreach($milestones as $row2): ?>
					                                                        	<option value="<?php echo $row2->milestone_id; ?>" ><?php echo $row2->milestone_name; ?></option>
					                                                    	<?php endforeach; ?>             
					                                                	</select>
					                                                </div>


																	<div class="form-group col-md-12">	
																		<label class="control-label">Deliverables/Outputs during the reporting period</label>
																		<div class="">
																			<textarea class="ckeditor form-control quarterly_deliverable_deliverable" name="quarterly_deliverable_deliverable" id="quarterly_deliverable_deliverable"></textarea>
																		</div>
																	</div>
																	<!--<div class="clearfix"></div>
																	<div class="form-group col-md-12">
																		<button type="button" id="btn_quarterly_add_intermediate_result" class="btn btn-info btn-sm btn_quarterly_add_intermediate_result">
				                                            			<i class="fa fa-plus-circle"></i> Add Intermediate Result
				                                        				</button>
				                                        			</div>
				                                        			<div class="clearfix"></div>
																	
																	<div id="quarterly_intermediate_results_load">
																			
																	</div>


																	<hr>-->
																	<div class="clearfix"></div>

																	<div class="form-group col-md-12">
																		<button type="button" id="btn_quarterly_save_deliverables" class="btn btn-success btn-sm pull-right">
				                                            			<i class="fa fa-save"></i> <b>Save Deliverable</b><i id="quarterly_deliverable_objective_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
				                                        				</button>
				                                        			</div>
				                                        			<div class="clearfix"></div>
			                                        			</div>
															
															</div>
														</div>
													</section>
												</div>

												<!--<div class="col-md-6">
													<section id="quarterly_planned_deliverables" class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Planned Deliverables</h2>
														</header>
														<div class="panel-body">
															<div class="form-group col-md-12">		
																<label class="control-label">Partner</label>
					                                            <select data-plugin-selectTwo class="form-control populate" id="quarterly_deliverables_implementor_id" name="quarterly_deliverables_implementor_id">
					                                               	<option value="">-- Select Partner --</option> 
					                                               	<?php foreach($implementors as $row2): ?>
					                                                   	<option value="<?php echo $row2->implementor_id; ?>" ><?php echo $row2->implementor_name; ?></option>
					                                               	<?php endforeach; ?>             
					                                            </select>
					                                		</div>
					                                		<div class="clearfix"></div>
					                                		<div class="clearfix"></div>
															<div class="form-group col-md-12">	
																<label class="control-label">Major deliverables/outputs planned for the next three months</label>
																<textarea class="ckeditor form-control" name="quarterly_deliverables" id="quarterly_deliverables"></textarea>
															</div>
					                                    	<div class="clearfix"></div>				
															<hr>
															<div class="clearfix"></div>
															<div class="form-group col-md-12">
																<button type="button" id="btn_quarterly_save_deliverables" class="btn btn-success btn-sm pull-right">
		                                            			<i class="fa fa-save"></i> <b>Save Planned Deliverables</b><i id="quarterly_deliverables_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		                                        				</button>
		                                        			</div>
		                                        			<div class="clearfix"></div>
														</div>
													</section>
												</div>-->
												<div class="col-md-6">
													<section class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Saved Planned Deliverables</h2>
														</header>
														<div class="panel-body">
															<div id="div_quarterly_saved_deliverables">
																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Objective</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($quarterly_deliverables)): ?>
																			<?php foreach ($quarterly_deliverables as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo character_limiter($row->project_objective_name,50); ?></td>
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



																<!--<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Partner</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($quarterly_deliverables)): ?>
																			<?php foreach ($quarterly_deliverables as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo $row->implementor_name; ?></td>
																					<td>
																						<div class="btn-group">
																							<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
																							<ul class="dropdown-menu" role="menu">
																								<li><a class="modal-with-form modal-with-zoom-anim quarterly_edit_deliverables" href="#modalEditPlannedDeliverables" data-id ="<?php echo $row->quarterly_deliverables_id; ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
																								<li><a class="quarterly_delete_deliverables" href="javascript:void(0);" data-id ="<?php echo $row->quarterly_deliverables_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
																							</ul>
																						</div>
																					</td>
																				</tr>
																			<?php endforeach; ?>
																		<?php endif; ?>
																	</tbody>
																</table>-->
															</div>
														</div>
													</section>
												</div>
											</div>
											<!-- MANAGEMENT ISSUES -->
											<div id="w2-management" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="62.5" aria-valuemin="0" aria-valuemax="100" style="width: 62.5%;">
													62.5%
													</div>
												</div>
												<div class="clearfix"></div>						

												<div class="col-md-6">
													<section id="quarterly_management_issuess" class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Management Issues</h2>
														</header>
														<div class="panel-body">
															<div class="form-group col-md-12">	
																<label class="control-label">Key Management Issues and Challenges</label>
																<textarea class="form-control" name="quarterly_management_issues" id="quarterly_management_issues" rows="5"></textarea>
															</div>
					                                    	<div class="clearfix"></div>
															<div class="form-group col-md-12">	
																<label class="control-label">Action(s) Taken</label>
																<textarea class="form-control" name="quarterly_management_action" id="quarterly_management_action" rows="5"></textarea>
															</div>
					                                    	<div class="clearfix"></div>
															<div class="form-group col-md-12">	
																<label class="control-label">Recommendation or Pending matters for resolution</label>
																<textarea class="form-control" name="quarterly_management_recommendation" id="quarterly_management_recommendation" rows="5"></textarea>
															</div>
					                                    	<div class="clearfix"></div>
															<hr>
															<div class="clearfix"></div>
															<div class="form-group col-md-12">
																<button type="button" id="btn_quarterly_save_management_issues" class="btn btn-success btn-sm pull-right">
		                                            			<i class="fa fa-save"></i> <b>Save Management Issues</b><i id="quarterly_management_issues_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		                                        				</button>
		                                        			</div>
		                                        			<div class="clearfix"></div>
														</div>
													</section>
												</div>
												<div class="col-md-6">
													<section class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Saved Management Issues</h2>
														</header>
														<div class="panel-body">
															<div id="div_quarterly_saved_management_issues">
																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Issue</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($quarterly_management_issues)): ?>
																			<?php foreach ($quarterly_management_issues as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo character_limiter($row->quarterly_management_issues,55); ?></td>
																					<td>
																						<div class="btn-group">
																							<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
																							<ul class="dropdown-menu" role="menu">
																								<li><a  class="modal-with-form modal-with-zoom-anim quarterly_edit_management_issues" href="#modalEditManagementIssues" data-id ="<?php echo $row->quarterly_management_issues_id; ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
																								<li><a class="quarterly_delete_management_issues" href="javascript:void(0);" data-id ="<?php echo $row->quarterly_management_issues_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
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
											<!-- STRATEGIC OUTLOOK -->
											<div id="w2-strategic" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%;">
													75%
													</div>
												</div>
												<div class="clearfix"></div>
												<?php if (isset($quarterly_report)): ?>
													<?php foreach ($quarterly_report as $row): ?>
														<div class="form-group col-md-12">
															<label class="control-label">Strategic Outlook</label>
															<div class="">
																<textarea class="ckeditor form-control" name="quarterly_strategic_outlook" id="quarterly_strategic_outlook"><?php echo $row->quarterly_strategic_outlook; ?></textarea>
															</div>
														</div>
														<div class="clearfix"></div>
													<?php endforeach; ?>
												<?php else: ?>
													<div class="form-group col-md-12">
														<label class="control-label">Strategic Outlook</label>
														<div class="">
															<textarea class="ckeditor form-control" name="quarterly_strategic_outlook" id="quarterly_strategic_outlook"></textarea>
														</div>
													</div>
													<div class="clearfix"></div>
												<?php endif; ?>												

											</div>

											<!-- KEY LESSONS -->
											<div id="w2-lessons" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="87.5" aria-valuemin="0" aria-valuemax="100" style="width:87.5%;">
													87.5%
													</div>
												</div>
												<div class="clearfix"></div>
												<?php if (isset($quarterly_report)): ?>
													<?php foreach ($quarterly_report as $row): ?>
														<div class="form-group col-md-12">
															<label class="control-label">Key Lessons</label>
															<div class="">
																<textarea class="ckeditor form-control" name="quarterly_key_lessons" id="quarterly_key_lessons"><?php echo $row->quarterly_key_lessons; ?></textarea>
															</div>
														</div>
														<div class="clearfix"></div>
													<?php endforeach; ?>
												<?php else: ?>
													<div class="form-group col-md-12">
														<label class="control-label">Key Lessons</label>
														<div class="">
															<textarea class="ckeditor form-control" name="quarterly_key_lessons" id="quarterly_key_lessons"></textarea>
														</div>
													</div>
													<div class="clearfix"></div>
												<?php endif; ?>
											</div>

											<!-- SUBMIT -->
											<div id="w2-finish" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
													100%
													</div>
												</div>
												<div class="clearfix"></div>
												<div id="quarterly_report_preview">
												<?php if (isset($quarterly_report)): ?>									
													<?php foreach ($quarterly_report as $row): ?>
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
																				<h4 class="h4 m-none text-dark text-weight-bold text-center"><?php echo $row->quarterly_report_title; ?></h4>
																			</div>
																			<div class="col-sm-12 mt-sm mb-xlg">
																				<h4 class="h5 m-none text-dark text-weight-bold text-center"><?php echo $row->quarterly_period_from . ' - ' . $row->quarterly_period_to; ?></h4>
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
																					<?php echo $row->quarterly_executive_summary; ?>
																					<hr>
																					<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">2. Accomplishments in last three months (<?php echo $row->quarterly_period_from . ' - ' . $row->quarterly_period_to; ?>)</h4>
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
																								<td rowspan="<?php echo $num_quarterly_objectives; ?>"><?php echo $row->project_purpose; ?></td>

																								<?php foreach ($quarterly_objectives as $row2): ?>
																									<td><?php echo $row2->project_objective_name; ?></td>
																									<td><?php echo $row2->intermediate_result_name; ?></td>	
																									<td><?php echo $row2->quarterly_deliverables; ?></td>
																									</tr><tr>		
																								<?php endforeach; ?>	
																								
																							</tr>
																						</tbody>
																					</table>
																					<div class="clearfix"></div>
																					<hr>
																					<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">3. Resources (<?php echo $row->quarterly_period_from . ' - ' . $row->quarterly_period_to; ?>)</h4>
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
																							<?php foreach ($quarterly_resources as $row2): ?>
																								<tr>						
																									<td><?php echo $row2->implementor_name; ?></td>
																									<td><?php echo number_format($row2->quarterly_actual_expenditure); ?></td>	
																									<td><?php echo number_format($row2->quarterly_planned_expenditure); ?></td>	
																									<td><?php echo number_format($row2->quarterly_percentage_spent); ?></td>	
																									<td><?php echo number_format($row2->quarterly_variance); ?></td>	
																									<td><?php echo $row2->quarterly_variance_comment; ?></td>
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
																								<th class="text-weight-semibold">Objective</th>
																								<th class="text-weight-semibold">Thematic Area</th>
																								<th class="text-weight-semibold">Milestone</th>

																								<th class="text-weight-semibold">Activities</th>
																							</tr>
																						</thead>
																						<tbody>
																							<?php foreach ($quarterly_deliverables as $row2): ?>
																								<tr>						
																									<td><?php echo $row2->project_objective_name; ?></td>
																									<td><?php echo $row2->thematic_area_name; ?></td>
																									<td><?php echo $row2->milestone_name; ?></td>

																									<td><?php echo $row2->quarterly_deliverable_deliverables; ?></td>	
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
																							<?php foreach ($quarterly_management_issues as $row2): ?>
																								<tr>						
																									<td><?php echo $row2->quarterly_management_issues; ?></td>
																									<td><?php echo $row2->quarterly_management_action; ?></td>	
																									<td><?php echo $row2->quarterly_management_recommendation; ?></td>					
																								</tr>
																							<?php endforeach; ?>
																						</tbody>
																					</table>
																					<div class="clearfix"></div>
																					<hr>
																					<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">6. Strategic Outlook</h4>
																					<div class="clearfix"></div>
																					<?php echo $row->quarterly_strategic_outlook; ?>
																					<div class="clearfix"></div>
																					<hr>
																					<h4 class="h4 mt-lg mb-md text-dark text-weight-bold">7. Key Lessons</h4>
																					<div class="clearfix"></div>
																					<?php echo $row->quarterly_key_lessons; ?>
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
												<i id="quarterly_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
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










<!--  

==== MODAL FORMS ====

-->

<!-- Edit Project Resource -->	
	<div id="modalEditProjectResource" class="modal-block modal-block-primary mfp-hide">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit Project Resource</h2>
			</header>
			<div class="panel-body">
				<form id="frm_modal_edit_project_resource" class="mb-lg" novalidate="novalidate">
               		<div class="alert alert-danger block-inner" style="display: none;" id="div_quarterly_resource_error"></div>
               		<div class="alert alert-success block-inner" style="display: none;" id="div_quarterly_resource_success"></div>

					<input type="hidden" name="quarterly_resource_id2" id="quarterly_resource_id2" />
					<div class="form-group col-md-12">		
						<label class="control-label">Partner</label>
	                     <select data-plugin-selectTwo class="form-control populate" id="quarterly_resource_implementor_id2" name="quarterly_resource_implementor_id2">
	                       	<option value="">-- Select Partner --</option> 
	                     	<?php foreach($implementors as $row2): ?>
	                          	<option value="<?php echo $row2->implementor_id; ?>" ><?php echo $row2->implementor_name; ?></option>
	                        <?php endforeach; ?>             
	     				</select>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-6">			
						<label class="control-label">Actual Expenditure</label>
						<input type="text" name="quarterly_resource_actual_expenditure2" id="quarterly_resource_actual_expenditure2" class="form-control"/>
					</div>										
					<div class="form-group col-md-6">			
						<label class="control-label">Planned Expenditure</label>
						<input type="text" name="quarterly_resource_planned_expenditure2" id="quarterly_resource_planned_expenditure2" class="form-control"/>
					</div>										
					<div class="clearfix"></div>
					<div class="form-group col-sm-6">			
						<label class="control-label">Percentage Spent (%)</label>
						<input type="text" name="quarterly_resource_percentage_spent2" id="quarterly_resource_percentage_spent2" class="form-control"/>
					</div>										
					<div class="form-group col-sm-6">			
						<label class="control-label">Variance</label>
						<input type="text" name="quarterly_resource_variance2" id="quarterly_resource_variance2" class="form-control"/>
					</div>									
					<div class="clearfix"></div>
					<div class="form-group col-md-12">	
						<label class="control-label">Comment on Variance</label>
						<textarea class="form-control" name="quarterly_resource_variance_comment2" id="quarterly_resource_variance_comment2" rows="4"></textarea>
					</div>
					<div class="clearfix"></div>				
					<hr>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">
		         		<button class="btn btn-sm btn-danger modal-dismiss pull-right">Cancel</button>
						<button type="button" id="btn_quarterly_save_resource2" class="btn btn-success btn-sm">
		              		<b>Update Resource</b>
		              		<i id="quarterly_resource_spinner2" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		              	</button>
		          	</div>
		      		<div class="clearfix"></div>
		      	</form>
			</div>
		</section>
	</div>


	<!-- EDIT DELIVERABLES -->
		<div id="modalEditPlannedDeliverables" class="modal-block modal-block-primary mfp-hide">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit Planned Deliverables</h2>
			</header>
			<div class="panel-body">
				<form id="frm_modal_edit_planned_deliverables" class="mb-lg" novalidate="novalidate">
               		<div class="alert alert-danger block-inner" style="display: none;" id="div_quarterly_deliverables_error"></div>
               		<div class="alert alert-success block-inner" style="display: none;" id="div_quarterly_deliverables_success"></div>

					<input type="hidden" name="quarterly_deliverables_id2" id="quarterly_deliverables_id2" />
					<div class="form-group col-md-12">		
						<label class="control-label">Partner</label>
					    <select data-plugin-selectTwo class="form-control populate" id="quarterly_deliverables_implementor_id2" name="quarterly_deliverables_implementor_id2">
					       	<option value="">-- Select Partner --</option> 
					       	<?php foreach($implementors as $row2): ?>
					        	<option value="<?php echo $row2->implementor_id; ?>" ><?php echo $row2->implementor_name; ?></option>
					       	<?php endforeach; ?>             
						</select>
					</div>
					<!--<div class="clearfix"></div>
					<div class="form-group col-sm-12">			
						<label class="control-label">Cause</label>
						<input type="text" name="quarterly_deliverables_cause2" id="quarterly_deliverables_cause2" class="form-control"/>
					</div>-->										
					<div class="clearfix"></div>
					<div class="form-group col-md-12">	
						<label class="control-label">Major deliverables/outputs planned for the next three months</label>
						<textarea class="ckeditor form-control" name="quarterly_deliverables2" id="quarterly_deliverables2"></textarea>
					</div>
					<div class="clearfix"></div>				
					<hr>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">
		         		<button class="btn btn-sm btn-danger modal-dismiss pull-right">Cancel</button>
						<button type="button" id="btn_quarterly_save_deliverables2" class="btn btn-success btn-sm">
		              		<b>Update Deliverables</b>
		              		<i id="quarterly_deliverables_spinner2" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		              	</button>
		          	</div>
		      		<div class="clearfix"></div>
		      	</form>
			</div>
		</section>
	</div>



	<!-- EDIT DELIVERABLES -->
		<div id="modalEditManagementIssues" class="modal-block modal-block-primary mfp-hide">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit Management Issues</h2>
			</header>
			<div class="panel-body">
				<form id="frm_modal_edit_management_issues" class="mb-lg" novalidate="novalidate">
               		<div class="alert alert-danger block-inner" style="display: none;" id="div_quarterly_management_issues_error"></div>
               		<div class="alert alert-success block-inner" style="display: none;" id="div_quarterly_management_issues_success"></div>

					<input type="hidden" name="quarterly_management_issues_id2" id="quarterly_management_issues_id2" />
					<div class="form-group col-md-12">	
						<label class="control-label">Key Management Issues and Challenges</label>
						<textarea class="form-control" name="quarterly_management_issues2" id="quarterly_management_issues2" rows="4"></textarea>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">	
						<label class="control-label">Action(s) Taken</label>
						<textarea class="form-control" name="quarterly_management_action2" id="quarterly_management_action2" rows="4"></textarea>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">	
						<label class="control-label">Recommendation or Pending matters for resolution</label>
						<textarea class="form-control" name="quarterly_management_recommendation2" id="quarterly_management_recommendation2" rows="4"></textarea>
					</div>
					<div class="clearfix"></div>
					<hr>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">
		         		<button class="btn btn-sm btn-danger modal-dismiss pull-right">Cancel</button>
						<button type="button" id="btn_quarterly_save_management_issues2" class="btn btn-success btn-sm">
		              		<b>Update Management Issues</b>
		              		<i id="quarterly_management_issues_spinner2" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		              	</button>
		          	</div>
		      		<div class="clearfix"></div>
		      	</form>
			</div>
		</section>
	</div>

