
<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
$sebagai = $_POST['sebagai'];

if($sebagai == "administrator"){

	$login = mysqli_query($koneksi, "SELECT * FROM user WHERE user_username='$username' AND user_password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['user_id'];
		$_SESSION['nama'] = $data['user_nama'];
		$_SESSION['username'] = $data['user_username'];
		$_SESSION['status'] = "administrator_logedin";
		header("location:admin/index.php?aksi=home");
	}else{
		header("location:index.php?alert=gagal");
	}

}
elseif($sebagai == "ukp"){
	$login = mysqli_query($koneksi, "SELECT * FROM ukp WHERE ukp_username='$username' AND ukp_password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['ukp_id'];
		$_SESSION['nama'] = $data['ukp_nama'];
		$_SESSION['username'] = $data['ukp_username'];
		$_SESSION['status'] = "ukp_logedin";
		header("location:ukp/index.php?aksi=home");
	}else{
		header("location:index.php?alert=gagal");
	}
	}
elseif($sebagai == "ukm"){
	$login = mysqli_query($koneksi, "SELECT * FROM ukm WHERE ukm_username='$username' AND ukm_password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['ukm_id'];
		$_SESSION['nama'] = $data['ukm_nama'];
		$_SESSION['username'] = $data['ukm_username'];
		$_SESSION['status'] = "ukm_logedin";
		header("location:ukm/index.php?aksi=home");
	}else{
		header("location:index.php?alert=gagal");
	}
}

elseif($sebagai == "pegawai"){
	$login = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username='$username' AND password='$password'");
	$cek = mysqli_num_rows($login);
	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['id_pegawai'];
		$_SESSION['nama'] = $data['nama_pegawai'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['status'] = "pegawai_logedin";
		header("location:pegawai/index.php?aksi=home");
	}else{
		header("location:index.php?alert=gagal");
	}
}
