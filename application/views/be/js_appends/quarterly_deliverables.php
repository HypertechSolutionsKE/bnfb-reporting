																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Partner</th>
																			<th>Cause</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($quarterly_deliverables)): ?>
																			<?php foreach ($quarterly_deliverables as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo $row->implementor_type_name; ?></td>
																					<td><?php echo $row->quarterly_deliverables_cause; ?></td>
																					<td>
																						<div class="btn-group">
																							<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
																							<ul class="dropdown-menu" role="menu">
																								<li><a class="modal-with-form modal-with-zoom-anim quarterly_edit_deliverables" href="#modalEditPlannedDeliverables" data-id ="<?php echo $row->quarterly_deliverables_id; ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
																								<li><a class="quarterly_delete_deliverables" href="javascript:void(0);" data-id ="<?php echo $row->quarterly_deliverables_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
																							</ul>
																						</div>
																					</td>
																				</tr>
																			<?php endforeach; ?>
																		<?php endif; ?>
																	</tbody>
																</table>

		<script src="<?php echo base_url(); ?>assets/be/javascripts/forms/examples.wizard.js"></script>
		<script src="<?php echo base_url(); ?>assets/be/javascripts/ui-elements/examples.modals.js"></script>		
