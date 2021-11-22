<?php 
	include "koneksi.php";
	session_start();

	if (isset($_SESSION["login"])) {
		header("location: index.php");
	}

	if (isset($_POST["submit"])) {
		// mengecek apakah registrasi berhasil atau tidak
		if (registrasi($_POST) > 0) {
			echo("asd
				<script>
					alert('Registrasi telah berhasil');
				</script>
				");
			echo("<script> alert('regis bisa'); </script>");
			header("location: login.php");
		}
		else{
			echo mysqli_error($koneksi); 
		}
	}

 ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">		
	<title>Login</title>
	<style>
		body{
			animation: color 5s linear 0s infinite alternate running;
		}
		h1{
			font-family: 'Secular One', sans-serif;
			font-size: 50px;
			text-align: center; 
		}
		#lupa{
			display: inline-block;
			margin-left: 120px;
			margin-bottom: 12px;
			color: black;
		}
		a{
			color: #000;
		}
		label{
			font-family: 'Secular One', sans-serif;
		}
	</style>
</head>
<body>
	<div class="card mx-auto bg-light" style="width: 24rem; margin-top: 100px;">
		<div class="card-body">
			<h1>Registrasi</h1>
			<form method="post">
				<div class="form-group">
		    		<label for="email">Email Address</label>
		    		<input type="text" class="form-control" name="email" id="email" placeholder="email adress" autocomplete="off" required="">
		  		</div>
		  		<div class="form-group">
		    		<label for="username">Username</label>
		    		<input type="text" class="form-control" name="username" id="username" placeholder="username" autocomplete="off" required="">
		  		</div>
		  		<div class="form-group">
		    		<label for="password">Password</label>
		    		<input type="password" class="form-control" name="password" id="password" placeholder="password" required="">
		 		 </div>
		  		<button type="submit" class="btn btn-dark" name="submit" style="width: 100%;">Submit</button>
			</form>
			<a id="lupa" href="login.php">Lupa Password?</a>
			<p>Sudah punya akun? 
				<span class="badge badge-info">
					<a href="login.php">Login</a>
				</span>
			</p>
			
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>
