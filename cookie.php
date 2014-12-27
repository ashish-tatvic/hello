<html>
<body>

<?php
//$name="name";
$value="Ashish Navadiya";
setcookie('name',$value,time() + 1830*30,'/');
if(count($_COOKIE )> 0 )
{
if(!isset($_COOKIE['name']))
{
	echo "cookie not set";
}
else
{
echo $_COOKIE['name'];
}
}
?>

</body>
</html>
