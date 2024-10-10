<?php 
require_once('../User Authentication/auth.php');
session_start();
if(isLogged()){
    //header('location: index1.php');
    //die();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Horror Heads</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Core theme CSS (includes Bootstrap)-->
        <!--<link href="css/styles.css" rel="stylesheet" />-->
    </head>
    <body class="bg-dark">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-black fixed-top">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-light" href="index.php">Horror Heads</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-light btn btn-dark" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="#!">My Reviews</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="#!">Create</a></li>
                    </ul>
                    <form class="d-flex mb-lg-0 ms-lg-4">
                        <button class="btn btn-dark" type="submit">
                            <i class="bi-person-circle me-1 text-light"></i><a href="User Authentication/signout.php" style="text-decoration: none;" class="text-light">&nbsp;Sign Out</a>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-image py-5" style="background-image: url('https://d39l2hkdp2esp1.cloudfront.net/img/photo/276765/276765_00_2x.jpg?20230817094614')">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-light">
                    <h1 class="display-4 fw-bolder">Welcome to Horror Heads!</h1>
                    <p class="lead fw-normal text-light mb-0">Haunt, Review, Discover</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100 border-black">
                            <!-- Review image-->
                            <img class="card-img-top" src="https://variety.com/wp-content/uploads/2024/07/Terrifier-poster.jpeg?w=724" alt="..." style="height:350px;"/>
                            <!-- Review details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Review name-->
                                    <h5 class="fw-bolder text-dark">Spooky Movie Name</h5>
                                    <!-- Review reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-half"></div>
                                        <div class="bi-star"></div>
                                    </div>
                                    <!-- Review description-->
                                    <span class="text-dark">Some short description about the movie</span>
                                </div>
                            </div>
                            <!-- View Review-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-dark btn-outline-black mt-auto" href="detail.php">View Review</a></div>
                            </div>
                            <!-- Username badge-->
                            <div class="badge bg-dark text-light position-absolute" style="top: 0.5rem; left: 0.5rem">User Name</div>
                            <!-- Review views badge-->
                            <div class="badge bg-dark text-light position-absolute" style="top: 0.5rem; right: 0.5rem">
                                <i class="bi-eye me-1"></i><i class="text-white">12</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container"><p class="m-0 text-center text-light">Copyright &copy; Horror Heads 2024</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
