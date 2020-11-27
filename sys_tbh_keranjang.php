<?php

	include_once("function/koneksi.php");

	session_start();
	
	$id_barang = $_GET['id_barang'];
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;	
	
	$query = mysqli_query($koneksi, "SELECT nama_barang, gambar_barang, harga_barang FROM barang WHERE id_barang='$id_barang'");
	$row=mysqli_fetch_assoc($query);
	
	$keranjang[$id_barang] = array("nama_barang" => $row["nama_barang"],
								   "gambar_barang" => $row["gambar_barang"],
								   "harga_barang" => $row["harga_barang"],
								   "quantity" => 1);
								   
	$_SESSION["keranjang"] = $keranjang;
	
	header("location:store.php");