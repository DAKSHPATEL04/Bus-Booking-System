

<?php


include('./admin/config/dbcon.php');
if(isset($_SESSION['auth']))
{
	$_SESSION['status']= "You Are Logged In";
	header('Location: user.php');
	exit(0);
}
?>




<html>
	<head>
	<link rel="stylesheet" href="sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="login.css">
<script language="javascript" type="text/javascript" src="f.js"></script>
<title>Get Started</title>
</head>
<body >

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="logincode.php" method="POST" enctype="multipart/form-data">
			<h1>Create Account</h1>	
		
			
			<input type="text" name="name" placeholder="Name" minlength="3" maxlength="12" required/>
			<input type="Username"  name="username" placeholder="Username" minlength="3" maxlength="12" required/>
			<input type="password"  name="password" placeholder="Password"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number min char6." required/>
			<input type="password"  name="confirmpassword" placeholder=" Confrim Password"   pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number min char6." required/>
			<input type="file"  name="uploadfile" placeholder="" / required>
			<button name="adduser">Sign Up</button>
		</form>
	</div>
	<?php 
            if(isset($_SESSION['auth_status']))
            {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?php echo $_SESSION['auth_status']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset($_SESSION['auth_status']);
            }
            ?>
	<div class="form-container sign-in-container">
	
		<form action="logincode.php" method="post">
	

			<h1>Sign in</h1>
		
			<div class="social-container">
				<a href="https://www.facebook.com/login/" class="social"><i class="fab fa-facebook-f" style='color:blue'></i></a>
				<a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&flowEntry=ServiceLogin" style='color:red' class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="https://www.linkedin.com/login" class="social"><i class="fab fa-linkedin" style='color:#11acee'></i></a>
			</div>
			
			<span>or use your account</span>
			<input type="text" name="username" placeholder="Username" required/>
			<input type="password" name="password" placeholder="Password" required/>
			<a href="forget.php">Forgot your password?</a>
			<button name="login_btn">Sign In</button>
			<a href="index.php">Back</a>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</body>
</html>	

<script src="login.js"></script>
<script>
	 $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
</script>