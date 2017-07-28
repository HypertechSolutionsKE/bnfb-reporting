
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>indicators</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Settings</span></li>
								<li><span><a href="<?php echo base_url(); ?>be/indicators">Indicators</a></span></li>								
								<?php if (isset($indicator)): ?>
									<li><span>Edit</span></li>
								<?php else: ?>
									<li><span>Add</span></li>
								<?php endif; ?>
							</ol>
					
							<a href="<?php echo base_url(); ?>be" class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-9 col-xl-6">
							<section class="panel">
								<?php if (isset($indicator)): ?>
									<?php foreach($indicator as $row): ?>
										<header class="panel-heading">
											<h2 class="panel-title">
												<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-pencil"></i></span>
												<span class="va-middle">Edit Indicator</span>
												<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>												
												<span class="pull-right"><a href="<?php echo base_url(); ?>be/indicators" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to indicators List"><i class="fa fa-long-arrow-left"></i></a></span>
											</h2>
										</header>							
										<div class="panel-body">
											<form id="frm_indicatorsadd" action="<?php echo base_url();?>be/indicators/update/<?php echo $row->indicator_id; ?>" method="post">
												<?php if (isset($success)): ?>
								 					<div class="alert alert-success block-inner">
								 						<button type="button" class="close" data-dismiss="alert">×</button>
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

												<div class="form-group col-md-12">
													<label class="control-label">Indicator Name <span class="required">*</span></label>
													<input type="text" name="indicator_name" id="indicator_name" class="form-control" placeholder="Indicator Name" required value="<?php echo $row->indicator_name; ?>" />
												</div>
												<div class="form-group col-md-12">
													<label class="control-label">Partner <span class="required">*</span></label>
													<input type="text" name="partner_name" id="partner_name" class="form-control" placeholder="Partner" required value="<?php echo $row->partner_name; ?>"/>
												</div>
												<div class="form-group col-md-4">
													<label class="control-label">Target Number for Males <span class="required">*</span></label>
													<input type="text" name="target_males" id="target_males" class="form-control" placeholder="Target Number for Males" required value="<?php echo $row->target_males; ?>"/>
												</div>
												<div class="form-group col-md-4">
													<label class="control-label">Target Number for Females <span class="required">*</span></label>
													<input type="text" name="target_females" id="target_females" class="form-control" placeholder="Target Number for Females" required value="<?php echo $row->target_females; ?>"/>
												</div>
												<div class="clearfix"></div>

												<footer class="panel-footer">
													<div class="row">
														<div class="pull-right">
															<button class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
														</div>
													</div>
												</footer>
											</form>
										</div>
									<?php endforeach; ?>
								<?php else: ?>
									<header class="panel-heading">
										<h2 class="panel-title">
											<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-plus-circle"></i></span>
											<span class="va-middle">Add Indicator</span>
											<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>												
											<span class="pull-right"><a href="<?php echo base_url(); ?>be/indicators" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to indicators List"><i class="fa fa-long-arrow-left"></i></a></span>
										</h2>
									</header>							
									<div class="panel-body">
										<form id="frm_indicatorsadd" action="<?php echo base_url();?>be/indicators/save" method="post">
											<?php if (isset($success)): ?>
							 					<div class="alert alert-success block-inner">
							 						<button type="button" class="close" data-dismiss="alert">×</button>
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

											<div class="form-group col-md-12">
												<label class="control-label">Objective <span class="required">*</span></label>
                                                <select data-plugin-selectTwo class="form-control populate" id="project_objective_id" name="project_objective_id" required>
                                                    <option value="">Select Objective</option> 
                                                    <?php foreach($project_objectives as $row): ?>
                                                        <option value="<?php echo $row->project_objective_id; ?>" ><?php echo $row->project_objective_name; ?></option>
                                                    <?php endforeach; ?>                       
                                                </select> 
											</div>
											<div class="form-group col-md-12">
												<label class="control-label">Indicator Name <span class="required">*</span></label>
												<input type="text" name="indicator_name" id="indicator_name" class="form-control" placeholder="Indicator Name" required/>
											</div>
											<div class="form-group col-md-12">
												<label class="control-label">Indicator Definition</label>
												<textarea name="indicator_definition" id="indicator_definition" rows="4" class="form-control" placeholder="Indicator Definition"></textarea>
											</div>
											<div class="form-group col-md-12">
												<label class="control-label">Disaggregation Levels </label>
												<select class="form-control col-md-9" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200, "enableCaseInsensitiveFiltering": true }' id="disaggregation_level_id" name="disaggregation_level_id[]">
                                                    <?php foreach($disaggregation_levels as $row): ?>
                                                        <option value="<?php echo $row->disaggregation_level_id; ?>" ><?php echo $row->disaggregation_level_name; ?></option>
                                                    <?php endforeach; ?>                       
												</select>
											</div>
											<div class="form-group col-md-12">
												<label class="control-label">Target <span class="required">*</span></label>
												<input type="text" name="target" id="target" class="form-control" placeholder="Target" required/>
											</div>

											<div class="form-group col-md-12">
												<label class="control-label">Baseline Value</label>
												<textarea name="baseline_value" id="baseline_value" rows="4" class="form-control" placeholder="Baseline Value"></textarea>
											</div>

											<div class="form-group col-md-12">
												<label class="control-label">Means of Verification/Source of Data</label>
												<input type="text" name="source_of_data" id="source_of_data" class="form-control" placeholder="Means of Verification/Source of Data"/>
											</div>
											<div class="form-group col-md-12">
												<label class="control-label">Frequency of Data Collection</label>
												<input type="text" name="data_collection_frequency" id="data_collection_frequency" class="form-control" placeholder="Frequency of Data Collection" />
											</div>
											<div class="form-group col-md-12">
												<label class="control-label">Responsibility</label>
												<input type="text" name="responsibility" id="responsibility" class="form-control" placeholder="Responsibility" />
											</div>
											<div class="clearfix"></div>

											<footer class="panel-footer">
												<div class="row">
													<div class="pull-right">
														<button class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
													</div>
												</div>
											</footer>
										</form>
									</div>
								<?php endif; ?>
							</section>
						</div>
						<div class="col-md-6 col-lg-3 col-xl-6">
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
											<li><a href="<?php echo base_url(); ?>be/project_purpose">Project Purpose</a></li>
											<li><a href="<?php echo base_url(); ?>be/project_objectives">Project Objectives</a></li>
										
											<li><a href="<?php echo base_url(); ?>be/milestones">Milestones</a></li>
											<li><a href="<?php echo base_url(); ?>be/indicators"><b>Indicators</b></a></li>
											<li><a href="<?php echo base_url(); ?>be/implementor_types">Implementor Types</a></li>											
											<li><a href="<?php echo base_url(); ?>be/implementors">Implementors</a></li>
											<li><a href="<?php echo base_url(); ?>be/intermediate_results">Intermediate Results</a></li>
											
											<li><a href="<?php echo base_url(); ?>be/countries">Countries</a></li>
											<li><a href="<?php echo base_url(); ?>be/user_titles">User Titles</a></li>
											<li><a href="<?php echo base_url(); ?>be/system_users">System Users</a></li>

										</ul>
									</div>
								</div>
							</section>


						</div>

					</div>
					<!-- end: page -->
				</section>
			</div>
