<!DOCTYPE html>
<html>
<body>

<?php
libxml_use_internal_errors(true);
/*$myXMLData =
"<?xml version='1.0' encoding='UTF-8'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</fgheading>
<body>Don't forget me this weekend!</body>
</note>";
*/
$xml=simplexml_load_file('xml1.xml');
if($xml==false)
{
	echo "sorry xml cna't loaded";
	foreach(libxml_get_errors() as $error) {
        echo "<br>", $error->message;
    }
}
else
{
	
    echo $xml->book[0]['category']  . " <br>"; 
    echo $xml->book[1]->title['lang'] . ", "; 
    /*echo $books->year . ", ";
    echo $books->price . "<br>"; 
*/}
?>

</body>
</html>