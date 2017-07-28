
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Outputs/Outcomes</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Settings</span></li>
								<li><span><a href="<?php echo base_url(); ?>be/outcomes">Outputs/Outcomes</a></span></li>
								<?php if (isset($training_session)): ?>
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
						<div class="col-md-9 col-lg-9 col-xl-9">
							<section class="panel">

									<header class="panel-heading">
										<h2 class="panel-title">
											<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-plus-circle"></i></span>
											<span class="va-middle">Add Output/Outcome</span>
											<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
											<span class="pull-right"><a href="<?php echo base_url(); ?>be/outcomes" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Outputs/Outcomes List"><i class="fa fa-long-arrow-left"></i></a></span>
										</h2>
										<div class="form-group" style="margin-top: 10px;">
											<label class="control-label">Please select an outcome below</label>
	                                       	<select data-plugin-selectTwo class="form-control populate" id="select_outcome_add" name="select_outcome_add" required>
	                                        	<option value="">-- Select Outcome --</option>
	                                        	<option value="change_agents_trained">Number of Change Agents Trained</option>
	                                        	<option value="policy_documents">Number of Policy Documents &amp; Strategic Plans</option> 
	                                        	<option value="advocates">Number of Advocates for Biofortification</option> 
	                                        	<option value="new_programs">Number of New Programs on Biofortification</option> 
	                                        	<option value="resources_mobilized">Amount of Resources Mobilized</option> 
	                                        	<option value="key_issues_discussed">Number of Key Issues Discussed</option> 
	                                        	<option value="key_elements_documented">Number of Key Elements Documented</option>
	                                        	<option value="institutions_equipped">Number of Institutions Equipped for Trainings/Courses</option> 
	                                        	<option value="households">Number of Households Growing Biofortified Crops</option> 
	                                        	<option value="percentage_national_programs">Percentage of National Crop Varieties in Development</option> 
	                                        	<option value="commercial_processes">Number of Commercial Processors Processing Biofortified Food Products</option> 
	                                        	<option value="number_national_programs">Number of National Crop Programs &amp; Extension Services</option>
	                                       	</select> 
										</div>
									</header>							
									<div class="panel-body">
										<div id="div_outcomes_add" style="min-height:100px">
											
										</div>


										<!--<form id="frm_outcomes_add" action="<?php echo base_url();?>be/outcomes/save" method="post">
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
													<label class="control-label">Training Period <span class="required">*</span></label>
													<div class="input-daterange input-group" data-plugin-datepicker>
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" class="form-control" name="training_period_from" id="training_period_from" required>
														<span class="input-group-addon">to</span>
														<input type="text" class="form-control" name="training_period_to" id="training_period_to" required>
													</div>
												</div>
												<div class="clearfix"></div>
												<div class="form-group col-md-12">
													<label class="control-label">Indicator <span class="required">*</span></label>
													<select id="indicator_id" name="indicator_id" data-plugin-selectTwo class="form-control populate" title="Please select Training Indicator" required>
														<option value="">Select Training Indicator</option>
			                                       		<?php foreach($indicators as $row): ?>
			                                            	<option value="<?php echo $row->indicator_id; ?>" ><?php echo $row->indicator_name; ?></option>
			                                            <?php endforeach; ?>                       

													</select>
												</div>
												<div class="clearfix"></div>
												<div class="form-group col-md-12">
													<label class="control-label">Country <span class="required">*</span></label>
													<select id="country_id" name="country_id" data-plugin-selectTwo class="form-control populate" title="Please select Country" required>
														<option value="">Select Training Country</option>
			                                       		<?php foreach($countries as $row): ?>
			                                            	<option value="<?php echo $row->country_id; ?>" ><?php echo $row->country_name; ?></option>
			                                            <?php endforeach; ?>                       

													</select>
												</div>
												<div class="clearfix"></div>
												<div class="form-group col-md-6">
													<label class="control-label">No. of Males Attended <span class="required">*</span></label>
													<input type="text" name="males_attended" id="males_attended" class="form-control" value="" required/>
												</div>
												<div class="clearfix"></div>
												<div class="form-group col-md-6">
													<label class="control-label">No. of Females Attended <span class="required">*</span></label>
													<input type="text" name="females_attended" id=females_attended" class="form-control" value="" required/>
												</div>
												<div class="clearfix"></div>

											<footer class="panel-footer">
												<div class="row">
													<div class="pull-right">
														<button class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
													</div>
												</div>
											</footer>
										</form>-->
									</div>
								
							</section>
						</div>

					</div>
					<!-- end: page -->
				</section>
			</div>
