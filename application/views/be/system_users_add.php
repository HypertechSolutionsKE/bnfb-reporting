
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>System Users</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Settings</span></li>
								<li><span><a href="<?php echo base_url(); ?>be/system_users">System Users</a></span></li>
								<?php if (isset($system_user)): ?>
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
								<?php if (isset($system_user)): ?>
									<?php foreach($system_user as $row): ?>
										<header class="panel-heading">
											<h2 class="panel-title">
												<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-pencil"></i></span>
												<span class="va-middle">Edit System User</span>
												<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
												<span class="pull-right"><a href="<?php echo base_url(); ?>be/system_users" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to System Users List"><i class="fa fa-long-arrow-left"></i></a></span>
											</h2>
										</header>							
										<div class="panel-body">
											<form id="frm_system_users_add" action="<?php echo base_url();?>be/system_users/update/<?php echo $row->system_user_id; ?>" method="post">
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

								                <div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">First Name <span class="required">*</span></label>
														<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="<?php echo $row->first_name; ?>" required/>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Last Name <span class="required">*</span></label>
														<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="<?php echo $row->last_name; ?>" required/>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">Email Address <span class="required">*</span></label>
														<input type="email" name="email_address" id="email_address" class="form-control" placeholder="Email Address" value="<?php echo $row->email_address; ?>" required/>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Gender <span class="required">*</span></label>
														<select id="gender" name="gender" data-plugin-selectTwo class="form-control populate" title="Please select Gender" required>
															<option value="">Select Gender</option>
															<option value="Female" <?php if($row->gender == 'Female'){echo 'selected';} ?>>Female</option>
															<option value="Male" <?php if($row->gender == 'Male'){echo 'selected';} ?>>Male</option>
														</select>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">Country <span class="required">*</span></label>
														<select id="country_id" name="country_id" data-plugin-selectTwo class="form-control populate" title="Please select Country" required>
															<option value="">Select Country</option>
				                                       		<?php foreach($countries as $row2): ?>
				                                            	<option value="<?php echo $row2->country_id; ?>" <?php if ($row->country_id == $row2->country_id){echo 'selected';} ?>><?php echo $row2->country_name; ?></option>
				                                            <?php endforeach; ?>                       

														</select>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">User Title <span class="required">*</span></label>
														<select id="user_title_id" name="user_title_id" data-plugin-selectTwo class="form-control populate" title="Please select User Title" required>
															<option value="">Select User Title</option>
				                                       		<?php foreach($user_titles as $row2): ?>
				                                            	<option value="<?php echo $row2->user_title_id; ?>" <?php if ($row->user_title_id == $row2->user_title_id){echo 'selected';} ?>><?php echo $row2->user_title_name; ?></option>
				                                            <?php endforeach; ?>                       

														</select>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">Is Admin <span class="required">*</span></label>
														<div class="radio-custom radio-primary">
															<input id="is_admin_yes" name="is_admin" type="radio" value="1" <?php if($row->is_admin == 1){echo 'checked';} ?> required />
															<label for="is_admin_yes">Yes</label>
														</div>
														<div class="radio-custom radio-primary">
															<input id="is_admin_no" name="is_admin" type="radio" value="0" <?php if($row->is_admin == 0){echo 'checked';} ?> />
															<label for="is_admin_no">No</label>
														</div>

													</div>
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
											<span class="va-middle">Add System User</span>
											<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
											<span class="pull-right"><a href="<?php echo base_url(); ?>be/system_users" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to System Users List"><i class="fa fa-long-arrow-left"></i></a></span>
										</h2>
									</header>							
									<div class="panel-body">
										<form id="frm_system_users_add" action="<?php echo base_url();?>be/system_users/save" method="post">
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
							                <div class="row">
												<div class="form-group col-md-6">
													<label class="control-label">First Name <span class="required">*</span></label>
													<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required/>
												</div>
												<div class="form-group col-md-6">
													<label class="control-label">Last Name <span class="required">*</span></label>
													<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required/>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label class="control-label">Email Address <span class="required">*</span></label>
													<input type="email" name="email_address" id="email_address" class="form-control" placeholder="Email Address" required/>
												</div>
												<div class="form-group col-md-6">
													<label class="control-label">Gender <span class="required">*</span></label>
													<select id="gender" name="gender" data-plugin-selectTwo class="form-control populate" title="Please select Gender" required>
														<option value="">Select Gender</option>
														<option value="Female">Female</option>
														<option value="Male">Male</option>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label class="control-label">Country <span class="required">*</span></label>
													<select id="country_id" name="country_id" data-plugin-selectTwo class="form-control populate" title="Please select Country" required>
														<option value="">Select Country</option>
			                                       		<?php foreach($countries as $row): ?>
			                                            	<option value="<?php echo $row->country_id; ?>" ><?php echo $row->country_name; ?></option>
			                                            <?php endforeach; ?>                       

													</select>
												</div>
												<div class="form-group col-md-6">
													<label class="control-label">User Title <span class="required">*</span></label>
													<select id="user_title_id" name="user_title_id" data-plugin-selectTwo class="form-control populate" title="Please select User Title" required>
														<option value="">Select User Title</option>
			                                       		<?php foreach($user_titles as $row): ?>
			                                            	<option value="<?php echo $row->user_title_id; ?>" ><?php echo $row->user_title_name; ?></option>
			                                            <?php endforeach; ?>                       

													</select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label class="control-label">Password <span class="required">*</span></label>
													<input type="password" name="user_password" id="user_password" class="form-control" required/>
												</div>
												<div class="form-group col-md-6">
													<label class="control-label">Confirm Password <span class="required">*</span></label>
													<input type="password" name="confirm_password" id="confirm_password" class="form-control" required/>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label class="control-label">Is Admin <span class="required">*</span></label>
													<div class="radio-custom radio-primary">
														<input id="is_admin_yes" name="is_admin" type="radio" value="1" required />
														<label for="is_admin_yes">Yes</label>
													</div>
													<div class="radio-custom radio-primary">
														<input id="is_admin_no" name="is_admin" type="radio" value="0" checked />
														<label for="is_admin_no">No</label>
													</div>

												</div>
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
											<li><a href="<?php echo base_url(); ?>be/indicators">Indicators</a></li>
											<li><a href="<?php echo base_url(); ?>be/implementor_types">Implementor Types</a></li>			
											<li><a href="<?php echo base_url(); ?>be/implementors">Implementors</a></li>
											<li><a href="<?php echo base_url(); ?>be/intermediate_results">Intermediate Results</a></li>
											
											<li><a href="<?php echo base_url(); ?>be/countries">Countries</a></li>
											<li><a href="<?php echo base_url(); ?>be/user_titles">User Titles</a></li>
											<li><a href="<?php echo base_url(); ?>be/system_users"><b>System Users</b></a></li>

										</ul>
									</div>
								</div>
							</section>


						</div>

					</div>
					<!-- end: page -->
				</section>
			</div>
