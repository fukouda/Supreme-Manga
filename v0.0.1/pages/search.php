<?php

require_once 'res/functions.php';

$query = $_GET["q"];

$siteId = "mangareader.net";

?>
<!DOCTYPE html>
<html>
<title>Supreme Manga</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="height=device-height, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<script src="scripts/jquery-2.1.4.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>

<script>

	/*$(document).ready(function() {
			$.(function() {

			});
		  }); */
</script>

<?php require("res/menu.php");?>

<body>
<div class="container">
  <div class="row">
    <div class="col-sm-9">
       <div class="row">
          <div class="col-lg-12">
             <div class="page-header" style="border-bottom:5px solid #efefef;">
                <h1>Results</h1>      
             </div>
             <?php mangaSearch($siteId, $query); ?>
          </div>
       </div>
     </div>
     <div class="col-sm-3">
      <!-- right -->
      <h3>Most Read Manga</h3>
      <hr style="height: 3px; background-color: #efefef;">
      
      <ul class="nav nav-stacked">
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
        <!--<li><a href="javascript:;"><i class="glyphicon glyphicon-stats"></i> Activity Logs</a></li>
        <li><a href="javascript:;"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
        <li><a href="javascript:;"><i class=""></i> </a></li>-->
      </ul>
      
      
    </div><!-- /span-3 -->
  </div>
</div> 