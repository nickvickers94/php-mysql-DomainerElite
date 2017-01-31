var submitForm = true;

var timerOn = redirectCheck = false;



$(document).ready(function() {

	$('form').submit(function() {

		submitForm = false;

	});

	setInterval("redirect()",2000);

	$('a[id!=quick_demo]').click(function() {

	  submitForm = false;

	});

});



window.onbeforeunload = function(e) {

	if(submitForm && !epc_disable){

		redirectCheck = true;

		submitForm = false;

		return epc_message_alert;

	}

}	



function redirect(){

	if(redirectCheck) {

		eval(epc_continue);

	}

}