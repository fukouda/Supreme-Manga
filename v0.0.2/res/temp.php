<?php

require_once 'unirest/src/Unirest.php';

/*require_once 'functions.php';

$url= "data/mangareader.net.json";

print $url;

$contents = file_get_contents($url);
$contents = utf8_encode($contents);
$results = json_decode($contents); 

var_dump($results);*/

$url = "https://doodle-manga-scraper.p.mashape.com/mangareader.net/";

	$response = Unirest\Request::get($url,
	  array(
	    "X-Mashape-Key" => "S4X6YXGRxxmshLDxygnESvTmQ3kAp1DSsDDjsnx14NHnev0ocV",
	    "Accept" => "text/plain"
	  )
	);

	echo 'done1';

	$responseBody = $response->body;


	$myfile = fopen("data/test.json", "w") or die("Unable to open file!");


	$arr = array();


	$i = 0;

	foreach($responseBody as $object){

		$x = array('mangaId' => (string)$object->mangaId, 'title' => (string)$object->name);

		$arr[] = $x;
		
	}

	$json = json_encode($arr);

	fwrite($myfile, $json);

	fclose($myfile);

	echo 'done';


?>