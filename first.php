
<html>
<body>
<?php
/*
class hello
{
	function hello()
	{
			$this->mode= str_replace("world","Ashish","Hello world1123") ;
			
	}
}

$a=new hello();
echo "$a->mode";

define("b","5",true);
echo "sds"."asd";


*/
$x = array("a" => "red", "b" => "green"); 
$y = array("c" => "blue", "d" => "yellow"); 
$z=$x+$y;
print_r  ($z); // union of $x and $y


$t=date("H");

echo $t;
$aa="red1";
switch($aa)
{
case "red" :
				echo "red";
				break;
case "blue" :
				alert("blue");
				break;
 default:
			echo "hello";
			break;
}
   $aaa=array('Ashish','Navadiya');
    
	foreach($aaa as $value)
	{
		echo $value ." ";
	}

	$asd=array('0'=>'5','1'=>'5','2'=>'8','3'=>'7','4'=>'6');
	
	krsort($asd);
	foreach($asd as $x=>$x_value )
	{
		echo $x."  ".$x_value;
	}
	
	
	echo  $_SERVER['PHP_SELF']."<br>";
	echo  $_SERVER['SERVER_NAME'] ."<br>";
	//echo  $_SERVER['HTTP_NAME'];
	echo  $_SERVER['SCRIPT_NAME']."<br>";
//	echo  $_SERVER['HTTP_USER_AGENT_'];
?>   

</body>
</html>