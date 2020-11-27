<?php
    include_once("function/koneksi.php");
    include_once("function/rupiah.php");
    
    $id_pesanan= $_GET["id_pesanan"];
	
	$query = mysqli_query($koneksi, "SELECT pesanan.id_pesanan, pesanan.phone, pesanan.alamat, pesanan.waktu_pesan, pesanan.kota, pesanan.zipcode, pesanan.note, user.nama FROM pesanan JOIN user ON pesanan.id_user=user.id_user WHERE pesanan.id_pesanan=$id_pesanan");
	
	$row=mysqli_fetch_assoc($query);
	
	$tanggal_pemesanan = $row['waktu_pesan'];
	$nama_penerima = $row['nama'];
	$nomor_telepon = $row['phone'];
	$alamat = $row['alamat'];
    $kota = $row['kota'];
    $zip = $row['zipcode'];
    $note = $row['note'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/checkorder.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/dash.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>BEM ITS</title>
</head>

<body>
    <div class="content mb-5">
        <div class="detail mb-3">
            <div class="container ">
                <div class="row">
                    <h4>Welcome, <?php echo $nama ?></h4>
                    <a class="btn btn-dark ml-auto" href="dashboard.php?page=order&action=li">
                        <p>Back</p>
                    </a>
                </div>
                <div class="det-top">
                    <h3>
                        <center>Order Detail</center>
                    </h3>

                    <hr />

                    <table class="mb-3">

                        <tr>
                            <td>Invoice Number</td>
                            <td>:</td>
                            <td><?php echo $id_pesanan; ?></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $nama_penerima; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $alamat; ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td><?php echo $nomor_telepon; ?></td>
                        </tr>
                        <tr>
                            <td>Order Date</td>
                            <td>:</td>
                            <td><?php echo $tanggal_pemesanan; ?></td>
                        </tr>
                    </table>
                </div>

                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                    <thead>
                        <tr class="baris-title">
                            <th class="no">No</th>
                            <th class="no">Barang</th>
                            <th class="kiri">Nama Barang</th>
                            <th class="tengah">Qty</th>
                            <th class="kanan">Harga Satuan</th>
                            <th class="kanan">Total</th>
                        </tr>
                    </thead>

                    <?php
		
                        $queryDetail = mysqli_query($koneksi, "SELECT pesanan_det.*, barang.nama_barang, barang.gambar_barang FROM pesanan_det JOIN barang ON pesanan_det.id_barang=barang.id_barang WHERE pesanan_det.id_pesanan='$id_pesanan'");
                        
                        $no = 1;
                        $subtotal = 0;
                        while($rowDetail=mysqli_fetch_assoc($queryDetail)){
                        
                            $total = $rowDetail["harga"] * $rowDetail["quantity"];
                            $subtotal = $subtotal + $total;
                            
                            echo "<tr>
                                    <td class='no'>$no</td>
                                    <td class='kiri'><img class='item-img' src='img/barang/$rowDetail[gambar_barang]' alt='IMG-PRODUCT'></td>
                                    <td class='kiri'>$rowDetail[nama_barang]</td>
                                    <td class='tengah'>$rowDetail[quantity]</td>
                                    <td class='kanan'>".rupiah($rowDetail["harga"])."</td>
                                    <td class='kanan'>".rupiah($total)."</td>
                                </tr>";
                            
                            $no++;
                        }
                    ?>
                    <tr>
                        <td class="kanan" colspan="5"><b>Sub total</b></td>
                        <td class="kanan"><b><?php echo rupiah($subtotal); ?></b></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
    ?>

    <script>
    swal({
        title: "<?php echo $_SESSION['status']; ?>",
        icon: "<?php echo $_SESSION['status_code']; ?>",
        button: "Aww yiss!",
    });
    </script>

    <?php
        unset($_SESSION['status']);
    }
    ?>
</body>

</html>