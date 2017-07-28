
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Project Purpose</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Settings</span></li>
								<li><span><a href="<?php echo base_url(); ?>be/project_purpose">Project Purpose</a></span></li>

							</ol>
					
							<a href="<?php echo base_url(); ?>be" class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-9 col-xl-6">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">
										<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-cogs"></i></span>
										<span class="va-middle">Set Project Purpose</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>												
										<!--<span class="pull-right"><a href="<?php echo base_url(); ?>be/project_purpose" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Project Purpose list"><i class="fa fa-long-arrow-left"></i></a></span>-->
									</h2>
								</header>							
								<div class="panel-body">
									<form id="frm_project_purpose" action="<?php echo base_url();?>be/project_purpose/save" method="post">
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
											<label class="control-label">Project Purpose</label>
											<textarea name="project_purpose" id="project_purpose" rows="4" class="form-control" placeholder="Enter Project Purpose"><?php foreach($project_purpose as $row){echo $row->project_purpose;}?></textarea>
										</div>
										<footer class="panel-footer">
											<div class="row">
												<div class="pull-right">
													<button class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
												</div>
											</div>
										</footer>
									</form>
								</div>
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
											<li><a href="<?php echo base_url(); ?>be/project_purpose"><b>Project Purpose</b></a></li>
											<li><a href="<?php echo base_url(); ?>be/project_objectives">Project Objectives</a></li>
											<li><a href="<?php echo base_url(); ?>be/milestones">Milestones</a></li>
											<li><a href="<?php echo base_url(); ?>be/indicators">Indicators</a></li>
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