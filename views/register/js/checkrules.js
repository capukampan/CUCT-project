$(document).ready(function(){
	var show = $('.rule-warning');

	$('#radio-rules').bootstrapValidator({
        container: '#messages',
		feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    	},
    	fields: { 
    		rule_1: {
    			validators:{
    				notEmpty: {
    					message: 'โปรดตอบข้อตกลงในข้อ 1'
    				}
    			}
    		},
            rule_2: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 2'
                    }
                }
            },
            rule_3: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 3'
                    }
                }
            },
            rule_4: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 4'
                    }
                }
            },
            rule_5: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 5'
                    }
                }
            },
            rule_6: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 6'
                    }
                }
            },
            rule_7: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 7'
                    }
                }
            },
            rule_8: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 8'
                    }
                }
            },
            rule_9: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 9'
                    }
                }
            },rule_10: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 10'
                    }
                }
            },
            rule_11: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 11'
                    }
                }
            },
            rule_12: {
                validators:{
                    notEmpty: {
                        message: 'โปรดตอบข้อตกลงในข้อ 12'
                    }
                }
            }   
    	}
	}).find('input')
        .iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        .on('ifChanged',function(e) {
            var field = $(this).attr('name');
            $('#radio-rules').bootstrapValidator('revalidateField', field);
        });
   

    
    /*
	.on('success.form.bv', function(e) {
            // Reset the message element when the form is valid
            show.html('');
    })
	.on('error.field.bv', function(e, data) {

		show.remove();
		var message = data.bv.getMessages(data.element);
		//alert();
		show.html(message);

        data.element
            .data('bv.messages')
            .find('.help-block[data-bv-for="' + data.field + '"]')
            .hide();
		
	});
*/
});