																<table class="table table-striped mb-none">
																	<thead>
																		<tr>
																			<th>Milestone</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if (isset($biweekly_tasks)): ?>
																			<?php foreach ($biweekly_tasks as $row): ?>
																				<tr>
																					<td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo character_limiter($row->milestone_name,55); ?></td>
																					<td>
																						<div class="btn-group">
																							<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
																							<ul class="dropdown-menu" role="menu">
																								<li><a class="modal-with-form modal-with-zoom-anim biweekly_edit_tasks" href="#modalEditTasks" data-id ="<?php echo $row->biweekly_task_id; ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>
																								<li><a class="biweekly_delete_task" href="javascript:void(0);" data-id ="<?php echo $row->biweekly_task_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
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
