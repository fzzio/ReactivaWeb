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

	jQuery.validator.addMethod("lettersonly", function(value, element) {
  	return this.optional(element) || /^([abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú ])+$/i.test(value);
	}, "Letters only please"); 

	jQuery.validator.addMethod('validDate', function (value, element) {
	  var dd = $("#pax-born-dd").val();
	  var mm = $("#pax-born-mm").val();
	  var yyyy = $("#pax-born-yy").val();
	  if (dd=="" && mm=="" && yyyy=="") return true;
	  try {
	  	if (dd < 10) { dd = '0' + dd } 
			if (mm < 10) { mm = '0' + mm } 
	    var date = new Date(yyyy,mm-1,dd,0,0,0,0);
	    var current = new Date();
	    return date <= current;
	  }
	  catch(er) {
	    return false;
  	}
	}, 'Please use format DD MM YYYY.');

	//Disabling inputs
	if ($("#pax-option-med").val() == "-") {
		$("#pax-med-allergies").prop('disabled', true);
	}

	//Disabling inputs
	if ($("#pax-option-other").val() == "-") {
		$("#pax-allergies").prop('disabled', true);
	}
	
	//Change option value 
	$("#pax-option-med").change(function() {
		if ($("#pax-option-med").val() == "-") {
			$("#pax-med-allergies").prop('disabled', true);
			$("#pax-med-allergies").val('');
		} else {
			$("#pax-med-allergies").prop('disabled', false);
		}
	});

	//Change option value 
	$("#pax-option-other").change(function() {
		if ($("#pax-option-other").val() == "-") {
			$("#pax-allergies").prop('disabled', true);
			$("#pax-allergies").val('');
		} else {
			$("#pax-allergies").prop('disabled', false);
		}
	});

	$("#frm-new").validate({
		rules:{
			'pax-name':{
				required: true,
				lettersonly: true,
				minlength: 3,
				normalizer: function(value) {
					return $.trim(value);
				}
			},
			'pax-lastname':{
				required: true,
				lettersonly: true,
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
			'pax-born-dd':{
				required: true,
				validDate: true,
				range: [1, 31]
			},
			'pax-born-mm':{
				required: true,
				validDate: true,
				range: [1, 12]
			},
			'pax-born-yy':{
				required: true,
				validDate: true,
				range: [1900, (new Date()).getFullYear()]
			},
			'pax-emergencycontact':{
				required: true,
				lettersonly: true,
				minlength: 3,
				normalizer: function(value) {
					return $.trim(value);
				}
			},
			'pax-phone':{
				required: true,
				digits: true,
				minlength: 9,
				maxlength: 9,
				normalizer: function(value) {
					return $.trim(value);
				}
			},
			'pax-cellphone':{
				required: true,
				digits: true,
				minlength: 10,
				maxlength: 10,
				normalizer: function(value) {
					return $.trim(value);
				}
			},
			'pax-mail':{
				required: true,
				email: true,
				normalizer: function(value) {
					return $.trim(value);
				}
			},
			'pax-address':{
				required: true,
				minlength: 5,
				normalizer: function(value) {
					return $.trim(value);
				}
			},
			'pax-emergencyphone':{
				required: true,
				digits: true,
				minlength: 9,
				maxlength: 9,
				normalizer: function(value) {
					return $.trim(value);
				}
			}
		},
		messages:{
			'pax-name':{
				lettersonly: "Sólo se permiten letras.",
				required: "Este campo es obligatorio.",
				minlength: "Ingrese al menos ({0}) carácteres."
			},
			'pax-lastname':{
				lettersonly: "Sólo se permiten letras.",
				required: "Este campo es obligatorio.",
				minlength: "Ingrese al menos ({0}) carácteres."
			},
			'pax-ci':{
				required: "Este campo es obligatorio.",
				digits: "Sólo se permiten dígitos.",
				minlength: "Las cédulas poseen ({0}) dígitos.",
				maxlength: "Las cédulas poseen ({0}) dígitos."
			},
			'pax-born-dd':{
				required: "Este campo es obligatorio",
				validDate: "Ingrese una fecha válida",
				range: "Ingrese una fecha válida"
			},
			'pax-born-mm':{
				required: "Este campo es obligatorio",
				validDate: "Ingrese una fecha válida",
				range: "Ingrese una fecha válida"
			},
			'pax-born-yy':{
				required: "Este campo es obligatorio",
				validDate: "Ingrese una fecha válida",
				range: "Ingrese una fecha válida"
			},
			'pax-emergencycontact':{
				lettersonly: "Sólo se permiten letras.",
				required: "Este campo es obligatorio.",
				minlength: "Ingrese al menos ({0}) carácteres."
			},
			'pax-phone':{
				required: "Este campo es obligatorio.",
				digits: "Sólo se permiten dígitos.",
				minlength: "Este campo debe contener exactamente ({0}) dígitos.",
				maxlength: "Este campo debe contener exactamente ({0}) dígitos."
			},
			'pax-cellphone':{
				required: "Este campo es obligatorio.",
				digits: "Sólo se permiten dígitos.",
				minlength: "Este campo debe contener exactamente ({0}) dígitos.",
				maxlength: "Este campo debe contener exactamente ({0}) dígitos."
			},
			'pax-mail':{
				required: "Este campo es obligatorio.",
				email: "Ingrese un mail válido"
			},
			'pax-address':{
				required: "Este campo es obligatorio.",
				minlength: "Ingrese al menos ({0}) carácteres."
			},
			'pax-emergencyphone':{
				required: "Este campo es obligatorio.",
				digits: "Sólo se permiten dígitos.",
				minlength: "Este campo debe contener exactamente ({0}) dígitos.",
				maxlength: "Este campo debe contener exactamente ({0}) dígitos."
			}
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