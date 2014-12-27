<?php

$q = $_GET['q'];
echo $q;
//$q='IT5';
$con = mysqli_connect('localhost','root','','test');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM emp WHERE id = '".$q."'";
echo $sql;
$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>id</th>
<th>pass</th>
</tr>";

$row = mysqli_fetch_array($result);
	echo "dfxd";
  
  
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['pass'] . "</td>";
  
  echo "</tr>";

  //echo "no row selected";
  

echo "</table>";

mysqli_close($con);
?>