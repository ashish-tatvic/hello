<?php
session_start();
?>
<html>
<body>
 <?php
$_SESSION['name']="Ashish";
$_SESSION['surname']="Navadiya";
 //print_r($_SESSION); 
 session_unset(); 
//session_destroy(); 
echo "Your  name is ".$_SESSION['name']. "</br>";
Echo "your Surname is ".$_SESSION['surname']; 
 ?>
 </body>
 </html>