<?php

	include_once("function/koneksi.php");	
	
	$nama_barang = $_POST['nama_barang'];
	$id_kategori = $_POST['id_kategori'];
	$detail_barang = $_POST['detail_barang'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	$harga_barang = $_POST['harga_barang'];
	$stok_barang = $_POST['stok_barang'];
	$update_gambar = "";
	
	if(!empty($_FILES["file"]["name"])){
		$nama_file = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"], "img/barang/".$nama_file);

		$update_gambar = ", gambar='$nama_file'";
	}
	
	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO barang (nama_barang, id_kategori, detail_barang, gambar_barang, harga_barang, stok_barang, status) 
											VALUES ('$nama_barang', '$id_kategori', '$detail_barang', '$nama_file', '$harga_barang', '$stok_barang', '$status')");
	}
	else if($button == "Update"){
		$barang_id = $_GET['barang_id'];
		
		mysqli_query($koneksi, "UPDATE barang SET id_kategori='$id_kategori',
												  nama_barang='$nama_barang',
												  detail_barang='$detail_barang',
												  harga_barang='$harga_barang',
												  stok_barang='$stok_barang',
												  status='$status'
												  $update_gambar WHERE barang_id='$barang_id'");
	}
	
	header("location:dashboard.php?page=items");