<?php 
	$koneksi = mysqli_connect("localhost" , "root", "" , "toko_elektronik");
	if (mysqli_connect_errno()) {
  	  	echo("Connect failed: %s\n" . mysqli_connect_error());
    	exit();
	}

	function query ($query){
		global $koneksi;
		$result = mysqli_query($koneksi , $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function registrasi($data){
		global $koneksi;
		$username = htmlspecialchars($data["username"]);
		$password = htmlspecialchars($data["password"]);
		$email = htmlspecialchars($data["email"]);
		
		// konfirmasi username
		$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
		if (mysqli_fetch_assoc($result)) {
			echo("
				<script>
					alert('username sudah digunakan')
				</script>
				");
			return false;
		}

		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		// memasukkan data ke database
		mysqli_query($koneksi , "INSERT INTO user VALUES('','$username','$password' , '$email')");

		//return value
		return mysqli_affected_rows($koneksi);

	} 





 ?>