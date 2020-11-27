<?php
	session_start();
    include("function/koneksi.php");
	
	$id_pesanan = $_GET['id_pesanan'];
    $button = $_POST['button'];
	
	if($button == "Konfirmasi Pembayaran"){
		$id_user = $_SESSION["id_user"];
		$nomor_rekening = $_POST['nomor_rekening'];
		$nama_pemilik = $_POST['nama_pemilik'];
		$total_pembayaran = $_POST['total_pembayaran'];
		$tanggal_pembayaran = $_POST['tanggal_pembayaran'];
	
		if(!empty($_FILES["file"]["name"])){
			$nama_file = $_FILES["file"]["name"];
			move_uploaded_file($_FILES["file"]["tmp_name"], "img/bukti/".$nama_file);
		}
	
		$queryPembayaran = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pesanan, nomor_rekening, nama_pemilik, total_pembayaran, tanggal_pembayaran, bukti_pembayaran)
													VALUES ('$id_pesanan', '$nomor_rekening', '$nama_pemilik', '$total_pembayaran', '$tanggal_pembayaran', '$nama_file')");

		if($queryPembayaran){
            mysqli_query($koneksi, "UPDATE pesanan SET status='1' WHERE id_pesanan='$id_pesanan'");
            $_SESSION['status'] = "Input Data Success";
			$_SESSION['status_code'] = "success";
			header("location:checkorder.php");
		}
		
	}
	
	else if($button == "Edit Status"){
		$status = $_POST["status"];
		
		mysqli_query($koneksi, "UPDATE pesanan SET status='$status' WHERE id_pesanan='$id_pesanan'");
		
		if($status == "2"){
			$query = mysqli_query($koneksi, "SELECT * FROM pesanan_detail WHERE id_pesanan='$id_pesanan'");
			while($row=mysqli_fetch_assoc($query)){
				$id_barang = $row["id_barang"];
				$quantity = $row["quantity"];
				
				mysqli_query($koneksi, "UPDATE barang SET stok_barang=stok_barang-$quantity WHERE id_barang='$id_barang'");
			}
		}

		header("location:dashboard.php?page=order&action=li");
	}