<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$s="select * from emp LIMIT 2 OFFSET 1";
$result=$conn->query($s);
 if ($result-> num_rows > 0)
	{
		while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - pass: " . $row["pass"].  "<br>";
		}
    }
	else
	{
		echo "no rows";
	}
	



  // the rest of your code
/*
$firstname= $lastname= $email="";
$stmt->bind_param( "sss",$firstname, $lastname, $email);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";

$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
}*/
?>