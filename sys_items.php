<?php
	session_start();
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

		$update_gambar = "gambar_barang='$nama_file'";
	}
	
	if($button == "Add"){
		$run = mysqli_query($koneksi, "INSERT INTO barang (nama_barang, id_kategori, detail_barang, gambar_barang, harga_barang, stok_barang, status) VALUES ('$nama_barang', '$id_kategori', '$detail_barang', '$nama_file', '$harga_barang', '$stok_barang', '$status')");
		if($run){
			$_SESSION['status'] = "Items Added";
			$_SESSION['status_code'] = "success";
			header("location:dashboard.php?page=items&action=li");
		}
		else{
			$_SESSION['status'] = "Items NOT Added";
			$_SESSION['status_code'] = "error";
			header("location:dashboard.php?page=items&action=li");
		}
	}
	else if($button == "Update"){
		$id_barang = $_GET['id_barang'];
		
		$run = mysqli_query($koneksi, "UPDATE barang SET id_kategori='$id_kategori', nama_barang='$nama_barang', detail_barang='$detail_barang',harga_barang='$harga_barang', stok_barang='$stok_barang', status='$status', $update_gambar WHERE id_barang='$id_barang'");
		
		if($run){
			$_SESSION['status'] = "Items Updated";
			$_SESSION['status_code'] = "success";
			header("location:dashboard.php?page=items&action=li");
		}
		else{
			$_SESSION['status'] = "Items NOT Updated";
			$_SESSION['status_code'] = "error";
			header("location:dashboard.php?page=items&action=li");
		}
	}
	else if(isset($_GET['delete'])){
        $id_kategori = $_GET['delete'];

        $run = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id_barang'") or die(mysqli_error($koneksi)); 

		if($run){
			$_SESSION['delete'] = "Items Deleted";
			$_SESSION['status_code'] = "warning";
			header("location:dashboard.php?page=items&action=li");
		}
		else{
			$_SESSION['status'] = "Items NOT Deleted";
			$_SESSION['status_code'] = "error";
			header("location:dashboard.php?page=items&action=li");
		}
	}