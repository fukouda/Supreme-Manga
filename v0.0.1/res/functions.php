<?php

require_once 'unirest/src/Unirest.php';

function getMangaSiteId() {

	$url = "https://doodle-manga-scraper.p.mashape.com/";

	$response = Unirest\Request::get($url,
	  array(
	    "X-Mashape-Key" => "key",
	    "Accept" => "text/plain"
	  )
	);


	$responseBody = $response->body;


	foreach($responseBody as $object){

		$sites[] = (string)$object->siteId;

	}

	return $sites;


}

function updateMangaList($siteId) {

	$url = "https://doodle-manga-scraper.p.mashape.com/" . $siteId . "/";

	$response = Unirest\Request::get($url,
	  array(
	    "X-Mashape-Key" => "key",
	    "Accept" => "text/plain"
	  )
	);

	$responseBody = $response->body;


	$myfile = fopen("data/" . $siteId . ".json", "w") or die("Unable to open file!");

	fwrite($myfile, "[\n");

	foreach($responseBody as $object){

		fwrite($myfile, "  {\n");
		fwrite($myfile, "    \"mangaId\": \"" . (string)$object->mangaId . "\",\n\n    \"title\":\"" . (string)$object->name . "\"\n");
		fwrite($myfile, "  },\n");

	}
	fwrite($myfile, "]\n");

	fclose($myfile);

	return 'done';


}

function mangaSearch($siteId, $query) {

	$url = "https://doodle-manga-scraper.p.mashape.com/" . $siteId . "/search?l=100&q=" . $query;

	$response = Unirest\Request::get($url,
	  array(
	    "X-Mashape-Key" => "key",
	    "Accept" => "text/plain"
	  )
	);

	$responseBody = $response->body;

	foreach($responseBody as $object){

		echo "<a href='pages/mangapage?siteId=" . $siteId . "&mangaId=" . (string)$object->mangaId . "'>" . (string)$object->name . "</a><br/>";

	}


}

function mangaInfo($siteId, $mangaId){ 

	$url = "https://doodle-manga-scraper.p.mashape.com/" . $siteId . "/manga/" . $mangaId;

	$response = Unirest\Request::get($url,
	  array(
	    "X-Mashape-Key" => "key",
	    "Accept" => "text/plain"
	  )
	);

	$responseBody = $response->body;


	$manga['title'] = $responseBody->name;

	foreach($responseBody->author as $author){

		$manga['authors'][array_search($author, $responseBody->author)] = correctAuthor($author);
		//echo $author;
		//echo array_search($author, $responseBody->author);

	}
	foreach($responseBody->artist as $artist){

		$manga['artists'][array_search($artist, $responseBody->artist)] = correctAuthor($artist);

	}
	$manga['status'] = ucfirst($responseBody->status);
	$manga['release'] = $responseBody->yearOfRelease;
	foreach($responseBody->genres as $genre){

		$manga['genres'][array_search($genre, $responseBody->genres)] = ucfirst($genre);

	}
	$manga['cover'] = $responseBody->cover;
	$manga['summary'] = $responseBody->info;	
	foreach($responseBody->chapters as $chapter){

		$manga['chapters'][$chapter->chapterId] = $chapter->name;

	}

	return $manga;

}

function correctAuthor($author) {

	$str = str_replace("-", " ", $author);

	$i = 0;
	while( $d = $str[$i] ) {
   
		if( $d == " "){

	        	$out = " ".$temp.$out;
       	
			$temp = "";
		
		}else{

			$temp.=$d;
	
		}

		$i++;
	
	}

	return ucwords($temp.$out);

}

function getChapter($siteId, $mangaId, $chapterId) {

	$url = "https://doodle-manga-scraper.p.mashape.com/" . $siteId . "/manga/" . $mangaId . "/" . $chapterId;	
	
	$response = Unirest\Request::get($url,
	  array(
	    "X-Mashape-Key" => "key",
	    "Accept" => "text/plain"
	  )
	);

	$responseBody = $response->body;

	$chapter[0] = $responseBody->name;

	foreach($responseBody->pages as $page){

		$chapter[$page->pageId] = $page->url;
	
	}

	return $chapter;

}

?>
