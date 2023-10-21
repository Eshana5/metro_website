<?php
$insert=false;
error_reporting(E_ALL);
ini_set('display_startup_errors', '1');
ini_set('display_errors', '1');

if(isset($_POST['submit1']))
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
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$sourceStation = $_POST['sourceStation'];
$destination = $_POST['destination'];
$date= $_POST['date'];
$numberofpass = $_POST['numberofpass'];
$numberofchildren = $_POST['numberofchildren']; 

$sql="INSERT INTO `ticket_booking`(`firstName`,`lastName`,`gender`,`sourceStation`,`destination`,`date`,`numberofpass`,`numberofchildren`) VALUES ('$firstName', '$lastName','$gender','$sourceStation','$destination','$date','$numberofpass','$numberofchildren');";
$sql2="SELECT s.NumberOfStations*( t.numberofpass*10 + t.numberofchildren *5) as Price FROM stationname s INNER JOIN ticket_booking t ON s.SourceStation = t.sourceStation AND s.Destination = t.destination WHERE t.id = (select Max(id) from ticket_booking)";

if($con->query($sql)==true){
  $insert=true;








  

  echo nl2br("YAY!!    \n    You have successfully booked your ticket from ".$sourceStation, false);
  echo "\n";
  echo "\t to".$destination;
  

  
$result = $con->query($sql2);
  if($result->num_rows>0){
     
      while($row=$result->fetch_assoc())
      {
        echo "\n";
          echo "Please Pay the below amount at Cash Counter";
          echo "Amount To Be Paid:".$row["Price"];
      }
  }

}else{
    
    echo "ERROR: $sql<br>$con->error";
    }
$con->close();
}
?>