$(function (){

	//$('head').append('<meta name="viewport" content="width=device-width, initial-scale=1" />');

	
	var $p = $("#camp-point");


	$p.slider({
		formater: function(value) {
		return 'Your current point: ' + value;
		}
	});

	
	$('input').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
              
        });

	
/*
	$p.on("sliderchange", function (e , result) {
		$alert.html("action: " + result.action + ", value: " + result.value);
		//$point.val(result.value);
	});

	$p.on("slidercomplete", function (e, result) {
        console.log('slider completed!');
    });
*/




	

});