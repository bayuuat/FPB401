<?php
	session_start();
    include("function/koneksi.php");
     
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];
    $button = $_POST['button'];
	
	if($button == "Add"){
		$run = mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES('$kategori', '$status')");

		if($run){
			$_SESSION['status'] = "Category Added";
			$_SESSION['status_code'] = "success";
			header("location:dashboard.php?page=category&action=li");
		}
		else{
			$_SESSION['status'] = "Category NOT Added";
			$_SESSION['status_code'] = "error";
			header("location:dashboard.php?page=category&action=li");
		}
	}
	else if($button == "Update"){
		$id_kategori = $_GET['id_kategori'];
		
		$run = mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori',
													status='$status' WHERE id_kategori='$id_kategori'");
		
		if($run){
			$_SESSION['status'] = "Category Updated";
			$_SESSION['status_code'] = "success";
			header("location:dashboard.php?page=category&action=li");
		}
		else{
			$_SESSION['status'] = "Category NOT Updated";
			$_SESSION['status_code'] = "error";
			header("location:dashboard.php?page=category&action=li");
		}
	}
	else if(isset($_GET['delete'])){
        $id_kategori = $_GET['delete'];

        $run = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'") or die(mysqli_error($koneksi)); 

		if($run){
			$_SESSION['delete'] = "Category Deleted";
			$_SESSION['status_code'] = "warning";
			header("location:dashboard.php?page=category&action=li");
		}
		else{
			$_SESSION['status'] = "Category NOT Deleted";
			$_SESSION['status_code'] = "error";
			header("location:dashboard.php?page=category&action=li");
		}
	}