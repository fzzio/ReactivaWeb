function getCalendar(target_div,year,month){
	$.ajax({
		type:'POST',
		url:"/ReactivaWeb/index.php/web/eventGet",
		data:"func=getCalender&year="+year+"&month="+month,
		success:function(html){
			$('#'+target_div).html(html);
		}
	});
}


function getTherapyCalendar(target_div,year,month){
	$.ajax({
		type:'POST',
		url:"/ReactivaWeb/index.php/web/eventTherapyGet",
		data:"func=getCalender&year="+year+"&month="+month,
		success:function(html){
			$('#'+target_div).html(html);
		}
	});
}

function getEvents(date){
	$.ajax({
		type:'POST',
		url:"/ReactivaWeb/index.php/web/eventGet",
		data:"func=getEvents&date="+date,
		success:function(html){
			$('#event_list').html(html);
			$('#event_list').slideDown('slow');
			$("#id-date").val(date);

			
		},
		complete: function(){
			var today = formatDateToday();

			if (date < today){
				$("#event_list .but-new-cita").remove();
			}
		}
	});
}


function formatDateToday() {
    var d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

function getTherapyEvents(date){
	$.ajax({
		type:'POST',
		url:"/ReactivaWeb/index.php/web/eventTherapyGet",
		data:"func=getEvents&date="+date,
		success:function(html){
			$('#event_list_therapy').html(html);
			$('#event_list_therapy').slideDown('slow');
		},
		error: function(error){
			console.error(error);

		}
	});
}



function addEvent(date){
	$.ajax({
		type:'POST',
		url:"/ReactivaWeb/index.php/web/eventGet",
		data:"func=addEvent&date="+date,
		success:function(html){
			$('#event_list').html(html);
		}
	});
}

function updateCitaModal(id_cita){
	$.ajax({
		url: "/ReactivaWeb/index.php/services/citaGet",
		type: 'POST',
		data: {
			"id" : String(id_cita)
		},
		dataType:'json',
		success: function(data){
			$("#modal-fullname").text(data['patient']['fullname']);
			$("#modal-date").text(data['consult']['hour']);
			$("#modal-gender").text(data['patient']['gender']);
			$("#modal-born").text(data['patient']['born']);
			$("#modal-ci").text(data['patient']['ci']);
			$("#modal-cellphone").text(data['patient']['cellphone']);
			$("#modal-email").text(data['patient']['email']);
			$("#modal-observations").text(data['consult']['observations']);
			$("#modal-status").text(data['consult']['status']);

			url =  "cancelConsult/"+data['consult']['id_consult'] ;
			$(".btn-red").attr('href',url);

			init = "iniciarCita/"+data['consult']['id_consult'] ;
			$(".btn-turquoise").attr('href', init);
			
			reagendar = "reagendar/1/"+data['consult']['id_consult'] ;
			$(".btn-green").attr('href', reagendar);



		},
		error: function(error){
			console.error(error);
		}
	});
}

function updateTerapiaModal(id_terapia){
	$.ajax({
		url: "/ReactivaWeb/index.php/services/terapiaGet",
		type: 'POST',
		data: {
			"id" : String(id_terapia)
		},
		dataType:'json',
		success: function(data){
			$("#therapy-fullname").text(data['patient']['fullname']);
			$("#therapy-date").text(data['terapia']['hour']);
			$("#therapy-gender").text(data['patient']['gender']);
			$("#therapy-born").text(data['patient']['born']);
			$("#therapy-ci").text(data['patient']['ci']);
			$("#therapy-cellphone").text(data['patient']['cellphone']);
			$("#therapy-email").text(data['patient']['email']);
			$("#therapy-status").text(data['terapia']['status']);

			url =  "cancelTherapy/"+data['terapia']['id_therapy'] ;
			$(".btn-red").attr('href',url);

			reagendar = "reagendar/2/"+data['terapia']['id_therapy'] ;
			$(".btn-green").attr('href', reagendar);
		},
		error: function(error){
			console.error(error);
		}
	});
}


$(document).ready(function(){
	$('.date_cell').mouseenter(function(){
		date = $(this).attr('date');
		$(".date_popup_wrap").fadeOut();
		$("#date_popup_"+date).fadeIn();	
	});
	$('.date_cell').mouseleave(function(){
		$(".date_popup_wrap").fadeOut();		
	});
	$('.month_dropdown').on('change',function(){
		getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
	});
	$('.year_dropdown').on('change',function(){
		getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
	});

	$("#autocomplete-paciente").autocomplete({
		source: "/ReactivaWeb/index.php/services/patientAutocomplete",
		minLength: 2,
		change: function(event, ui){
			if(!ui.item){
				$(this).val('');
			}
		},
		select: function(event, ui){
			$("#txtAllowSearch").val(ui.item.value); // display the selected text
	    	$("#id-patient").val(ui.item.id); // save selected id to hidden input
		}
	});

	$("#autocomplete-paciente").autocomplete(
		"option", "appendTo", "#frm-nueva-cita"
	);
});

