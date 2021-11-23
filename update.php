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
	$id = $_GET["id"];
	$data = query("SELECT * FROM product WHERE id='$id'")[0];
	if( isset($_POST["submit"])){
		// mengecek apakah berhasil query atau tidak
		if ( ubah($_POST , $id) > 0) {
			echo("
				<script>
					alert('data berhasil diubah !');
					document.location.href = 'index.php';
				</script>
			");
		}else{
			echo("
				<script>
					alert('data gagal diubah !');
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
				<h1 class="display-4 fw-bolder">Input Produk</h1>
			</div>
		</div>
	</header>

	<section>
        <div class="container py-3 px-3">
            <form method="post" enctype="multipart/form-data">
            	<input type="hidden" name="imageLama" value="<?php echo($data["image_path"]) ?>">
            	<input type="hidden" name="descriptionLama" value="<?php echo($data["description"]) ?>">
                <div class="form-group mb-3">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="nama produk" required="" value="<?php echo($data["name"]) ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" name="description" id="description" placeholder="deskripsi produk" cols="20" rows="5"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="price">Harga</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="harga produk(rupiah)" required="" value="<?php echo($data["price"]) ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="stock">Stok</label>
                    <input type="text" class="form-control" name="stock" id="stock" placeholder="stok barang" required="" value="<?php echo($data["stock"]) ?>">
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="image">Choose File</label>
                </div>
                <div class="container">
                    <button type="submit" class="btn btn-dark" name="submit" style="width: 20%;">Submit</button>
                </div>
                
            </form>
        </div>
		
	</section>

	<footer class="py-5 bg-secondary">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Praktikum Web 2021</p></div>
    </footer>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="script.js"></script>
	</body>
</html>