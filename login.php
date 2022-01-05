<?php
session_start();

if(isset($_SESSION['user'])){

    header("Location: index.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login Form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <br>
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <div id="message"></div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="remember_me" class="text-info"><span>Remember me</span> <span><input type="checkbox" value="remember-me" id="remember_me"></span></label><br>
                                <input type="submit" id="login_btn" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="register.php" class="text-info">Register here</a>
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
	
	$(document).on('click','#login_btn',function(e){
		
		e.preventDefault();
			
		var username = $('#username').val();
		var password = $('#password').val();
			
			
		if(username == ''){
			alert('please enter username !!'); 
		}
		else if(!/^[a-z A-Z]+$/.test(username)){
			alert('username only capital and small letters are allowed !!'); 
		}
		else if(password == ''){
			alert('please enter password !!'); 
		}
		else if(password.length < 6){
			alert('password must be 6 !!');
		} 
		else{			
			$.ajax({
				url: 'login_process.php',
				type: 'post',
				data: 
					{username:username,password:password
					},
				success: function(response){
					$('#message').html(response);
                    window.setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 3000);
				}
			});
			
		}
	});

</script>
<script>
    $(function() {

        if (localStorage.chkbx && localStorage.chkbx != '') {
            $('#remember_me').attr('checked', 'checked');
            $('#username').val(localStorage.usrname);
            $('#password').val(localStorage.pass);
        } else {
            $('#remember_me').removeAttr('checked');
            $('#username').val('');
            $('#password').val('');
        }

        $('#remember_me').click(function() {

            if ($('#remember_me').is(':checked')) {
                localStorage.usrname = $('#username').val();
                localStorage.pass = $('#password').val();
                localStorage.chkbx = $('#remember_me').val();
            } else {
                localStorage.usrname = '';
                localStorage.pass = '';
                localStorage.chkbx = '';
            }
        });
    });

</script>
</body>
</html>