
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Quarterly Reports</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Quarterly Reports</span></li>
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
										<span class="text-weight-normal va-middle mr-sm"><i class="fa fa-line-chart"></i></span>
										<span class="va-middle">Quarterly Reports List</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Go to Dashboard"><i class="fa fa-home"></i> <span class="hidden-sm"></span></a></span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be/quarterly/create" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New Quarterly Report"><i class="fa fa-plus-circle"></i> <span class="hidden-sm">&nbsp;&nbsp;New Report</span></a></span>
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
												<th>Partner</th>
												<th>Report Period</th>
												<th>Report Owner</th>
												<th>Submission Date</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($quarterly_reports as $row): ?>
												<?php if ($row->system_user_id == $this->session->userdata('user_id')): ?>
													<tr class="tr-success">
												<?php else: ?>
													<tr>
												<?php endif; ?>
													<td><b><?php echo $row->implementor_name; ?></b></td>
													<td><?php echo $row->quarterly_period_from . ' - ' . $row->quarterly_period_to; ?></td>
													<td><?php echo $row->first_name . ' ' . $row->last_name; ?></td>
													<td><?php echo date('M j Y g:i A', strtotime($row->created_on)); ?></td>
													<td class="center">
														<a href="<?php echo base_url(); ?>be/quarterly/view/<?php echo  $row->quarterly_report_id; ?>" class="on-default edit-row badge btn-info" data-toggle="tooltip" data-placement="top" title="View Quarterly Report"><i class="fa fa-eye"></i></a>
														<?php if ($this->session->userdata('is_admin') == 1): ?>
															<a href="<?php echo base_url(); ?>be/quarterly/edit/<?php echo  $row->quarterly_report_id; ?>" class="on-default edit-row badge btn-success" data-toggle="tooltip" data-placement="top" title="Edit Quarterly Report"><i class="fa fa-pencil"></i></a>
															<a onClick="javascript:return confirm('Do you really wish to delete this Quarterly Report?');" href="<?php echo base_url(); ?>be/quarterly/delete/<?php echo  $row->quarterly_report_id; ?>" class="on-default remove-row badge btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Quarterly Report"><i class="fa fa-trash-o"></i></a>
														<?php endif; ?>											
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
