<?php
require 'functions.php';

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

$result =  mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

// cek username
if(mysqli_num_rows($result) === 1){
    // cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["passwords"])){
        header("Location: admin/index.php");
        exit;
    }
}

$error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Login</title>
		<link rel="stylesheet" href="styles.css" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap"
			rel="stylesheet"
		/>
	</head>
	<body>
		<img class="wave" src="media/wave-haikei (4).svg" />
		<div class="container">
			<div class="img">
				<img class="teacher" src="media/teacher.svg" />
			</div>
			<div class="login-container">
				<form action="" method="post">
					<h1>Login</h1>
					<?php if(isset($error)):?>
						<p style="color:red;">username / password salah</p>
					<?php endif;?>	
					<img class="avatar" src="img/female.svg" />
					<div class="txt_field">
						<input type="text" name="username" id="username" required>
						<span></span>
						<label for="username">Username</label>
					</div>
					<div class="txt_field">
						<input type="password" name="password" id="password" required>
						<span></span>
						<label for="password">Password</label>
					</div>
					<input type="submit" name="login" class="btn" value="Login" />
				</form>
			</div>
		</div>
		<script type="text/javascript" src="main.js"></script>
	</body>
</html>
