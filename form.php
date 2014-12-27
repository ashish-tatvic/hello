<html>

<body>


<?php
$name= $email="";
$errname= $erremail="";
    if($_SERVER["REQUEST_METHOD"]=="GET")
	{
		if(empty($_GET['name']))
		{
			
			$errname='Name required';
		}
		else
		{
				$email=$_GET['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$errname="only text";
			}
		}

	
		
		if(empty($_GET['email']))
		{
			$erremail='email required';
		}
		else
		{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$erremail="emaiul not valid";
			}
		}
		
	}
	
	


	echo $name;
	echo $email;

  include "first.php"	
	
	?>



<form action="form.php" method="get">
Name: <input type="text" name="name"><br><span >* <?php echo $errname;?></span>
   <br><br>
E-mail: <input type="text" name="email"><br><span >* <?php echo $erremail;?></span>
<input type="submit">
</form>

<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);
?>


</body>
</html>