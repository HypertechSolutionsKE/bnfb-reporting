
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<!--<li><span>Layouts</span></li>
								<li><span>Default</span></li>-->
							</ol>
					
							<a href="<?php echo base_url(); ?>be" class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<?php if ($num_biweekly_pending > 0 || $num_quarterly_pending > 0): ?>
						<div class="alert alert-info fade in nomargin">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<h4 class="h5 text-weight-bold"><i class="fa fa-exclamation-circle"></i> Pending Reports <span class="text-weight-light">- Reminder</span></h4>
							
							<table class="table table-condensed mb-none borderless">
								<tbody>
									<?php foreach($biweekly_pending as $row): ?>
										<tr>
											<td>
												<i class="fa fa-caret-right" aria-hidden="true"></i>
												<span class="text-dark text-weight-normal"><?php echo $row->biweekly_report_title; ?>
											</td>
											<td><span class="text-success">Biweekly Report</span></td>
											<td>
												<a href="<?php echo base_url(); ?>be/biweekly/complete/<?php echo $row->biweekly_report_id; ?>" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Resume Report Entry"><i class="fa fa-repeat"></i>&nbsp;Resume</a>
												<a onClick="javascript:return confirm('Do you really wish to delete this pending Biweekly Report?');" href="<?php echo base_url(); ?>be/biweekly/delete_pending/<?php echo $row->biweekly_report_id; ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Report"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>		
											</td>
										</tr>
									<?php endforeach; ?>
									<?php foreach($quarterly_pending as $row): ?>
										<tr>
											<td>
												<i class="fa fa-caret-right" aria-hidden="true"></i>
												<span class="text-dark text-weight-normal"><?php echo $row->implementor_name; ?>
											</td>
											<td><span class="text-primary">Quarterly Report</span></td>
											<td>
												<a href="<?php echo base_url(); ?>be/quarterly/complete/<?php echo $row->quarterly_report_id; ?>" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Resume Report Entry"><i class="fa fa-repeat"></i>&nbsp;Resume</a>
												<a onClick="javascript:return confirm('Do you really wish to delete this pending Quarterly Report?');" href="<?php echo base_url(); ?>be/quarterly/delete_pending/<?php echo $row->quarterly_report_id; ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Report"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>												
											</td>
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>


							<!--<?php foreach($biweekly_pending as $row): ?>
								<p style="margin-left: 20px; color:#555; font-size: 90%">
									<i class="fa fa-dot-circle"></i>							
									<i class="fa fa-check-square-o" aria-hidden="true"></i>
									<?php echo $row->biweekly_report_title; ?>
									&nbsp;&nbsp;- - <span class="text-primary"><b>50%</b></span>
									&nbsp;&nbsp; - -&nbsp;&nbsp;<span class="text-success">Biweekly Report</span> - - &nbsp;&nbsp;		
									<a href="" class="label btn-success"><i class="fa fa-check"></i> Complete Report</a>
									<a href="" class="label btn-danger"><i class="fa fa-trash-o"></i> Delete Report</a>
								</p>
							<?php endforeach; ?>
							<?php foreach($quarterly_pending as $row): ?>
								<p style="margin-left: 20px; color:#555; font-size: 90%">
									<i class="fa fa-dot-circle"></i>							
									<i class="fa fa-check-square-o" aria-hidden="true"></i>
									<?php echo $row->quarterly_report_title; ?>
									&nbsp;&nbsp;- - <span class="text-primary"><b>50%</b></span>
									&nbsp;&nbsp; - -&nbsp;&nbsp;<span class="text-success">Quarterly Report</span> - - &nbsp;&nbsp;		
									<a href="" class="label btn-success"><i class="fa fa-check"></i> Complete Report</a>
									<a href="" class="label btn-danger"><i class="fa fa-trash-o"></i> Delete Report</a>
								</p>
							<?php endforeach; ?>-->
							


							<!--<p style="margin-left: 20px; color:#555; font-size: 90%">
								<i class="fa fa-dot-circle"></i>							
								<i class="fa fa-check-square-o" aria-hidden="true"></i> We are extermely happy to announce
								&nbsp;&nbsp;- - <span class="text-primary"><b>50%</b></span>
								&nbsp;&nbsp; - -&nbsp;&nbsp;<span class="text-info">Biweekly Report</span> - - &nbsp;&nbsp;		
								<a href="" class="label btn-success"><i class="fa fa-check"></i> Complete</a>
								<a href="" class="label btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
							</p>-->
						</div>
					<?php endif; ?>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<section class="panel">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-3 col-lg-3 col-xl-3">
											<section class="panel panel-featured-left panel-featured-primary">
												<div class="panel-body">
													<div class="widget-summary widget-summary-sm text-center">
														<div class="widget-summary-col widget-summary-col-icon">
															<a href="<?php echo base_url(); ?>be/biweekly">
																<div class="summary-icon bg-success">
																	<i class="fa fa-bar-chart"></i>
																</div>
															</a>
															<div class="summary text-center">
																<h3 class="title"><a href="<?php echo base_url(); ?>be/biweekly" class="text-success">Bi-Weekly Reports</a></h3>
																<div class="info mt-md">
																	View Biweekly Reports List, Report Detail, Create New Report, Edit Report and Delete Report.		
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-muted text-uppercase">(view all)</a>
															</div>

														</div>
														<div class="widget-summary-col">
														</div>
													</div>
												</div>
											</section>
										</div>
										<div class="col-md-3 col-lg-3 col-xl-3">
											<section class="panel panel-featured-left panel-featured-primary">
												<div class="panel-body">
													<div class="widget-summary widget-summary-sm">
														<div class="widget-summary-col widget-summary-col-icon">
															<a href="<?php echo base_url(); ?>be/biweekly/summary">
															<div class="summary-icon bg-danger">
																<i class="fa fa-calendar"></i>
															</div>
															</a>
															<div class="summary text-center">
																<h3 class="title"><a href="<?php echo base_url(); ?>be/biweekly/summary" class="text-danger">Consolidated Report</a></h3>
																<div class="info mt-md">
																	View Biweekly Consolidated Report, filtered by Reporting Period.		
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-muted text-uppercase">(view all)</a>
															</div>

														</div>
														<div class="widget-summary-col">
														</div>
													</div>
												</div>
											</section>
										</div>
										<div class="col-md-3 col-lg-3 col-xl-3">
											<section class="panel panel-featured-left panel-featured-primary">
												<div class="panel-body">
													<div class="widget-summary widget-summary-sm">
														<div class="widget-summary-col widget-summary-col-icon">
															<a href="<?php echo base_url(); ?>be/quarterly">
															<div class="summary-icon bg-info">
																<i class="fa fa-line-chart"></i>
															</div>
															</a>
															<div class="summary text-center">
																<h3 class="title"><a href="<?php echo base_url(); ?>be/quarterly" class="text-info">Quarterly Reports</a></h3>
																<div class="info mt-md">
																	View Quarterly Reports List, Report Detail, Create New Report, Edit Report and Delete Report.		
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-muted text-uppercase">(view all)</a>
															</div>														
														</div>
														<div class="widget-summary-col">
														</div>
													</div>
												</div>
											</section>
										</div>										
										<div class="col-md-3 col-lg-3 col-xl-3">
											<section class="panel panel-featured-left panel-featured-primary">
												<div class="panel-body">
													<div class="widget-summary widget-summary-sm">
														<div class="widget-summary-col widget-summary-col-icon">
															<a href="<?php echo base_url(); ?>be/performance_dashboard">
															<div class="summary-icon bg-warning">
																<i class="fa fa-pie-chart"></i>
															</div>
															</a>
															<div class="summary text-center">
																<h3 class="title"><a href="<?php echo base_url(); ?>be/performance_dashboard" class="text-warning">Performance Dashboard</a></h3>
																<div class="info mt-md">
																View Analytical performance analysis based on different indicators.	
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-muted text-uppercase">(view all)</a>
															</div>

														</div>
														<div class="widget-summary-col">
														</div>
													</div>
												</div>
											</section>
										</div>
									</div>
								</div>
							</section>

							<!--<section class="panel">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-3 col-lg-3 col-xl-3">
											<section class="panel panel-featured-left panel-featured-danger">
												<div class="panel-body">
													<div class="widget-summary widget-summary-sm">
														<div class="widget-summary-col widget-summary-col-icon">
															<a href="<?php echo base_url(); ?>be/biweekly/summary">
															<div class="summary-icon bg-danger">
																<i class="fa fa-file-pdf-o"></i>
															</div>
															</a>
															<div class="summary text-center">
																<h3 class="title"><a href="<?php echo base_url(); ?>be/biweekly/summary" class="text-danger">Generate Bi-Weekly Report Summary</a></h3>
																<div class="info">
																	You can be able to submit your Quarterly report here.		
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-muted text-uppercase">(view all)</a>
															</div>					
														</div>
														<div class="widget-summary-col">
														</div>
													</div>
												</div>
											</section>
										</div>
										<div class="col-md-3 col-lg-3 col-xl-3">
											<section class="panel panel-featured-left panel-featured-success">
												<div class="panel-body">
													<div class="widget-summary widget-summary-sm">
														<div class="widget-summary-col widget-summary-col-icon">
															<a href="<?php echo base_url(); ?>be/quarterly/summary">
															<div class="summary-icon bg-success">
																<i class="fa fa-file-pdf-o"></i>
															</div>
															</a>
															<div class="summary text-center">
																<h3 class="title"><a href="<?php echo base_url(); ?>be/quarterly/summary" class="text-success">Generate Quarterly Report Summary</a></h3>
																<div class="info">
																	You can be able to submit your Quarterly report here.		
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-muted text-uppercase">(view all)</a>
															</div>														
														</div>
														<div class="widget-summary-col">
														</div>
													</div>
												</div>
											</section>
										</div>

										<div class="col-md-3 col-lg-3 col-xl-3">
											<section class="panel panel-featured-left panel-featured-primary">
												<div class="panel-body">
													<div class="widget-summary widget-summary-sm">
														<div class="widget-summary-col widget-summary-col-icon">
															<a href="<?php echo base_url(); ?>be/training_sessions">
															<div class="summary-icon bg-primary">
																<i class="fa fa-address-book-o"></i>
															</div>
															</a>
															<div class="summary text-center">
																<h3 class="title"><a href="<?php echo base_url(); ?>be/training_sessions" class="text-primary">Training Sessions</a></h3>
																<div class="info">
																	You can be able to submit your Quarterly report here.		
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-muted text-uppercase">(view all)</a>
															</div>														
														</div>
														<div class="widget-summary-col">
														</div>
													</div>
												</div>
											</section>
										</div>
										<div class="col-md-3 col-lg-3 col-xl-3">
											<section class="panel panel-featured-left panel-featured-info">
												<div class="panel-body">
													<div class="widget-summary widget-summary-sm">
														<div class="widget-summary-col widget-summary-col-icon">
															<a href="<?php echo base_url(); ?>be/performance_dashboard">
															<div class="summary-icon bg-info">
																<i class="fa fa-bar-chart"></i>
															</div>
															</a>
															<div class="summary text-center">
																<h3 class="title"><a href="<?php echo base_url(); ?>be/performance_dashboard" class="text-info">Performance Dashboard</a></h3>
																<div class="info">
																	You can be able to submit your Quarterly report here.		
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-muted text-uppercase">(view all)</a>
															</div>														
														</div>
														<div class="widget-summary-col">
														</div>
													</div>
												</div>
											</section>
										</div>
									</div>
								</div>
							</section>-->
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>
