<!doctype html>
<html lang="en">
<?php

	session_start();

	include_once("function/koneksi.php");
	include_once("function/rupiah.php");

	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	
	$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
	$totalBarang = count($keranjang);

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

    <link rel="icon" type="image" href="img/Lambang ITS putih-05.png">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

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

    <title>BEM ITS STORE</title>
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
                            <a class="nav-link" href="home.php">HOME <span class="sr-only">(current)</span></a>
                        </li>
                        <?php
							if($id_user){
								echo "<li class=nav-item>
                                <a class=nav-link href=dashboard.php>CHECK ORDER</a>
                                </li>";
							}else{
								echo "<li class=nav-item>
                                <a class=nav-link href=form-code.php>CHECK ORDER</a>
                                </li>";
							}
						?>
                        <li class="nav-item-button">
                            <button type="button" href="cart.php" class=" btn btn-light store-button d-flex flex-row">
                                <a class="nav-link text-dark" href="cart.php">CART</a>
                                <a href="cart.php">
                                    <i class="fas fa-fw fa-shopping-cart"></i>
                                </a>

                                <?php
                                        if($totalBarang != 0){
                                            echo "<span class='total-barang'>$totalBarang</span>";
                                        }
                                    ?>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <section class="section-slide">
        <div class="wrap-slick1 rs2-slick1">
            <div class="slick1">
                <div class="item-slick1 bg-overlay1" style="background-image: url(img/banner/banner1.png);">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    Our Craft Item
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="1000">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    Creativity is inventing, experimenting, growing, taking risks, breaking rules,
                                    making mistakes, and having fun.
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="product.html"
                                    class="flex-c-m stext-101 cl2 size-101 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-slick1 bg-overlay1" style="background-image: url(img/banner/banner2.png);"
                    data-thumb="images/thumb-02.jpg" data-caption="Men’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    Our New-Season
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn"
                                data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    Simplicity is the ultimate sophistication.
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="product.html"
                                    class="flex-c-m stext-101 cl2 size-101 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="tab-up my-5">
        <div class="container">
            <div class="paraf-up ">
                <h2><b>LATEST PRODUCTS</b></h2>
            </div>
            <div class="content row my-3">
                <div class="col-6 bg-dark text-white">
                    <div class="row">
                        <div class="col text-center align-self-center " style="flex-direction: column;">
                            <h2 class="my-2"><b>BEM ITS</b></h2>
                            <h5 class="my-2">PRODUCTS</h5>
                            <div class="btn btn-light my-2">VIEW PRODUCTS</div>
                        </div>
                        <div class="col">
                            <img src="img/Lambang ITS putih-05.png" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class='block2-pic hov-img0 label-new' data-label='New'>
                        <img src='img/barang/batman.jpg' alt='IMG-PRODUCT'>
                        <a href='#' data-toggle='modal' data-target='#viewItem' id='5'
                            class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 view-item'>
                            View
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class='block2-pic hov-img0 label-new' data-label='New'>
                        <img src='img/barang/bb8.jpg' alt='IMG-PRODUCT'>
                        <a href='#' data-toggle='modal' data-target='#viewItem' id='7'
                            class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 view-item'>
                            View
                        </a>
                    </div>
                </div>
            </div>
            <div class="content row my-3">
                <div class="col-3">
                    <div class='block2-pic hov-img0 label-new' data-label='New'>
                        <img src='img/barang/gelang_mage.jpg' alt='IMG-PRODUCT'>
                        <a href='#' data-toggle='modal' data-target='#viewItem' id='1'
                            class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 view-item'>
                            View
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class='block2-pic hov-img0 label-new' data-label='New'>
                        <img src='img/barang/nb_mage.jpg' alt='IMG-PRODUCT'>
                        <a href='#' data-toggle='modal' data-target='#viewItem' id='4'
                            class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 view-item'>
                            View
                        </a>
                    </div>
                </div>
                <div class="col-6 bg-dark text-white">
                    <div class="row">
                        <div class="col text-center align-self-center">
                            <h2 class="my-2"><b>MAGE 6</b></h2>
                            <h5 class="my-2">PRODUCTS</h5>
                            <div class="btn btn-light my-2">VIEW PRODUCTS</div>
                        </div>
                        <div class="col">
                            <img src="img/lg_mage.png" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="tab-fett my-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-shopping-cart fa-2x"></i>
                        </div>
                        <div class="col-8">
                            <h5><b>FREE SHIPPING</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-money fa-2x"></i>
                        </div>
                        <div class="col-8">
                            <h5><b>100% SATISFACTION</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-credit-card-alt fa-2x"></i>
                        </div>
                        <div class="col-8">
                            <h5><b>SECURE PAYMENT</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-envelope fa-2x"></i>
                        </div>
                        <div class="col-8">
                            <h5><b>ONLINE SUPPORT</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item my-5">
        <div class="container">
            <h2 class="my-3"><b>PRODUCTS OVERVIEW</b></h2>
            <div id="frame-barang">
                <div class="row isotope-grid" style="position: relative; height: 1940.25px;">
                    <?php
                if($kategori_id){
                    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 12");
                }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 12");
                }
                
                $no=1;
                while($row=mysqli_fetch_assoc($query)){
                    
                    $style=false;
                    if($no == 3){
                        $style="style='margin-right:0px'";
                        $no=0;
                    }
                    
                    echo "
                    <div class='col-sm-6 col-md-4 col-lg-3 p-b-35 dis-item'>
                        <!-- Block2 -->
                    <div class='block2'>
                        <div class='block2-pic hov-img0' data-label='New'>
                            <img class='barang' src='img/barang/$row[gambar_barang]' alt='IMG-PRODUCT'>

                            <a href='#' data-toggle='modal' data-target='#viewItem' id='$row[id_barang]' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 view-item'>
                                View
                            </a>
                        </div>

                        <div class='block2-txt flex-w flex-t p-t-14'>
                            <div class='block2-txt-child1 flex-col-l '>
                                <a href='product-detail.html' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                                    $row[nama_barang]
                                </a>
                                <span class='stext-105 cl3'>".rupiah($row['harga_barang'])."</span>
                            </div>

                            <div class='block2-txt-child2 flex-r p-t-3'>
                                <a href='#' class='btn-addwish-b2 dis-block pos-relative js-addwish-b2'>
                                    <img class='icon-heart1 dis-block trans-04' src='images/icons/icon-heart-01.png'
                                        alt='ICON'>
                                    <img class='icon-heart2 dis-block trans-04 ab-t-l'
                                        src='images/icons/icon-heart-02.png' alt='ICON'>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>";
                $no++;
                }
                ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_barang">Item Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detail_barang">
                    ...
                </div>
            </div>
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

    <script src="vendor/animsition/js/animsition.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>

    <script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
    </script>

    <script src="vendor/daterangepicker/moment.min.js"></script>

    <script src="vendor/daterangepicker/daterangepicker.js"></script>

    <script src="vendor/slick/slick.min.js"></script>

    <script src="js/slick-custom.js"></script>

    <script src="vendor/parallax100/parallax100.js"></script>

    <script>
    $('.parallax100').parallax100();
    </script>

    <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>

    <script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
    </script>

    <script src="vendor/isotope/isotope.pkgd.min.js"></script>

    <script src="js/main.js"></script>

    <script>
    $(document).ready(function() {
        $('.view-item').on('click', function() {
            var item_id = $(this).attr("id");

            $.ajax({
                url: "sys_select.php",
                method: "post",
                data: {
                    id_barang: item_id
                },
                success: function(data) {
                    $('#detail_barang').html(data);
                    $('#viewItem').modal('show');
                }
            });

        })
    })
    </script>
</body>

</html>