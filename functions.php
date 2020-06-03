<?php 
$conn = mysqli_connect("localhost","root","","rri");

function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}
	return $rows;
}

// awal upload data audio
	function tambah($data){
	global $conn;

	$nama_perekam = htmlspecialchars($data["nama"]);
	$nama_rekaman = htmlspecialchars($data["rekaman"]);
	$jenis = htmlspecialchars($data["jenis"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	$tanggal = date("y-m-d");
	//upload suara
	$suara = upload();
	if(!$suara){
		return false;
	}

	$query = "INSERT INTO data_inputan VALUES ('', '$nama_perekam', '$nama_rekaman', '$jenis', '$keterangan', '$suara', '$tanggal')";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

	function upload(){

		$namaFile = $_FILES["suara"]["name"];
		$ukuranFile = $_FILES["suara"]["size"];
		$error = $_FILES["suara"]["error"];
		$tmpName = $_FILES["suara"]["tmp_name"];

		//cek apakah tidak ada suara di upload
		if( $error === 4){
			echo "<script>
				alert('pilih suara terlebih dahulu!')
				</script>";
			return false; 
		}

		// cek apakah yang diupload adalah suara
		$ekstensisuaraValid = ['mp3', 'mpeg'];
		$ekstensisuara = explode('.', $namaFile);
		$ekstensisuara = strtolower(end($ekstensisuara));
		if( !in_array($ekstensisuara, $ekstensisuaraValid)){
			echo "<script>
				alert('yang di upload bukan suara!')
				</script>";
				return false;
		}

		// cek jika ukuran yang di upload terlalu besar
		if( $ukuranFile > 50000000 ){
				echo "<script>
				alert('ukuran suara terlalu besar!')
				</script>";
				return false;
		}

		// lolos pengecekkan, suara siap di upload
		// generate nama suara
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensisuara;
		
		move_uploaded_file($tmpName, 'suara/' . $namaFileBaru);

		return $namaFileBaru; 
}
// akhir upload data akhir

// awal hapus data inputan
function hapus($id){
	global $conn;
	$sql = mysqli_query($conn, "SELECT * FROM data_inputan WHERE id=$id");
	foreach ( $sql as $key ) {
		echo $key['suara'];
		unlink("suara/".$key['suara']);
	}
	mysqli_query($conn, "DELETE FROM data_inputan WHERE id=$id");

	return mysqli_affected_rows($conn);
}
// akhir hapus data inputan

// awal ubah data inputan
function ubah($data){
	global $conn;
	$id = $data['id'];
	$nama_perekam = htmlspecialchars($data["nama"]);
	$nama_rekaman = htmlspecialchars($data["rekaman"]);
	$jenis = htmlspecialchars($data["jenis"]);
	$suara_lama = htmlspecialchars($data["suara_lama"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	$tanggal = date("y-m-d");

	// cek apakah user memilih gambar baru at tidak
	if ($_FILES['suara']['error'] === 4){
		$suara = $suara_lama;
	}else{
		$suara = upload();
	}

	$query = "UPDATE data_inputan SET
			nama_perekam = '$nama_perekam',
			nama_rekaman = '$nama_rekaman',
			jenis_rekaman = '$jenis',
			keterangan = '$keterangan',
			suara = '$suara',
			tanggal = '$tanggal'
					WHERE
			id = '$id'";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}
// akhir ubah data inputan

// awal registrasi
function registrasi($data){
	global $conn;
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password1 = mysqli_real_escape_string($conn,$data["password1"]);
	
			//cek username sdh ada at belum
	$result = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar!');
			</script>";
			return false;
	}

		// cek konfimasi password
	if($password !== $password1) {
			echo "
			<script>
				alert('konfimasi password tidak sesuai!');
			</script>";
			return false;
	}

		// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT); 

		// tambahkan username baru ke database
	mysqli_query($conn, "INSERT INTO login VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);
}
// akhir registrasi

 ?>
