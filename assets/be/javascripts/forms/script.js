
$(document).ready(function() {
	var trainings_chart;
    $("#quarterly_period_from").datepicker( {
        format: "MM yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });
    $("#quarterly_period_to").datepicker( {
        format: "MM yyyy",
        viewMode: "months", 
        minViewMode: "months"
    });
    var d = new Date();
    d.setMonth(d.getMonth() - 3);

    $( "#pd_trainings_from").datepicker("setDate", d);    
    $( "#pd_trainings_to" ).datepicker("setDate", new Date());

    load_trainings_chart();
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

function load_trainings_chart(){    
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
    
}
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