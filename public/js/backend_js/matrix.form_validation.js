


$(document).ready(function(){



	$("#current_pwd").keyup(function(){
	var current_pwd = $("#current_pwd").val();
	
	
	
	$.ajax({
	type:'get',
	url:'/admin/check-pwd',
	data:{current_pwd:current_pwd},
	success:function(resp)
	{
		//alert(resp);
		if(resp=="false")
		{
				$("#pwdChk").html("<font color='red'> Current Password is Incorrect </font>")
		}
		else if(resp=="true")
		{
			$("#pwdChk").html("<font color='green'> Current Password is correct </font>")
		}
	}, 
	error:function()
	{
		//alert('Error')
	}
	
	});
	});

	$("#confirm_pwd").keyup(function(){
		var confirm_pwd = $("#confirm_pwd").val();
		
		if(confirm_pwd=="")
		{
			$('.btn-success').prop('disabled', true);
		} else {
			//If there is text in the input, then enable the button
			$('.btn-success').prop('disabled', false);
		}


	});
		
		$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
		
		$('select').select2();
		
		// Form Validation
		$("#basic_validate").validate({
			rules:{
				required:{
					required:true
				},
				email:{
					required:true,
					email: true
				},
				date:{
					required:true,
					date: true
				},
				url:{
					required:true,
					url: true
				}
			},
			errorClass: "help-inline",
			errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.control-group').addClass('error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error');
				$(element).parents('.control-group').addClass('success');
			}
		});
	
	
	
	
	
	
	
		
		$("#number_validate").validate({
			rules:{
				min:{
					required: true,
					min:10
				},
				max:{
					required:true,
					max:24
				},
				number:{
					required:true,
					number:true
				}
			},
			errorClass: "help-inline",
			errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.control-group').addClass('error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error');
				$(element).parents('.control-group').addClass('success');
			}
		});
		
		$("#password_validate").validate({
			rules:{
				current_pwd:{
					required: true,
					minlength:8,
					maxlength:20
				},
				new_pwd:{
					required: true,
					minlength:8,
					maxlength:20
				},
				bsub:{
					enabled:true
				},
				confirm_pwd:{
					required:true,
					minlength:8,
					maxlength:20,
					equalTo:"#new_pwd"
				}
			},
			errorClass: "help-inline",
			errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.control-group').addClass('error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error');
				$(element).parents('.control-group').addClass('success');
			}
		});


		// Add License Validation

		$("#add_license").validate({
			rules:{
				license_name:{
					required:true,
				}
			},
			errorClass: "help-inline",
			errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.control-group').addClass('error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error');
				$(element).parents('.control-group').addClass('success');
			}
		});


	
		
		$("#save_btn").click(function(){

			var select_val = $("#license_type").val();

			var licence_val_date = $("#licence_val_date").val();


			if(select_val=='0')
			{
				$("#selectchk").html("<font color='#b94a48'> This field is required </font>");
				$("#lic_lable").css({
					'color' : '#b94a48'
				});
				$("#s2id_license_type").css({					
					'border' : '1px solid #b94a48'
				});
			}

			
		});

		$("#license_type").change(function(){

			$("#selectchk").html("<font color='#b94a48'></font>")
			$("#lic_lable").css({
				'color' : '#468847'
			});
			$("#s2id_license_type").css({					
				'border' : '1px solid #468847'
			});

		});





		
// Add issued License Validation
$("#add_issued_license").validate({

	rules:{
		license_number:{
			required:true,
			number:true,
			
		},
		travel_agent:{
			required:true,
		},
		father_name:{
			required:true,
		},
		office_name:{
			required:true,
			
		},
		office_address:{
			required:true,
		},

		contact:{
			required:true,
  			minlength:10,
  			maxlength:10,
  			number: true
		},

		licence_val_date:{
			required : true
		}
		
	},



	errorClass: "help-inline",
	errorElement: "span",
	highlight:function(element, errorClass, validClass) {
		$(element).parents('.control-group').addClass('error');
	},
	unhighlight: function(element, errorClass, validClass) {
		$(element).parents('.control-group').removeClass('error');
		$(element).parents('.control-group').addClass('success');
	}
});






	
		// $('input[type="submit"]').prop("disabled", true);
		// var a=0;
		// //binds to onchange event of your input field
		// $('#picture').bind('change', function() {
		// if ($('input:submit').attr('disabled',false)){
		// 	$('input:submit').attr('disabled',true);
		// 	}
		// var ext = $('#picture').val().split('.').pop().toLowerCase();
		// if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
		// 	$('#error1').slideDown("slow");
		// 	$('#error2').slideUp("slow");
		// 	a=0;
		// 	}else{
		// 	var picsize = (this.files[0].size);
		// 	if (picsize > 1000000){
		// 	$('#error2').slideDown("slow");
		// 	a=0;
		// 	}else{
		// 	a=1;
		// 	$('#error2').slideUp("slow");
		// 	}
		// 	$('#error1').slideUp("slow");
		// 	if (a==1){
		// 		$('input:submit').attr('disabled',false);
		// 		}
		// }
		// });
	













	
	});
	