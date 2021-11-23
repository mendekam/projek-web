<?php 
	session_start();
	include 'koneksi.php';
	$produk = query("SELECT * FROM product");

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
	<title>Toko Elji</title>
	<style>
		body{
			animation: color 5s linear 0s infinite alternate running;
		}
		h2{
			font-family: 'Secular One', sans-serif;
		}
		h1{
			font-family: 'Secular One', sans-serif;
		}
		label{
			font-family: 'Secular One', sans-serif;
		}
	</style>
</head>

<body>
	<?php include('navbar.php')?>
	<header class="bg-secondary py-5">
		<div class="container mx-auto my-5">
			<div class="text-center text-white">
				<h1 class="display-4 fw-bolder">E L J I</h1>
				<p class="lead fw-normal text-white-50 mb-0">Your tech shop</p>
			</div>
		</div>
	</header>

	<section class="py-5">
		<div class="container px-4 px-lg-5 mt-5">
			<h1>List Produk</h1>
			<!-- menampilkan isi dari database ke dalam bentuk card -->
			<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

			<?php for ($i=0; $i < count($produk) ; $i++) : ?>				
				<div class="col-md mb-5">
          			<div class="card h-100" >
            			<img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="Card image cap">
            			<div class="card-body p-4">
            				<div class="text-center">
            					<h4><?php echo($produk[$i]['name']); ?> </h4>
	             				<p class="card-text"><?php echo($produk[$i]['description']);  ?> </p>
	             				<p class="card-text">Harga : <?php echo($produk[$i]['price']);  ?> </p>
            				</div>
            			</div>
            			<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                        </div>
          			</div>
        		</div>
			<?php endfor;  ?>

			</div>
		</div>
	</section>

	<footer class="py-5 bg-secondary">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Praktikum Web 2021</p></div>
    </footer>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="script.js"></script>
	</body>
</html>