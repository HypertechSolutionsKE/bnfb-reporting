
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
								<li><span>Training Sessions</span></li>
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
										<span class="va-middle">Training Sessions List</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be/training_sessions/add" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Add New Training Session"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Training Session</a></span>
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
												<th>Training Period</th>
												<th>Indicator</th>
												<th>Country</th>
												<th>No. of Males Attended</th>
												<th>No. of Females Attended</th>

												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($training_sessions as $row): ?>
												<tr>
<<<<<<< HEAD
													<td><?php echo $row->training_period_from . ' to ' . $row->training_period_to; ?></td>
=======
													<td><a href="<?php echo base_url(); ?>be/training_sessions/edit/<?php echo  $row->training_session_id; ?>"><?php echo $row->training_period_from . ' to ' . $row->training_period_to; ?></a></td>
>>>>>>> 2ae7eef5d4b7b6831b3e6389c03f6e8d8632c0db
													<td><?php echo $row->indicator_name; ?></td>
													<td><?php echo $row->country_name; ?></td>
													<td><?php echo $row->males_attended; ?></td>
													<td><?php echo $row->females_attended; ?></td>

													<td class="center">
														<a href="<?php echo base_url(); ?>be/training_sessions/edit/<?php echo  $row->training_session_id; ?>" class="on-default edit-row badge btn-success" data-toggle="tooltip" data-placement="top" title="Edit Training Session"><i class="fa fa-pencil"></i></a>
														<a onClick="javascript:return confirm('Do you really wish to delete this Training Session?');" href="<?php echo base_url(); ?>be/training_sessions/delete/<?php echo  $row->training_session_id; ?>" class="on-default remove-row badge btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Training Session"><i class="fa fa-trash-o"></i></a>												
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
