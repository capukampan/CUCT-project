$(document).ready(function(){


	$('#fillname').bootstrapValidator({
		feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    	},
    	fields: { 
    		nname: {
    			validators:{
    				notEmpty: {
    					message: 'ชื่อเล่น'
    				}
    			}
    		},
    		bd_date: {
    			validators:{
    				between:{
                        min:1,
                        max:31,
                        message:'1-31'
                    }
    			}
    		},
            bd_month:{
                validators:{
                    between:{
                        min:1,
                        max:12,
                        message:'1-12'
                    }
                }
            },
            bd_year:{
                validators:{
                    between:{
                        min:2500,
                        max:2700
                    },callback:{
                        callback: function(value, validator, $field){
                            var day = validator.getFieldElements('bd_date').val(),
                                month = validator.getFieldElements('bd_month').val(),
                                year = validator.getFieldElements('bd_year').val()-543;

                            return $.fn.bootstrapValidator.helpers.date(year, month, day);
                        }
                    }
                }
            },
    		gender:{
    			validators:{
    				notEmpty: {
    					message: 'เพศ'
    				}
    			}
    		},
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
    		},
    		syear:{
    			validators:{
    				notEmpty: {
    					message: 'ปีการศึกษาที่เข้า'
    				}
    			}
    		},
    		faculty: {
    			validators:{
    				notEmpty: {
    					message: 'คณะ'
    				}
    			}
    		},
    		university: {
    			validators:{
    				notEmpty: {
    					message: 'มหาวิทยาลัย'
    				}
    			}
    		},
    		religion: {
    			validators:{
    				notEmpty: {
    					message: 'ศาสนา'
    				}
    			}
    		}



    	}
	})
    .find('input[name="gender"]')
        .iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        .on('ifChanged',function(e) {
            var field = $(this).attr('name');
            $('#fillname').bootstrapValidator('revalidateField', field);
        });

	
});