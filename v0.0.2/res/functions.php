<?php

require_once 'unirest/src/Unirest.php';

function getMangaSiteId() {

	$url = "https://doodle-manga-scraper.p.mashape.com/";

	$response = Unirest\Request::get($url,
	  array(
	    "X-Mashape-Key" => "S4X6YXGRxxmshLDxygnESvTmQ3kAp1DSsDDjsnx14NHnev0ocV",
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
	    "X-Mashape-Key" => "S4X6YXGRxxmshLDxygnESvTmQ3kAp1DSsDDjsnx14NHnev0ocV",
	    "Accept" => "text/plain"
	  )
	);

	$responseBody = $response->body;


	$myfile = fopen("data/" . $siteId . ".json", "w") or die("Unable to open file!");


	$arr = array();
	

	foreach($responseBody as $object){

		$x = array('mangaId' => (string)$object->mangaId, 'title' => (string)$object->name);

		$arr[] = $x;
		
	}

	$json = json_encode($arr);

	fwrite($myfile, $json);

	fclose($myfile);

	return 'done';


}

function mangaSearch($siteId, $query) {

	$url = "https://doodle-manga-scraper.p.mashape.com/" . $siteId . "/search?l=100&q=" . $query;

	$response = Unirest\Request::get($url,
	  array(
	    "X-Mashape-Key" => "S4X6YXGRxxmshLDxygnESvTmQ3kAp1DSsDDjsnx14NHnev0ocV",
	    "Accept" => "text/plain"
	  )
	);

	$responseBody = $response->body;

	foreach($responseBody as $object){

		echo "<a href='manga?siteId=" . $siteId . "&mangaId=" . (string)$object->mangaId . "'>" . (string)$object->name . "</a><br/>";

	}


}

function mangaInfo($siteId, $mangaId){ 

	$url = "https://doodle-manga-scraper.p.mashape.com/" . $siteId . "/manga/" . $mangaId;

	$response = Unirest\Request::get($url,
	  array(
	    "X-Mashape-Key" => "S4X6YXGRxxmshLDxygnESvTmQ3kAp1DSsDDjsnx14NHnev0ocV",
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
	    "X-Mashape-Key" => "S4X6YXGRxxmshLDxygnESvTmQ3kAp1DSsDDjsnx14NHnev0ocV",
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