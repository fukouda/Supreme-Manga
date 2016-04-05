<?php

$siteId = "mangareader.net";

$url= "../res/data/mangareader.net.json";
$contents = file_get_contents($url);
$contents = utf8_encode($contents);
$results = json_decode($contents); 



?>
<!DOCTYPE html>
<html>
<title>Supreme Manga</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="height=device-height, initial-scale=1">
<link rel="shortcut icon" href="/imgs/logo.ico">
<link rel="stylesheet" type="text/css" href="/styles/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<script src="/scripts/jquery-2.1.4.min.js"></script>
<script src="/scripts/bootstrap.min.js"></script>


<?php require("../res/menu.php");?>
<body>
<div class="container-fluid" style="margin-top: 0;">
   <div class="row" id="banner-image" >
   
	<img src="/imgs/cover/<?php echo rand(1, 5) ?>.png" style="max-height: 100%; max-width: 100%; width: 100%; height: auto;">

   </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-9">
       <div class="row">
          <div class="col-lg-12">
             <div class="page-header" style="border-bottom:2px solid #efefef;">
                <h1>Manga List</h1>  
		
		<ul class="pagination pagination-sm">
		<li><a href="#A">A</a></li> <li><a href="#B">B</a></li> <li><a href="#C">C</a></li> <li><a href="#D">D</a></li><li><a href="#E">E</a></li> <li><a href="#F">F</a></li> <li><a href="#G">G</a></li> <li><a href="#H">H</a> 
			<a href="#I">I</a></li> <li><a href="#J">J</a></li> <li><a href="#K">K</a></li> <li><a href="#L">L</a></li> <li><a href="#M">M</a></li> <li><a href="#N">N</a></li> <li><a href="#O">O</a></li> <li><a href="#P">P</a></li> <li><a href="#Q">Q</a>
			<a href="#R">R</a></li> <li><a href="#S">S</a></li> <li><a href="#T">T</a></li> <li><a href="#U">U</a></li> <li><a href="#V">V</a></li> <li><a href="#W">W</a></li> <li><a href="#X">X</a></li> <li><a href="#Y">Y</a></li> <li><a href="#Z">Z</a></li>  
	  	</ul>    
                
             </div>
             <div class="panel panel-success">
		<div class="panel-heading"><h1 class="panel-title"><a id="#-9">#-9</a></h1></div><div class="panel-body">
		<?php for($x=0;x<= sizeof($results) - 1; $x++) { if (ucfirst((string)$results[$x]->title[0]) != ucfirst((string)$results[$x - 1]->title[0]) && ctype_alpha((string)$results[$x]->title[0])){ echo '</div><div class="panel-heading"><h1 class="panel-title"><a id="' . strtoupper((string)$results[$x]->title[0]) .'">' . strtoupper((string)$results[$x]->title[0]) .'</a></h1></div><div class="panel-body">'; }else if(empty($results[$x]->title)){ break; } echo "<a href='manga?siteId=" . $siteId . "&mangaId=" . (string)$results[$x]->mangaId . "'>" . (string)$results[$x]->title . "</a><br/>";} ?>
	    </div>
            </div> 
          </div>
       </div>
     </div>
     <div class="col-lg-3">
      <!-- right -->
      <h3>Most Read Manga</h3>
      <hr style="height: 1px; background-color: #dedede;">
      
      <ul class="nav nav-stacked">
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
      </ul>
      <br/>
      <h3>Most Popular Manga</h3>
      <hr style="height: 1px; background-color: #dedede;">
      
      <ul class="nav nav-stacked">
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
      </ul>
      
      
    </div><!-- /span-3 -->
  </div>
</div> 
</body>
</html>
