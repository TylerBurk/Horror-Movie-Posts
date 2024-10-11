<?php
session_start();
function isLogged(){
    //check if the user is logged
    return isset($_SESSION['username']);
}

function checkFields(){
    $error='';
    //returns true or false based on whether the data are there
    if(!isset($_POST['email'][0])) $error=('You must enter your email');
    if(!isset($_POST['password'][0])) $error=('You must enter your password');

    //correctness
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error='You must enter a valid email';
    if(strlen($_POST['email']<8) || strlen($_POST['email']<16)) $error='You must enter a password between 8 and 16 characters';
    return $error;
}



//supports signup and signin
function checkIfInDB($file,$email,$password=null){
    $fp=fopen('users.csv.php','r');
        while(!feof($fp)){
            $line=fgets($fp);
            $line=explode(';',$line);
            if(count($line)==2 && $_POST['email']==$line[0]) {
                fclose($fp);
                if(!isset($password)) {
                    return password_verify($_POST['password'],trim($line[1]));
                }
            } 
        }
        fclose($fp);
        return false;
        
}