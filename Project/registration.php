<?php
require 'functions.php';
if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
            alert('User berhasil ditambahkan!');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Registrasi</title>
		<link rel="stylesheet" href="registration.css" />
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap"
			rel="stylesheet"
		/>
	</head>
	<body>
		<div class="center">
			<h1>Register</h1>
			<form action="" method="post">
				<div class="txt_field">
					<input type="text" name="username" id="username" placeholder="Username" />
					<span></span>
					<label></label>
				</div>
				<div class="txt_field">
					<input type="email" name="email" id="email" placeholder="Email" />
					<span></span>
					<label></label>
				</div>
				<div class="txt_field">
					<input type="password" name="password" id="password" placeholder="Password" />
					<span></span>
					<label></label>
				</div>
				<div class="txt_field">
					<input type="password" name="password2" id="password2" placeholder="Konfirmasi Password"/>
					<span></span>
					<label></label>
				</div>
				<button type="submit" name="register">Register</button>
				<div class="link">
					<p>Sudah punya akun? <a href="login.php">Login</a></p>
				</div>
			</form>
		</div>
	</body>
</html>