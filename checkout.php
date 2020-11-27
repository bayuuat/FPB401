<?php

	session_start();

	include_once("function/koneksi.php");
	include_once("function/rupiah.php");
	
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $totalBarang = count($keranjang);

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
    <link rel="stylesheet" href="css/checkout.css">
    <!-- <link rel="stylesheet" href="css/core-style.css"> -->
    <title>BEM ITS</title>
</head>

<body>
    <div class="content d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="cart-table-area section-padding-100">
                <div class="container-fluid">
                    <h2>Checkout</h2>
                    <form action="sys_checkout.php" method="post">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="checkout_details_area mt-50 clearfix">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="kode">CODE</label>
                                            <input type="text" name="kode" value="<?php echo $_SESSION['kode'] ?>"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="text-danger">remember this code!</span>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control" name="nama" placeholder="Name"
                                                required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="email" class="form-control" name="email" placeholder="Email"
                                                required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <textarea type="text" class="form-control mb-3" name="alamat" cols="10"
                                                rows="3" placeholder="Address" required></textarea>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control" name="kota" placeholder="City"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="number" class="form-control" name="zipcode" min="10000"
                                                max="99999" placeholder="Zip Code" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="number" class="form-control" name="phone" min="0"
                                                placeholder="Phone No" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <textarea class="form-control w-100" name="note" cols="30" rows="5"
                                                placeholder="Leave a comment about your order"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="cart-summary">
                                    <h5>Cart Total</h5>
                                    <ul class="summary-table">
                                        <table class="table-list">
                                            <tr>
                                                <th class='kiri'>Nama Barang</th>
                                                <th class='tengah'>Qty</th>
                                                <th class='kanan'>Total</th>
                                            </tr>

                                            <?php
                                            $subtotal = 0;
                                            foreach($keranjang AS $key => $value){
                                                
                                                $id_barang = $key;
                                                
                                                $nama_barang = $value['nama_barang'];
                                                $harga = $value['harga_barang'];
                                                $quantity = $value['quantity'];
                                                
                                                $total = $quantity * $harga;
                                                $subtotal = $subtotal + $total;
                                                
                                                echo "<tr>
                                                        <td class='kiri'>$nama_barang</td>
                                                        <td class='tengah'>$quantity</td>
                                                        <td class='kanan'>".rupiah($total)."</td>
                                                    </tr>";
                                            }
                                            echo "<tr>
                                                    <td colspan='2' class='kanan'><b>Sub Total</b></td>
                                                    <td class='kanan'><b>".rupiah($subtotal)."</b></td>
                                                </tr>";
                                        ?>

                                        </table>
                                    </ul>

                                    <div class="col-12 mb-3">
                                        <span><input class="btn btn-dark" type="submit" value="Checkout" /></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
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
</body>

</html>