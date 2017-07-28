
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
								<li><span><a href="<?php echo base_url(); ?>be/biannual">Biannual Reports</a></span></li>
								<?php if (isset($biannual)): ?>
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
							<section class="panel form-wizard" id="w3">
								<header class="panel-heading">
									<h2 class="panel-title">
										<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-line-chart"></i></span>
										<span class="va-middle">New Biannual Report</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be/biannual" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to biannual Reports list"><i class="fa fa-long-arrow-left"></i> <span class="hidden-sm"></span></a></span>
									</h2>
								</header>

								<div class="panel-body">
									<div class="wizard-progress">
										<div class="steps-progress">
												<div class="progress-indicator"></div>
											</div>
										<ul class="wizard-steps">
											<li class="active">
												<a href="#w3-summary" data-toggle="tab" class="text-center">
													
														<span class="badge">1</span>
														Executive Summary
													
												</a>
											</li>
											<li>
												<a href="#w3-progress" data-toggle="tab" class="text-center">
													
														<span class="badge">2</span>
														Project Progress &amp; Results
													
												</a>
											</li>
											<li>
												<a href="#w3-deviations" data-toggle="tab" class="text-center">
													
														<span class="badge">3</span>
														Milestones Deviations &amp; Course Correction
													
												</a>
											</li>											
											<li>
												<a href="#w3-financial" data-toggle="tab" class="text-center">
													
														<span class="badge">4</span>
														Financial Update
													
												</a>
											</li>
											<li>
												<a href="#w3-appendices" data-toggle="tab" class="text-center">
													
														<span class="badge">5</span>
														Appendices
													
												</a>
											</li>
											<li>
												<a href="#w3-preview" data-toggle="tab" class="text-center">
													
														<span class="badge">5</span>
														Preview &amp; Submit
													
												</a>
											</li>

										</ul>
									</div>
									<form class="" novalidate="novalidate" method="post" action="<?php echo base_url(); ?>be/biannual/save">
										<div id="biannual_success" style="display: none" class="alert alert-success block-inner"></div>
										<div id="biannual_error" style="display: none" class="alert alert-danger block-inner"></div>

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
											<div id="w3-summary" class="tab-pane active">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
													20%
													</div>
												</div>
												<div class="clearfix"></div>									
												<?php if (isset($biannual_report)): ?>
													<?php foreach ($biannual_report as $row): ?>
														<div class="form-group col-md-12">
															<label class="control-label">Report Title <span class="required">*</span></label>
															<input type="text" name="biannual_report_title" id="biannual_report_title" class="form-control" value="<?php echo $row->biannual_report_title; ?>" required/>
														</div>
														<div class="clearfix"></div>
														<div class="form-group col-sm-3">
															<label class="control-label">Period: From <span class="required">*</span></label>													
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input type="text" name="biannual_period_from" id="biannual_period_from" class="form-control" value="<?php echo $row->biannual_period_from; ?>" data-plugin-datepicker  required>
															</div>													
														</div>
														<div class="form-group col-sm-3">
															<label class="control-label">To <span class="required">*</span></label>
															<div class="">
																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="fa fa-calendar"></i>
																	</span>
																	<input type="text" name="biannual_period_to" id="biannual_period_to" class="form-control" value="<?php echo $row->biannual_period_to; ?>" data-plugin-datepicker  required>
																</div>
															</div>
														</div>
														<div class="clearfix"></div>
														<div class="form-group col-md-12">
															<label class="control-label">Accronyms &amp; Abbreviations</label>
															<div class="">
															<textarea class="ckeditor form-control" name="biannual_accronyms" id="biannual_accronyms"><?php echo $row->biannual_accronyms; ?></textarea>
															</div>
														</div>

														<div class="clearfix"></div>
														<div class="form-group col-md-12">
															<label class="control-label">Executive Summary</label>
															<div class="">
															<textarea class="ckeditor form-control" name="biannual_executive_summary" id="biannual_executive_summary"><?php echo $row->biannual_executive_summary; ?></textarea>
															</div>
														</div>
														<div class="clearfix"></div>
													<?php endforeach; ?>
												<?php else: ?>
													<div class="form-group col-md-12">
														<label class="control-label">Report Title <span class="required">*</span></label>
														<input type="text" name="biannual_report_title" id="biannual_report_title" class="form-control" required/>
													</div>
													<div class="clearfix"></div>
													<div class="form-group col-sm-3">
														<label class="control-label">Period: From <span class="required">*</span></label>													
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</span>
															<input type="text" name="biannual_period_from" id="biannual_period_from" class="form-control" data-plugin-datepicker  required>
														</div>													
													</div>
													<div class="form-group col-sm-3">
														<label class="control-label">To <span class="required">*</span></label>
														<div class="">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input type="text" name="biannual_period_to" id="biannual_period_to" class="form-control" data-plugin-datepicker  required>
															</div>
														</div>
													</div>
													<div class="clearfix"></div>
													<div class="form-group col-md-12">
														<label class="control-label">Accronyms &amp; Abbreviations</label>
														<div class="">
														<textarea class="ckeditor form-control" name="biannual_accronyms" id="biannual_accronyms"></textarea>
														</div>
													</div>

													<div class="clearfix"></div>
													<div class="form-group col-md-12">
														<label class="control-label">Executive Summary</label>
														<div class="">
														<textarea class="ckeditor form-control" name="biannual_executive_summary" id="biannual_executive_summary"></textarea>
														</div>
													</div>
													<div class="clearfix"></div>
												<?php endif; ?>
											</div>

											<!-- SUMMARY -->
											<div id="w3-progress" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="37.5" aria-valuemin="0" aria-valuemax="100" style="width: 37.5%;">
													37.5%
													</div>
												</div>
												<div class="clearfix"></div>						

												<?php if (isset($biannual_report)): ?>
													<?php foreach ($biannual_report as $row): ?>
														<div class="form-group col-md-12">
															<label class="control-label">Project Progress &amp; Results</label>
															<div class="">
															<textarea class="ckeditor form-control" name="biannual_project_progress" id="biannual_project_progress"><?php echo $row->biannual_project_progress; ?></textarea>
															</div>
														</div>
														<div class="clearfix"></div>
													<?php endforeach; ?>
												<?php else: ?>
													<div class="form-group col-md-12">
														<label class="control-label">Project Progress &amp; Results</label>
														<div class="">
														<textarea class="ckeditor form-control" name="biannual_project_progress" id="biannual_project_progress"></textarea>
														</div>
													</div>
													<div class="clearfix"></div>
												<?php endif; ?>
											</div>
											<!-- MILESTONE DEVIATIONS -->
											<div id="w3-deviations" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
													50%
													</div>
												</div>
												<div class="clearfix"></div>
												
												<?php if (isset($biannual_report)): ?>
													<?php foreach ($biannual_report as $row): ?>
														<?php if($row->biannual_milestone_deviations == '' || $row->biannual_milestone_deviations == '<p>None</p>'): ?>
															<div class="form-group col-md-12">
																<section class="panel panel-featured-left panel-featured-primary">
																	<div class="panel-body">
																		<div class="checkbox-warning checkbox-inline mt-sm ml-md mr-md">
																			<input type="checkbox" id="biannual_milestone_deviations_none" checked>
																			<label for="biannual_milestone_deviations_none">NONE</label>
																		</div>										
																	</div>
																</section>
															</div>
															<div class="form-group col-md-12">
																<label class="control-label">Milestones Deviations &amp; Course Correction</label>
																<div class="">
																<textarea class="ckeditor form-control biannual_milestone_deviations" name="biannual_milestone_deviations" id="biannual_milestone_deviations" disabled></textarea>
																</div>
															</div>
															<div class="clearfix"></div>								
														<?php else: ?>
															<div class="form-group col-md-12">
																<section class="panel panel-featured-left panel-featured-primary">
																	<div class="panel-body">
																		<div class="checkbox-warning checkbox-inline mt-sm ml-md mr-md">
																			<input type="checkbox" id="biannual_milestone_deviations_none">
																			<label for="biannual_milestone_deviations_none">NONE</label>
																		</div>										
																	</div>
																</section>
															</div>
															<div class="form-group col-md-12">
																<label class="control-label">Milestones Deviations &amp; Course Correction</label>
																<div class="">
																<textarea class="ckeditor form-control biannual_milestone_deviations" name="biannual_milestone_deviations" id="biannual_milestone_deviations"><?php echo $row->biannual_milestone_deviations; ?></textarea>
																</div>
															</div>
															<div class="clearfix"></div>
														<?php endif; ?>
													<?php endforeach; ?>
												<?php else: ?>
													<div class="form-group col-md-12">
														<section class="panel panel-featured-left panel-featured-primary">
															<div class="panel-body">
																<div class="checkbox-warning checkbox-inline mt-sm ml-md mr-md">
																	<input type="checkbox" id="biannual_milestone_deviations_none">
																	<label for="biannual_milestone_deviations_none">NONE</label>
																</div>										
															</div>
														</section>
													</div>
													<div class="clearfix"></div>
													<div class="form-group col-md-12">
														<label class="control-label">Milestones Deviations &amp; Course Correction</label>
														<div class="">
															<textarea class="ckeditor form-control" name="biannual_milestone_deviations" id="biannual_milestone_deviations"></textarea>
														</div>
													</div>
													<div class="clearfix"></div>
												<?php endif; ?>
											</div>
											<!-- MILESTONE DEVIATIONS -->
											<div id="w3-financial" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
													50%
													</div>
												</div>
												<div class="clearfix"></div>						

												<?php if (isset($biannual_report)): ?>
													<?php foreach ($biannual_report as $row): ?>
														<div class="form-group col-md-12">
															<label class="control-label">Financial Update</label>
															<div class="">
															<textarea class="ckeditor form-control" name="biannual_financial_update" id="biannual_financial_update"><?php echo $row->biannual_financial_update; ?></textarea>
															</div>
														</div>
														<div class="clearfix"></div>
													<?php endforeach; ?>
												<?php else: ?>
														<div class="form-group col-md-12">
															<label class="control-label">Financial Update</label>
															<div class="">
															<textarea class="ckeditor form-control" name="biannual_financial_update" id="biannual_financial_update"></textarea>
															</div>
														</div>
													<div class="clearfix"></div>
												<?php endif; ?>
											</div>

											<!-- MANAGEMENT ISSUES -->
											<div id="w3-appendices" class="tab-pane">
												<div class="progress light m-md">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="62.5" aria-valuemin="0" aria-valuemax="100" style="width: 62.5%;">
													62.5%
													</div>
												</div>
												<div class="clearfix"></div>						

												<div class="col-md-6">
													<section id="biannual_management_issuess" class="panel panel-featured panel-featured-primary">
														<header class="panel-heading">
															<h2 class="panel-title">Management Issues</h2>
														</header>
														<div class="panel-body">
															<div class="form-group col-md-12">	
																<label class="control-label">Key Management Issues and Challenges</label>
																<textarea class="form-control" name="biannual_management_issues" id="biannual_management_issues" rows="5"></textarea>
															</div>
					                                    	<div class="clearfix"></div>
															<div class="form-group col-md-12">	
																<label class="control-label">Action(s) Taken</label>
																<textarea class="form-control" name="biannual_management_action" id="biannual_management_action" rows="5"></textarea>
															</div>
					                                    	<div class="clearfix"></div>
															<div class="form-group col-md-12">	
																<label class="control-label">Recommendation or Pending matters for resolution</label>
																<textarea class="form-control" name="biannual_management_recommendation" id="biannual_management_recommendation" rows="5"></textarea>
															</div>
					                                    	<div class="clearfix"></div>
															<hr>
															<div class="clearfix"></div>
															<div class="form-group col-md-12">
																<button type="button" id="btn_biannual_save_management_issues" class="btn btn-success btn-sm pull-right">
		                                            			<i class="fa fa-save"></i> <b>Save Management Issues</b><i id="biannual_management_issues_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
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
															<div id="div_biannual_saved_management_issues">
																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Issue</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($biannual_management_issues)): ?>
																			<?php foreach ($biannual_management_issues as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo character_limiter($row->biannual_management_issues,55); ?></td>
																					<td>
																						<div class="btn-group">
																							<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
																							<ul class="dropdown-menu" role="menu">
																								<li><a  class="modal-with-form modal-with-zoom-anim biannual_edit_management_issues" href="#modalEditManagementIssues" data-id ="<?php echo $row->biannual_management_issues_id; ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
																								<li><a class="biannual_delete_management_issues" href="javascript:void(0);" data-id ="<?php echo $row->biannual_management_issues_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
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
												<i id="biannual_spinner" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
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
               		<div class="alert alert-danger block-inner" style="display: none;" id="div_biannual_resource_error"></div>
               		<div class="alert alert-success block-inner" style="display: none;" id="div_biannual_resource_success"></div>

					<input type="hidden" name="biannual_resource_id2" id="biannual_resource_id2" />
					<div class="form-group col-md-12">		
						<label class="control-label">Partner</label>
	                     <select data-plugin-selectTwo class="form-control populate" id="biannual_resource_implementor_type_id2" name="biannual_resource_implementor_type_id2">
	                       	<option value="">-- Select Partner --</option> 
	                     	<?php foreach($implementor_types as $row2): ?>
	                          	<option value="<?php echo $row2->implementor_type_id; ?>" ><?php echo $row2->implementor_type_name; ?></option>
	                        <?php endforeach; ?>             
	     				</select>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-6">			
						<label class="control-label">Actual Expenditure</label>
						<input type="text" name="biannual_resource_actual_expenditure2" id="biannual_resource_actual_expenditure2" class="form-control"/>
					</div>										
					<div class="form-group col-md-6">			
						<label class="control-label">Planned Expenditure</label>
						<input type="text" name="biannual_resource_planned_expenditure2" id="biannual_resource_planned_expenditure2" class="form-control"/>
					</div>										
					<div class="clearfix"></div>
					<div class="form-group col-sm-6">			
						<label class="control-label">Percentage Spent (%)</label>
						<input type="text" name="biannual_resource_percentage_spent2" id="biannual_resource_percentage_spent2" class="form-control"/>
					</div>										
					<div class="form-group col-sm-6">			
						<label class="control-label">Variance</label>
						<input type="text" name="biannual_resource_variance2" id="biannual_resource_variance2" class="form-control"/>
					</div>									
					<div class="clearfix"></div>
					<div class="form-group col-md-12">	
						<label class="control-label">Comment on Variance</label>
						<textarea class="form-control" name="biannual_resource_variance_comment2" id="biannual_resource_variance_comment2" rows="4"></textarea>
					</div>
					<div class="clearfix"></div>				
					<hr>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">
		         		<button class="btn btn-sm btn-danger modal-dismiss pull-right">Cancel</button>
						<button type="button" id="btn_biannual_save_resource2" class="btn btn-success btn-sm">
		              		<b>Update Resource</b>
		              		<i id="biannual_resource_spinner2" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
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
               		<div class="alert alert-danger block-inner" style="display: none;" id="div_biannual_deliverables_error"></div>
               		<div class="alert alert-success block-inner" style="display: none;" id="div_biannual_deliverables_success"></div>

					<input type="hidden" name="biannual_deliverables_id2" id="biannual_deliverables_id2" />
					<div class="form-group col-md-12">		
						<label class="control-label">Partner</label>
					    <select data-plugin-selectTwo class="form-control populate" id="biannual_deliverables_implementor_type_id2" name="biannual_deliverables_implementor_type_id2">
					       	<option value="">-- Select Partner --</option> 
					       	<?php foreach($implementor_types as $row2): ?>
					        	<option value="<?php echo $row2->implementor_type_id; ?>" ><?php echo $row2->implementor_type_name; ?></option>
					       	<?php endforeach; ?>             
						</select>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-sm-12">			
						<label class="control-label">Cause</label>
						<input type="text" name="biannual_deliverables_cause2" id="biannual_deliverables_cause2" class="form-control"/>
					</div>										
					<div class="clearfix"></div>
					<div class="form-group col-md-12">	
						<label class="control-label">Major deliverables/outputs planned for the next three months</label>
						<textarea class="ckeditor form-control" name="biannual_deliverables2" id="biannual_deliverables2"></textarea>
					</div>
					<div class="clearfix"></div>				
					<hr>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">
		         		<button class="btn btn-sm btn-danger modal-dismiss pull-right">Cancel</button>
						<button type="button" id="btn_biannual_save_deliverables2" class="btn btn-success btn-sm">
		              		<b>Update Deliverables</b>
		              		<i id="biannual_deliverables_spinner2" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
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
               		<div class="alert alert-danger block-inner" style="display: none;" id="div_biannual_management_issues_error"></div>
               		<div class="alert alert-success block-inner" style="display: none;" id="div_biannual_management_issues_success"></div>

					<input type="hidden" name="biannual_management_issues_id2" id="biannual_management_issues_id2" />
					<div class="form-group col-md-12">	
						<label class="control-label">Key Management Issues and Challenges</label>
						<textarea class="form-control" name="biannual_management_issues2" id="biannual_management_issues2" rows="4"></textarea>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">	
						<label class="control-label">Action(s) Taken</label>
						<textarea class="form-control" name="biannual_management_action2" id="biannual_management_action2" rows="4"></textarea>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">	
						<label class="control-label">Recommendation or Pending matters for resolution</label>
						<textarea class="form-control" name="biannual_management_recommendation2" id="biannual_management_recommendation2" rows="4"></textarea>
					</div>
					<div class="clearfix"></div>
					<hr>
					<div class="clearfix"></div>
					<div class="form-group col-md-12">
		         		<button class="btn btn-sm btn-danger modal-dismiss pull-right">Cancel</button>
						<button type="button" id="btn_biannual_save_management_issues2" class="btn btn-success btn-sm">
		              		<b>Update Management Issues</b>
		              		<i id="biannual_management_issues_spinner2" class="fa fa-spinner fa-spin" style="margin-left: 5px; display: none"></i>
		              	</button>
		          	</div>
		      		<div class="clearfix"></div>
		      	</form>
			</div>
		</section>
	</div>

