
$(document).ready(function () {
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
			},
			''
		},
		messages:{
			'pax-name': "Sólo se permiten letras",
			'pax-lastname': "Sólo se permiten letras",
			'pax-ci': "Las cédulas poseen 10 dígitos",
			'pax-emergencycontact': "Sólo se permiten letras"

		}
	});

});