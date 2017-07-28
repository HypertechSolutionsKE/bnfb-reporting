		<script src="<?php echo base_url(); ?>assets/be/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/javascripts/tables/examples.datatables.tabletools.js"></script>

											<blockquote class="primary rounded b-thin">
												<p class="text-success">Key elements of the scaling up model documented and published</p>
											</blockquote>				

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
												<th>Date</th>
												<th>Crop</th>
												<th>Implementor</th>											
												<th>No. of Elements</th>												
												<th>Type</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($key_elements_documented as $row): ?>
												<tr>
													<td><?php echo $row->period_from . ' to ' . $row->period_to; ?></td>
													<td><?php echo $row->crop_name; ?></td>
													<td><?php echo $row->implementor_name; ?></td>
													<td><?php echo $row->no_key_elements; ?></td>
													<td><?php echo $row->type_key_elements; ?></td>
													<td class="center">
														<a href="<?php //echo base_url(); ?>be/countries/edit/<?php //echo  $row->country_id; ?>" class="on-default edit-row badge btn-success" data-toggle="tooltip" data-placement="top" title="Edit Country"><i class="fa fa-pencil"></i></a>
														<a onClick="javascript:return confirm('Do you really wish to delete this Country?');" href="<?php //echo base_url(); ?>be/countries/delete/<?php //echo  $row->country_id; ?>" class="on-default remove-row badge btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Country"><i class="fa fa-trash-o"></i></a>												
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
