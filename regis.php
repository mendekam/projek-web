<?php 
	
 ?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Document</title>
	<style>
		@font-face{
			font-family: 'brush-script-mt';
			src : url(font/BRUSHSCI.ttf) format('truetype');
		}
		h1{
			font-family: 'brush-script-mt', sans-serif;
			font-size: 50px;
			text-align: center; 
		}
		#lupa{
			display: inline-block;
			margin-left: 120px;
			margin-bottom: 12px;
			color: black;
		}
	</style>
	
</head>
<body>
	<div class="card mx-auto" style="width: 24rem; margin-top: 100px;">
		<div class="card-body">
			<h1>Registrasi</h1>
			<form>
				<div class="form-group">
		    		<label for="email">Email Address</label>
		    		<input type="text" class="form-control" id="email" placeholder="Email Adress" autocomplete="off">
		  		</div>
		  		<div class="form-group">
		    		<label for="username">Username</label>
		    		<input type="text" class="form-control" id="username" placeholder="username" autocomplete="off">
		  		</div>
		  		<div class="form-group">
		    		<label for="password">Password</label>
		    		<input type="password" class="form-control" id="password" placeholder="Password">
		 		 </div>
		 		 <i class="bi bi-eye-slash" id="togglePassword"></i>
		  		<button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
			</form>
			<a id="lupa" href="login.php">Lupa Password ?</a>
			<p>Sudah punya akun ? <a href="login.php">Login</a></p>
			
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>
