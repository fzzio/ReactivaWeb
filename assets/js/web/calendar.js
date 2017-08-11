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
			$('#event_list').slideDown('slow');
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