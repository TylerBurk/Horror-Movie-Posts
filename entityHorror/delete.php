<?php
//delete.php: delete an existing item
require_once('../settings.php');

//read the file
$userData=file_get_contents(APP_PATH.'/data/posts.json.php');
//convert json into array
$userData=json_decode($userData, true);
//Delete picture
if(file_exists(APP_PATH.$userData[$_GET['index']]['file'])) unlink(APP_PATH.$userData[$_GET['index']]['file']);
//remove item back from array
unset($userData[$_GET['index']]);
//restore the array as indexed array
$userData=array_values($userData);
//encode array into JSON string
$userData=json_encode($userData,JSON_PRETTY_PRINT);
//save file
file_put_contents(APP_PATH.'/data/posts.json.php', $userData);
//go back to index page
header('location: index.php');