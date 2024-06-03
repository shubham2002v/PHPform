<?php
 $username="root";
$password="";
$server="localhost";
$database="collegeform";

$connect=mysqli_connect($server,$username,$password,$database);
if($connect){
   echo "<h5></h5>";
}
else{
    echo "Somthing Wrong";
}
?>


