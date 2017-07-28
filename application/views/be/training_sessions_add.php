
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Training Sessions</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Settings</span></li>
								<li><span><a href="<?php echo base_url(); ?>be/training_sessions">Training Sessions</a></span></li>
								<?php if (isset($training_session)): ?>
									<li><span>Edit</span></li>
								<?php else: ?>
									<li><span>Add</span></li>
								<?php endif; ?>

							</ol>
					
<<<<<<< HEAD
							<a href="<?php echo base_url(); ?>be" class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
=======
							<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
>>>>>>> 2ae7eef5d4b7b6831b3e6389c03f6e8d8632c0db
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-6 col-xl-6">
							<section class="panel">
								<?php if (isset($training_session)): ?>
									<?php foreach($training_session as $row): ?>
										<header class="panel-heading">
											<h2 class="panel-title">
<<<<<<< HEAD
												<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-pencil"></i></span>
												<span class="va-middle">Edit Training Session</span>
												<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
												<span class="pull-right"><a href="<?php echo base_url(); ?>be/training_sessions" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Training Sessions List"><i class="fa fa-long-arrow-left"></i></a></span>
=======
												<span class="label label-primary label-sm text-weight-normal va-middle mr-sm"><i class="fa fa-pencil"></i></span>
												<span class="va-middle">Edit Training Session</span>
												<span class="pull-right"><a href="<?php echo base_url(); ?>be/training_sessions" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go back to Training Sessions List"><i class="fa fa-arrow-circle-left"></i> Training Sessions List</a></span>
>>>>>>> 2ae7eef5d4b7b6831b3e6389c03f6e8d8632c0db
											</h2>
										</header>							
										<div class="panel-body">
											<form id="frm_training_sessions_add" action="<?php echo base_url();?>be/training_sessions/update/<?php echo $row->training_session_id; ?>" method="post">
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
														<input type="text" class="form-control" name="training_period_from" id="training_period_from" value="<?php echo $row->training_period_from; ?>" required>
														<span class="input-group-addon">to</span>
														<input type="text" class="form-control" name="training_period_to" id="training_period_to" value="<?php echo $row->training_period_to; ?>" required>
													</div>
												</div>
												<div class="clearfix"></div>
												<div class="form-group col-md-12">
													<label class="control-label">Indicator <span class="required">*</span></label>
													<select id="indicator_id" name="indicator_id" data-plugin-selectTwo class="form-control populate" title="Please select Training Indicator" required>
														<option value="">Select Training Indicator</option>
			                                       		<?php foreach($indicators as $row2): ?>
			                                            	<option value="<?php echo $row2->indicator_id; ?>" <?php if ($row->indicator_id == $row2->indicator_id){echo 'selected';} ?>><?php echo $row2->indicator_name; ?></option>
			                                            <?php endforeach; ?>                       

													</select>
												</div>
												<div class="clearfix"></div>
												<div class="form-group col-md-12">
													<label class="control-label">Country <span class="required">*</span></label>
													<select id="country_id" name="country_id" data-plugin-selectTwo class="form-control populate" title="Please select Country" required>
														<option value="">Select Training Country</option>
			                                       		<?php foreach($countries as $row2): ?>
			                                            	<option value="<?php echo $row2->country_id; ?>" <?php if ($row->country_id == $row2->country_id){echo 'selected';} ?>><?php echo $row2->country_name; ?></option>
			                                            <?php endforeach; ?>                       

													</select>
												</div>
												<div class="clearfix"></div>
												<div class="form-group col-md-6">
													<label class="control-label">No. of Males Attended <span class="required">*</span></label>
													<input type="text" name="males_attended" id="males_attended" class="form-control" value="<?php echo $row->males_attended; ?>" required/>
												</div>
												<div class="clearfix"></div>
												<div class="form-group col-md-6">
													<label class="control-label">No. of Females Attended <span class="required">*</span></label>
													<input type="text" name="females_attended" id=females_attended" class="form-control" value="<?php echo $row->females_attended; ?>" required/>
												</div>
												<div class="clearfix"></div>

												<footer class="panel-footer">
													<div class="row">
														<div class="pull-right">
<<<<<<< HEAD
															<button class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
=======
															<button class="btn btn-primary">Submit</button>
>>>>>>> 2ae7eef5d4b7b6831b3e6389c03f6e8d8632c0db
														</div>
													</div>
												</footer>
											</form>
										</div>
									<?php endforeach; ?>
								<?php else: ?>
									<header class="panel-heading">
										<h2 class="panel-title">
<<<<<<< HEAD
											<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-plus-circle"></i></span>
											<span class="va-middle">Add Training Session</span>
											<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
											<span class="pull-right"><a href="<?php echo base_url(); ?>be/training_sessions" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Training Sessions List"><i class="fa fa-long-arrow-left"></i></a></span>
=======
											<span class="label label-primary label-sm text-weight-normal va-middle mr-sm"><i class="fa fa-plus-circle"></i></span>
											<span class="va-middle">Add Training Session</span>
											<span class="pull-right"><a href="<?php echo base_url(); ?>be/training_sessions" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go back to Training Sessions List"><i class="fa fa-arrow-circle-left"></i> Training Sessions List</a></span>
>>>>>>> 2ae7eef5d4b7b6831b3e6389c03f6e8d8632c0db
										</h2>
									</header>							
									<div class="panel-body">
										<form id="frm_training_sessions_add" action="<?php echo base_url();?>be/training_sessions/save" method="post">
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
<<<<<<< HEAD
														<button class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
=======
														<button class="btn btn-primary">Submit</button>
>>>>>>> 2ae7eef5d4b7b6831b3e6389c03f6e8d8632c0db
													</div>
												</div>
											</footer>
										</form>
									</div>
								<?php endif; ?>
							</section>
						</div>

					</div>
					<!-- end: page -->
				</section>
			</div>
