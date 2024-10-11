<?php
require_once('auth.php');
$error='';
//LOGIC/CONTROLLER
if(count($_POST)> 0){
    
    $error=checkFields();
    
    if($_POST['password'] != $_POST['confirmPassword']) $error='Passwords must match';

    if(strlen($error)==0){
        $fp=fopen('../Data/users.csv.php','r');
        while(!feof($fp)){
            $line=fgets($fp);
            $line=explode(';',$line);
            if(count($line)==3 && $_POST['email']==$line[1] && $_POST['username']==$line[0]){
                $error='This email is already registered';
                break;
            } 
        }
        fclose($fp);
        if(strlen($error)==0){
            //open csv file in append mode
            $fp=fopen('../Data/users.csv.php','a+');
            //write new credentials
            fputs($fp,$_POST['username'].';'.$_POST['email'].';'.password_hash($_POST['password'],PASSWORD_DEFAULT).PHP_EOL);
            //close the file
            fclose($fp);
            header('location: signin.php');
            die();
        }
    }
}

//VIEW
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Sign Up</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="bg-dark">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-light" href="index.php">Horror Heads</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link text-light" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="#!">My Reviews</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="#!">Create</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
            <!-- Sign Up Form -->
                <form class="col-lg-6 offset-lg-3" method="POST"><?php if(strlen($error)>0) echo '<span style="color:#f30">'.$error.'</span>'; ?>
                    <div class="mb-3">
                        <label for="username" class="form-label text-light">Username</label>
                        <input id="username" type="username" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-light">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text text-light">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-light">Password</label>
                        <input id="password" type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label text-light">Confirm Password</label>
                        <input type="confirmPassword" name="confirmPassword" id="confirmPassword" class="form-control"  required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
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
