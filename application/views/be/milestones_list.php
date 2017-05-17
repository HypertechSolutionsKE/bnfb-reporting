
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Milestones</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url(); ?>be">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Settings</span></li>
								<li><span>Milestones</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-9 col-xl-6">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">
										<span class="label label-primary label-sm text-weight-normal va-middle mr-sm"><i class="fa fa-list"></i></span>
										<span class="va-middle">Milestones List</span>
										<span class="pull-right"><a href="<?php echo base_url(); ?>be/milestones/add" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Add New Milestone"><i class="fa fa-plus-circle"></i> Add Milestone</a></span>
									</h2>
								</header>							
								<div class="panel-body">
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
											<?php foreach($milestones as $row): ?>
												<tr>
													<td><a href=""><?php echo $row->milestone_name; ?></a></td>
													<td><?php echo $row->milestone_description; ?></td>
													<td><?php echo $row->created_on; ?></td>
													<td class="center">
														<a href="#" class="on-default edit-row badge btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Milestone"><i class="fa fa-pencil"></i></a>
														<a href="#" class="on-default remove-row badge btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Milestone"><i class="fa fa-trash-o"></i></a>												
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
											<li><a href="<?php echo base_url(); ?>milestones"><b>Milestones</b></a></li>
											<li><a href="<?php echo base_url(); ?>indicators">Indicators</a></li>
											<li><a href="<?php echo base_url(); ?>implementors">Implementors</a></li>
											<li><a href="<?php echo base_url(); ?>implementor_types">Implementor Types</a></li>
											<li><a href="<?php echo base_url(); ?>countries">Countries</a></li>
											<li><a href="<?php echo base_url(); ?>user_titles">User Titles</a></li>
											<li><a href="<?php echo base_url(); ?>system_uers">System Users</a></li>

										</ul>
									</div>
								</div>
							</section>


						</div>

					</div>
					<!-- end: page -->
				</section>
			</div>
