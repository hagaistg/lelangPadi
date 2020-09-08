<?php
	session_start();
    include_once('listFungsi.php');
    $db = doConnect();
	$id_user = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama_depan = $_POST['nama_depan'];
	$nama_belakang = $_POST['nama_belakang'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$Jenis_kelamin= $_POST['Jenis_kelamin'];
	$no_telepon = $_POST['no_telepon'];
	$no_rekening = $_POST['no_rekening'];
	$query = "INSERT INTO user(id_user, username, password, nama_depan, nama_belakang, tgl_lahir, alamat, 
	email, Jenis_kelamin, foto, no_telepon, no_rekening) VALUES ('$id_user', '$username', '$password', '$nama_depan', $nama_belakang, '$tgl_lahir', '$alamat'
	'$email', '$Jenis_kelamin', '$no_telepon', '$no_rekening')";
	mysqli_query($db, $query); 
	header('Location: index.php');
?>