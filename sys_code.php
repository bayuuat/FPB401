<?php

	include_once("function/koneksi.php");
	
	$email = $_POST['email'];
	$kode = $_POST['kode'];
	
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND kode='$kode' AND status='on'");
	
	if(mysqli_num_rows($query) == 0){
		header("location:formcode.php?notif=true");
	}else{
	
		$row = mysqli_fetch_assoc($query);
		
		session_start();
		
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['level'] = $row['level'];
		
		header("location:dashboard.php");
	}