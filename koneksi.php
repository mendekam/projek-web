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
		$role = "user";
		
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
		mysqli_query($koneksi , "INSERT INTO user VALUES('','$username','$password' , '$email' , '$role')");

		//return value
		return mysqli_affected_rows($koneksi);

	}

	function tambah($data){
		global $koneksi;
		// Masukkan tiap elemen ke dalam file
		$name = htmlspecialchars($data["name"]);
		$desc = htmlspecialchars($data["description"]);
		$price = htmlspecialchars($data["price"]);
		$stock = htmlspecialchars($data["stock"]);
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$image_path = upload();
		if (!upload()){
			return false;
		}


		$query = "INSERT INTO product
					VALUES ('' , '$name' , '$desc' , '$price' , '$stock' , '$image_path' , '$waktu' , '$waktu')";
		mysqli_query($koneksi , $query);

		return mysqli_affected_rows($koneksi);
	}

	function upload(){
		$namaFile = $_FILES["image"]["name"];
		$ukuranFile = $_FILES["image"]["size"];
		$tmpFile = $_FILES["image"]["tmp_name"];
		$errorFile = $_FILES["image"]["error"];


		// jika gambar tidak diupload
		if ($errorFile == 4) {
			echo(
				"<script>
					alert('gambar tidak diupload, mohon untuk upload gambar');
				</script>
				"
			);
			return false;
		}

		// mengecek format file yang diupload
		$formatFileValid = ["jpg" , "jpeg" , "png"];
		$format = pathinfo($namaFile , PATHINFO_EXTENSION);
		if ( !in_array($format, $formatFileValid)) {
			echo(
				"<script>
					alert('extensi file yang diupload tidak cocok , pastika extensi file adalah jpg, jpeg, atau png')
				</script>
				"
			);
			return false;
		}

		// mengecek ukuran file besar atau kecil
		if ($ukuranFile > 1000000) {
			echo(
				"<script>
					alert('file yang diupload terlalu besar, maksimal ukuran file adalah 1 mb')
				</script>
				"
			);
			return false;
		}

		// jika lolos semua seleksi maka file siap diupload
		// mengubah nama dan tempat penyimpanan file
		// file akan disimpan di folder img/img-produk
		$namaFile = uniqid();
		$namaFile = $namaFile . '.' . $format;
		$image_path = 'img/img-produk/'. $namaFile;
		move_uploaded_file($tmpFile , $image_path); 
		
		return $image_path;
	}

	function ubah($data , $id){
		global $koneksi;
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$name = htmlspecialchars($data["name"]);
		$price = htmlspecialchars($data["price"]);
		$stock = htmlspecialchars($data["stock"]);
		$errorFile = $_FILES["image"]["error"];
		$imageLama = $data["imageLama"];
		

		// pengecekan apakah deskripsi kosong atau tidak
		if (htmlspecialchars($data["description"]) == '') {
			$desc = $data["descriptionLama"];
		}
		else{
			$desc = htmlspecialchars($data["description"]);
		}


		// pengecekan apakah upload gambar atau tidak
		if ($errorFile == 4) {
			$image_path = $data["imageLama"];
		}
		else{
			$image_path = upload();
		}
		
		$query = "UPDATE product SET 
					name = '$name' , 
					description = '$desc' ,
					price = '$price' ,
					stock = '$stock' ,
					image_path = '$image_path' ,
					updated_at = '$waktu'
					WHERE id = '$id'  ";

		mysqli_query($koneksi,$query);
		if (mysqli_error($koneksi)) {
			echo(mysqli_error($koneksi));
			die();
		}
		return mysqli_affected_rows($koneksi);			
	}

	function hapus($id){
		global $koneksi;
		//query data yang dihapus
		mysqli_query($koneksi , "DELETE FROM product WHERE id='$id' ");
		if (mysqli_error($koneksi)) {
			echo(mysqli_error($koneksi));
			die();
		}
		return mysqli_affected_rows($koneksi);
	}
	

 ?>