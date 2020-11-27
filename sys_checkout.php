<?php

	include_once("function/koneksi.php");
	include_once("function/helper.php");
	
    session_start();
	
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$kode = $_POST["kode"];
	$level = "customer";
    $status = "on";

    $run_user = mysqli_query($koneksi, "INSERT INTO user (nama, email, kode, level, status)
                                                VALUES ('$nama', '$email', '$kode', '$level', '$status')");
    
    if($run_user){
		$id_user = mysqli_insert_id($koneksi);
	    $alamat = $_POST["alamat"];
        $kota = $_POST["kota"];
        $zipcode = $_POST["zipcode"];
        $phone = $_POST["phone"];    
        $note = $_POST["note"];    
        
        $run_pesanan = mysqli_query($koneksi, "INSERT INTO pesanan (id_user, alamat, kota, zipcode, phone, note, status)
                                                    VALUES ('$id_user', '$alamat', '$kota', '$zipcode', '$phone', '$note', '0')");
												
        if($run_pesanan){
            $last_pesanan_id = mysqli_insert_id($koneksi);
            
            $keranjang = $_SESSION['keranjang'];
            
            foreach($keranjang AS $key => $value){
                $id_barang = $key;
                $quantity = $value['quantity'];
                $harga = $value['harga_barang'];
                
                mysqli_query($koneksi, "INSERT INTO pesanan_det(id_pesanan, id_barang, quantity, harga)
                                                    VALUES ('$last_pesanan_id', '$id_barang', '$quantity', '$harga')");
            }
            
            unset($_SESSION["keranjang"]);
            unset($_SESSION["kode"]);
            unset($_SESSION['id_user']);
            unset($_SESSION['nama']);
            unset($_SESSION['level']);            
            header("location:store.php");
        }
    }