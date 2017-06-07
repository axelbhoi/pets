$(document).ready(function(){

	$('#submit-btn').on('click',function(e){
		e.preventDefault();

		if($('#username').val() != "" && $('#user_password').val() != ""){
			$('#login-form').submit();
		}
		else{
				if($('#username').val() == "" && $('#user_password').val() != "")
				{
					
					$('#username').css('background-color','#f2dede');
					$('#username').css('color','#a94442');
					$('#username').css('border-color','#ebccd1');	
				}

				else if($('#user_password').val() == "" && $('#username').val() != "")
				{
					
					$('#user_password').css('background-color','#f2dede');
					$('#user_password').css('color','#a94442');
					$('#user_password').css('border-color','#ebccd1');
				}

				else
				{	
					$('#username').css('background-color','#f2dede');
					$('#username').css('color','#a94442');
					$('#username').css('border-color','#ebccd1');					
					$('#user_password').css('background-color','#f2dede');
					$('#user_password').css('color','#a94442');
					$('#user_password').css('border-color','#ebccd1');
				}
		}		
	});

	$('#username').on('focus',function(){
		$('#username').css('background-color','#FFF');
		$('#username').css('color','#333');
		$('#username').css('border-color','');
	});

	$('#user_password').on('focus',function(){
		$('#user_password').css('background-color','#FFF');
		$('#user_password').css('color','#333');
		$('#user_password').css('border-color','');		
	});

});