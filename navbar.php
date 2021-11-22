<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
	<h2><a class="navbar-brand" href="#">E L J I</a></h2>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-item nav-link active" href="index.php">Home<span class="sr-only">(current)</span></a>
			<?php if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin"):?>
			<a class="nav-item nav-link" href="input_produk.php">Tambah produk<span class="sr-only">(current)</span></a>
			<?php endif; ?>
		</div>
		<div class="navbar-nav ml-auto">
			<a class="nav-item nav-link " href="cart.php"><img src="./img/cart.png" width="25px" height="25px"alt=""></a>
			<?php if(isset($_SESSION["login"])): ?>
				<a class="nav-item nav-link " href="logout.php">Logout</a>
			<?php else : ?>
				<a class="nav-item nav-link " href="login.php">Login</a>
			<?php endif; ?>
		</div>
	</div>
</nav>