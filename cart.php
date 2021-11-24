<?php
    session_start();
    include 'koneksi.php';

    if (!isset($_SESSION["login"])) {
    	session_destroy();
		session_unset();
    	header("location: login.php");
    }

    if(isset($_SESSION["hapus"])){
		unset($_SESSION["shopping_cart"]);
		unset($_SESSION["hapus"]);
		header("location: login.php");
	}

    if(isset($_POST["add_to_cart"]))
	{
		if ($_POST["hidden_stock"] == 0) {
			echo '<script>alert("Stock Habis")</script>';
			echo '<script>window.location="index.php"</script>';
			die();
		}
		if(isset($_SESSION["shopping_cart"])){
			$item_array_id = array_column($_SESSION["shopping_cart"], "produk_id");
			if(!in_array($_POST["id"], $item_array_id))
			{
				$count = count($_SESSION["shopping_cart"]);
				$item_array = array(
					'produk_id'			=>	$_POST["id"],
					'produk_name'		=>	$_POST["hidden_name"],
					'produk_price'		=>	$_POST["hidden_price"],
					'produk_quantity'	=>	$_POST["quantity"]
				);
				$_SESSION["shopping_cart"][$count] = $item_array;
			}
			else
			{
				echo '<script>alert("Produk sudah ditambahkan")</script>';
			}
		}
		else
		{
			$item_array = array(
				'produk_id'			=>	$_POST["id"],
				'produk_name'		=>	$_POST["hidden_name"],
				'produk_price'		=>	$_POST["hidden_price"],
				'produk_quantity'	=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][0] = $item_array;
		}
	}
	if(isset($_GET["action"]))
	{
		if($_GET["action"] == "delete")
		{
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				if($values["produk_id"] == $_GET["id"])
				{
					unset($_SESSION["shopping_cart"][$keys]);
					echo '<script>alert("Produk dihapus")</script>';
					echo '<script>window.location="cart.php"</script>';
				}
			}
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
			<h1>Cart</h1>
			<!-- menampilkan isi dari database ke dalam bentuk card -->
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Nama Produk</th>
						<th width="10%">Jumlah</th>
						<th width="20%">Harga</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"])){
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values){
					?>
					<tr>
						<td><?php echo $values["produk_name"]; ?></td>
						<td><?php echo $values["produk_quantity"]; ?></td>
						<td>Rp. <?php echo number_format($values["produk_price"], 2); ?></td>
						<td>Rp. <?php echo number_format($values["produk_quantity"] * $values["produk_price"], 2);?></td>
						<td><a href="cart.php?action=delete&id=<?php echo $values["produk_id"]; ?>"><span class="text-danger">Hapus</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["produk_quantity"] * $values["produk_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="left" style="font-weight: bold;">Total</td>
						<td align="left" style="font-weight: bold;">Rp. <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
				</table>
			</div>
            <div class="py-3">
				<form action="transaksi.php" method="post">
					<input type="hidden" name="hidden_total" value="<?php echo $total; ?>">
					<button class="btn btn-success float-end"style="width: 15%;">Check out</button>
				</form>
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