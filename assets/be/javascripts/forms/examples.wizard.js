/*
Name: 			Forms / Wizard - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	1.6.0
*/

(function($) {

	'use strict';

	/*
	Wizard #1
	*/

	var $w1finish = $('#w1').find('ul.pager li.finish'),
		$w1validator = $("#w1 form").validate({
			rules: {
			},
        	messages:{
 
           	},			
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},		
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
				$(element).remove();
			},
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
				/*biweekly_report_summary: {
			   		required: function(){
                    	CKEDITOR.instances.biweekly_report_summary.updateElement();
              		},
		    		minlength:10
				},
				biweekly_report_remark: {
			   		required: function(){
                    	CKEDITOR.instances.biweekly_report_remark.updateElement();
              		},
		    		minlength:10
				},*/

            	/*biweekly_report_summary:{
               		required:"This field is required.",
           			minlength:"This field requires atleast 10 characters"
            	},
            	biweekly_report_remark:{
               		required:"This field is required.",
           			minlength:"This field requires atleast 10 characters"               		
            	}, */ 

	$w1finish.on('click', function( ev ) {
		ev.preventDefault();
    	
    	$("#w1 form").data("validator").settings.ignore = ':hidden:not("#biweekly_activity")';
    	biweekly_submit();
	});

	$('#w1').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
    		if (index == 1){
    			//$("#w1 form").data("validator").settings.ignore = ':hidden:not("#biweekly_report_summary,#biweekly_report_remark")';
    		}

			var validated = $('#w1 form').valid();
			if( !validated ) {
				PNotify.removeAll();
				new PNotify({
					title: 'Validation Error',
					text: 'Please confirm that your data input is as required.',
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
				$('html, body').animate({ scrollTop: $('#w1').offset().top-120 }, 'slow');
				//$w1validator.focusInvalid();
				return false;
			}else{
				if (index == 1){
					if (biweekly_submit_summary() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 2){
					if (biweekly_submit_tasks() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 3){
					if (biweekly_submit_challenges() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 4){
					if (biweekly_submit_events() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 5){
					if (biweekly_submit_activities() == false){
						return false;
					}else{
						return true;
					}
				}
			}
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index+1, newindex+1);
			}else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var totalTabs = navigation.find('li').length - 1;
			$w1finish[ newindex != totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w1').find(this.nextSelector)[ newindex == totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('html, body').animate({ scrollTop: $('#w1').offset().top-120 }, 'slow');		
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length - 1;
			var $current = index;
			var $percent = Math.floor(( $current / $total ) * 100);
			$('#w1').find('.progress-indicator').css({ 'width': $percent + '%' });
			tab.prevAll().addClass('completed');
			tab.nextAll().removeClass('completed');
		}

	});

	/*
	Wizard #2
	*/
	var $w2finish = $('#w2').find('ul.pager li.finish'),
		$w2validator = $("#w2 form").validate({
			rules: {
				quarterly_executive_summary: {
			   		required: function(){
                    	CKEDITOR.instances.quarterly_executive_summary.updateElement();
              		},
		    		minlength:10
				},
				quarterly_strategic_outlook: {
			   		required: function(){
                    	CKEDITOR.instances.quarterly_strategic_outlook.updateElement();
              		},
		    		minlength:10
				},
				quarterly_key_lessons: {
			   		required: function(){
                    	CKEDITOR.instances.quarterly_key_lessons.updateElement();
              		},
		    		minlength:10
				},

			},
        	messages:{
            	quarterly_executive_summary:{
               		required:"This field is required.",
           			minlength:"This field requires atleast 10 characters"
            	},
            	quarterly_strategic_outlook:{
               		required:"This field is required.",
           			minlength:"This field requires atleast 10 characters"
            	},
            	quarterly_key_lessons:{
               		required:"This field is required.",
           			minlength:"This field requires atleast 10 characters"
            	},

           	},
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},		
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
				$(element).remove();
			},
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

	$w2finish.on('click', function( ev ) {
		ev.preventDefault();
		quarterly_submit();
	});

	$('#w2').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
    		if (index == 1){
    			$("#w2 form").data("validator").settings.ignore = ':hidden:not("#quarterly_executive_summary")';
    		}else if (index == 6){
    			$("#w2 form").data("validator").settings.ignore = ':hidden:not("#quarterly_strategic_outlook")';
    		}else if (index == 7){
    			$("#w2 form").data("validator").settings.ignore = ':hidden:not("#quarterly_key_lessons")';
    		}else{
     			$("#w2 form").data("validator").settings.ignore = ':hidden("#quarterly_executive_summary")';
    			$("#w2 form").data("validator").settings.ignore = ':hidden("#quarterly_strategic_outlook")';
    			$("#w2 form").data("validator").settings.ignore = ':hidden("#quarterly_key_lessons")';   			
    		}
    		

			var validated = $('#w2 form').valid();
			if( !validated ) {
				PNotify.removeAll();
				new PNotify({
					title: 'Validation Error',
					text: 'Please confirm that your data input is as required.',
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
				$('html, body').animate({ scrollTop: $('#w2').offset().top-120 }, 'slow');
				return false;
			}else{
				if (index == 1){
					if (quarterly_submit_summary() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 2){
					if (quarterly_submit_accomplishments() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 3){
					if (quarterly_submit_resources() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 4){
					if (quarterly_submit_deliverables() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 5){
					if (quarterly_submit_management_issues() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 6){
					if (quarterly_submit_outlook() == false){
						return false;
					}else{
						return true;
					}
				}
				else if (index == 7){
					if (quarterly_submit_lessons() == false){
						return false;
					}else{
						return true;
					}
				}
			}
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			//if (newindex > index){
				//return false;
			//}
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index+1, newindex+1);
			}else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var totalTabs = navigation.find('li').length - 1;
			$w2finish[ newindex != totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w2').find(this.nextSelector)[ newindex == totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('html, body').animate({ scrollTop: $('#w2').offset().top-120 }, 'slow');		
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length - 1;
			var $current = index;
			var $percent = Math.floor(( $current / $total ) * 100);
			$('#w2').find('.progress-indicator').css({ 'width': $percent + '%' });
			tab.prevAll().addClass('completed');
			tab.nextAll().removeClass('completed');

			//if (index == 8){
				//alert('Am 8!');
				
			//}

		}

	});

	/*
	Wizard #3
	*/
	var $w3finish = $('#w3').find('ul.pager li.finish'),
		$w3validator = $("#w3 form").validate({
			rules: {
				biannual_accronyms: {
			   		required: function(){
                    	CKEDITOR.instances.biannual_accronyms.updateElement();
              		},
		    		minlength:10
				},
				biannual_executive_summary: {
			   		required: function(){
                    	CKEDITOR.instances.biannual_executive_summary.updateElement();
              		},
		    		minlength:10
				},
				biannual_project_progress: {
			   		required: function(){
                    	CKEDITOR.instances.biannual_project_progress.updateElement();
              		},
		    		minlength:10
				},
				biannual_financial_update: {
			   		required: function(){
                    	CKEDITOR.instances.biannual_financial_update.updateElement();
              		},
		    		minlength:10
				},

				/*quarterly_strategic_outlook: {
			   		required: function(){
                    	CKEDITOR.instances.quarterly_strategic_outlook.updateElement();
              		},
		    		minlength:10
				},
				quarterly_key_lessons: {
			   		required: function(){
                    	CKEDITOR.instances.quarterly_key_lessons.updateElement();
              		},
		    		minlength:10
				},*/

			},
        	messages:{
            	biannual_accronyms:{
               		required:"This field is required.",
           			minlength:"This field requires atleast 10 characters"
            	},        		
            	biannual_executive_summary:{
               		required:"This field is required.",
           			minlength:"This field requires atleast 10 characters"
            	},
            	biannual_project_progress:{
               		required:"This field is required.",
           			minlength:"This field requires atleast 10 characters"
            	},
            	biannual_financial_update:{
               		required:"This field is required.",
           			minlength:"This field requires atleast 10 characters"
            	},
            	quarterly_key_lessons:{
               		required:"This field is required.",
           			minlength:"This field requires atleast 10 characters"
            	},

           	},
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},		
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
				$(element).remove();
			},
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

	$w3finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w3 form').valid();
		if ( validated ) {
			new PNotify({
				title: 'Congratulations',
				text: 'You completed the wizard form.',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});
		}
	});

	$('#w3').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
    		if (index == 1){
    			$("#w3 form").data("validator").settings.ignore = ':hidden:not("#biannual_executive_summary,#biannual_accronyms")';
    		}else if (index == 2){
    			$("#w3 form").data("validator").settings.ignore = ':hidden:not("#biannual_project_progress")';
    		}else if (index == 3){
    			//$("#w3 form").data("validator").settings.ignore = ':hidden:not("#quarterly_key_lessons")';
    		}else if (index == 4){
    			$("#w3 form").data("validator").settings.ignore = ':hidden:not("#biannual_financial_update")';
    		}else{
     			//$("#w3 form").data("validator").settings.ignore = ':hidden("#quarterly_executive_summary")';
    			//$("#w3 form").data("validator").settings.ignore = ':hidden("#quarterly_strategic_outlook")';
    			//$("#w3 form").data("validator").settings.ignore = ':hidden("#quarterly_key_lessons")';   			
    		}
    		

			var validated = $('#w3 form').valid();
			if( !validated ) {
				PNotify.removeAll();
				new PNotify({
					title: 'Validation Error',
					text: 'Please confirm that your data input is as required.',
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
				$('html, body').animate({ scrollTop: $('#w3').offset().top-120 }, 'slow');
				return false;
			}else{
				if (index == 1){
					if (biannual_submit_summary() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 2){
					if (biannual_submit_progress() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 3){
					if (biannual_submit_deviations() == false){
						return false;
					}else{
						return true;
					}
				}else if (index == 4){
					if (biannual_submit_financials() == false){
						return false;
					}else{
						return true;
					}				
				}else if (index == 5){
					if (biannual_submit_appendices() == false){
						return false;
					}else{
						return true;
					}
				}

			}
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			//if (newindex > index){
				//return false;
			//}
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index+1, newindex+1);
			}else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var totalTabs = navigation.find('li').length - 1;
			$w3finish[ newindex != totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w3').find(this.nextSelector)[ newindex == totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('html, body').animate({ scrollTop: $('#w3').offset().top-120 }, 'slow');		
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length - 1;
			var $current = index;
			var $percent = Math.floor(( $current / $total ) * 100);
			$('#w3').find('.progress-indicator').css({ 'width': $percent + '%' });
			tab.prevAll().addClass('completed');
			tab.nextAll().removeClass('completed');

			//if (index == 8){
				//alert('Am 8!');
				
			//}

		}

	});

	/*
	Wizard #4
	*/
	var $w4finish = $('#w4').find('ul.pager li.finish'),
		$w4validator = $("#w4 form").validate({
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			element.parent().append( error );
		}
	});

	$w4finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w4 form').valid();
		if ( validated ) {
			new PNotify({
				title: 'Congratulations',
				text: 'You completed the wizard form.',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});
		}
	});

	$('#w4').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w4 form').valid();
			if( !validated ) {
				$w4validator.focusInvalid();
				return false;
			}
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index, newindex);
			} else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var $total = navigation.find('li').length - 1;
			$w4finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w4').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length - 1;
			var $current = index;
			var $percent = Math.floor(( $current / $total ) * 100);
			$('#w4').find('.progress-indicator').css({ 'width': $percent + '%' });
			tab.prevAll().addClass('completed');
			tab.nextAll().removeClass('completed');
		}
	});

	/*
	Wizard #5
	*/
	var $w5finish = $('#w5').find('ul.pager li.finish'),
		$w5validator = $("#w5 form").validate({
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			element.parent().append( error );
		}
	});

	$w5finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w5 form').valid();
		if ( validated ) {
			new PNotify({
				title: 'Congratulations',
				text: 'You completed the wizard form.',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});
		}
	});

	$('#w5').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w5 form').valid();
			if( !validated ) {
				$w5validator.focusInvalid();
				return false;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var $total = navigation.find('li').length - 1;
			$w5finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w5').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length;
			var $current = index + 1;
			var $percent = ( $current / $total ) * 100;
			$('#w5').find('.progress-bar').css({ 'width': $percent + '%' });
		}
	});

}).apply(this, [jQuery]);

function validateNumeric(num){
    return isNaN(num);
}

/****************
====== BIWEEKLY REPORTS ========
*****************/

//REPORT SUMMARY
function biweekly_submit_summary(){
	$("#biweekly_spinner").fadeIn("fast");
	$ret = false;
	$.ajax({
	    url: baseDir+'be/biweekly/save_summary',
	    type: 'POST',
	    async: false,
        data: {
         	'biweekly_report_title': $("#biweekly_report_title").val(),
          	'biweekly_period_from': $("#biweekly_period_from").val(),
        	'biweekly_period_to': $("#biweekly_period_to").val()
      	},
		dataType: 'json'
	})
	.done(function(res) {
		$("#biweekly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$ret = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$ret = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: res.message,
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			$ret = true;
		}
  	})
  	.fail(function(xhr) {
		$("#biweekly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$ret = false;
  	});
  	return $ret;
}

          	/*'biweekly_report_summary': $("#biweekly_report_summary").val(),
          	'biweekly_report_remark': $("#biweekly_report_remark").val()  */        	


//BIWEEKLY TASKS
var biweekly_tasks_valid = function validate_biweekly_tasks(){
	$obj_valid = true;

	CKEDITOR.instances['biweekly_tasks'].updateElement();

	$('#biweekly_tasks_milestone_id + p').hide();
	$('#biweekly_tasks + p').hide();

	//MILESTONE ID
    if ($('#biweekly_tasks_milestone_id').val() == '' || $('#biweekly_tasks_milestone_id').val() == null){
    	$('#biweekly_tasks_milestone_id').after('<p class="has-error">* Please select Partner</p>')
    	$('#biweekly_tasks_milestone_id').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_tasks_milestone_id + p').hide();
    	$('#biweekly_tasks_milestone_id').closest('.form-group').removeClass( "has-error" );
    }

    //TASKS
   	if ($('#biweekly_tasks').val() == '' || $('#biweekly_tasks').val() == null){
    	$('#biweekly_tasks').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_tasks').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_biweekly_save_tasks").off().on('click', function() {

	if (biweekly_tasks_valid() == false){
	    PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
		$('html, body').animate({ scrollTop: $('#biweekly_taskss').offset().top-120 }, 'slow');
	}else{
		var dt = $('#biweekly_tasks_milestone_id,#biweekly_tasks').serialize();
		$("#biweekly_tasks_spinner").fadeIn("fast");
		$.ajax({
	    	url: baseDir+'be/biweekly/save_tasks',
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#biweekly_tasks_spinner").fadeOut("fast");
		        if(res.status == 'ERR'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				}else if (res.status == 'EXP'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Session Expired',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-check'
					});
					
					window.location = baseDir+'be';
				}else if (res.status == 'SUCCESS'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Success',
						text: res.message,
						type: 'custom',
						addclass: 'notification-success',
						icon: 'fa fa-check'
					});
					
					$('#biweekly_tasks_milestone_id').val('').change();
    				CKEDITOR.instances['biweekly_tasks'].setData('');

					load_biweekly_tasks();
					
					$('html, body').animate({ scrollTop: $('#biweekly_taskss').offset().top-120 }, 'slow');
				}
	       	},
			error: function(){
					$("#biweekly_tasks_spinner").fadeOut("fast");
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: 'Ooops! Something went wrong. Please check your network and try again.',
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				$ret = false;
			}
	   	});
	}
});
function load_biweekly_tasks(){
	$.ajax({
	   	url: baseDir+'be/biweekly/load_js_biweekly_tasks',
	    type: 'POST',
	    data: '',
	    success: function (res) {
	   		$( "#div_biweekly_saved_tasks" ).html(res);
	   	},
		error: function(){
		
		}
	});

}
function biweekly_submit_tasks(){
	$("#biweekly_spinner").fadeIn("fast");
	$ret = false;
	$.ajax({
	    url: baseDir+'be/biweekly/validate_tasks',
	    type: 'POST',
	    async: false,
	    data: '',
		dataType: 'json'
	})
	.done(function(res) {
		$("#biweekly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$ret = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$ret = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: 'Accomplished Tasks saved successfully',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			$ret = true;
		}
  	})
  	.fail(function(xhr) {
		$("#biweekly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$ret = false;
  	});

  	return $ret;
}


//BIWEEKLY CHALLENGES
var biweekly_challenges_valid = function validate_biweekly_challenges(){
	$obj_valid = true;

	CKEDITOR.instances['biweekly_challenges'].updateElement();

	$('#biweekly_challenges_milestone_id + p').hide();
	$('#biweekly_challenges + p').hide();

	//MILESTONE ID
    if ($('#biweekly_challenges_milestone_id').val() == '' || $('#biweekly_challenges_milestone_id').val() == null){
    	$('#biweekly_challenges_milestone_id').after('<p class="has-error">* Please select Partner</p>')
    	$('#biweekly_challenges_milestone_id').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_challenges_milestone_id + p').hide();
    	$('#biweekly_challenges_milestone_id').closest('.form-group').removeClass( "has-error" );
    }

    //CHALLENGES
   	if ($('#biweekly_challenges').val() == '' || $('#biweekly_challenges').val() == null){
    	$('#biweekly_challenges').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_challenges').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_biweekly_save_challenges").off().on('click', function() {

	if (biweekly_challenges_valid() == false){
	    PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
		$('html, body').animate({ scrollTop: $('#biweekly_challengess').offset().top-120 }, 'slow');
	}else{
		var dt = $('#biweekly_challenges_milestone_id,#biweekly_challenges').serialize();
		$("#biweekly_challenges_spinner").fadeOut("fast");
		$.ajax({
	    	url: baseDir+'be/biweekly/save_challenges',
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#biweekly_challenges_spinner").fadeOut("fast");
		        if(res.status == 'ERR'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				}else if (res.status == 'EXP'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Session Expired',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-check'
					});
					
					window.location = baseDir+'be';
				}else if (res.status == 'SUCCESS'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Success',
						text: res.message,
						type: 'custom',
						addclass: 'notification-success',
						icon: 'fa fa-check'
					});
					
					$('#biweekly_challenges_milestone_id').val('').change();
    				CKEDITOR.instances['biweekly_challenges'].setData('');

					load_biweekly_challenges();
					
					$('html, body').animate({ scrollTop: $('#biweekly_challengess').offset().top-120 }, 'slow');
				}
	       	},
			error: function(){
					$("#biweekly_challenges_spinner").fadeOut("fast");
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: 'Ooops! Something went wrong. Please check your network and try again.',
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				$ret = false;
			}
	   	});
	}
});
function load_biweekly_challenges(){
	$.ajax({
	   	url: baseDir+'be/biweekly/load_js_biweekly_challenges',
	    type: 'POST',
	    data: '',
	    success: function (res) {
	   		$( "#div_biweekly_saved_challenges" ).html(res);
	   	},
		error: function(){
		
		}
	});

}
function biweekly_submit_challenges(){
	$("#biweekly_spinner").fadeIn("fast");
	$ret = false;
	$.ajax({
	    url: baseDir+'be/biweekly/validate_challenges',
	    type: 'POST',
	    async: false,
	    data: '',
		dataType: 'json'
	})
	.done(function(res) {
		$("#biweekly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$ret = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$ret = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: 'Major challenges saved successfully',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			$ret = true;
		}
  	})
  	.fail(function(xhr) {
		$("#biweekly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$ret = false;
  	});

  	return $ret;
}


//BIWEEKLY EVENTS
var biweekly_events_valid = function validate_biweekly_events(){
	$obj_valid = true;

	CKEDITOR.instances['biweekly_events'].updateElement();

	$('#biweekly_events_milestone_id + p').hide();
	$('#biweekly_events + p').hide();

	//MILESTONE ID
    if ($('#biweekly_events_milestone_id').val() == '' || $('#biweekly_events_milestone_id').val() == null){
    	$('#biweekly_events_milestone_id').after('<p class="has-error">* Please select Partner</p>')
    	$('#biweekly_events_milestone_id').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_events_milestone_id + p').hide();
    	$('#biweekly_events_milestone_id').closest('.form-group').removeClass( "has-error" );
    }

    //eventS
   	if ($('#biweekly_events').val() == '' || $('#biweekly_events').val() == null){
    	$('#biweekly_events').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_events').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_biweekly_save_events").off().on('click', function() {

	if (biweekly_events_valid() == false){
	    PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
		$('html, body').animate({ scrollTop: $('#biweekly_eventss').offset().top-120 }, 'slow');
	}else{
		var dt = $('#biweekly_events_milestone_id,#biweekly_events').serialize();
		$("#biweekly_events_spinner").fadeOut("fast");
		$.ajax({
	    	url: baseDir+'be/biweekly/save_events',
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#biweekly_events_spinner").fadeOut("fast");
		        if(res.status == 'ERR'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				}else if (res.status == 'EXP'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Session Expired',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-check'
					});
					
					window.location = baseDir+'be';
				}else if (res.status == 'SUCCESS'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Success',
						text: res.message,
						type: 'custom',
						addclass: 'notification-success',
						icon: 'fa fa-check'
					});
					
					$('#biweekly_events_milestone_id').val('').change();
    				CKEDITOR.instances['biweekly_events'].setData('');

					load_biweekly_events();
					
					$('html, body').animate({ scrollTop: $('#biweekly_eventss').offset().top-120 }, 'slow');
				}
	       	},
			error: function(){
					$("#biweekly_events_spinner").fadeOut("fast");
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: 'Ooops! Something went wrong. Please check your network and try again.',
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				$ret = false;
			}
	   	});
	}
});
function load_biweekly_events(){
	$.ajax({
	   	url: baseDir+'be/biweekly/load_js_biweekly_events',
	    type: 'POST',
	    data: '',
	    success: function (res) {
	   		$( "#div_biweekly_saved_events" ).html(res);
	   	},
		error: function(){
		
		}
	});

}
function biweekly_submit_events(){
	$("#biweekly_spinner").fadeIn("fast");
	$ret = false;
	$.ajax({
	    url: baseDir+'be/biweekly/validate_events',
	    type: 'POST',
	    async: false,
	    data: '',
		dataType: 'json'
	})
	.done(function(res) {
		$("#biweekly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$ret = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$ret = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: 'Major Events saved successfully',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			$ret = true;
		}
  	})
  	.fail(function(xhr) {
		$("#biweekly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$ret = false;
  	});

  	return $ret;
}

//BIWEEKLY ACTIVITIES
var biweekly_activities_valid = function validate_biweekly_activities(){
	$obj_valid = true;

	CKEDITOR.instances['biweekly_activities'].updateElement();

	$('#biweekly_activities_milestone_id + p').hide();
	$('#biweekly_activities + p').hide();

	//MILESTONE ID
    if ($('#biweekly_activities_milestone_id').val() == '' || $('#biweekly_activities_milestone_id').val() == null){
    	$('#biweekly_activities_milestone_id').after('<p class="has-error">* Please select Partner</p>')
    	$('#biweekly_activities_milestone_id').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_activities_milestone_id + p').hide();
    	$('#biweekly_activities_milestone_id').closest('.form-group').removeClass( "has-error" );
    }

    //activities
   	if ($('#biweekly_activities').val() == '' || $('#biweekly_activities').val() == null){
    	$('#biweekly_activities').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_activities').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_biweekly_save_activities").off().on('click', function() {

	if (biweekly_activities_valid() == false){
	    PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
		$('html, body').animate({ scrollTop: $('#biweekly_activitiess').offset().top-120 }, 'slow');
	}else{
		var dt = $('#biweekly_activities_milestone_id,#biweekly_activities').serialize();
		$("#biweekly_activities_spinner").fadeOut("fast");
		$.ajax({
	    	url: baseDir+'be/biweekly/save_activities',
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#biweekly_activities_spinner").fadeOut("fast");
		        if(res.status == 'ERR'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				}else if (res.status == 'EXP'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Session Expired',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-check'
					});
					
					window.location = baseDir+'be';
				}else if (res.status == 'SUCCESS'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Success',
						text: res.message,
						type: 'custom',
						addclass: 'notification-success',
						icon: 'fa fa-check'
					});
					
					$('#biweekly_activities_milestone_id').val('').change();
    				CKEDITOR.instances['biweekly_activities'].setData('');

					load_biweekly_activities();
					
					$('html, body').animate({ scrollTop: $('#biweekly_activitiess').offset().top-120 }, 'slow');
				}
	       	},
			error: function(){
					$("#biweekly_activities_spinner").fadeOut("fast");
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: 'Ooops! Something went wrong. Please check your network and try again.',
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				$ret = false;
			}
	   	});
	}
});
function load_biweekly_activities(){
	$.ajax({
	   	url: baseDir+'be/biweekly/load_js_biweekly_activities',
	    type: 'POST',
	    data: '',
	    success: function (res) {
	   		$( "#div_biweekly_saved_activities" ).html(res);
	   	},
		error: function(){
		
		}
	});

}
function biweekly_submit_activities(){
	$("#biweekly_spinner").fadeIn("fast");
	$ret = false;
	$.ajax({
	    url: baseDir+'be/biweekly/validate_activities',
	    type: 'POST',
	    async: false,
	    data: '',
		dataType: 'json'
	})
	.done(function(res) {
		$("#biweekly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$ret = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$ret = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: 'Activities saved successfully',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			load_biweekly_report_view();

			$ret = true;
		}
  	})
  	.fail(function(xhr) {
		$("#biweekly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$ret = false;
  	});

  	return $ret;
}

//JS LOAD REPORT VIEW
function load_biweekly_report_view(){
	$.ajax({
	   	url: baseDir+'be/biweekly/load_js_biweekly_report',
	    type: 'POST',
	    data: '',
	    success: function (res) {
	   		$( "#biweekly_report_preview" ).html(res);
	   	},
		error: function(){
		
		}
	});

}


//BIWEEKLY SUBMIT
function biweekly_submit(){
	if (confirm('Do you wish to submit this Biweekly Report?')) { 
		$("#biweekly_spinner").fadeIn("fast");

		$.ajax({
	    	url: baseDir+'be/biweekly/submit',
	        type: 'POST',
	        data: '',
			dataType: 'json'
		})
		.done(function(res) {
			$("#biweekly_spinner").fadeOut("fast");
			if(res.status == 'ERR'){
		       	PNotify.removeAll();		    	
				new PNotify({
					title: 'Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
			}else if (res.status == 'EXP'){
		       	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-check'
				});

				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
		       	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				setTimeout(function() {
	  				window.location = baseDir+'be/biweekly';
				}, 3000);
			}
	  	})
	  	.fail(function(xhr) {
			$("#biweekly_spinner").fadeOut("fast");
	        PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
			$strat_valid = false;
	  	});
	}
}


/****************
====== QUARTERLY REPORTS ========
*****************/

//QUARTERLY SUMMARY
function quarterly_submit_summary(){
	$("#quarterly_spinner").fadeIn("fast");
	$del_valid = false;
	$.ajax({
	    url: baseDir+'be/quarterly/save_summary',
	    type: 'POST',
	    async: false,
        data: {
         	'quarterly_implementor_id': $("#quarterly_implementor_id").val(),
          	'quarterly_period_from': $("#quarterly_period_from").val(),
        	'quarterly_period_to': $("#quarterly_period_to").val(),
          	'quarterly_executive_summary': $("#quarterly_executive_summary").val()
      	},
		dataType: 'json'
	})
	.done(function(res) {
		$("#quarterly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$del_valid = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$del_valid = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: res.message,
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			$del_valid = true;
		}
  	})
  	.fail(function(xhr) {
		$("#quarterly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$del_valid = false;
  	});

  	return $del_valid;
}


//QUARTERLY ACCOMPLISHMENTS
function save_accomplishments(){
	$.ajax({
    	url: baseDir+'be/quarterly/save_accomplishments',
        type: 'POST',
        data: {
         	'quarterly_project_purpose_id': $("#quarterly_project_purpose_id").val()
      	},
		dataType: 'json',
        success: function (res) {
			$("#quarterly_spinner").fadeOut("fast");
	        if(res.status == 'ERR'){
	        	PNotify.removeAll();	        	
				new PNotify({
					title: 'Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-error',
					icon: 'fa fa-times'
				});

				return false;
			}else if (res.status == 'EXP'){
	        	PNotify.removeAll();
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-error',
					icon: 'fa fa-check'
				});
				
				return false;
				window.location = baseDir+'be';
			}else if (res.status == 'SESS_GONE'){
	        	PNotify.removeAll();				
				new PNotify({
					title: 'Report Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-error',
					icon: 'fa fa-check'
				});
				
				return false;
				window.location = baseDir+'be/quarterly/create';				
			}else if (res.status == 'SUCCESS'){
	        	PNotify.removeAll();				
				new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success'
				});
				
				return true;
			}
       	},
		error: function(){
			$("#quarterly_spinner").fadeOut("fast");
        	PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
			return false;
		}
   	});
}

function quarterly_submit_accomplishments(){
	$("#quarterly_spinner").fadeIn("fast");
	$del_valid = false;
	$.ajax({
	    url: baseDir+'be/quarterly/validate_objectives',
	    type: 'POST',
	    async: false,
        data: '',
		dataType: 'json'
	})
	.done(function(res) {
		$("#quarterly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$del_valid = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$del_valid = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
			save_accomplishments();

	       	/*PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: res.message,
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});*/

			$del_valid = true;
		}
  	})
  	.fail(function(xhr) {
		$("#quarterly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$del_valid = false;
  	});

  	return $del_valid;

}

var objective_valid = function validate_quarterly_objective(){
	$obj_valid = true;

	$('.quarterly_deliverable').each(function() {
		CKEDITOR.instances[$(this).attr('id')].updateElement();
	});

	$('.quarterly_project_objective_id').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
	});

	$('.quarterly_intermediate_result_id').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
	});

	$('.quarterly_country_id').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
	});

	$('.quarterly_thematic_area_id').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
	});

	$('.quarterly_milestone_id').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
	});

	$('.quarterly_deliverable').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
    	//CKEDITOR.instances[$(this).attr('id')].setData('');
	});

	return $obj_valid;
}

$("#btn_quarterly_save_objective").off().on('click', function() {

	if (objective_valid() == false){
       	PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
		$('html, body').animate({ scrollTop: $('#quarterly_project_objective_id').offset().top-150 }, 'slow');
	}else{
		var dt = $('.quarterly_project_objective_id, .quarterly_intermediate_result_id, .quarterly_country_id, .quarterly_thematic_area_id, .quarterly_milestone_id, .quarterly_deliverable').serialize();
		$("#quarterly_objective_spinner").fadeOut("fast");
		//alert(dt);
		$.ajax({
	    	url: baseDir+'be/quarterly/save_project_objective',
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#quarterly_objective_spinner").fadeOut("fast");
		        if(res.status == 'ERR'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				}else if (res.status == 'EXP'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Session Expired',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-check'
					});
					
					window.location = baseDir+'be';
				}else if (res.status == 'SUCCESS'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Success',
						text: res.message,
						type: 'custom',
						addclass: 'notification-success',
						icon: 'fa fa-check'
					});
					
					$('.quarterly_project_objective_id').each(function() {
				    	$(this).val('').change();
					});
					$('.quarterly_intermediate_result_id').each(function() {
				    	$(this).val('').change();
					});
					$('.quarterly_country_id').each(function() {
				    	$(this).val('').change();
					});
					$('.quarterly_thematic_area_id').each(function() {
				    	$(this).val('').change();
					});
					$('.quarterly_milestone_id').each(function() {
				    	$(this).val('').change();
					});

					$('.quarterly_deliverable').each(function() {
				    	CKEDITOR.instances[$(this).attr('id')].setData('');
					});

					load_quarterly_objectives();
					
					$('html, body').animate({ scrollTop: $('#quarterly_project_objective_id').offset().top-220 }, 'slow');
				}
	       	},
			error: function(){
					$("#quarterly_objective_spinner").fadeOut("fast");
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: 'Ooops! Something went wrong. Please check your network and try again.',
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				$ret = false;
			}
	   	});
	}
});

function load_quarterly_objectives(){
	$.ajax({
	   	url: baseDir+'be/quarterly/load_js_quarterly_objectives',
	    type: 'POST',
	    data: '',
	    success: function (res) {
	   		$( "#div_quarterly_saved_objectives" ).html(res);
	   	},
		error: function(){
		
		}
	});

}

//QUARTERLY RESOURCES
var resource_valid = function validate_quarterly_resource(){
	$obj_valid = true;

	$('#quarterly_resource_implementor_id + p').hide();
	$('#quarterly_resource_actual_expenditure + p').hide();
	$('#quarterly_resource_planned_expenditure + p').hide();
	$('#quarterly_resource_percentage_spent + p').hide();
	$('#quarterly_resource_variance + p').hide();

	//PARTNER
    if ($('#quarterly_resource_implementor_id').val() == '' || $('#quarterly_resource_implementor_id').val() == null){
    	$('#quarterly_resource_implementor_id').after('<p class="has-error">* Please select Partner</p>')
    	$('#quarterly_resource_implementor_id').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_resource_implementor_id + p').hide();
    	$('#quarterly_resource_implementor_id').closest('.form-group').removeClass( "has-error" );
    }
    //ACTUAL EXPENDITURE
    if ($('#quarterly_resource_actual_expenditure').val() == '' || $('#quarterly_resource_actual_expenditure').val() == null){
    	$('#quarterly_resource_actual_expenditure').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_resource_actual_expenditure').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	if (validateNumeric($('#quarterly_resource_actual_expenditure').val())){
	    	$('#quarterly_resource_actual_expenditure').after('<p class="has-error">* Only numeric values are allowed</p>')
	    	$('#quarterly_resource_actual_expenditure').closest('.form-group').addClass( "has-error" );
	    	$obj_valid = false;
    	}else{
	    	$('#quarterly_resource_actual_expenditure + p').hide();
	    	$('#quarterly_resource_actual_expenditure').closest('.form-group').removeClass( "has-error" );
	  	}
    }
    //PLANNED EXPENDITURE
    if ($('#quarterly_resource_planned_expenditure').val() == '' || $('#quarterly_resource_planned_expenditure').val() == null){
    	$('#quarterly_resource_planned_expenditure').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_resource_planned_expenditure').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	if (validateNumeric($('#quarterly_resource_planned_expenditure').val())){
	    	$('#quarterly_resource_planned_expenditure').after('<p class="has-error">* Only numeric values are allowed</p>')
	    	$('#quarterly_resource_planned_expenditure').closest('.form-group').addClass( "has-error" );
	    	$obj_valid = false;
    	}else{
	    	$('#quarterly_resource_planned_expenditure + p').hide();
	    	$('#quarterly_resource_planned_expenditure').closest('.form-group').removeClass( "has-error" );
	  	}
    }
    //PERCENTAGE SPENT
    if ($('#quarterly_resource_percentage_spent').val() == '' || $('#quarterly_resource_percentage_spent').val() == null){
    	$('#quarterly_resource_percentage_spent').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_resource_percentage_spent').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	if (validateNumeric($('#quarterly_resource_percentage_spent').val())){
	    	$('#quarterly_resource_percentage_spent').after('<p class="has-error">* Only numeric values are allowed</p>')
	    	$('#quarterly_resource_percentage_spent').closest('.form-group').addClass( "has-error" );
	    	$obj_valid = false;
    	}else{
	    	$('#quarterly_resource_percentage_spent + p').hide();
	    	$('#quarterly_resource_percentage_spent').closest('.form-group').removeClass( "has-error" );
	  	}
    }
    //VARIANCE
    if ($('#quarterly_resource_variance').val() == '' || $('#quarterly_resource_variance').val() == null){
    	$('#quarterly_resource_variance').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_resource_variance').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	if (validateNumeric($('#quarterly_resource_variance').val())){
	    	$('#quarterly_resource_variance').after('<p class="has-error">* Only numeric values are allowed</p>')
	    	$('#quarterly_resource_variance').closest('.form-group').addClass( "has-error" );
	    	$obj_valid = false;
    	}else{
	    	$('#quarterly_resource_variance + p').hide();
	    	$('#quarterly_resource_variance').closest('.form-group').removeClass( "has-error" );
	  	}
    }
	return $obj_valid;
}

$("#btn_quarterly_save_resource").off().on('click', function() {

	if (resource_valid() == false){
	    PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
		$('html, body').animate({ scrollTop: $('#quarterly_project_resource').offset().top-120 }, 'slow');
	}else{
		var dt = $('#quarterly_resource_implementor_id,#quarterly_resource_actual_expenditure,#quarterly_resource_planned_expenditure,#quarterly_resource_percentage_spent,#quarterly_resource_variance,#quarterly_resource_variance_comment').serialize();
		$("#quarterly_objective_spinner").fadeOut("fast");
		$.ajax({
	    	url: baseDir+'be/quarterly/save_project_resource',
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#quarterly_resource_spinner").fadeOut("fast");
		        if(res.status == 'ERR'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				}else if (res.status == 'EXP'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Session Expired',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-check'
					});
					
					window.location = baseDir+'be';
				}else if (res.status == 'SUCCESS'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Success',
						text: res.message,
						type: 'custom',
						addclass: 'notification-success',
						icon: 'fa fa-check'
					});
					
					$('#quarterly_resource_implementor_id').val('').change();
					$('#quarterly_resource_actual_expenditure').val('');
					$('#quarterly_resource_planned_expenditure').val('');
					$('#quarterly_resource_percentage_spent').val('');
					$('#quarterly_resource_variance').val('');
					$('#quarterly_resource_variance_comment').val('');

					load_quarterly_resources();
					
					$('html, body').animate({ scrollTop: $('#quarterly_project_resource').offset().top-120 }, 'slow');
				}
	       	},
			error: function(){
					$("#quarterly_resource_spinner").fadeOut("fast");
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: 'Ooops! Something went wrong. Please check your network and try again.',
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				$ret = false;
			}
	   	});
	}
});

function load_quarterly_resources(){
	$.ajax({
	   	url: baseDir+'be/quarterly/load_js_quarterly_resources',
	    type: 'POST',
	    data: '',
	    success: function (res) {
	   		$( "#div_quarterly_saved_resources" ).html(res);
	   	},
		error: function(){
		
		}
	});

}

function quarterly_submit_resources(){
	$("#quarterly_spinner").fadeIn("fast");
	//VALIDATE OBJECTIVES EXIST
	$.ajax({
	    url: baseDir+'be/quarterly/validate_resources',
	    type: 'POST',
	    data: '',
		dataType: 'json',
	    success: function (res) {
			$("#quarterly_spinner").fadeOut("fast");
		    if(res.status == 'ERR'){
	        	PNotify.removeAll();		    	
				new PNotify({
					title: 'Validation Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-error',
					icon: 'fa fa-times'
				});

				return false;
			}else if (res.status == 'EXP'){
	        	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-error',
					icon: 'fa fa-check'
				});
					
				return false;
				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
	        	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: 'Project Resources saved successfully',
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				return true;
			}
	    },
		error: function(){
			$("#quarterly_spinner").fadeOut("fast");
        	PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
			return false;
		}
	});
}

//QUARTERLY PLANNED DELIVERABLES
var deliverables_valid = function validate_quarterly_deliverables(){
	$obj_valid = true;

	$('.quarterly_deliverable_deliverable').each(function() {
		CKEDITOR.instances[$(this).attr('id')].updateElement();
	});

	$('.quarterly_deliverable_project_objective_id').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
	});

	$('.quarterly_deliverable_intermediate_result_id').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
	});

	$('.quarterly_deliverable_country_id').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
	});

	$('.quarterly_deliverable_thematic_area_id').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
	});

	$('.quarterly_deliverable_milestone_id').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
	});

	$('.quarterly_deliverable_deliverable').each(function() {
    	if ($(this).val() == '' || $(this).val() == null){
    		$(this).closest('.form-group').addClass( "has-error" );
    		$obj_valid = false;
    	}else{
    		$(this).closest('.form-group').removeClass( "has-error" );
    	}
    	//CKEDITOR.instances[$(this).attr('id')].setData('');
	});

	return $obj_valid;
}

$("#btn_quarterly_save_deliverables").off().on('click', function() {

	if (deliverables_valid() == false){
       	PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
		$('html, body').animate({ scrollTop: $('#quarterly_deliverable_project_objective_id').offset().top-150 }, 'slow');
	}else{
		var dt = $('.quarterly_deliverable_project_objective_id, .quarterly_deliverable_intermediate_result_id, .quarterly_deliverable_country_id, .quarterly_deliverable_thematic_area_id, .quarterly_deliverable_milestone_id, .quarterly_deliverable_deliverable').serialize();
		$("#quarterly_deliverable_objective_spinner").fadeOut("fast");
		//alert(dt);
		$.ajax({
	    	url: baseDir+'be/quarterly/save_planned_deliverables',
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#quarterly_deliverable_objective_spinner").fadeOut("fast");
		        if(res.status == 'ERR'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				}else if (res.status == 'EXP'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Session Expired',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-check'
					});
					
					window.location = baseDir+'be';
				}else if (res.status == 'SUCCESS'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Success',
						text: res.message,
						type: 'custom',
						addclass: 'notification-success',
						icon: 'fa fa-check'
					});
					
					$('.quarterly_deliverable_project_objective_id').each(function() {
				    	$(this).val('').change();
					});
					$('.quarterly_deliverable_intermediate_result_id').each(function() {
				    	$(this).val('').change();
					});
					$('.quarterly_deliverable_country_id').each(function() {
				    	$(this).val('').change();
					});
					$('.quarterly_deliverable_thematic_area_id').each(function() {
				    	$(this).val('').change();
					});
					$('.quarterly_deliverable_milestone_id').each(function() {
				    	$(this).val('').change();
					});

					$('.quarterly_deliverable_deliverable').each(function() {
				    	CKEDITOR.instances[$(this).attr('id')].setData('');
					});

					load_quarterly_deliverables();
					
					$('html, body').animate({ scrollTop: $('#quarterly_deliverable_project_objective_id').offset().top-220 }, 'slow');
				}
	       	},
			error: function(){
					$("#quarterly_deliverable_objective_spinner").fadeOut("fast");
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: 'Ooops! Something went wrong. Please check your network and try again.',
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				$ret = false;
			}
	   	});
	}
});

/*var deliverables_valid = function validate_quarterly_deliverables(){
	$obj_valid = true;

	CKEDITOR.instances['quarterly_deliverables'].updateElement();

	$('#quarterly_deliverables_implementor_id + p').hide();
	//$('#quarterly_deliverables_cause + p').hide();
	$('#quarterly_deliverables + p').hide();

    if ($('#quarterly_deliverables').val() == '' || $('#quarterly_deliverables').val() == null){
    	$('#quarterly_deliverables').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_deliverables').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_deliverables + p').hide();
    	$('#quarterly_deliverables').closest('.form-group').removeClass( "has-error" );
    }


	//PARTNER
    if ($('#quarterly_deliverables_implementor_id').val() == '' || $('#quarterly_deliverables_implementor_id').val() == null){
    	$('#quarterly_deliverables_implementor_id').after('<p class="has-error">* Please select Partner</p>')
    	$('#quarterly_deliverables_implementor_id').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_deliverables_implementor_id + p').hide();
    	$('#quarterly_deliverables_implementor_id').closest('.form-group').removeClass( "has-error" );
    }
    //CAUSE

    //DELIVERABLES
   	if ($('#quarterly_deliverables').val() == '' || $('#quarterly_deliverables').val() == null){
    	//$('#quarterly_deliverables').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_deliverables').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	//$('#quarterly_deliverables + p').hide();
    	$('#quarterly_deliverables').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_quarterly_save_deliverables").off().on('click', function() {

	if (deliverables_valid() == false){
	    PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
		$('html, body').animate({ scrollTop: $('#quarterly_planned_deliverables').offset().top-120 }, 'slow');
	}else{
		var dt = $('#quarterly_deliverables_implementor_id,#quarterly_deliverables_cause,#quarterly_deliverables').serialize();
		$("#quarterly_deliverables_spinner").fadeOut("fast");
		$.ajax({
	    	url: baseDir+'be/quarterly/save_planned_deliverables',
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#quarterly_deliverables_spinner").fadeOut("fast");
		        if(res.status == 'ERR'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				}else if (res.status == 'EXP'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Session Expired',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-check'
					});
					
					window.location = baseDir+'be';
				}else if (res.status == 'SUCCESS'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Success',
						text: res.message,
						type: 'custom',
						addclass: 'notification-success',
						icon: 'fa fa-check'
					});
					
					$('#quarterly_deliverables_implementor_id').val('').change();
					$('#quarterly_deliverables_cause').val('');
    				CKEDITOR.instances['quarterly_deliverables'].setData('');

					load_quarterly_deliverables();
					
					$('html, body').animate({ scrollTop: $('#quarterly_planned_deliverables').offset().top-120 }, 'slow');
				}
	       	},
			error: function(){
					$("#quarterly_deliverables_spinner").fadeOut("fast");
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: 'Ooops! Something went wrong. Please check your network and try again.',
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				$ret = false;
			}
	   	});
	}
});*/

function load_quarterly_deliverables(){
	$.ajax({
	   	url: baseDir+'be/quarterly/load_js_quarterly_deliverables',
	    type: 'POST',
	    data: '',
	    success: function (res) {
	   		$( "#div_quarterly_saved_deliverables" ).html(res);
	   	},
		error: function(){
		
		}
	});

}
function quarterly_submit_deliverables(){
	$("#quarterly_spinner").fadeIn("fast");
	$del_valid = false;
	//var promise = validate_quarterly_deliverables();
	$.ajax({
	    url: baseDir+'be/quarterly/validate_deliverables',
	    type: 'POST',
	    async: false,
	    data: '',
		dataType: 'json'
	})
	.done(function(res) {
		$("#quarterly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$del_valid = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$del_valid = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: 'Project deliverables saved successfully',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			$del_valid = true;
		}
  	})
  	.fail(function(xhr) {
		$("#quarterly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$del_valid = false;
  	});

  	return $del_valid;
}


//MANAGEMENT ISSUES
var management_issues_valid = function validate_quarterly_management_issues(){
	$obj_valid = true;

	$('#quarterly_management_issues + p').hide();
	$('#quarterly_management_action + p').hide();
	$('#quarterly_management_recommendation + p').hide();

	//MANAGEMENT ISSUES
    if ($('#quarterly_management_issues').val() == '' || $('#quarterly_management_issues').val() == null){
    	$('#quarterly_management_issues').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_management_issues').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_management_issues + p').hide();
    	$('#quarterly_management_issues').closest('.form-group').removeClass( "has-error" );
    }

	//MANAGEMENT ACTION
    if ($('#quarterly_management_action').val() == '' || $('#quarterly_management_action').val() == null){
    	$('#quarterly_management_action').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_management_action').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_management_action + p').hide();
    	$('#quarterly_management_action').closest('.form-group').removeClass( "has-error" );
    }
    //MANAGEMENT RECOMMENDATION
    if ($('#quarterly_management_recommendation').val() == '' || $('#quarterly_management_recommendation').val() == null){
    	$('#quarterly_management_recommendation').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_management_recommendation').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
	    $('#quarterly_management_recommendation + p').hide();
	    $('#quarterly_management_recommendation').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_quarterly_save_management_issues").off().on('click', function() {

	if (management_issues_valid() == false){
	    PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
		$('html, body').animate({ scrollTop: $('#quarterly_management_issuess').offset().top-120 }, 'slow');
	}else{
		var dt = $('#quarterly_management_issues,#quarterly_management_action,#quarterly_management_recommendation').serialize();
		$("#quarterly_management_issues_spinner").fadeOut("fast");
		$.ajax({
	    	url: baseDir+'be/quarterly/save_management_issues',
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#quarterly_management_issues_spinner").fadeOut("fast");
		        if(res.status == 'ERR'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				}else if (res.status == 'EXP'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Session Expired',
						text: res.message,
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-check'
					});
					
					window.location = baseDir+'be';
				}else if (res.status == 'SUCCESS'){
	        		PNotify.removeAll();
					new PNotify({
						title: 'Success',
						text: res.message,
						type: 'custom',
						addclass: 'notification-success',
						icon: 'fa fa-check'
					});
					
					$('#quarterly_management_issues').val('');
					$('#quarterly_management_action').val('');
					$('#quarterly_management_recommendation').val('');
    		
					load_quarterly_management_issues();
					
					$('html, body').animate({ scrollTop: $('#quarterly_management_issuess').offset().top-120 }, 'slow');
				}
	       	},
			error: function(){
					$("#quarterly_management_issues_spinner").fadeOut("fast");
	        		PNotify.removeAll();
					new PNotify({
						title: 'Error',
						text: 'Ooops! Something went wrong. Please check your network and try again.',
						type: 'custom',
						addclass: 'notification-error',
						icon: 'fa fa-times'
					});
				$ret = false;
			}
	   	});
	}
});

function load_quarterly_management_issues(){
	$.ajax({
	   	url: baseDir+'be/quarterly/load_js_quarterly_management_issues',
	    type: 'POST',
	    data: '',
	    success: function (res) {
	   		$( "#div_quarterly_saved_management_issues" ).html(res);
	   	},
		error: function(){
		
		}
	});

}
function quarterly_submit_management_issues(){
	$("#quarterly_spinner").fadeIn("fast");
	$del_valid = false;
	$.ajax({
	    url: baseDir+'be/quarterly/validate_management_issues',
	    type: 'POST',
	    async: false,
	    data: '',
		dataType: 'json'
	})
	.done(function(res) {
		$("#quarterly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$del_valid = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$del_valid = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: 'Project Management Issues saved successfully',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			$del_valid = true;
		}
  	})
  	.fail(function(xhr) {
		$("#quarterly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$del_valid = false;
  	});

  	return $del_valid;
}

//QUARTERLY STRATEGIC OUTLOOK
function quarterly_submit_outlook(){
	$("#quarterly_spinner").fadeIn("fast");
	$strat_valid = false;
	$.ajax({
    	url: baseDir+'be/quarterly/save_strategic_outlook',
        type: 'POST',
        async: false,
        data: {
          	'quarterly_strategic_outlook': $("#quarterly_strategic_outlook").val()
      	},
		dataType: 'json'
	})
	.done(function(res) {
		$("#quarterly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$strat_valid = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$strat_valid = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: res.message,
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			$strat_valid = true;
		}
  	})
  	.fail(function(xhr) {
		$("#quarterly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$strat_valid = false;
  	});

  	return $strat_valid;
}

//QUARTERLY KEY LESSONS
function quarterly_submit_lessons(){
	$("#quarterly_spinner").fadeIn("fast");
	$strat_valid = false;
	$.ajax({
    	url: baseDir+'be/quarterly/save_key_lessons',
        type: 'POST',
        async: false,
        data: {
          	'quarterly_key_lessons': $("#quarterly_key_lessons").val()
      	},
		dataType: 'json'
	})
	.done(function(res) {
		$("#quarterly_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$strat_valid = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$strat_valid = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: res.message,
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			load_quarterly_report_view();
			$strat_valid = true;
		}
  	})
  	.fail(function(xhr) {
		$("#quarterly_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$strat_valid = false;
  	});

  	return $strat_valid;
}

function load_quarterly_report_view(){
	$.ajax({
	   	url: baseDir+'be/quarterly/load_js_quarterly_report',
	    type: 'POST',
	    data: '',
	    success: function (res) {
	   		$( "#quarterly_report_preview" ).html(res);
	   	},
		error: function(){
		
		}
	});

}

function quarterly_submit(){
	if (confirm('Do you wish to submit this Quarterly Report?')) { 
		$("#quarterly_spinner").fadeIn("fast");

		$.ajax({
	    	url: baseDir+'be/quarterly/submit',
	        type: 'POST',
	        data: '',
			dataType: 'json'
		})
		.done(function(res) {
			$("#quarterly_spinner").fadeOut("fast");
			if(res.status == 'ERR'){
		       	PNotify.removeAll();		    	
				new PNotify({
					title: 'Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
			}else if (res.status == 'EXP'){
		       	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-check'
				});

				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
		       	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				setTimeout(function() {
	  				window.location = baseDir+'be/quarterly';
				}, 3000);
			}
	  	})
	  	.fail(function(xhr) {
			$("#quarterly_spinner").fadeOut("fast");
	        PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
			$strat_valid = false;
	  	});
	}
}






/****************
====== BIWEEKLY SUMMARY REPORT ========
*****************/

//GENERATE BIWEEKKLY SUMMARY REPORT
var biweekly_consolidated_report_valid = function validate_biweekly_consolidated_report(){
	$obj_valid = true;

	//PERIOD FROM
    if ($('#biweekly_consolidated_period_from').val() == '' || $('#biweekly_consolidated_period_from').val() == null){
    	$('#biweekly_consolidated_period_from').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_consolidated_period_from').closest('.form-group').removeClass( "has-error" );
    }

    //PERIOD TO
    if ($('#biweekly_consolidated_period_to').val() == '' || $('#biweekly_consolidated_period_to').val() == null){
    	$('#biweekly_consolidated_period_to').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_consolidated_period_to').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#generate_biweekly_consolidated_report").off().on('click', function() {

	if (biweekly_consolidated_report_valid() == false){
	    PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
	}else{

		$('#div_load_biweekly_consolidated_report').oLoader({
			backgroundColor:'#fff',
			image: baseDir+'assets/be/vendor/oLoader/images/ownageLoader/loader9.gif',
			fadeInTime: 500,
			fadeOutTime: 1000,
			fadeLevel: 0.8
		});				
		$("#biweekly_consolidated_spinner").fadeIn("fast");


		//var summary_type = $('input[name="biweekly_consolidated_type"]:checked').val();
		var dt = $('#biweekly_consolidated_period_from,#biweekly_consolidated_period_to').serialize();
		// + '&biweekly_consolidated_type=' + summary_type
		$.ajax({
	    	url: baseDir+'be/biweekly/generate_consolidated_report',
	        type: 'POST',
	        data: dt,
	        success: function (res) {
				$("#biweekly_consolidated_spinner").fadeOut("fast");
				$("#div_load_biweekly_consolidated_report").html(res);
				$('#div_load_biweekly_consolidated_report').oLoader('hide');
	       	},
			error: function(){
				$("#biweekly_consolidated_spinner").fadeOut("fast");
	        	PNotify.removeAll();
				new PNotify({
					title: 'Error',
					text: 'Ooops! Something went wrong. Please check your network and try again.',
					type: 'custom',
					addclass: 'notification-error',
					icon: 'fa fa-times'
				});
				$('#div_load_biweekly_consolidated_report').oLoader('hide');

			}
	   	});
	}
});

$("#clear_biweekly_consolidated_report").off().on('click', function() {
	$("#div_load_biweekly_consolidated_report").html('');
});



//EDIT RESOURCES
$(".quarterly_edit_resource").click(function() {
	$('#div_quarterly_resource_error').fadeOut("fast");
	$('#div_quarterly_resource_success').fadeOut("fast");

    var el = $(this);
    var resource_id = $(this).data("id");

	$.ajax({
     	url: baseDir+'be/quarterly/get_quarterly_resource2/'+resource_id,
       	type: 'POST',
       	data: '',
     	success: function (res) {
     		try{
     			var obj1 = res;
     			obj1 = obj1.replace('[','');
     			obj1 = obj1.replace(']','');
	     		var obj = $.parseJSON(obj1);
	     		$("#quarterly_resource_id2").val(obj['quarterly_resource_id']);	     		
	     		$("#quarterly_resource_implementor_id2").val(obj['implementor_id']).change();
	     		$("#quarterly_resource_actual_expenditure2").val(obj['quarterly_actual_expenditure']);
	     		$("#quarterly_resource_planned_expenditure2").val(obj['quarterly_planned_expenditure']);
	     		$("#quarterly_resource_percentage_spent2").val(obj['quarterly_percentage_spent']);
	     		$("#quarterly_resource_variance2").val(obj['quarterly_variance']);
	     		$("#quarterly_resource_variance_comment2").val(obj['quarterly_variance_comment']);
     		}catch(err){
     			alert(err);
     		}
   		},
		error: function(){
		}
    });
});

//QUARTERLY RESOURCES
var resource_valid2 = function validate_quarterly_resource(){
	$obj_valid = true;

	$('#quarterly_resource_implementor_id2 + p').hide();
	$('#quarterly_resource_actual_expenditure2 + p').hide();
	$('#quarterly_resource_planned_expenditure2 + p').hide();
	$('#quarterly_resource_percentage_spent2 + p').hide();
	$('#quarterly_resource_variance2 + p').hide();

	//PARTNER
    if ($('#quarterly_resource_implementor_id2').val() == '' || $('#quarterly_resource_implementor_id2').val() == null){
    	$('#quarterly_resource_implementor_id2').after('<p class="has-error">* Please select Partner</p>')
    	$('#quarterly_resource_implementor_id2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_resource_implementor_id2 + p').hide();
    	$('#quarterly_resource_implementor_id2').closest('.form-group').removeClass( "has-error" );
    }
    //ACTUAL EXPENDITURE
    if ($('#quarterly_resource_actual_expenditure2').val() == '' || $('#quarterly_resource_actual_expenditure2').val() == null){
    	$('#quarterly_resource_actual_expenditure2').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_resource_actual_expenditure2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	if (validateNumeric($('#quarterly_resource_actual_expenditure2').val())){
	    	$('#quarterly_resource_actual_expenditure2').after('<p class="has-error">* Only numeric values are allowed</p>')
	    	$('#quarterly_resource_actual_expenditure2').closest('.form-group').addClass( "has-error" );
	    	$obj_valid = false;
    	}else{
	    	$('#quarterly_resource_actual_expenditure2 + p').hide();
	    	$('#quarterly_resource_actual_expenditure2').closest('.form-group').removeClass( "has-error" );
	  	}
    }
    //PLANNED EXPENDITURE
    if ($('#quarterly_resource_planned_expenditure2').val() == '' || $('#quarterly_resource_planned_expenditure2').val() == null){
    	$('#quarterly_resource_planned_expenditure2').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_resource_planned_expenditure2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	if (validateNumeric($('#quarterly_resource_planned_expenditure2').val())){
	    	$('#quarterly_resource_planned_expenditure2').after('<p class="has-error">* Only numeric values are allowed</p>')
	    	$('#quarterly_resource_planned_expenditure2').closest('.form-group').addClass( "has-error" );
	    	$obj_valid = false;
    	}else{
	    	$('#quarterly_resource_planned_expenditure2 + p').hide();
	    	$('#quarterly_resource_planned_expenditure2').closest('.form-group').removeClass( "has-error" );
	  	}
    }
    //PERCENTAGE SPENT
    if ($('#quarterly_resource_percentage_spent2').val() == '' || $('#quarterly_resource_percentage_spent2').val() == null){
    	$('#quarterly_resource_percentage_spent2').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_resource_percentage_spent2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	if (validateNumeric($('#quarterly_resource_percentage_spent2').val())){
	    	$('#quarterly_resource_percentage_spent2').after('<p class="has-error">* Only numeric values are allowed</p>')
	    	$('#quarterly_resource_percentage_spent2').closest('.form-group').addClass( "has-error" );
	    	$obj_valid = false;
    	}else{
	    	$('#quarterly_resource_percentage_spent2 + p').hide();
	    	$('#quarterly_resource_percentage_spent2').closest('.form-group').removeClass( "has-error" );
	  	}
    }
    //VARIANCE
    if ($('#quarterly_resource_variance2').val() == '' || $('#quarterly_resource_variance').val() == null){
    	$('#quarterly_resource_variance2').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_resource_variance2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	if (validateNumeric($('#quarterly_resource_variance2').val())){
	    	$('#quarterly_resource_variance2').after('<p class="has-error">* Only numeric values are allowed</p>')
	    	$('#quarterly_resource_variance2').closest('.form-group').addClass( "has-error" );
	    	$obj_valid = false;
    	}else{
	    	$('#quarterly_resource_variance2 + p').hide();
	    	$('#quarterly_resource_variance2').closest('.form-group').removeClass( "has-error" );
	  	}
    }
	return $obj_valid;
}

$("#btn_quarterly_save_resource2").off().on('click', function() {

	if (resource_valid2() == false){
	}else{
		var dt = $('#quarterly_resource_implementor_id2,#quarterly_resource_actual_expenditure2,#quarterly_resource_planned_expenditure2,#quarterly_resource_percentage_spent2,#quarterly_resource_variance2,#quarterly_resource_variance_comment2').serialize();
		$("#quarterly_resource_spinner2").fadeIn("fast");
		$.ajax({
	    	url: baseDir+'be/quarterly/update_project_resource/' + $('#quarterly_resource_id2').val(),
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#quarterly_resource_spinner2").fadeOut("fast");
		        if(res.status == 'ERR'){
					$('#div_quarterly_resource_error').html(res.message);
					$('#div_quarterly_resource_error').fadeIn("fast");
				}else if (res.status == 'EXP'){
					$('#div_quarterly_resource_error').html(res.message);
					$('#div_quarterly_resource_error').fadeIn("fast");

					setTimeout(function() {
	  					window.location = baseDir+'be';
					}, 3000);
				}else if (res.status == 'SUCCESS'){
					$('#div_quarterly_resource_error').fadeOut("fast");
					
					load_quarterly_resources();

					//setTimeout(function() {
						$.magnificPopup.close();
					//}, 3000);
				}
	       	},
			error: function(){
				$("#quarterly_resource_spinner2").fadeOut("fast");
				$('#div_quarterly_resource_error').html('Ooops! Something went wrong. Please check your network and try again.');
				$('#div_quarterly_resource_error').fadeIn("fast");
			}
	   	});
	}
});

//DELETE RESOURCES
$(".quarterly_delete_resource").click(function() {

    var el = $(this);
    var resource_id = $(this).data("id");

	var result = confirm("Do you really wish to delete this record?");
	if (result) {
    	$.ajax({
	    	url: baseDir+'be/quarterly/delete_quarterly_resource/'+resource_id,
	        type: 'POST',
	        data: '',
			dataType: 'json'
		})
		.done(function(res) {
			if(res.status == 'ERR'){
		       	PNotify.removeAll();		    	
				new PNotify({
					title: 'Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
			}else if (res.status == 'EXP'){
		       	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-check'
				});

				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
		       	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				load_quarterly_resources();

			}
	  	})
	  	.fail(function(xhr) {
	        PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
	  	});
	}


});



//EDIT QUARTERLY DELIVERABLES
$(".quarterly_edit_deliverables").click(function() {
	$('#div_quarterly_deliverables_error').fadeOut("fast");
	$('#div_quarterly_deliverables_success').fadeOut("fast");

    var el = $(this);
    var deliverables_id = $(this).data("id");

	$.ajax({
     	url: baseDir+'be/quarterly/get_quarterly_deliverables2/'+deliverables_id,
       	type: 'POST',
       	async: false,
       	data: '',
     	success: function (res) {
     		try{
     			var obj1 = res;
     			obj1 = obj1.replace('[','');
     			obj1 = obj1.replace(']','');
	     		var obj = $.parseJSON(obj1);
	     		$("#quarterly_deliverables_id2").val(obj['quarterly_deliverables_id']);	     		
	     		$("#quarterly_deliverables_implementor_id2").val(obj['implementor_id']).change();
	     		$("#quarterly_deliverables_cause2").val(obj['quarterly_deliverables_cause']);
	     		$("#quarterly_deliverables2").val(obj['quarterly_deliverables']);
	     		if (CKEDITOR.instances.quarterly_deliverables2){
	     			CKEDITOR.instances.quarterly_deliverables2.destroy();
	     		}
	     		CKEDITOR.replace('quarterly_deliverables2');
	     		CKEDITOR.instances.quarterly_deliverables2.setData(obj['quarterly_deliverables']);
     		}catch(err){
     			alert(err);
     		}
   		},
		error: function(){
		}
    });
});

var deliverables_valid2 = function validate_quarterly_deliverables2(){
	$obj_valid = true;

	CKEDITOR.instances['quarterly_deliverables2'].updateElement();

	$('#quarterly_deliverables_implementor_id2 + p').hide();
	$('#quarterly_deliverables_cause2 + p').hide();
	$('#quarterly_deliverables2 + p').hide();

    if ($('#quarterly_deliverables2').val() == '' || $('#quarterly_deliverables2').val() == null){
    	$('#quarterly_deliverables2').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_deliverables2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_deliverables2 + p').hide();
    	$('#quarterly_deliverables2').closest('.form-group').removeClass( "has-error" );
    }


	//PARTNER
    if ($('#quarterly_deliverables_implementor_id2').val() == '' || $('#quarterly_deliverables_implementor_id2').val() == null){
    	$('#quarterly_deliverables_implementor_id2').after('<p class="has-error">* Please select Partner</p>')
    	$('#quarterly_deliverables_implementor_id2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_deliverables_implementor_id2 + p').hide();
    	$('#quarterly_deliverables_implementor_id2').closest('.form-group').removeClass( "has-error" );
    }
    //DELIVERABLES
   	if ($('#quarterly_deliverables2').val() == '' || $('#quarterly_deliverables2').val() == null){
    	$('#quarterly_deliverables2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_deliverables2').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_quarterly_save_deliverables2").off().on('click', function() {

	if (deliverables_valid2() == false){
	}else{
		var dt = $('#quarterly_deliverables_implementor_id2,#quarterly_deliverables_cause2,#quarterly_deliverables2').serialize();
		$("#quarterly_deliverables_spinner2").fadeOut("fast");
		$.ajax({
	    	url: baseDir+'be/quarterly/update_planned_deliverables/' + $('#quarterly_deliverables_id2').val(),
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#quarterly_deliverables_spinner2").fadeOut("fast");
		        if(res.status == 'ERR'){
					$('#div_quarterly_deliverables_error').html(res.message);
					$('#div_quarterly_deliverables_error').fadeIn("fast");
				}else if (res.status == 'EXP'){
					$('#div_quarterly_deliverables_error').html(res.message);
					$('#div_quarterly_deliverables_error').fadeIn("fast");
					
					setTimeout(function() {
	  					window.location = baseDir+'be';
					}, 3000);
				}else if (res.status == 'SUCCESS'){
					$('#div_quarterly_deliverables_error').fadeOut("fast");
					
					load_quarterly_deliverables();

					$.magnificPopup.close();
				}
	       	},
			error: function(){
				$('#div_quarterly_deliverables_error').html('Ooops! Something went wrong. Please check your network and try again.');
				$('#div_quarterly_deliverables_error').fadeIn("fast");

			}
	   	});
	}
});

//DELETE DELIVERABLES
$(".quarterly_delete_deliverables").click(function() {
    var el = $(this);
    var deliverables_id = $(this).data("id");

	var result = confirm("Do you really wish to delete this record?");
	if (result) {
    	$.ajax({
	    	url: baseDir+'be/quarterly/delete_quarterly_deliverables/'+deliverables_id,
	        type: 'POST',
	        data: '',
			dataType: 'json'
		})
		.done(function(res) {
			if(res.status == 'ERR'){
		       	PNotify.removeAll();		    	
				new PNotify({
					title: 'Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
			}else if (res.status == 'EXP'){
		       	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-check'
				});

				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
		       	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				load_quarterly_deliverables();

			}
	  	})
	  	.fail(function(xhr) {
	        PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
	  	});
	}


});



//EDIT MANAGEMENT ISSUES
$(".quarterly_edit_management_issues").click(function() {
	$('#div_quarterly_management_issues_error').fadeOut("fast");
	$('#div_quarterly_management_issues_success').fadeOut("fast");

    var el = $(this);
    var management_issues_id = $(this).data("id");

	$.ajax({
     	url: baseDir+'be/quarterly/get_quarterly_management_issues2/'+management_issues_id,
       	type: 'POST',
       	async: false,
       	data: '',
     	success: function (res) {
     		try{
     			var obj1 = res;
     			obj1 = obj1.replace('[','');
     			obj1 = obj1.replace(']','');
	     		var obj = $.parseJSON(obj1);
	     		$("#quarterly_management_issues_id2").val(obj['quarterly_management_issues_id']);	     		
	     		$("#quarterly_management_issues2").val(obj['quarterly_management_issues']).change();
	     		$("#quarterly_management_action2").val(obj['quarterly_management_action']);
	     		$("#quarterly_management_recommendation2").val(obj['quarterly_management_recommendation']);
     		}catch(err){
     			alert(err);
     		}
   		},
		error: function(){
		}
    });
});

var management_issues_valid2 = function validate_quarterly_management_issues2(){
	$obj_valid = true;

	$('#quarterly_management_issues2 + p').hide();
	$('#quarterly_management_action2 + p').hide();
	$('#quarterly_management_recommendation2 + p').hide();

	//MANAGEMENT ISSUES
    if ($('#quarterly_management_issues2').val() == '' || $('#quarterly_management_issues2').val() == null){
    	$('#quarterly_management_issues2').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_management_issues2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_management_issues2 + p').hide();
    	$('#quarterly_management_issues2').closest('.form-group').removeClass( "has-error" );
    }

	//MANAGEMENT ACTION
    if ($('#quarterly_management_action2').val() == '' || $('#quarterly_management_action2').val() == null){
    	$('#quarterly_management_action2').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_management_action2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#quarterly_management_action2 + p').hide();
    	$('#quarterly_management_action2').closest('.form-group').removeClass( "has-error" );
    }
    //MANAGEMENT RECOMMENDATION
    if ($('#quarterly_management_recommendation2').val() == '' || $('#quarterly_management_recommendation2').val() == null){
    	$('#quarterly_management_recommendation2').after('<p class="has-error">* This field is required</p>')
    	$('#quarterly_management_recommendation2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
	    $('#quarterly_management_recommendation2 + p').hide();
	    $('#quarterly_management_recommendation2').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_quarterly_save_management_issues2").off().on('click', function() {

	if (management_issues_valid2() == false){
	}else{
		var dt = $('#quarterly_management_issues2,#quarterly_management_action2,#quarterly_management_recommendation2').serialize();
		$("#quarterly_management_issues_spinner2").fadeIn("fast");
		$.ajax({
	    	url: baseDir+'be/quarterly/update_management_issues/' + $('#quarterly_management_issues_id2').val(),
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#quarterly_management_issues_spinner2").fadeOut("fast");
		        if(res.status == 'ERR'){
					$('#div_quarterly_management_issues_error').html(res.message);
					$('#div_quarterly_management_issues_error').fadeIn("fast");
				}else if (res.status == 'EXP'){
					$('#div_quarterly_management_issues_error').html(res.message);
					$('#div_quarterly_management_issues_error').fadeIn("fast");
					
					setTimeout(function() {
	  					window.location = baseDir+'be';
					}, 3000);
				}else if (res.status == 'SUCCESS'){
					$('#div_quarterly_management_issues_error').fadeOut("fast");
					
					load_quarterly_management_issues();

					$.magnificPopup.close();
    				
				}
	       	},
			error: function(){
				$('#div_quarterly_management_issues_error').html('Ooops! Something went wrong. Please check your network and try again.');
				$('#div_quarterly_management_issues_error').fadeIn("fast");

			}
	   	});
	}
});

//DELETE MANAGEMENT ISSUES
$(".quarterly_delete_management_issues").click(function() {

    var el = $(this);
    var management_issues_id = $(this).data("id");

	var result = confirm("Do you really wish to delete this record?");
	if (result) {
    	$.ajax({
	    	url: baseDir+'be/quarterly/delete_quarterly_management_issues/'+management_issues_id,
	        type: 'POST',
	        data: '',
			dataType: 'json'
		})
		.done(function(res) {
			if(res.status == 'ERR'){
		       	PNotify.removeAll();		    	
				new PNotify({
					title: 'Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
			}else if (res.status == 'EXP'){
		       	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-check'
				});

				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
		       	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				load_quarterly_management_issues();

			}
	  	})
	  	.fail(function(xhr) {
	        PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
	  	});
	}


});



/****************
====== BI-ANNUAL REPORTS ========
*****************/

//BI-ANNUAL SUMMARY
function biannual_submit_summary(){
	$("#biannual_spinner").fadeIn("fast");
	$del_valid = false;
	$.ajax({
	    url: baseDir+'be/biannual/save_summary',
	    type: 'POST',
	    async: false,
        data: {
         	'biannual_report_title': $("#biannual_report_title").val(),
          	'biannual_period_from': $("#biannual_period_from").val(),
        	'biannual_period_to': $("#biannual_period_to").val(),
        	'biannual_accronyms': $("#biannual_accronyms").val(),        	
          	'biannual_executive_summary': $("#biannual_executive_summary").val()
      	},
		dataType: 'json'
	})
	.done(function(res) {
		$("#biannual_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$del_valid = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$del_valid = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: res.message,
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			$del_valid = true;
		}
  	})
  	.fail(function(xhr) {
		$("#biannual_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$del_valid = false;
  	});

  	return $del_valid;
}

function biannual_submit_progress(){
	$("#biannual_spinner").fadeIn("fast");
	$del_valid = false;
	$.ajax({
	    url: baseDir+'be/biannual/save_progress',
	    type: 'POST',
	    async: false,
        data: {
          	'biannual_project_progress': $("#biannual_project_progress").val()
      	},
		dataType: 'json'
	})
	.done(function(res) {
		$("#biannual_spinner").fadeOut("fast");
		if(res.status == 'ERR'){
	       	PNotify.removeAll();		    	
			new PNotify({
				title: 'Validation Error',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-times'
			});

			$del_valid = false;
		}else if (res.status == 'EXP'){
	       	PNotify.removeAll();				
			new PNotify({
				title: 'Session Expired',
				text: res.message,
				type: 'custom',
				addclass: 'notification-danger',
				icon: 'fa fa-check'
			});
					
			$del_valid = false;
			window.location = baseDir+'be';
		}else if (res.status == 'SUCCESS'){
	       	PNotify.removeAll();
				new PNotify({
				title: 'Success',
				text: res.message,
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});

			$del_valid = true;
		}
  	})
  	.fail(function(xhr) {
		$("#biannual_spinner").fadeOut("fast");
        PNotify.removeAll();
		new PNotify({
			title: 'Error',
			text: 'Ooops! Something went wrong. Please check your network and try again.',
			type: 'custom',
			addclass: 'notification-error',
			icon: 'fa fa-times'
		});
		$del_valid = false;
  	});

  	return $del_valid;
}

var biannual_milestone_deviations_valid = function validate_biannual_milestone_deviations(){
	$obj_valid = true;

	$('.biannual_milestone_deviations').each(function() {
		CKEDITOR.instances[$(this).attr('id')].updateElement();
	});

	if ($('#biannual_milestone_deviations_none').prop('checked')) {
		$obj_valid = true;
	}else{
		$('.biannual_milestone_deviations').each(function() {
	    	if ($(this).val() == '' || $(this).val() == null){
	    		$(this).closest('.form-group').addClass( "has-error" );
	    		$obj_valid = false;
	    	}else{
	    		$(this).closest('.form-group').removeClass( "has-error" );
	    	}
		});
	}

	return $obj_valid;
}
$('#biannual_milestone_deviations_none').change(function() {
    if (this.checked) {
		$('.biannual_milestone_deviations').each(function() {
			CKEDITOR.instances[$(this).attr('id')].setData('');
		});
		CKEDITOR.instances['biannual_milestone_deviations'].setReadOnly(true);
    }else{
    	CKEDITOR.instances['biannual_milestone_deviations'].setReadOnly(false);
    }
});
function biannual_submit_deviations(){

	$del_valid = false;

	if (biannual_milestone_deviations_valid() == false){
       	PNotify.removeAll();
		new PNotify({
			title: 'Validation Error',
			text: 'Please enter the required fields.',
			type: 'custom',
			addclass: 'notification-danger',
			icon: 'fa fa-times'
		});
		
	}else{

		if ($('#biannual_milestone_deviations_none').prop('checked')) {
			$dt = '<p>None</p>';
		}else{
			$dt = $("#biannual_milestone_deviations").val();
		}

		$("#biannual_spinner").fadeIn("fast");
		$del_valid = false;
		$.ajax({
		    url: baseDir+'be/biannual/save_deviations',
		    type: 'POST',
		    async: false,
	        data: {
	          	'biannual_milestone_deviations': $dt
	      	},
			dataType: 'json'
		})
		.done(function(res) {
			$("#biannual_spinner").fadeOut("fast");
			if(res.status == 'ERR'){
		       	PNotify.removeAll();		    	
				new PNotify({
					title: 'Validation Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});

				$del_valid = false;
			}else if (res.status == 'EXP'){
		       	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-check'
				});
						
				$del_valid = false;
				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
		       	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				$del_valid = true;
			}
	  	})
	  	.fail(function(xhr) {
			$("#biannual_spinner").fadeOut("fast");
	        PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
			$del_valid = false;
	  	});
	}
	return $del_valid;
}







/*
===== BIWEEKLY EDITS ====
*/
//EDIT TASKS
$(".biweekly_edit_tasks").click(function() {
	$('#div_biweekly_tasks_error').fadeOut("fast");
	$('#div_biweekly_tasks_success').fadeOut("fast");

    var el = $(this);
    var tasks_id = $(this).data("id");

	$.ajax({
     	url: baseDir+'be/biweekly/get_biweekly_task2/'+tasks_id,
       	type: 'POST',
       	async: false,
       	data: '',
     	success: function (res) {
     		try{
     			var obj1 = res;
     			obj1 = obj1.replace('[','');
     			obj1 = obj1.replace(']','');
	     		var obj = $.parseJSON(obj1);
	     		$("#biweekly_task_id2").val(obj['biweekly_task_id']);	     		
	     		$("#biweekly_tasks_milestone_id2").val(obj['milestone_id']).change();
	     		$("#biweekly_tasks2").val(obj['biweekly_task_description']);
	     		if (CKEDITOR.instances.biweekly_tasks2){
	     			CKEDITOR.instances.biweekly_tasks2.destroy();
	     		}
	     		CKEDITOR.replace('biweekly_tasks2');
	     		CKEDITOR.instances.biweekly_tasks2.setData(obj['biweekly_task_description']);
     		}catch(err){
     			alert(err);
     		}
   		},
		error: function(){
		}
    });
});

var biweekly_tasks_valid2 = function validate_biweekly_tasks2(){
	$obj_valid = true;

	CKEDITOR.instances['biweekly_tasks2'].updateElement();

	$('#biweekly_tasks_milestone_id2 + p').hide();
	$('#biweekly_tasks2 + p').hide();

	//MILESTONE ID
    if ($('#biweekly_tasks_milestone_id2').val() == '' || $('#biweekly_tasks_milestone_id2').val() == null){
    	$('#biweekly_tasks_milestone_id2').after('<p class="has-error">* Please select Partner</p>')
    	$('#biweekly_tasks_milestone_id2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_tasks_milestone_id2 + p').hide();
    	$('#biweekly_tasks_milestone_id2').closest('.form-group').removeClass( "has-error" );
    }

    //TASKS
   	if ($('#biweekly_tasks2').val() == '' || $('#biweekly_tasks2').val() == null){
    	$('#biweekly_tasks2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_tasks2').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_biweekly_save_tasks2").off().on('click', function() {
	//alert($("#biweekly_task_id2").val());
	if (biweekly_tasks_valid2() == false){
	}else{
		var dt = $('#biweekly_tasks_milestone_id2,#biweekly_tasks2').serialize();
		$("#biweekly_tasks_spinner2").fadeIn("fast");
		$.ajax({
	    	url: baseDir+'be/biweekly/update_task/' + $("#biweekly_task_id2").val(),
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#biweekly_tasks_spinner2").fadeOut("fast");
		        if(res.status == 'ERR'){
					$('#div_biweekly_tasks_error').html(res.message);
					$('#div_biweekly_tasks_error').fadeIn("fast");
				}else if (res.status == 'EXP'){
					$('#div_biweekly_tasks_error').html(res.message);
					$('#div_biweekly_tasks_error').fadeIn("fast");
					
					setTimeout(function() {
	  					window.location = baseDir+'be';
					}, 3000);
				}else if (res.status == 'SUCCESS'){
					$('#div_biweekly_tasks_error').fadeOut("fast");
					
					load_biweekly_tasks();

					$.magnificPopup.close();

				}
	       	},
			error: function(){
				$('#div_biweekly_tasks_error').html('Ooops! Something went wrong. Please check your network and try again.');
				$('#div_biweekly_tasks_error').fadeIn("fast");

			}
	   	});
	}
});
//DELETE TASKS
$(".biweekly_delete_task").click(function() {

    var el = $(this);
    var biweekly_task_id = $(this).data("id");

	var result = confirm("Do you really wish to delete this record?");
	if (result) {
    	$.ajax({
	    	url: baseDir+'be/biweekly/delete_biweekly_task/'+biweekly_task_id,
	        type: 'POST',
	        data: '',
			dataType: 'json'
		})
		.done(function(res) {
			if(res.status == 'ERR'){
		       	PNotify.removeAll();		    	
				new PNotify({
					title: 'Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
			}else if (res.status == 'EXP'){
		       	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-check'
				});

				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
		       	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				load_biweekly_tasks();

			}
	  	})
	  	.fail(function(xhr) {
	        PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
	  	});
	}


});



//EDIT CHALLENGES
/*$(".biweekly_edit_tasks").click(function() {
	$('#div_biweekly_tasks_error').fadeOut("fast");
	$('#div_biweekly_tasks_success').fadeOut("fast");

    var el = $(this);
    var tasks_id = $(this).data("id");

	$.ajax({
     	url: baseDir+'be/biweekly/get_biweekly_task2/'+tasks_id,
       	type: 'POST',
       	async: false,
       	data: '',
     	success: function (res) {
     		try{
     			var obj1 = res;
     			obj1 = obj1.replace('[','');
     			obj1 = obj1.replace(']','');
	     		var obj = $.parseJSON(obj1);
	     		$("#biweekly_task_id2").val(obj['biweekly_task_id']);	     		
	     		$("#biweekly_tasks_milestone_id2").val(obj['milestone_id']).change();
	     		$("#biweekly_tasks2").val(obj['biweekly_task_description']);
	     		if (CKEDITOR.instances.biweekly_tasks2){
	     			CKEDITOR.instances.biweekly_tasks2.destroy();
	     		}
	     		CKEDITOR.replace('biweekly_tasks2');
	     		CKEDITOR.instances.biweekly_tasks2.setData(obj['biweekly_task_description']);
     		}catch(err){
     			alert(err);
     		}
   		},
		error: function(){
		}
    });
});

var biweekly_tasks_valid2 = function validate_biweekly_tasks2(){
	$obj_valid = true;

	CKEDITOR.instances['biweekly_tasks2'].updateElement();

	$('#biweekly_tasks_milestone_id2 + p').hide();
	$('#biweekly_tasks2 + p').hide();

	//MILESTONE ID
    if ($('#biweekly_tasks_milestone_id2').val() == '' || $('#biweekly_tasks_milestone_id2').val() == null){
    	$('#biweekly_tasks_milestone_id2').after('<p class="has-error">* Please select Partner</p>')
    	$('#biweekly_tasks_milestone_id2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_tasks_milestone_id2 + p').hide();
    	$('#biweekly_tasks_milestone_id2').closest('.form-group').removeClass( "has-error" );
    }

    //TASKS
   	if ($('#biweekly_tasks2').val() == '' || $('#biweekly_tasks2').val() == null){
    	$('#biweekly_tasks2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_tasks2').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_biweekly_save_tasks2").off().on('click', function() {
	//alert($("#biweekly_task_id2").val());
	if (biweekly_tasks_valid2() == false){
	}else{
		var dt = $('#biweekly_tasks_milestone_id2,#biweekly_tasks2').serialize();
		$("#biweekly_tasks_spinner2").fadeIn("fast");
		$.ajax({
	    	url: baseDir+'be/biweekly/update_task/' + $("#biweekly_task_id2").val(),
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#biweekly_tasks_spinner2").fadeOut("fast");
		        if(res.status == 'ERR'){
					$('#div_biweekly_tasks_error').html(res.message);
					$('#div_biweekly_tasks_error').fadeIn("fast");
				}else if (res.status == 'EXP'){
					$('#div_biweekly_tasks_error').html(res.message);
					$('#div_biweekly_tasks_error').fadeIn("fast");
					
					setTimeout(function() {
	  					window.location = baseDir+'be';
					}, 3000);
				}else if (res.status == 'SUCCESS'){
					$('#div_biweekly_tasks_error').fadeOut("fast");
					
					load_biweekly_tasks();

					$.magnificPopup.close();

				}
	       	},
			error: function(){
				$('#div_biweekly_tasks_error').html('Ooops! Something went wrong. Please check your network and try again.');
				$('#div_biweekly_tasks_error').fadeIn("fast");

			}
	   	});
	}
});*/




//EDIT CHALLENGES
/*$(".biweekly_edit_challenges").click(function() {
	$('#div_biweekly_challenges_error').fadeOut("fast");
	$('#div_biweekly_challenges_success').fadeOut("fast");

    var el = $(this);
    var challenges_id = $(this).data("id");

	$.ajax({
     	url: baseDir+'be/biweekly/get_biweekly_challenge2/'+challenges_id,
       	type: 'POST',
       	async: false,
       	data: '',
     	success: function (res) {
     		try{
     			var obj1 = res;
     			obj1 = obj1.replace('[','');
     			obj1 = obj1.replace(']','');
	     		var obj = $.parseJSON(obj1);
	     		$("#biweekly_challenge_id2").val(obj['biweekly_challenge_id']);	     		
	     		$("#biweekly_challenges_milestone_id2").val(obj['milestone_id']).change();
	     		$("#biweekly_challenges2").val(obj['biweekly_challenge_description']);
	     		if (CKEDITOR.instances.biweekly_challenges2){
	     			CKEDITOR.instances.biweekly_challenges2.destroy();
	     		}
	     		CKEDITOR.replace('biweekly_challenges2');
	     		CKEDITOR.instances.biweekly_challenges2.setData(obj['biweekly_challenge_description']);
     		}catch(err){
     			alert(err);
     		}
   		},
		error: function(){
		}
    });
});

var biweekly_challenges_valid2 = function validate_biweekly_challenges2(){
	$obj_valid = true;

	CKEDITOR.instances['biweekly_challenges2'].updateElement();

	$('#biweekly_challenges_milestone_id2 + p').hide();
	$('#biweekly_challenges2 + p').hide();

	//MILESTONE ID
    if ($('#biweekly_challenges_milestone_id2').val() == '' || $('#biweekly_challenges_milestone_id2').val() == null){
    	$('#biweekly_challenges_milestone_id2').after('<p class="has-error">* Please select Partner</p>')
    	$('#biweekly_challenges_milestone_id2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_challenges_milestone_id2 + p').hide();
    	$('#biweekly_challenges_milestone_id2').closest('.form-group').removeClass( "has-error" );
    }

    //challengeS
   	if ($('#biweekly_challenges2').val() == '' || $('#biweekly_challenges2').val() == null){
    	$('#biweekly_challenges2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_challenges2').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_biweekly_save_challenges2").off().on('click', function() {
	//alert($("#biweekly_challenge_id2").val());
	if (biweekly_challenges_valid2() == false){
	}else{
		var dt = $('#biweekly_challenges_milestone_id2,#biweekly_challenges2').serialize();
		$("#biweekly_challenges_spinner2").fadeIn("fast");
		$.ajax({
	    	url: baseDir+'be/biweekly/update_challenge/' + $("#biweekly_challenge_id2").val(),
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#biweekly_challenges_spinner2").fadeOut("fast");
		        if(res.status == 'ERR'){
					$('#div_biweekly_challenges_error').html(res.message);
					$('#div_biweekly_challenges_error').fadeIn("fast");
				}else if (res.status == 'EXP'){
					$('#div_biweekly_challenges_error').html(res.message);
					$('#div_biweekly_challenges_error').fadeIn("fast");
					
					setTimeout(function() {
	  					window.location = baseDir+'be';
					}, 3000);
				}else if (res.status == 'SUCCESS'){
					$('#div_biweekly_challenges_error').fadeOut("fast");
					
					load_biweekly_challenges();

					$.magnificPopup.close();

				}
	       	},
			error: function(){
				$('#div_biweekly_challenges_error').html('Ooops! Something went wrong. Please check your network and try again.');
				$('#div_biweekly_challenges_error').fadeIn("fast");

			}
	   	});
	}
});*/



//EDIT CHALLENGES
$(".biweekly_edit_challenges").click(function() {
	$('#div_biweekly_challenges_error').fadeOut("fast");
	$('#div_biweekly_challenges_success').fadeOut("fast");

    var el = $(this);
    var challenges_id = $(this).data("id");

	$.ajax({
     	url: baseDir+'be/biweekly/get_biweekly_challenge2/'+challenges_id,
       	type: 'POST',
       	async: false,
       	data: '',
     	success: function (res) {
     		try{
     			var obj1 = res;
     			obj1 = obj1.replace('[','');
     			obj1 = obj1.replace(']','');
	     		var obj = $.parseJSON(obj1);
	     		$("#biweekly_challenge_id2").val(obj['biweekly_challenge_id']);	     		
	     		$("#biweekly_challenges_milestone_id2").val(obj['milestone_id']).change();
	     		$("#biweekly_challenges2").val(obj['biweekly_challenge_description']);
	     		if (CKEDITOR.instances.biweekly_challenges2){
	     			CKEDITOR.instances.biweekly_challenges2.destroy();
	     		}
	     		CKEDITOR.replace('biweekly_challenges2');
	     		CKEDITOR.instances.biweekly_challenges2.setData(obj['biweekly_challenge_description']);
     		}catch(err){
     			alert(err);
     		}
   		},
		error: function(){
		}
    });
});

var biweekly_challenges_valid2 = function validate_biweekly_challenges2(){
	$obj_valid = true;

	CKEDITOR.instances['biweekly_challenges2'].updateElement();

	$('#biweekly_challenges_milestone_id2 + p').hide();
	$('#biweekly_challenges2 + p').hide();

	//MILESTONE ID
    if ($('#biweekly_challenges_milestone_id2').val() == '' || $('#biweekly_challenges_milestone_id2').val() == null){
    	$('#biweekly_challenges_milestone_id2').after('<p class="has-error">* Please select Partner</p>')
    	$('#biweekly_challenges_milestone_id2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_challenges_milestone_id2 + p').hide();
    	$('#biweekly_challenges_milestone_id2').closest('.form-group').removeClass( "has-error" );
    }

    //challengeS
   	if ($('#biweekly_challenges2').val() == '' || $('#biweekly_challenges2').val() == null){
    	$('#biweekly_challenges2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_challenges2').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_biweekly_save_challenges2").off().on('click', function() {
	//alert($("#biweekly_challenge_id2").val());
	if (biweekly_challenges_valid2() == false){
	}else{
		var dt = $('#biweekly_challenges_milestone_id2,#biweekly_challenges2').serialize();
		$("#biweekly_challenges_spinner2").fadeIn("fast");
		$.ajax({
	    	url: baseDir+'be/biweekly/update_challenge/' + $("#biweekly_challenge_id2").val(),
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#biweekly_challenges_spinner2").fadeOut("fast");
		        if(res.status == 'ERR'){
					$('#div_biweekly_challenges_error').html(res.message);
					$('#div_biweekly_challenges_error').fadeIn("fast");
				}else if (res.status == 'EXP'){
					$('#div_biweekly_challenges_error').html(res.message);
					$('#div_biweekly_challenges_error').fadeIn("fast");
					
					setTimeout(function() {
	  					window.location = baseDir+'be';
					}, 3000);
				}else if (res.status == 'SUCCESS'){
					$('#div_biweekly_challenges_error').fadeOut("fast");
					
					load_biweekly_challenges();

					$.magnificPopup.close();

				}
	       	},
			error: function(){
				$('#div_biweekly_challenges_error').html('Ooops! Something went wrong. Please check your network and try again.');
				$('#div_biweekly_challenges_error').fadeIn("fast");

			}
	   	});
	}
});
//DELETE CHALLENGE
$(".biweekly_delete_challenge").click(function() {

    var el = $(this);
    var biweekly_challenge_id = $(this).data("id");

	var result = confirm("Do you really wish to delete this record?");
	if (result) {
    	$.ajax({
	    	url: baseDir+'be/biweekly/delete_biweekly_challenge/'+biweekly_challenge_id,
	        type: 'POST',
	        data: '',
			dataType: 'json'
		})
		.done(function(res) {
			if(res.status == 'ERR'){
		       	PNotify.removeAll();		    	
				new PNotify({
					title: 'Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
			}else if (res.status == 'EXP'){
		       	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-check'
				});

				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
		       	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				load_biweekly_challenges();

			}
	  	})
	  	.fail(function(xhr) {
	        PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
	  	});
	}


});



//EDIT EVENTS
$(".biweekly_edit_events").click(function() {
	$('#div_biweekly_events_error').fadeOut("fast");
	$('#div_biweekly_events_success').fadeOut("fast");

    var el = $(this);
    var events_id = $(this).data("id");

	$.ajax({
     	url: baseDir+'be/biweekly/get_biweekly_event2/'+events_id,
       	type: 'POST',
       	async: false,
       	data: '',
     	success: function (res) {
     		try{
     			var obj1 = res;
     			obj1 = obj1.replace('[','');
     			obj1 = obj1.replace(']','');
	     		var obj = $.parseJSON(obj1);
	     		$("#biweekly_event_id2").val(obj['biweekly_event_id']);	     		
	     		$("#biweekly_events_milestone_id2").val(obj['milestone_id']).change();
	     		$("#biweekly_events2").val(obj['biweekly_event_description']);
	     		if (CKEDITOR.instances.biweekly_events2){
	     			CKEDITOR.instances.biweekly_events2.destroy();
	     		}
	     		CKEDITOR.replace('biweekly_events2');
	     		CKEDITOR.instances.biweekly_events2.setData(obj['biweekly_event_description']);
     		}catch(err){
     			alert(err);
     		}
   		},
		error: function(){
		}
    });
});

var biweekly_events_valid2 = function validate_biweekly_events2(){
	$obj_valid = true;

	CKEDITOR.instances['biweekly_events2'].updateElement();

	$('#biweekly_events_milestone_id2 + p').hide();
	$('#biweekly_events2 + p').hide();

	//MILESTONE ID
    if ($('#biweekly_events_milestone_id2').val() == '' || $('#biweekly_events_milestone_id2').val() == null){
    	$('#biweekly_events_milestone_id2').after('<p class="has-error">* Please select Partner</p>')
    	$('#biweekly_events_milestone_id2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_events_milestone_id2 + p').hide();
    	$('#biweekly_events_milestone_id2').closest('.form-group').removeClass( "has-error" );
    }

    //eventS
   	if ($('#biweekly_events2').val() == '' || $('#biweekly_events2').val() == null){
    	$('#biweekly_events2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_events2').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_biweekly_save_events2").off().on('click', function() {
	//alert($("#biweekly_event_id2").val());
	if (biweekly_events_valid2() == false){
	}else{
		var dt = $('#biweekly_events_milestone_id2,#biweekly_events2').serialize();
		$("#biweekly_events_spinner2").fadeIn("fast");
		$.ajax({
	    	url: baseDir+'be/biweekly/update_event/' + $("#biweekly_event_id2").val(),
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#biweekly_events_spinner2").fadeOut("fast");
		        if(res.status == 'ERR'){
					$('#div_biweekly_events_error').html(res.message);
					$('#div_biweekly_events_error').fadeIn("fast");
				}else if (res.status == 'EXP'){
					$('#div_biweekly_events_error').html(res.message);
					$('#div_biweekly_events_error').fadeIn("fast");
					
					setTimeout(function() {
	  					window.location = baseDir+'be';
					}, 3000);
				}else if (res.status == 'SUCCESS'){
					$('#div_biweekly_events_error').fadeOut("fast");
					
					load_biweekly_events();

					$.magnificPopup.close();

				}
	       	},
			error: function(){
				$('#div_biweekly_events_error').html('Ooops! Something went wrong. Please check your network and try again.');
				$('#div_biweekly_events_error').fadeIn("fast");

			}
	   	});
	}
});
//DELETE EVENT
$(".biweekly_delete_event").click(function() {

    var el = $(this);
    var biweekly_event_id = $(this).data("id");

	var result = confirm("Do you really wish to delete this record?");
	if (result) {
    	$.ajax({
	    	url: baseDir+'be/biweekly/delete_biweekly_event/'+biweekly_event_id,
	        type: 'POST',
	        data: '',
			dataType: 'json'
		})
		.done(function(res) {
			if(res.status == 'ERR'){
		       	PNotify.removeAll();		    	
				new PNotify({
					title: 'Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
			}else if (res.status == 'EXP'){
		       	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-check'
				});

				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
		       	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				load_biweekly_events();

			}
	  	})
	  	.fail(function(xhr) {
	        PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
	  	});
	}


});


//EDIT ACTIVITIES
$(".biweekly_edit_activities").click(function() {
	$('#div_biweekly_activities_error').fadeOut("fast");
	$('#div_biweekly_activities_success').fadeOut("fast");

    var el = $(this);
    var activities_id = $(this).data("id");

	$.ajax({
     	url: baseDir+'be/biweekly/get_biweekly_activity2/'+activities_id,
       	type: 'POST',
       	async: false,
       	data: '',
     	success: function (res) {
     		try{
     			var obj1 = res;
     			obj1 = obj1.replace('[','');
     			obj1 = obj1.replace(']','');
	     		var obj = $.parseJSON(obj1);
	     		$("#biweekly_activity_id2").val(obj['biweekly_activity_id']);	     		
	     		$("#biweekly_activities_milestone_id2").val(obj['milestone_id']).change();
	     		$("#biweekly_activities2").val(obj['biweekly_activity_description']);
	     		if (CKEDITOR.instances.biweekly_activities2){
	     			CKEDITOR.instances.biweekly_activities2.destroy();
	     		}
	     		CKEDITOR.replace('biweekly_activities2');
	     		CKEDITOR.instances.biweekly_activities2.setData(obj['biweekly_activity_description']);
     		}catch(err){
     			alert(err);
     		}
   		},
		error: function(){
		}
    });
});

var biweekly_activities_valid2 = function validate_biweekly_activities2(){
	$obj_valid = true;

	CKEDITOR.instances['biweekly_activities2'].updateElement();

	$('#biweekly_activities_milestone_id2 + p').hide();
	$('#biweekly_activities2 + p').hide();

	//MILESTONE ID
    if ($('#biweekly_activities_milestone_id2').val() == '' || $('#biweekly_activities_milestone_id2').val() == null){
    	$('#biweekly_activities_milestone_id2').after('<p class="has-error">* Please select Partner</p>')
    	$('#biweekly_activities_milestone_id2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_activities_milestone_id2 + p').hide();
    	$('#biweekly_activities_milestone_id2').closest('.form-group').removeClass( "has-error" );
    }

    //activities
   	if ($('#biweekly_activities2').val() == '' || $('#biweekly_activities2').val() == null){
    	$('#biweekly_activities2').closest('.form-group').addClass( "has-error" );
    	$obj_valid = false;
    }else{
    	$('#biweekly_activities2').closest('.form-group').removeClass( "has-error" );
    }

	return $obj_valid;
}

$("#btn_biweekly_save_activities2").off().on('click', function() {
	//alert($("#biweekly_activity_id2").val());
	if (biweekly_activities_valid2() == false){
	}else{
		var dt = $('#biweekly_activities_milestone_id2,#biweekly_activities2').serialize();
		$("#biweekly_activities_spinner2").fadeIn("fast");
		$.ajax({
	    	url: baseDir+'be/biweekly/update_activity/' + $("#biweekly_activity_id2").val(),
	        type: 'POST',
	        data: dt,
			dataType: 'json',
	        success: function (res) {
				$("#biweekly_activities_spinner2").fadeOut("fast");
		        if(res.status == 'ERR'){
					$('#div_biweekly_activities_error').html(res.message);
					$('#div_biweekly_activities_error').fadeIn("fast");
				}else if (res.status == 'EXP'){
					$('#div_biweekly_activities_error').html(res.message);
					$('#div_biweekly_activities_error').fadeIn("fast");
					
					setTimeout(function() {
	  					window.location = baseDir+'be';
					}, 3000);
				}else if (res.status == 'SUCCESS'){
					$('#div_biweekly_activities_error').fadeOut("fast");
					
					load_biweekly_activities();

					$.magnificPopup.close();

				}
	       	},
			error: function(){
				$('#div_biweekly_activities_error').html('Ooops! Something went wrong. Please check your network and try again.');
				$('#div_biweekly_activities_error').fadeIn("fast");

			}
	   	});
	}
});
//DELETE ACTIVITY
$(".biweekly_delete_activity").click(function() {

    var el = $(this);
    var biweekly_activity_id = $(this).data("id");

	var result = confirm("Do you really wish to delete this record?");
	if (result) {
    	$.ajax({
	    	url: baseDir+'be/biweekly/delete_biweekly_activity/'+biweekly_activity_id,
	        type: 'POST',
	        data: '',
			dataType: 'json'
		})
		.done(function(res) {
			if(res.status == 'ERR'){
		       	PNotify.removeAll();		    	
				new PNotify({
					title: 'Error',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-times'
				});
			}else if (res.status == 'EXP'){
		       	PNotify.removeAll();				
				new PNotify({
					title: 'Session Expired',
					text: res.message,
					type: 'custom',
					addclass: 'notification-danger',
					icon: 'fa fa-check'
				});

				window.location = baseDir+'be';
			}else if (res.status == 'SUCCESS'){
		       	PNotify.removeAll();
					new PNotify({
					title: 'Success',
					text: res.message,
					type: 'custom',
					addclass: 'notification-success',
					icon: 'fa fa-check'
				});

				load_biweekly_activities();

			}
	  	})
	  	.fail(function(xhr) {
	        PNotify.removeAll();
			new PNotify({
				title: 'Error',
				text: 'Ooops! Something went wrong. Please check your network and try again.',
				type: 'custom',
				addclass: 'notification-error',
				icon: 'fa fa-times'
			});
	  	});
	}


});

$("#btn_biweekly_comment").off().on('click', function() {
    //alert('Clicked');
    //$("#div_biweekly_comment_error");
    //$("#div_biweekly_comment_success");

				
	//$biweekly_report_id = $("#biweekly_report_id").val();
	$biweekly_comment = $("#biweekly_comment_area").val();

	//alert($biweekly_report_id);
	
	$valmsg = "";
	$valmsg2 = "";
		
	if ($biweekly_comment == "" || $biweekly_comment == null){$valmsg = $valmsg + "<i class='fa fa-exclamation-circle'></i> Comment is required <br/>";}
			
	if ($valmsg != $valmsg2){
		$("#div_biweekly_comment_error").html($valmsg);
		$("#div_biweekly_comment_success").fadeOut("fast");
		$("#div_biweekly_comment_error").fadeIn("fast");
	}else{
		$("#div_biweekly_comment_error").fadeOut("fast");
		$("#div_biweekly_comment_success").fadeOut("fast");
			
		$("#biweekly_comment_spinner").fadeIn("fast");
					
    	var dt = $('#biweekly_report_id,#biweekly_comment_area').serialize();

		$.ajax({
           	url: baseDir+'be/biweekly/save_comment',
           	type: 'POST',
           	data: dt,
			dataType: 'json',
           	success: function (res) {
				$("#biweekly_comment_spinner").fadeOut("fast");
				if(res.status == 'ERR'){
					$("#div_biweekly_comment_error").html(res.message);
					$("#div_biweekly_comment_success").fadeOut("fast");
					$("#div_biweekly_comment_error").fadeIn("fast");
				}else if (res.status == 'SUCCESS'){
					$("#div_biweekly_comment_success").html(res.message);
					$("#div_biweekly_comment_error").fadeOut("fast");
					$("#div_biweekly_comment_success").fadeIn("fast");

					location.reload();						

				}
            },
			error: function(){
				$("#biweekly_comment_spinner").fadeOut("fast");
				$("#div_biweekly_comment_error").html("Something went wrong. Please check your network and try again.");
				$("#div_biweekly_comment_success").fadeOut("fast");
				$("#div_biweekly_comment_error").fadeIn("fast");
			}
        });
	
	}
	return false;
});