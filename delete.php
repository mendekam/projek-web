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
	
	if( hapus($id) > 0 ){
		echo("
				<script>
					alert('data berhasil dihapus !');
					document.location.href = 'index.php';
				</script>
			");
	}else{
		echo("
			<script>
				alert('data gagal dihapus !');
				document.location.href = 'index.php';
			</script>
		");
	}
 ?>