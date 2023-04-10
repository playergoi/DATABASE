<?php 
$server='localhost';
$usernames = 'root';
$password="";
$database='users';


$conn=mysqli_connect($server,$usernames,$password,$database);
if(!$conn){
    die("Error".mysqli_connection_error());
}else{
    echo "Your connection is established successfully";
}
$sql='select * from credentials';
$results=mysqli_query($conn,$sql);

?>