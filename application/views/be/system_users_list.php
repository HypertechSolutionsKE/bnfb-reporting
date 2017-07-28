
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
								<li><span>System Users</span></li>
							</ol>
					
							<a href="<?php echo base_url(); ?>be" class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">
										<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-list"></i></span>
										<span class="va-middle">System Users List</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be/system_users/add" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Add New System User"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add System User</a></span>
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
												<th>Email</th>
												<th>Gender</th>
												<th>Country</th>
												<th>Title</th>
												<th>Is Admin</th>
												<th>Is Active</th>
												<th>Created On</th>

												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($system_users as $row): ?>
												<tr>
													<td><?php echo $row->first_name . ' ' . $row->last_name; ?></td>
													<td><?php echo $row->email_address; ?></td>
													<td><?php echo $row->gender; ?></td>
													<td><?php echo $row->country_name; ?></td>
													<td><?php echo $row->user_title_name; ?></td>
													<td>
														<?php
															if ($row->is_admin == 1){
																echo 'Yes';
															}else{
																echo 'No';
															}
														?>
													</td>
													<td>
														<?php
															if ($row->is_active == 1){
																echo 'Yes';
															}else{
																echo 'No';
															}
														?>
													</td>
													<td><?php echo $row->created_on; ?></td>						
													<td class="center">
														<a href="<?php echo base_url(); ?>be/system_users/edit/<?php echo  $row->system_user_id; ?>" class="on-default edit-row badge btn-success" data-toggle="tooltip" data-placement="top" title="Edit System User"><i class="fa fa-pencil"></i></a>
														<a onClick="javascript:return confirm('Do you really wish to delete this System User?');" href="<?php echo base_url(); ?>be/system_users/delete/<?php echo  $row->system_user_id; ?>" class="on-default remove-row badge btn-danger" data-toggle="tooltip" data-placement="top" title="Delete System User"><i class="fa fa-trash-o"></i></a>												
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</section>
						</div>

					</div>
					<!-- end: page -->
				</section>
			</div>
