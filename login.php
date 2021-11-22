<?php 
	include "koneksi.php";
	session_start();
	
	if (isset($_SESSION["login"])) {
		header("location: index.php");
	}

	if(isset($_POST["submit"])){
		// mengambil inputan dari user
		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);
		// query untuk pencocokan antara inputan user dengan database
		$result = query("SELECT * FROM user WHERE username = '$username'");

		if (count($result) > 0) {
			$password2 = $result[0]["password"];
			if (password_verify($password, $password2)) {
				$_SESSION["login"] = true;
				header("location: index.php");
			}
			else{
				$error = true;
			}
		}
		else{
			$error = true;
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
			animation: color 10s linear 0s infinite alternate running;
		}
		h1{
			font-family: 'Secular One', sans-serif;
			font-size: 50px;
			text-align: center; 
		}
		@keyframes color { 
			0% { background-color: #f1c40f; } 
			32% { background-color: #e74c3c; } 
			55% { background-color: #9b59b6; } 
			76% { background-color: #16a085; } 
			100% { background-color: #2ecc71; } 
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
	<div class="card mx-auto bg-light" style="width: 23rem; margin-top: 120px;">
		<div class="card-body">
			<h1>Login</h1>
			<?php if (isset($error)): //pengecekan error username atau password?> 
				<p class="font-italic badge badge-danger">Username atau password salah!</p>	
			<?php endif; ?>
			<form method="post">
		  		<div class="form-group">
		    		<label for="username">Username</label>
		    		<input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="username" autocomplete="off">
		  		</div>
		  		<div class="form-group">
		    		<label for="password">Password</label>
		    		<input type="password" class="form-control" name="password" id="password" placeholder="password">
		 		 </div>
		  		<button type="submit" name="submit" class="btn btn-dark" style="width: 100%;">Submit</button>
			</form>
			<a id="lupa" href="lupa.php">Lupa Password?</a>
			<p>Belum punya akun? 
				<span class="badge badge-info">
					<a href="regis.php">Registrasi</a>
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
