function updateConsultInfo(id){
	$.ajax({
		url: "/ReactivaWeb/index.php/services/consultInfo",
		type: 'POST',
		data: {
			"id" : String(id)
		},
		dataType:'json',
		success: function(data){
			$("#modal-date").text(data['consult']['date']);
			$("#modal-status").text(data['consult']['status']);
			$("#modal-observation").text(data['consult']['observations']);
			$("#modal-diagnosis").text(data['consult']['diagnosis']);
			$("#modal-body").text(data['limb']);
		},
		error: function(error){
			console.error(error);
		}
	});
}


function updateTherapyInfo(id){
	$.ajax({
		url: "/ReactivaWeb/index.php/services/therapyInfo",
		type: 'POST',
		data: {
			"id" : String(id)
		},
		dataType:'json',
		success: function(data){
			$("#the-date").text(data['therapy']['date']);
			$("#the-status").text(data['therapy']['status']);
			$("#the-evaluation").text(data['therapy']['evaluation']);
			$("#the-attended").text(data['therapy']['doctor']);
			$("#the-comments").text(data['comments']);
		},
		error: function(error){
			console.error(error);
		}
	});
}



$(document).ready(function () {
	$.datetimepicker.setLocale('es');

	jQuery('#datetimepicker').datetimepicker();

	jQuery('#datetimepicker2').datetimepicker({
		datepicker:false,
		format:'H:i'
	});

	

	$("#frm-new").validate({
		rules:{
			'pax-name':{
				required: true,
				letters: true,
				minlength: 3,
				normalizer: function(value) {
					return $.trim(value);
				}
			},
			'pax-lastname':{
				required: true,
				letters: true,
				minlength: 3,
				normalizer: function(value) {
					return $.trim(value);
				}
			},
			'pax-ci':{
				required: true,
				digits: true,
				minlength: 10,
				maxlength: 10,
				normalizer: function(value) {
					return $.trim(value);
				}
			},
			'pax-emergencycontact':{
				required: true,
				letters: true,
				minlength: 5,
				normalizer: function(value) {
					return $.trim(value);
				}
			}
		},
		messages:{
			'pax-name': "Sólo se permiten letras",
			'pax-lastname': "Sólo se permiten letras",
			'pax-ci': "Las cédulas poseen 10 dígitos",
			'pax-emergencycontact': "Sólo se permiten letras"

		}
	});


	$("#list-patient").each(function(){
		$('#list-patient thead td div').each( function () {
        	var title = $(this).text();
        	$(this).html( '<input type="text" placeholder="'+title+'" />' );
    	});

    	var table = $('#list-patient').DataTable({
    		"lengthChange": false,
    		"bInfo" : false,
    		"dataTables_filter": false,
    		}
    	);

    	$('#list-patient_filter').remove();

    	table.columns().every( function (){
    		var that = this;
    		$('input', this.header()).on('keyup change', function(){
    			if(that.search() !== this.value){
    				that.search(this.value).draw();
    			}
    		});
    	});
	});
});