<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("xml1.xml");

print $xmlDoc->saveXML();
?>