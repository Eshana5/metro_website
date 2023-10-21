<?php
$insert=false;
error_reporting(E_ALL);
ini_set('display_startup_errors', '1');
ini_set('display_errors', '1');

if(isset($_POST['submit2']))
{
    $server= 'localhost';
    $username='root';
    $password='';
    $database='delhi_metro';
    $con= mysqli_connect($server, $username, $password, $database);
    if(!$con){
        die("connection to this db failed due to " .mysqli_connect_error());
    }
    
//$tripType = $_POST['tripType'];
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$text = $_POST['text'];


$sql="INSERT INTO `helpline`(`fullName`,`email`,`text`) VALUES ('$fullName', '$email','$text');";

if($con->query($sql)==true){
    $insert=true;

    echo "Query Sent"

else{
    echo "ERROR: $sql<br>$con->error";
}
?>