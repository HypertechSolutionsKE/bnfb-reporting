
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Implementor Types</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Settings</span></li>
								<li><span><a href="<?php echo base_url(); ?>be/implementor_types">Implementor Types</a></span></li>
								<?php if (isset($implementor_type)): ?>
									<li><span>Edit</span></li>
								<?php else: ?>
									<li><span>Add</span></li>
								<?php endif; ?>

							</ol>
					
							<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-9 col-xl-6">
							<section class="panel">
								<?php if (isset($implementor_type)): ?>
									<?php foreach($implementor_type as $row): ?>
										<header class="panel-heading">
											<h2 class="panel-title">
												<span class="label label-primary label-sm text-weight-normal va-middle mr-sm"><i class="fa fa-pencil"></i></span>
												<span class="va-middle">Edit Implementor Type</span>
												<span class="pull-right"><a href="<?php echo base_url(); ?>be/implementor_types" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go back to Implementor Types List"><i class="fa fa-arrow-circle-left"></i> Implementor Types List</a></span>
											</h2>
										</header>							
										<div class="panel-body">
											<form id="frm_implementor_types_add" action="<?php echo base_url();?>be/implementor_types/update/<?php echo $row->implementor_type_id; ?>" method="post">
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

												<div class="form-group">
													<label class="control-label">Name <span class="required">*</span></label>
													<input type="text" name="implementor_type_name" id="implementor_type_name" class="form-control" placeholder="Implementor Type Name" value="<?php echo $row->implementor_type_name; ?>" required/>
												</div>
												<div class="form-group">
													<label class="control-label">Description</label>
													<textarea name="implementor_type_description" id="implementor_type_description" rows="4" class="form-control" placeholder="Implementor Type Description"><?php echo $row->implementor_type_description; ?></textarea>
												</div>
												<footer class="panel-footer">
													<div class="row">
														<div class="pull-right">
															<button class="btn btn-primary">Submit</button>
														</div>
													</div>
												</footer>
											</form>
										</div>
									<?php endforeach; ?>
								<?php else: ?>
									<header class="panel-heading">
										<h2 class="panel-title">
											<span class="label label-primary label-sm text-weight-normal va-middle mr-sm"><i class="fa fa-plus-circle"></i></span>
											<span class="va-middle">Add Implementor Type</span>
											<span class="pull-right"><a href="<?php echo base_url(); ?>be/implementor_types" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go back to Implementor Types List"><i class="fa fa-arrow-circle-left"></i> Implementor Types List</a></span>
										</h2>
									</header>							
									<div class="panel-body">
										<form id="frm_implementor_types_add" action="<?php echo base_url();?>be/implementor_types/save" method="post">
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

											<div class="form-group">
												<label class="control-label">Name <span class="required">*</span></label>
												<input type="text" name="implementor_type_name" id="implementor_type_name" class="form-control" placeholder="Implementor Type Name" required/>
											</div>
											<div class="form-group">
												<label class="control-label">Description</label>
												<textarea name="implementor_type_description" id="implementor_type_description" rows="4" class="form-control" placeholder="Implementor Type Description"></textarea>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="pull-right">
														<button class="btn btn-primary">Submit</button>
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
											<li><a href="<?php echo base_url(); ?>be/milestones">Milestones</a></li>
											<li><a href="<?php echo base_url(); ?>be/indicators">Indicators</a></li>
											<li><a href="<?php echo base_url(); ?>be/implementor_types"><b>Implementor Types</b></a></li>			
											<li><a href="<?php echo base_url(); ?>be/implementors">Implementors</a></li>
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
