$(document).ready(function(){
	$('#edit_address').hide();
	$('#edit_personal').hide();

	$('#edit_01').click(function(){
		$('.show_address').hide();
		$('#edit_address').show();
		$('#back').attr('disabled','disabled');
		$('#forward').attr('disabled','disabled');
		//alert('click edit 01');
	});
	

	$('#edit_02').click(function(){
		$('.show_personal').hide();
		$('#edit_personal').show();
		$('#back').attr('disabled','disabled');
		$('#forward').attr('disabled','disabled');

	});


	/*
	$('#edit_01').dblclick(function(){
		$('.show_address').show();
		$('#edit_address').hide();
		//alert('click edit 01');
	});
*/

	$('#edit_address').bootstrapValidator({
		feedbackIcons: {
        	valid: 'glyphicon glyphicon-ok',
        	invalid: 'glyphicon glyphicon-remove',
        	validating: 'glyphicon glyphicon-refresh'
    	},
    	fields: {
    		address: {
    			validators:{
    				notEmpty: {
    					message: 'ที่อยู่'
    				}
    			}
    		},
    		province: {
    			validators:{
    				notEmpty: {
    					message: 'จังหวัด'
    				}
    			}
    		},
    		zipcode: {
    			validators:{
    				notEmpty: {
    					message: 'รหัสไปรษณีย์'
    				},
                    regexp: {
                        regexp: /^\d{5}$/,
                        message: 'โปรดกรอกเฉพาะตัวเลขเท่านั้น'
                    }
    			}
    		},
            homephone:{
                validators:{
                    regexp: {
                        regexp: /^(?:0[1-9][0-9]{7})$/,
                        message: 'โปรดกรอกเฉพาะตัวเลขเท่านั้น'
                    }
                }
            },
    		mobilephone: {
    			validators:{
    				notEmpty: {
    					message: 'เบอร์โทรศัพท์มือถือ'
    				},
                    regexp: {
                        regexp: /^(?:0[8-9][0-9]{8})$/,
                        message: 'เบอร์โทรศัพท์มือถือ'
                    }
    			} 
    		},
    		email: {
    			validators:{
    				notEmpty: {
    					message: 'E-mail'
    				},
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    }
    			}
    		}
    	}

	}).on('success.form.bv',function(e){
		e.preventDefault();
		var $form = $(e.target);

		var bv = $form.data('bootstrapValidator');
		var url = $form.attr('action');
		var data = $form.serialize();

		$.post(url, data, function(result){
			//alert(result.homephone);
			$('#edit_address').hide();
			$('.show_address').empty();
			$('.show_address').append('<p><i class="fa fa-home fa-lg"></i>' + result.address +'</p>');
			$('.show_address').append('<p><i class="fa fa-phone fa-lg"></i>' + result.homephone +'</p>');
			$('.show_address').append('<p><i class="fa fa-mobile fa-lg"></i>' + result.mobilephone +'</p>');
			
			$('.show_address').append('<p><i class="fa fa-envelope-o fa-lg"></i>' + result.email +
									'<i class="fa fa-facebook-square fa-lg"></i>'+ result.facebook+'</p>');
			//alert(result.homephone);
			$('.show_address').append('<p><i class="fa fa-twitter-square fa-lg"></i>' + result.twitter +
									'Line:' + result.line + '</p>');
			$('.show_address').show();

			$('#back').removeAttr('disabled');
			$('#forward').removeAttr('disabled');
			
		},'json');

		return false;
	});


	$('#edit_personal').submit(function(){
		var url = $(this).attr('action');
		var data = $(this).serialize();

		$.post(url, data, function(o){
			//alert(o.homephone);
			$('#edit_personal').hide();
			$('.show_personal').empty();
			$('.show_personal').append('<p> <b>คติพจน์: </b> '+ o.motto +'</p>');
			$('.show_personal').append('<p>	<b>อาหารที่แพ้: </b> ' + o.food + '</p>');
			$('.show_personal').append('<p> <b>ยาที่แพ้: </b> ' +  o.drug +'</p>');
			$('.show_personal').show();
			$('#back').removeAttr('disabled');
			$('#forward').removeAttr('disabled');
			
		},'json');

		return false;
	});
});

	