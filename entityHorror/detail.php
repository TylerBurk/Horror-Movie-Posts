<?php 
//detail.php: show a full version of entity
require_once('../settings.php');
require_once('../functions.php');
$userData=file_get_contents('../data/posts.json.php');
$userData=json_decode($userData, true);
$item=$userData[$_GET['index']];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Horror Heads</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body class="bg-dark">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-light" href="index.php">Horror Heads</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link text-light" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="#!">Create</a></li>
                    </ul>
                    <div class="d-flex mb-lg-0 ms-lg-4">
                            <a href="../authentication/signout.php" class="btn btn-dark"><i class="bi-person-circle me-1 text-light"></i>&nbsp;Sign Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= APP_URL.$item['file'] ?>" alt="Movie Cover" /></div>
                    <div class="col-md-6">
                        <div class="small mb-1 text-light"><?= $item['username'] ?></div>
                        <h1 class="display-5 fw-bolder text-light"><?= $item['movieName'] ?></h1>
                        <p class="lead text-light"><?= $item['descLong'] ?></p>
                        <div class="d-flex text-warning">
                            <?php displayStars($item['rating']) ?>
                        </div>
                        <br />
                        <a class="text-light btn btn-secondary" href="edit.php?index=<?= $_GET['index'] ?>">Edit</a>&nbsp;
                        <a class="text-light btn btn-danger" href="delete.php?index=<?= $_GET['index'] ?>">Delete</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Horror Heads 2024</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
