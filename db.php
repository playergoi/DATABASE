<?php 
$server='localhost';
$usernames = 'root';
$password="";
$database='users';


$conn=mysqli_connect($server,$usernames,$password,$database);
if(!$conn){
    die("Error".mysqli_connection_error());
}else{
    echo " ";
}


?>