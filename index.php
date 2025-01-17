<?php 
require_once('functions.php');
require_once('settings.php');
require_once('authentication/auth.php');
$userData=file_get_contents(APP_PATH.'/data/posts.json.php');
$userData=json_decode($userData, true);
$index=0;
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
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-light" href="index.php">Horror Heads</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-light btn btn-dark" aria-current="page" href="index.php">Home</a></li>
                    </ul>
                    <div class="d-flex mb-lg-0 ms-lg-4">
                            <a href="authentication/signin.php" class="btn btn-dark"><i class="bi-person-circle me-1 text-light"></i>&nbsp;Sign In</a>
                    </div>
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
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black fixed-bottom">
            <div class="container"><p class="m-0 text-center text-light">Copyright &copy; Horror Heads 2024</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
