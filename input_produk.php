<?php 
	session_start();
	// pengecekan session login dan role
	if (!isset($_SESSION["login"])) {
		header("location: index.php");
	}

	if ($_SESSION['role'] != 'admin') {
		header("location: index.php");
	}

	include 'koneksi.php';

	if (isset($_POST["submit"])) {

		// mengecek apakah berhasil query atau tidak
		if (tambah($_POST) > 0) {
			echo("
				<script>
					alert('data berhasil ditambahkan !');
					document.location.href = 'index.php';
				</script>
			");
		}else{
			echo("
				<script>
					alert('data gagal ditambahkan !');
					document.location.href = 'index.php';
				</script>
			");
		}		
	}


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
				<h1 class="display-4 fw-bolder">Input Produk</h1>
			</div>
		</div>
	</header>

	<section>
        <div class="container py-3 px-3">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="nama produk" required="">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" name="description" id="description" placeholder="deskripsi produk" cols="20" rows="5"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="price">Harga</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="harga produk(rupiah)" required="">
                </div>
                <div class="form-group mb-3">
                    <label for="stock">Stok</label>
                    <input type="text" class="form-control" name="stock" id="stock" placeholder="stok barang" required="">
                </div>
                <div class="mb-3">
					<label for="image" class="form-label">Gambar</label>
  					<input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark" name="submit" style="width: 20%;">Submit</button>
                </div>
                
            </form>
        </div>
		
	</section>

	<footer class="py-5 bg-secondary">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Praktikum Web 2021</p></div>
    </footer>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	
	</body>
</html>