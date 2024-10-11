<?php 
require_once('authentication/auth.php');

function signup($username, $email, $password, $confirmPassword) {
    //LOGIC/CONTROLLER
    if(count($_POST)> 0){
        $error='';
        $error=checkFields();
        
        if($password != $confirmPassword) $error='Passwords must match';
    
        if(strlen($error)==0){
            $fp=fopen('../data/users.csv.php','r');
            while(!feof($fp)){
                $line=fgets($fp);
                $line=explode(';',$line);
                if(count($line)==3 && $email==$line[1] && $username==$line[0]){
                    $error='This email is already registered';
                    break;
                } 
            }
            fclose($fp);
            if(strlen($error)==0){
                //open csv file in append mode
                $fp=fopen('../data/users.csv.php','a+');
                //write new credentials
                fputs($fp,$username.';'.$email.';'.password_hash($password,PASSWORD_DEFAULT).PHP_EOL);
                //close the file
                fclose($fp);
                header('location: signin.php');
                die();
            }
        }
        return $error;
    }
}

function signin($email,$password) {
    //LOGIC/CONTROLLER
    if(count($_POST)> 0){
        $error='';
        $error=checkFields();
        if(strlen($error)==0){
            $fp=fopen('../data/users.csv.php','r');
            while(!feof($fp)){
                $line=fgets($fp);
                $line=explode(';',$line);
                if(count($line)==3 && $email==$line[1] && password_verify($password,trim($line[2]))){
                    $_SESSION['username']=$line[0];
                    header('location: ../entityHorror/index.php');
                    die();
                } 
            }
            fclose($fp);
            $error='Email or Password is incorrect';
        }
        return $error;
    }
}

function displayStars($number) {
    if($number % 2 == 0) {
        $numLeft=5;
        $number=$number/2;
        $numLeft=$numLeft-$number;
        for($i=0;$i<$number;$i++) {
            ?> <div class="bi-star-fill"></div> <?php
        }
        for($i=0;$i<$numLeft;$i++) {
            ?> <div class="bi-star"></div> <?php
        }
    } else {
        $numLeft=4;
        $number=$number-1;
        $number=$number/2;
        $numLeft=$numLeft-$number;
        for($i=0;$i<$number;$i++) {
            ?> <div class="bi-star-fill"></div> <?php
        }
        ?> <div class="bi-star-half"></div> <?php
        for($i=0;$i<$numLeft;$i++) {
            ?> <div class="bi-star"></div> <?php
        }
    }
}

function displayCards($user, $movieName, $descShort, $rating, $movieImage, $index)
                  { $newIndex=$index; ?>
                    <div class="col mb-5">
                        <div class="card h-100 border-black">
                            <!-- Review image-->
                            <img class="card-img-top" src="<?= APP_URL.$movieImage ?>" alt="Movie Cover" style="height:350px;"/>
                            <!-- Review details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Review name-->
                                    <h5 class="fw-bolder text-dark"><?= $movieName ?></h5>
                                    <!-- Review reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <?php displayStars($rating) ?>
                                    </div>
                                    <!-- Review description-->
                                    <span class="text-dark"><?= $descShort ?></span>
                                </div>
                            </div>
                            <!-- View Review-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-dark btn-outline-black mt-auto" href="detail.php?index=<?= $newIndex ?>">View Review</a></div>
                            </div>
                            <!-- Username badge-->
                            <div class="badge bg-dark text-light position-absolute" style="top: 0.5rem; left: 0.5rem"><?= $user ?></div>
                        </div>
                    </div>               
<?php $newIndex++; } 

function displayRating($rating, $i) {?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" id="rating" value="<?= $i ?>" <?php if($i==$rating) echo 'checked' ?>>
                            <label class="form-check-label text-light" for="rating"><?= $i ?></label>
                        </div>
<?php }