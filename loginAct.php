<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'database.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['kategoriUser']=="Admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $nama;
		$_SESSION['kategoriUser'] = "Admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/dashboard.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['kategoriUser']=="Muzaki"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $nama;
		$_SESSION['kategoriUser'] = "Muzaki";
		// alihkan ke halaman dashboard pegawai
		header("location:muzaki/dashboard.php");
 
	// cek jika user login sebagai pengurus
	}else if($data['kategoriUser']=="Mustahik"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $nama;
		$_SESSION['kategoriuser'] = "Mustahik";
		// alihkan ke halaman dashboard pengurus
		header("location:mustahik/dashboard.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php");
	}	
}else{
	header("location:index.php");
}
 
?>