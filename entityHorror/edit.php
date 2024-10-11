<?php
//edit.php: edit one of the entities
require_once('../functions.php');
require_once('../settings.php');

//read the file
$userData=file_get_contents(APP_PATH.'/data/posts.json.php');
//convert json into array
$userData=json_decode($userData, true);
//GET the element with the index from query string
$item=$userData[$_GET['index']];
//Check if user submiitted form
if(count($_POST)>0){
    $image='/data/image_'.time().'.'.pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['file']['tmp_name'],APP_PATH.$image); 
    $_POST['file']=$image;
    $_POST['username']=$_SESSION['username'];
    //replace the item with new data
    $item=$_POST;
    //put item back into array
    $userData[$_GET['index']]=$item;
    //encode array into JSON string
    $userData=json_encode($userData,JSON_PRETTY_PRINT);
    //save file
    file_put_contents(APP_PATH.'/data/posts.json.php', $userData);
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Create</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="bg-dark">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-light" href="index.php">Horror Heads</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link text-light" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="create.php">Create</a></li>
                    </ul>
                    <div class="d-flex mb-lg-0 ms-lg-4">
                            <a href="../authentication/signout.php" class="btn btn-dark"><i class="bi-person-circle me-1 text-light"></i>&nbsp;Sign Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
            <!-- Create Form -->
                <form class="col-lg-6 offset-lg-3" action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $_GET['index'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="movieName" class="form-label text-light">Movie Title</label>
                        <input class="form-control" type="text" id="movieName" name="movieName" value="<?= $item['movieName'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descShort" class="form-label text-light">Short Description</label>
                        <textarea class="form-control" type="text" id="descShort" name="descShort" rows="2"><?= $item['descShort'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="descLong" class="form-label text-light">Review</label>
                        <textarea class="form-control" type="text" id="descLong" name="descLong" rows="5"><?= $item['descLong'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label text-light">Rating</label><br />
                        <?php for($i=1;$i<=10;$i++) displayRating($item['rating'], $i) ?>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label text-light">Movie Cover</label>
                        <input class="form-control" type="file" id="file" name="file"></input>
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary">Upload Edit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container"><p class="m-0 text-center text-light">Copyright &copy; Horror Heads 2024</p></div>
        </footer>
        <!-- Bootstrap core JS and Popper-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
