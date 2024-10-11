<?php
require_once('auth.php');
session_start();
if(!isLogged()){
    header('location: ../index.php');
    die();
}
session_destroy();
?>