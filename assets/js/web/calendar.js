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

function getEvents(date){
	$.ajax({
		type:'POST',
		url:"/ReactivaWeb/index.php/web/eventGet",
		data:"func=getEvents&date="+date,
		success:function(html){
			$('#event_list').html(html);
			$('#event_list').slideDown('slow');
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

			console.log(data['consult'])
			
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
	$(document).click(function(){
		
	});
});