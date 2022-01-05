<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Register Form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="register-form" style="padding:20px" class="form" action="" method="post">
                            <h3 class="text-center text-info">Register</h3>
                            <div class="form-group">
                                <div id="message"></div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" id="register_btn" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="login.php" class="text-info">Already have an account?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	
	$(document).on('click','#register_btn',function(e){
		
		e.preventDefault();
			
		var username = $('#username').val();
		var email 	 = $('#email').val();
		var password = $('#password').val();
			
		var atpos  = email.indexOf('@');
		var dotpos = email.lastIndexOf('.com');
			
		if(username == ''){
			alert('please enter username !!'); 
		}
		else if(!/^[a-z A-Z]+$/.test(username)){
			alert('username only capital and small letters are allowed !!'); 
		}
		else if(email == ''){
			alert('please enter email address !!'); 
		}
		else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){
			alert('please enter valid email address !!'); 
		}
		else if(password == ''){
			alert('please enter password !!'); 
		}
		else if(password.length < 6){
			alert('password must be 6 !!');
		} 
		else{			
			$.ajax({
				url: 'register_process.php',
				type: 'post',
				data: 
					{newusername:username, 
					 newemail:email, 
					 newpassword:password
					},
				success: function(response){
					$('#message').html(response);
                    
				}
			});
				
			// $('#register-form')[0].reset();
		}
	});

</script>
</body>
</html>