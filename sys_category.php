<?php
    include("function/koneksi.php");
     
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];
    $button = $_POST['button'];
	
	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES('$kategori', '$status')");
	}
	else if($button == "Update"){
		$id_kategori = $_GET['id_kategori'];
		
		mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori',
													status='$status' WHERE id_kategori='$id_kategori'");
	}
	
	header("location:dashboard.php?page=category");