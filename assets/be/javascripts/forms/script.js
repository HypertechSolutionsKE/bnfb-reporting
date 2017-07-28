
$(document).ready(function() {
	var trainings_chart;
    /*$("#quarterly_period_from").datepicker( {
        format: "MM yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });
    $("#quarterly_period_to").datepicker( {
        format: "MM yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });*/
    var d = new Date();
    d.setMonth(d.getMonth() - 3);

    $( "#pd_trainings_from").datepicker("setDate", d);    
    $( "#pd_trainings_to" ).datepicker("setDate", new Date());




    $("#select_outcome_list").on('change', function() {

        $("#div_outcomes_list").oLoader({
            backgroundColor:'#fff',
            image: baseDir+'assets/be/vendor/oLoader/images/ownageLoader/loader9.gif',
            fadeInTime: 500,
            fadeOutTime: 1000,
            fadeLevel: 0.8
        });             

        $( "#div_outcomes_list").html('');

        if (this.value != ''){

            $.ajax({
                url: baseDir+'be/outcomes/load_outcome_list/'+this.value,
                type: 'POST',
                data: '',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    $("#div_outcomes_list").html(result);
                    $("#div_outcomes_list").oLoader('hide');           
                },
                error: function(){
                    $("#div_outcomes_list").oLoader('hide');
                }
            });
        }
        $('#div_outcomes_list').oLoader('hide');

    });

    $("#select_outcome_add").on('change', function() {

        $("#div_outcomes_add").oLoader({
            backgroundColor:'#fff',
            image: baseDir+'assets/be/vendor/oLoader/images/ownageLoader/loader9.gif',
            fadeInTime: 500,
            fadeOutTime: 1000,
            fadeLevel: 0.8
        });             

        $( "#div_outcomes_add").html('');

        if (this.value != ''){

            $.ajax({
                url: baseDir+'be/outcomes/load_outcome_add/'+this.value,
                type: 'POST',
                data: '',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    $("#div_outcomes_add").html(result);
                    $("#div_outcomes_add").oLoader('hide');           
                },
                error: function(){
                    $("#div_outcomes_add").oLoader('hide');
                }
            });
        }
        $('#div_outcomes_add').oLoader('hide');

    });

    //load_trainings_chart();






    /*
    //CKEDITOR.replace('quarterly_executive_summary');
    //CKEDITOR.config.height = 200;

	//BIWEEKLY TASKS
	$('.btn_biweekly_tasks_add').on('click', function() {
			taskID++;
			$.ajax({
            	url: baseDir+'be/biweekly/js_add_biweekly_task',
            	type: 'POST',
            	data: 'taskID='+taskID,
            	success: function (res) {
            		$( "#biweekly_tasks_load" ).append(res);
            	},
				error: function(){
				}
        	});

	});
	$("#biweekly_tasks_load").on('click','.btn_biweekly_tasks_add',function(){ //user click on remove text
			taskID++;
			$.ajax({
            	url: baseDir+'be/biweekly/js_add_biweekly_task',
            	type: 'POST',
            	data: 'taskID='+taskID,
            	success: function (res) {
            		$( "#biweekly_tasks_load" ).append(res);
            	},
				error: function(){
				}
        	});
      });

	//BIWEEKLY CHALLENGES
	$('.btn_biweekly_challenges_add').on('click', function() {
			challengeID++;
			$.ajax({
            	url: baseDir+'be/biweekly/js_add_biweekly_challenge',
            	type: 'POST',
            	data: 'challengeID='+challengeID,
            	success: function (res) {
            		$( "#biweekly_challenges_load" ).append(res);
            	},
				error: function(){
				}
        	});

	});
	$("#biweekly_challenges_load").on('click','.btn_biweekly_challenges_add',function(){ //user click on remove text
			challengeID++;
			$.ajax({
            	url: baseDir+'be/biweekly/js_add_biweekly_challenge',
            	type: 'POST',
            	data: 'challengeID='+challengeID,
            	success: function (res) {
            		$( "#biweekly_challenges_load" ).append(res);
            	},
				error: function(){
				}
        	});
      });

	//BIWEEKLY EVENTS
	$('.btn_biweekly_events_add').on('click', function() {
			eventID++;
			$.ajax({
            	url: baseDir+'be/biweekly/js_add_biweekly_event',
            	type: 'POST',
            	data: 'eventID='+eventID,
            	success: function (res) {
            		$( "#biweekly_events_load" ).append(res);
            	},
				error: function(){
				}
        	});

	});
	$("#biweekly_events_load").on('click','.btn_biweekly_events_add',function(){ //user click on remove text
			eventID++;
			$.ajax({
            	url: baseDir+'be/biweekly/js_add_biweekly_event',
            	type: 'POST',
            	data: 'eventID='+eventID,
            	success: function (res) {
            		$( "#biweekly_events_load" ).append(res);
            	},
				error: function(){
				}
        	});
      });

	//BIWEEKLY ACTIVITIES
	$('.btn_biweekly_activities_add').on('click', function() {
			activityID++;
			$.ajax({
            	url: baseDir+'be/biweekly/js_add_biweekly_activity',
            	type: 'POST',
            	data: 'activityID='+activityID,
            	success: function (res) {
            		$( "#biweekly_activities_load" ).append(res);
            	},
				error: function(){
				}
        	});

	});
	$("#biweekly_activities_load").on('click','.btn_biweekly_activities_add',function(){ //user click on remove text
		activityID++;
		$.ajax({
           	url: baseDir+'be/biweekly/js_add_biweekly_activity',
           	type: 'POST',
           	data: 'activityID='+activityID,
           	success: function (res) {
           		$( "#biweekly_activities_load" ).append(res);
           	},
			error: function(){
			}
        });
    });*/


    $("#pd_trainings_refresh").off().on('click', function() {
        refresh_trainings_chart();
    });






    //QUARTERLY REPORTS

    //INTERMEDIATE RESULTS
    $('.btn_quarterly_add_intermediate_result').off().on('click', function() {
            //activityID++;
            $.ajax({
                url: baseDir+'be/quarterly/js_add_intermediate_result',
                type: 'POST',
                data: '',
                success: function (res) {
                    $( "#quarterly_intermediate_results_load" ).append(res);
                },
                error: function(){
                }
            });

    });
    $("#quarterly_intermediate_results_load").off().on('click','.btn_quarterly_add_intermediate_result',function(){ //user click on remove text
        //activityID++;.off()
        $.ajax({
            url: baseDir+'be/quarterly/js_add_intermediate_result',
            type: 'POST',
            data: '',
            success: function (res) {
                $( "#quarterly_intermediate_results_load" ).append(res);
            },
            error: function(){
            }
        });
    });

});

/*function load_trainings_chart(){    
    $("#pd_trainings_spinner").fadeIn("fast");
    var dt = $('#pd_trainings_from,#pd_trainings_to,#pd_trainings_indicator_id,#pd_trainings_country_id').serialize();
    $.ajax({
        url: baseDir+'be/performance_dashboard/get_trainings_data',
        type: 'POST',
        data: dt,
        dataType: 'json',
        success: function (res) {
            var report_data = res;
            trainings_chart = new Morris.Bar({
                resize: true,
                element: 'div_trainings_bar',
                data: report_data,
                xkey: 'training_period_from',
                ykeys: ['males_attended','females_attended'],
                labels: ['Males','Females'],
                hideHover: true,
            });
            trainings_chart.options.labels.forEach(function(label, i){
                var legendItem = $('<span></span>').text(label).css('color', trainings_chart.options.barColors[i])
                $('#legend').append(legendItem)
            })
            $("#pd_trainings_spinner").fadeOut("fast");
        },
        error: function(){
            $("#pd_trainings_spinner").fadeOut("fast");
            PNotify.removeAll();
            new PNotify({
                title: 'Error',
                text: 'Ooops! Something went wrong. Please check your network and try again.',
                type: 'custom',
                addclass: 'notification-error',
                icon: 'fa fa-times'
            });
        }
    });
    
}*/
function refresh_trainings_chart(){
    $("#pd_trainings_spinner").fadeIn("fast");
    var dt = $('#pd_trainings_from,#pd_trainings_to,#pd_trainings_indicator_id,#pd_trainings_country_id').serialize();
    $.ajax({
        url: baseDir+'be/performance_dashboard/get_trainings_data',
        type: 'POST',
        data: dt,
        dataType: 'json',
        success: function (res) {
            var report_data = res;
            trainings_chart.setData(report_data);
            $("#pd_trainings_spinner").fadeOut("fast");
        },
        error: function(){
            $("#pd_trainings_spinner").fadeOut("fast");
            PNotify.removeAll();
            new PNotify({
                title: 'Error',
                text: 'Ooops! Something went wrong. Please check your network and try again.',
                type: 'custom',
                addclass: 'notification-error',
                icon: 'fa fa-times'
            });
        }
    });

}


//OUTPUTS/OUTCOMES
function save_change_agents_trained(){
    if ($("#frm_change_agents_trained_add").valid()){

        $("#div_change_agents_trained_success").fadeOut("fast");
        $("#div_change_agents_trained_error").fadeOut("fast");
               
        $("#change_agents_trained_spinner").show();
                    
        var form = document.getElementById('frm_change_agents_trained_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_change_agents_trained',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#change_agents_trained_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_change_agents_trained_error").html(res.message);
                        $("#div_change_agents_trained_success").fadeOut("fast");
                        $("#div_change_agents_trained_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_change_agents_trained_success").html(res.message);
                        $("#div_change_agents_trained_error").fadeOut("fast");
                        $("#div_change_agents_trained_success").fadeIn("fast");
                        
                        $( '#frm_change_agents_trained_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#add_currency_loader").hide();
                    $("#div_change_agents_trained_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_change_agents_trained_success").fadeOut("fast");
                    $("#div_change_agents_trained_error").fadeIn("fast");
                }
            });
    
        }
        return false;

}

//POLICY DOCUMENTS
function save_policy_documents(){

    if ($("#frm_policy_documents_add").valid()){

        $("#div_policy_documents_success").fadeOut("fast");
        $("#div_policy_documents_error").fadeOut("fast");
               
        $("#policy_documents_spinner").show();
                    
        var form = document.getElementById('frm_policy_documents_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_policy_documents',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#policy_documents_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_policy_documents_error").html(res.message);
                        $("#div_policy_documents_success").fadeOut("fast");
                        $("#div_policy_documents_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_policy_documents_success").html(res.message);
                        $("#div_policy_documents_error").fadeOut("fast");
                        $("#div_policy_documents_success").fadeIn("fast");
                        
                        $( '#frm_policy_documents_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#add_currency_loader").hide();
                    $("#div_policy_documents_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_policy_documents_success").fadeOut("fast");
                    $("#div_policy_documents_error").fadeIn("fast");
                }
            });
    
        }
        return false;

}

function save_advocates(){
    if ($("#frm_advocates_add").valid()){

        $("#div_advocates_success").fadeOut("fast");
        $("#div_advocates_error").fadeOut("fast");
               
        $("#advocates_spinner").show();
                    
        var form = document.getElementById('frm_advocates_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_advocates',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#advocates_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_advocates_error").html(res.message);
                        $("#div_advocates_success").fadeOut("fast");
                        $("#div_advocates_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_advocates_success").html(res.message);
                        $("#div_advocates_error").fadeOut("fast");
                        $("#div_advocates_success").fadeIn("fast");
                        
                        $( '#frm_advocates_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#add_currency_loader").hide();
                    $("#div_advocates_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_advocates_success").fadeOut("fast");
                    $("#div_advocates_error").fadeIn("fast");
                }
            });
    
        }
        return false;

}

function save_new_programs(){
    if ($("#frm_new_programs_add").valid()){

        $("#div_new_programs_success").fadeOut("fast");
        $("#div_new_programs_error").fadeOut("fast");
               
        $("#new_programs_spinner").show();
                    
        var form = document.getElementById('frm_new_programs_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_new_programs',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#new_programs_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_new_programs_error").html(res.message);
                        $("#div_new_programs_success").fadeOut("fast");
                        $("#div_new_programs_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_new_programs_success").html(res.message);
                        $("#div_new_programs_error").fadeOut("fast");
                        $("#div_new_programs_success").fadeIn("fast");
                        
                        $( '#frm_new_programs_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#add_currency_loader").hide();
                    $("#div_new_programs_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_new_programs_success").fadeOut("fast");
                    $("#div_new_programs_error").fadeIn("fast");
                }
            });
    
        }
        return false;

}

function save_resources_mobilized(){
    if ($("#frm_resources_mobilized_add").valid()){

        $("#div_resources_mobilized_success").fadeOut("fast");
        $("#div_resources_mobilized_error").fadeOut("fast");
               
        $("#resources_mobilized_spinner").show();
                    
        var form = document.getElementById('frm_resources_mobilized_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_resources_mobilized',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#resources_mobilized_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_resources_mobilized_error").html(res.message);
                        $("#div_resources_mobilized_success").fadeOut("fast");
                        $("#div_resources_mobilized_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_resources_mobilized_success").html(res.message);
                        $("#div_resources_mobilized_error").fadeOut("fast");
                        $("#div_resources_mobilized_success").fadeIn("fast");
                        
                        $( '#frm_resources_mobilized_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#add_currency_loader").hide();
                    $("#div_resources_mobilized_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_resources_mobilized_success").fadeOut("fast");
                    $("#div_resources_mobilized_error").fadeIn("fast");
                }
            });
    
        }
        return false;    
}

function save_key_issues_discussed(){
    if ($("#frm_key_issues_discussed_add").valid()){

        $("#div_key_issues_discussed_success").fadeOut("fast");
        $("#div_key_issues_discussed_error").fadeOut("fast");
               
        $("#key_issues_discussed_spinner").show();
                    
        var form = document.getElementById('frm_key_issues_discussed_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_key_issues_discussed',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#key_issues_discussed_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_key_issues_discussed_error").html(res.message);
                        $("#div_key_issues_discussed_success").fadeOut("fast");
                        $("#div_key_issues_discussed_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_key_issues_discussed_success").html(res.message);
                        $("#div_key_issues_discussed_error").fadeOut("fast");
                        $("#div_key_issues_discussed_success").fadeIn("fast");
                        
                        $( '#frm_key_issues_discussed_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#add_currency_loader").hide();
                    $("#div_key_issues_discussed_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_key_issues_discussed_success").fadeOut("fast");
                    $("#div_key_issues_discussed_error").fadeIn("fast");
                }
            });
    
        }
        return false;
}

function save_key_elements_documented(){
    if ($("#frm_key_elements_documented_add").valid()){

        $("#div_key_elements_documented_success").fadeOut("fast");
        $("#div_key_elements_documented_error").fadeOut("fast");
               
        $("#key_elements_documented_spinner").show();
                    
        var form = document.getElementById('frm_key_elements_documented_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_key_elements_documented',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#key_elements_documented_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_key_elements_documented_error").html(res.message);
                        $("#div_key_elements_documented_success").fadeOut("fast");
                        $("#div_key_elements_documented_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_key_elements_documented_success").html(res.message);
                        $("#div_key_elements_documented_error").fadeOut("fast");
                        $("#div_key_elements_documented_success").fadeIn("fast");
                        
                        $( '#frm_key_elements_documented_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#add_currency_loader").hide();
                    $("#div_key_elements_documented_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_key_elements_documented_success").fadeOut("fast");
                    $("#div_key_elements_documented_error").fadeIn("fast");
                }
            });
    
        }
        return false;

}

function save_institutions_equipped(){
    if ($("#frm_institutions_equipped_add").valid()){

        $("#div_institutions_equipped_success").fadeOut("fast");
        $("#div_institutions_equipped_error").fadeOut("fast");
               
        $("#institutions_equipped_spinner").show();
                    
        var form = document.getElementById('frm_institutions_equipped_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_institutions_equipped',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#institutions_equipped_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_institutions_equipped_error").html(res.message);
                        $("#div_institutions_equipped_success").fadeOut("fast");
                        $("#div_institutions_equipped_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_institutions_equipped_success").html(res.message);
                        $("#div_institutions_equipped_error").fadeOut("fast");
                        $("#div_institutions_equipped_success").fadeIn("fast");
                        
                        $( '#frm_institutions_equipped_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#add_currency_loader").hide();
                    $("#div_institutions_equipped_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_institutions_equipped_success").fadeOut("fast");
                    $("#div_institutions_equipped_error").fadeIn("fast");
                }
            });
    
        }
        return false;    
}

function save_households(){
    if ($("#frm_households_add").valid()){

        $("#div_households_success").fadeOut("fast");
        $("#div_households_error").fadeOut("fast");
               
        $("#households_spinner").show();
                    
        var form = document.getElementById('frm_households_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_households',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#households_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_households_error").html(res.message);
                        $("#div_households_success").fadeOut("fast");
                        $("#div_households_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_households_success").html(res.message);
                        $("#div_households_error").fadeOut("fast");
                        $("#div_households_success").fadeIn("fast");
                        
                        $( '#frm_households_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#households_spinner").hide();
                    $("#div_households_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_households_success").fadeOut("fast");
                    $("#div_households_error").fadeIn("fast");
                }
            });
    
        }
        return false;    


}
function save_percentage_national_programs(){
    if ($("#frm_percentage_national_programs_add").valid()){

        $("#div_percentage_national_programs_success").fadeOut("fast");
        $("#div_percentage_national_programs_error").fadeOut("fast");
               
        $("#percentage_national_programs_spinner").show();
                    
        var form = document.getElementById('frm_percentage_national_programs_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_percentage_national_programs',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#percentage_national_programs_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_percentage_national_programs_error").html(res.message);
                        $("#div_percentage_national_programs_success").fadeOut("fast");
                        $("#div_percentage_national_programs_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_percentage_national_programs_success").html(res.message);
                        $("#div_percentage_national_programs_error").fadeOut("fast");
                        $("#div_percentage_national_programs_success").fadeIn("fast");
                        
                        $( '#frm_percentage_national_programs_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#percentage_national_programs_spinner").hide();
                    $("#div_percentage_national_programs_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_percentage_national_programs_success").fadeOut("fast");
                    $("#div_percentage_national_programs_error").fadeIn("fast");
                }
            });
    
        }
        return false;    

}

function save_commercial_processes(){
    if ($("#frm_commercial_processes_add").valid()){

        $("#div_commercial_processes_success").fadeOut("fast");
        $("#div_commercial_processes_error").fadeOut("fast");
               
        $("#commercial_processes_spinner").show();
                    
        var form = document.getElementById('frm_commercial_processes_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_commercial_processes',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#commercial_processes_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_commercial_processes_error").html(res.message);
                        $("#div_commercial_processes_success").fadeOut("fast");
                        $("#div_commercial_processes_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_commercial_processes_success").html(res.message);
                        $("#div_commercial_processes_error").fadeOut("fast");
                        $("#div_commercial_processes_success").fadeIn("fast");
                        
                        $( '#frm_commercial_processes_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#commercial_processes_spinner").hide();
                    $("#div_commercial_processes_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_commercial_processes_success").fadeOut("fast");
                    $("#div_commercial_processes_error").fadeIn("fast");
                }
            });
    
        }
        return false;    

}

function save_number_national_programs(){
    if ($("#frm_number_national_programs_add").valid()){

        $("#div_number_national_programs_success").fadeOut("fast");
        $("#div_number_national_programs_error").fadeOut("fast");
               
        $("#number_national_programs_spinner").show();
                    
        var form = document.getElementById('frm_number_national_programs_add');
        var formData = new FormData(form);

            $.ajax({
                url: baseDir+'be/outcomes/save_number_national_programs',
                type: 'POST',
                data: formData,
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#number_national_programs_spinner").hide();
                    if(res.status == 'ERR'){
                        $("#div_number_national_programs_error").html(res.message);
                        $("#div_number_national_programs_success").fadeOut("fast");
                        $("#div_number_national_programs_error").fadeIn("fast");
                    }else if (res.status == 'SUCCESS'){
                        $("#div_number_national_programs_success").html(res.message);
                        $("#div_number_national_programs_error").fadeOut("fast");
                        $("#div_number_national_programs_success").fadeIn("fast");
                        
                        $( '#frm_number_national_programs_add' ).each(function(){
                            this.reset();
                        }); 

                        //load_currencies();

                    }
                },
                error: function(){
                    $("#number_national_programs_spinner").hide();
                    $("#div_number_national_programs_error").html("Something went wrong. Please check your network and try again.");
                    $("#div_number_national_programs_success").fadeOut("fast");
                    $("#div_number_national_programs_error").fadeIn("fast");
                }
            });
    
        }
        return false;    
    
}



function PrintElem(){
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>Biweekly Report</title>');
    mywindow.document.write('</head><body >');
    //mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById('myDivToPrint').innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}