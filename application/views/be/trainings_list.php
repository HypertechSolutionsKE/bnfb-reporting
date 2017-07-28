
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Trainings</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Settings</span></li>
								<li><span>Trainings</span></li>
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
										<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-list"></i></span>
										<span class="va-middle">Trainings List</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be/trainings/add" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Add New Training"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Training</a></span>
									</h2>
								</header>							
								<div class="panel-body">
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
									<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?php echo base_url(); ?>assets/be/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
										<thead>
											<tr>
												<th>Name</th>
												<th>Description</th>
												<th>Date Created</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($trainings as $row): ?>
												<tr>
													<td><?php echo $row->training_name; ?></td>
													<td><?php echo $row->training_description; ?></td>
													<td><?php echo $row->created_on; ?></td>
													<td class="center">
														<a href="<?php echo base_url(); ?>be/trainings/edit/<?php echo  $row->training_id; ?>" class="on-default edit-row badge btn-success" data-toggle="tooltip" data-placement="top" title="Edit Training"><i class="fa fa-pencil"></i></a>
														<a onClick="javascript:return confirm('Do you really wish to delete this Training?');" href="<?php echo base_url(); ?>be/trainings/delete/<?php echo  $row->training_id; ?>" class="on-default remove-row badge btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Training"><i class="fa fa-trash-o"></i></a>												
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
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
											<li><a href="<?php echo base_url(); ?>be/project_purpose">Project Purpose</a></li>
											<li><a href="<?php echo base_url(); ?>be/project_objectives">Project Objectives</a></li>
										
											<li><a href="<?php echo base_url(); ?>be/implementor_types">Implementor Types</a></li>
											<li><a href="<?php echo base_url(); ?>be/implementors">Implementors</a></li>											
											<li><a href="<?php echo base_url(); ?>be/indicators">Indicators</a></li>
											<li><a href="<?php echo base_url(); ?>be/milestones">Milestones</a></li>
											<li><a href="<?php echo base_url(); ?>be/thematic_areas">Thematic Areas</a></li>
											<li><a href="<?php echo base_url(); ?>be/intermediate_results">Intermediate Results</a></li>
											<li><a href="<?php echo base_url(); ?>be/trainings"><b>Trainings</b></a></li>											
											<li><a href="<?php echo base_url(); ?>be/disaggregation_levels">Disaggregation Levels</a></li>										
											<li><a href="<?php echo base_url(); ?>be/countries">Countries/Regions</a></li>
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
