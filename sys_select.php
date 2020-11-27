<?php
    
    include_once("function/koneksi.php");

    if(isset($_POST["id_barang"])){
        $result = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='".$_POST["id_barang"]."' AND status='on'");
        while($row=mysqli_fetch_assoc($result)){
        echo "<div class='container'>
                <div class='row'>
                <div class='col-6'>
                    <img class='img-fluid' src='img/barang/$row[gambar_barang]' alt='IMG-PRODUCT'>
                </div>
                <div class='col-6'>
                <h3><b>$row[nama_barang]</b></h3>
                <p>$row[detail_barang]</p>
                <p>Stok : $row[stok_barang]</p>
                <a href='sys_tbh_keranjang.php?id_barang=$row[id_barang]' class='btn btn-dark'>+ Add to cart</a>
                </div>
                </div>
                </div>";
        }
    }
		
?>