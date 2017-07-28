											<div class="div_quarterly_intermediate_result">
												<!-- Specific Page Vendor CSS -->		
												<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/jquery-ui/jquery-ui.css" />		
												<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/jquery-ui/jquery-ui.theme.css" />		
												<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />		
												<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/select2/css/select2.css" />
												<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
												<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/vendor/codemirror/theme/monokai.css" />

												<!-- Theme CSS -->
												<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/stylesheets/theme.css" />

												<!-- Theme Custom CSS -->
												<link rel="stylesheet" href="<?php echo base_url(); ?>assets/be/stylesheets/theme-custom.css">
	    
	    										<script type="text/javascript">
	    											var baseDir = '<?php echo base_url(); ?>';
	    											//var cur_city_id = '';
	   											</script>

												<!-- Head Libs -->
												<script src="<?php echo base_url(); ?>assets/be/vendor/modernizr/modernizr.js"></script>		
												<script src="<?php echo base_url(); ?>assets/be/vendor/style-switcher/style.switcher.localstorage.js"></script>


																	<?php $rand_id = rand(10,100); ?>

																	<div class="form-group col-md-12">		
																		<label class="control-label">Intermediate Result</label>
					                                                	<select data-plugin-selectTwo class="form-control populate quarterly_intermediate_result_id" id="quarterly_intermediate_result_id<?php echo $rand_id; ?>" name="quarterly_intermediate_result_id[]">
					                                                    	<option value="">-- Select Intermediate Result --</option> 
					                                                    	<?php foreach($intermediate_results as $row2): ?>
					                                                        	<option value="<?php echo $row2->intermediate_result_id; ?>" ><?php echo $row2->intermediate_result_name; ?></option>
					                                                    	<?php endforeach; ?>             
					                                                	</select>
					                                                </div> 
																	<div class="form-group col-md-12">	
																		<label class="control-label">Deliverables/Outputs during the reporting period</label>
																		<div class="">
																			<textarea class="ckeditor form-control ckeditor2 quarterly_deliverable" name="quarterly_deliverable[]" id="quarterly_deliverable<?php echo $rand_id; ?>"></textarea>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																	<div class="form-group col-md-12">
																		<button type="button" id="" class="btn btn-danger btn-sm pull-right btn_quarterly_intermediate_result_delete"><i class="fa fa-trash-o"></i> Delete Intermediate Result</button>


																		<button type="button" id="btn_quarterly_add_intermediate_result" class="btn btn-info btn-sm btn_quarterly_add_intermediate_result">
				                                            			<i class="fa fa-plus-circle"></i> Add Intermediate Result
				                                        				</button>
				                                        			</div>
				                                        			<div class="clearfix"></div>








												<!-- Specific Page Vendor -->
												<script src="<?php echo base_url(); ?>assets/be/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>

												<script src="<?php echo base_url(); ?>assets/be/vendor/select2/js/select2.js"></script>
												<script src="<?php echo base_url(); ?>assets/be/vendor/jquery-validation/jquery.validate.js"></script>
												<script src="<?php echo base_url(); ?>assets/be/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
												<script src="<?php echo base_url(); ?>assets/be/vendor/pnotify/pnotify.custom.js"></script>
		
												<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/lib/codemirror.js"></script>

												<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/mode/xml/xml.js"></script>
												<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
												<script src="<?php echo base_url(); ?>assets/be/vendor/codemirror/mode/css/css.js"></script>
												<script src="<?php echo base_url(); ?>assets/be/vendor/ckeditor/adapters/jquery.js"></script>
		
												<script src="<?php echo base_url(); ?>assets/be/vendor/ckeditor/ckeditor.js"></script>
												<script src="<?php echo base_url(); ?>assets/be/vendor/ckeditor/ckeditor-custom.js"></script>

												<script src="<?php echo base_url(); ?>assets/be/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>



												<!-- Theme Base, Components and Settings -->
												<script src="<?php echo base_url(); ?>assets/be/javascripts/theme.js"></script>
		
												<!-- Theme Custom -->
												<script src="<?php echo base_url(); ?>assets/be/javascripts/theme.custom.js"></script>
		
												<!-- Theme Initialization Files -->
												<script src="<?php echo base_url(); ?>assets/be/javascripts/theme.init.js"></script>
												<!-- Analytics to Track Preview Website -->		

												<!--<script src="<?php echo base_url(); ?>assets/be/javascripts/layouts/examples.header.menu.js"></script>-->
												<script src="<?php echo base_url(); ?>assets/be/javascripts/forms/validation.js"></script>
												<script src="<?php echo base_url(); ?>assets/be/javascripts/forms/examples.wizard.js"></script>

												<script type="text/javascript">
													//var elem = $(this).find('.your_selector')
 													$('.ckeditor2').ckeditor();

 													$('.btn_quarterly_intermediate_result_delete').on('click', function() {
 														$(this).closest('.div_quarterly_intermediate_result').remove();
 													});	
												</script>

											</div>