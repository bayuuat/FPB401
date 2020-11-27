<?php

    session_start();

	include_once("function/koneksi.php");
	include_once("function/rupiah.php");
	
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $totalBarang = count($keranjang);

    $n=8; 
    function getName($n) { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
    
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
    
        return $randomString; 
    }

    $_SESSION['kode'] = getName($n);
?>

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

    <link rel="icon" type="image" href="img/Lambang ITS putih-05.png">

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">

    <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">

    <link rel="stylesheet" type="text/css" href="css/util.css">

    <link rel="stylesheet" type="text/css" href="css/main.css">

    <link rel="stylesheet" href="css/store.css">
    <link rel="stylesheet" href="css/index.css">

    <title>BEM ITS STORE</title>
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="store.php" style="font-weight: bold; font-size: 2em">BEM ITS</a>
                <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
                    <a href="store.php" class="mtext-109 cl8 hov-cl1 trans-04">
                        Store
                        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                    </a>

                    <span class="mtext-109 cl4">
                        Shoping Cart
                    </span>
                </div>
            </div>
        </nav>
    </div>
    <?php
    if($totalBarang == 0){
    ?>
    <form class="bg0 p-t-175 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <h3>IT'S EMPTY</h3>
                        <img src="img/undraw_empty_cart_co35.svg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php

	} else {

    ?>



    <!-- Shoping Cart -->
    <form class="bg0 p-t-175 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>

                                <?php
                                
                                $subtotal = 0;		
                                foreach($keranjang AS $key => $value){
                                $id_barang = $key;
                                
                                $nama_barang = $value["nama_barang"];
                                $quantity = $value["quantity"];
                                $gambar = $value["gambar_barang"];
                                $harga = $value["harga_barang"];
                                
                                $total = $quantity * $harga;
                                $subtotal = $subtotal + $total;

                                ?>

                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="img/barang/<?php echo $gambar; ?>" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2"><?php echo $nama_barang; ?></td>
                                    <td class="column-3"><?php echo rupiah($harga); ?></td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0 minus-quantity">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product update-quantity"
                                                type="number" id="quantity" name="<?php echo $id_barang; ?>"
                                                value="<?php echo $quantity; ?>">

                                            <div
                                                class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m plus-quantity">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5"><?php echo rupiah( $total); ?><a
                                            href="sys_delete_cart.php?id_barang=<?php echo $id_barang; ?>"> X</a></td>
                                </tr>

                                <?php
                                }
                                ?>

                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <a href="store.php">
                                    <div
                                        class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                        Continue Shopping
                                    </div>
                                </a>
                            </div>

                            <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 loc-reload">
                                Update Cart
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    <?php echo rupiah( $subtotal); ?>
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    <?php echo rupiah( $subtotal); ?>
                                </span>
                            </div>
                        </div>

                        <a class="btn btn-dark" href="checkout.php">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
    }
    ?>

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

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
    $(".update-quantity").on("input", function(e) {
        var id_barang = $(this).attr("name");
        var value = $(this).val();

        $.ajax({
            method: "POST",
            url: "sys_up_cart.php",
            data: "id_barang=" + id_barang + "&value=" + value
        })

    });
    </script>

    <script>
    $(".loc-reload").on("click", function(e) {
        location.reload();
    });
    </script>

    <script src="vendor/animsition/js/animsition.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>

    <script src="vendor/daterangepicker/moment.min.js"></script>

    <script src="vendor/daterangepicker/daterangepicker.js"></script>

    <script src="vendor/slick/slick.min.js"></script>

    <script src="js/slick-custom.js"></script>

    <script src="vendor/isotope/isotope.pkgd.min.js"></script>

    <script src="js/main.js"></script>
</body>

</html>