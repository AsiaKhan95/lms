<?php
session_start();
$err ='';
if ( isset( $_SESSION[ 'redirect' ] ) ) {
	header( 'Location:wellcome.php' );
} 
else {
	if ( isset( $_GET[ 'msg' ] ) ) {
		echo $_GET[ 'msg' ];
	}

	extract( $_GET );
	if ( isset( $submit ) ) {
		if ( $user == "admin" && $password == "123" ) {
			$_SESSION[ 'Loginstatus' ] = true;
			$_SESSION[ 'Username' ] = $user;
			header( 'Location:wellcome.php' );
		}
		if ( $user != "admin" || $password != "123" ) {
			$err ="Invalid Username or Password";
			
		}
	}


}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="form-signin">
		<form method="get">
			<h2>Please Sign in</h2>
			<label>
				<p><?php echo $err; ?></p>
			</label>
			<input type="text" name="user" placeholder="Enter Username" required autofocus><br/>
			<input type="password" name="password" placeholder="Password" required><br/></br/>
			<input type="submit" name="submit" value="Login"><br>
		</form>
	</div>

</body>

</html>