(function() {

	'use strict';

	// REGISTRATION FORM
	$("#registration_form").validate({
		errorPlacement: function( error, element ) {
			var placement = element.closest('.input-group');
			if (!placement.get(0)) {
				placement = element;
			}
			if (error.text() !== '') {
				placement.after(error);
			}
		},
		rules: {
			confirm_password: {
				required: true,
				equalTo: "#user_password"
			},
		},
		messages: {
			confirm_password: {
				equalTo: "Please retype the correct password",
			},
		}
	});

	//LOGIN FORM
	$("#login_form"),$("#frm_milestonesadd"),$("#frm_implementor_types_add"),$("#frm_implementors_add"),$("#frm_countries_add"),$("#frm_user_titles_add").validate({
		errorPlacement: function( error, element ) {
			var placement = element.closest('.input-group');
			if (!placement.get(0)) {
				placement = element;
			}
			if (error.text() !== '') {
				placement.after(error);
			}
		}
	});

	// INDICATORS FORM
	$("#frm_indicatorsadd").validate({
		errorPlacement: function( error, element ) {
			var placement = element.closest('.input-group');
			if (!placement.get(0)) {
				placement = element;
			}
			if (error.text() !== '') {
				placement.after(error);
			}
		},
		rules: {
			target_males: {
				required: true,
				number: true
			},
			target_females: {
				required: true,
				number: true
			},
		},
		messages: {
			confirm_password: {
				equalTo: "Please retype the correct password",
			},
		}
	});

	// INDICATORS FORM
	$("#frm_intermediate_results_add").validate({
		errorPlacement: function( error, element ) {
			var placement = element.closest('.input-group');
			if (!placement.get(0)) {
				placement = element;
			}
			if (error.text() !== '') {
				placement.after(error);
			}
		}
	});

	// REGISTRATION FORM
	$("#frm_system_users_add").validate({
		errorPlacement: function( error, element ) {
			var placement = element.closest('.input-group');
			if (!placement.get(0)) {
				placement = element;
			}
			if (error.text() !== '') {
				placement.after(error);
			}
		},
		rules: {
			confirm_password: {
				required: true,
				equalTo: "#user_password"
			},
		}
	});

	// TRAINING SESSIONS ADD FORM
	$("#frm_training_sessions_add").validate({
		errorPlacement: function( error, element ) {
			var placement = element.closest('.input-group');
			if (!placement.get(0)) {
				placement = element;
			}
			if (error.text() !== '') {
				placement.after(error);
			}
		},
		rules: {
			males_attended: {
				required: true,
				number: true
			},
			females_attended: {
				required: true,
				number: true
			},
		},
		messages: {
			training_period_from: {
				required: "Period From is required",
			},
			training_period_to: {
				required: "Period To is required &nbsp;&nbsp;&nbsp;&nbsp;",
			}
		}
	});

	// validation summary
	var $summaryForm = $("#summary-form");
	$summaryForm.validate({
		errorContainer: $summaryForm.find( 'div.validation-message' ),
		errorLabelContainer: $summaryForm.find( 'div.validation-message ul' ),
		wrapper: "li"
	});

	// checkbox, radio and selects
	$("#chk-radios-form, #selects-form").each(function() {
		$(this).validate({
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
			}
		});
	});

}).apply(this, [jQuery]);