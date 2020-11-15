<?php

	session_start();

	include_once("function/koneksi.php");

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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/index.css">
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
                                <a class=nav-link href=formcode.php>CHECK ORDER</a>
                                </li>";
							}
						?>
                        <li class="nav-item-button">
                            <button type="button" href="#" class=" btn btn-light store-button d-flex flex-row">
                                <a class="nav-link text-dark" href="#">CART</a>
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="item">
        <div id="frame-barang">
            <ul>
                <?php
                if($kategori_id){
                    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 9");
                }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
                }
                
                $no=1;
                while($row=mysqli_fetch_assoc($query)){
                    
                    $style=false;
                    if($no == 3){
                        $style="style='margin-right:0px'";
                        $no=0;
                    }
                    
                    echo "<li $style>
                            <p class='price'>$row[harga]</p>
                            <a href='#'>
                                <img src='img/barang/$row[gambar_barang]' />
                            </a>
                            <div class='keterangan-gambar'>
                                <p><a href='#'>$row[nama_barang]</a></p>
                                <span>Stok : $row[stok_barang]</span>
                            </div>
                            <div class='button-add-cart'>
                                <a href='#'>+ add to cart</a>
                            </div>";
                    $no++;
                }
            ?>
            </ul>
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