<?php

    include_once("function/koneksi.php");

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
    <link rel="icon" type="image" href="img/Lambang ITS putih-05.png">
    <link rel="stylesheet" href="css/blog.css">
    <title>BEM ITS</title>
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="home.php" style="font-weight: bold; font-size: 2em">BEM ITS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_target"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapse_target">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="home.php">HOME </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">BLOG<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item-button">
                            <button type="button" href="#" class=" btn btn-light store-button d-flex flex-row">
                                <a class="nav-link text-dark" href="store.php">STORE</a>
                                <img src="img/spspsp.png" alt="">
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="banner">
        <div class="container">
            <div class="row ">
                <div class="col-9">
                    <img src="https://images.pexels.com/photos/1550337/pexels-photo-1550337.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                        alt="" class="img-fluid">
                </div>
                <div class="col-3">
                    <div class="row mb-2">
                        <img src="https://images.pexels.com/photos/3163994/pexels-photo-3163994.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            alt="" class="img-fluid">
                    </div>
                    <div class="row mb-2">
                        <img src="https://images.pexels.com/photos/3163994/pexels-photo-3163994.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            alt="" class="img-fluid">
                    </div>
                    <div class="row">
                        <img src="https://images.pexels.com/photos/3163994/pexels-photo-3163994.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-article">
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col-6">
                            <img src="https://images.pexels.com/photos/5683335/pexels-photo-5683335.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                alt="" style="max-width: 100%;">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, sit?</h5>
                            <p>Satu Kosong</p>
                        </div>
                        <div class="col-6">
                            <img src="https://images.pexels.com/photos/1097456/pexels-photo-1097456.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                alt="" style="max-width: 100%;">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, sit?</h5>
                            <p>Satu Kosong</p>
                        </div>
                        <div class="col-6">
                            <img src="https://images.pexels.com/photos/5683335/pexels-photo-5683335.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                alt="" style="max-width: 100%;">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, sit?</h5>
                            <p>Satu Kosong</p>
                        </div>
                        <div class="col-6">
                            <img src="https://images.pexels.com/photos/1097456/pexels-photo-1097456.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                alt="" style="max-width: 100%;">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, sit?</h5>
                            <p>Satu Kosong</p>
                        </div>
                        <div class="col-6">
                            <img src="https://images.pexels.com/photos/5683335/pexels-photo-5683335.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                alt="" style="max-width: 100%;">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, sit?</h5>
                            <p>Satu Kosong</p>
                        </div>
                        <div class="col-6">
                            <img src="https://images.pexels.com/photos/1097456/pexels-photo-1097456.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                alt="" style="max-width: 100%;">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, sit?</h5>
                            <p>Satu Kosong</p>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
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
</body>

</html>