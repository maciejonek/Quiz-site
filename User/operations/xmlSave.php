<?php
$xml = new SimpleXMLElement('<xml/>');
$userID = $xml->addChild('userID');
$userID->addAttribute('userID',$user->id);
$userID->addChild('Login',$user->login);
$userID->addChild('Score',$score);
$userID->addChild('Questions',resultRows($query));
$userID->addChild('Date',date('d-m-Y'));
$userID->addChild('Time',date('H:i:s'));

$doc = new DOMDocument();
$doc->preserveWhiteSpace = false;
$doc->formatOutput = true;
$doc->loadXML($xml->asXML());
$xmlFile =fopen("achievements.xml","w");
fwrite($xmlFile,$doc->saveXML());
fclose($xmlFile);