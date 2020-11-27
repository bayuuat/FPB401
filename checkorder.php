<?php

    session_start();
    include_once("function/koneksi.php");
    include_once("function/rupiah.php");
    include_once("function/helper.php");
    
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
    
    if($id_user && $level != "customer"){
        header("location: dashboard.php");
    } else if($id_user == false){
        header("location: form-code.php");
    }
	
	$query = mysqli_query($koneksi, "SELECT pesanan.id_pesanan, pesanan.phone, pesanan.alamat, pesanan.waktu_pesan, pesanan.kota, pesanan.zipcode, pesanan.note, pesanan.status, user.nama FROM user JOIN pesanan ON user.id_user=pesanan.id_user WHERE user.id_user=$id_user");
	
	$row=mysqli_fetch_assoc($query);
	
	$id_pesanan = $row['id_pesanan'];
	$tanggal_pemesanan = $row['waktu_pesan'];
	$nama_penerima = $row['nama'];
	$nomor_telepon = $row['phone'];
	$alamat = $row['alamat'];
    $kota = $row['kota'];
    $zip = $row['zipcode'];
    $note = $row['note'];
    $status = $row['status'];

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
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="store.php" style="font-weight: bold; font-size: 2em">BEM ITS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_target"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapse_target">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="store.php">SHOP<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="form-code.php">CHECK ORDER</a>
                        </li>
                        <li class="nav-item-button">
                            <button type="button" href="#" class=" btn btn-light store-button d-flex flex-row">
                                <a class="nav-link text-dark" href="cart.php">CART</a>
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="content mb-5">
        <div class="detail mb-3">
            <div class="container ">
                <div class="row">
                    <h4>Welcome, <?php echo $nama ?></h4>
                    <a class="btn btn-outline-danger ml-auto" href=" sys_logout.php">
                        <p>Log Out</p>
                    </a>
                </div>
                <div class="det-top">
                    <h3>
                        <center>Order Detail</center>
                    </h3>

                    <hr />

                    <table class="mb-3">

                        <tr>
                            <td><b>Invoice Number</b></td>
                            <td>:</td>
                            <?php
                                foreach($arrayStatusPesanan AS $key => $value){
                                    if($status == $key){
                                        if($status == 3){
                                            echo "<td><b class='text-danger'>$value</b></td>";
                                        }else{
                                            echo "<td><b>$value</b></td>";
                                        }
                                    }
                                }
                            ?>
                        </tr>
                        <tr>
                            <td>Invoice Number</td>
                            <td>:</td>
                            <td><?php echo $id_pesanan; ?></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $nama; ?></td>
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

                <?php
        
                    if($status == 0){

                ?>

                <div class="mb-3">
                    <p>Please make a payment to Bank ABC<br />
                        Nomor Account : 0123-4455-8888 (A/N BEM ITS).<br />
                        Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran
                    </p>
                </div>

                <?php
        
                    }

                ?>

            </div>
        </div>
        <?php
        
        if($status == 0){

        ?>
        <div class="form-pembayaran">
            <div class="container">
                <form class="my-5" action="sys_order.php?id_pesanan=<?php echo $id_pesanan;?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group col-6 ">
                        <input type="number" class="form-control form-control-user" name="nomor_rekening"
                            aria-describedby="emailHelp" placeholder="Account Number">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" class="form-control form-control-user" name="nama_pemilik"
                            placeholder="Account Name">
                    </div>
                    <div class="input-group mb-3 col-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" class="form-control form-control-user" name="total_pembayaran"
                            placeholder="Total Payment">
                    </div>
                    <div class="form-group col-6">
                        <input type="date" class="form-control form-control-user" name="tanggal_pembayaran">
                    </div>
                    <div class="form-group col-6">
                        <label for="file">Bukti Pembayaran</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                    <input class="btn btn-dark btn-user btn-block col-6" type="submit" name="button"
                        value="Konfirmasi Pembayaran">
                </form>
            </div>
        </div>

        <?php
        
        }

        ?>
    </div>

    <div class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-3 col-md-6 col-xs-12 part-1">
                        <img src="img/Lambang ITS putih-04.png" alt="" style="max-width: 100%;">
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12 part-2">
                        <h2>DIVINECTOR</h2>
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Store</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12 part-3">
                        <h2>FOLLOW US</h2>
                        <p>Follow Our Social Media Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam,
                            facilis.</p>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-linkedin"></i></a>
                        <a href=""><i class="fa fa-pinterest"></i></a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12 part-4">
                        <h2>OUR NEWSLETTER</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, error.</p>
                        <form action="">
                            <input type="email">
                            <input type="submit" value="SUBSCRIBE">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bot mx-auto text-center">
            Copyrigt &copy;LAB B401 - All Right Reserved
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