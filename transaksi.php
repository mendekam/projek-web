<?php
    session_start();
    date_default_timezone_set('Asia/Jakarta');
	$waktu = date('Y-m-d H:i:s');
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
	<section class="py-5">
		<div class="container px-4 px-lg-5 mt-5">
			<h1>Transaksi</h1>
            <h3>Informasi Pembayaran</h3>
            <p>Kode Pembayaran : <?php echo uniqid();?></p>
            <p>Total Harga : Rp.<?php echo number_format($_POST["hidden_total"], 2);?></p>
            <p>Tanggal Pembelian : <?php echo $waktu;?></p>
            <p>Nomor Rekening : xxxxxxxx</p>
            <div class="py-3">
                <form action="cart.php" method="post">
                    <button type="submit" class="btn btn-success" name="transaksi" style="width: 15%;">Kembali Ke Halaman Utama</button>
                </form>
            </div>
			
		</div>
	</section>

	<footer class="py-5 bg-secondary fixed-bottom">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Praktikum Web 2021</p></div>
    </footer>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="script.js"></script>
	</body>
</html>