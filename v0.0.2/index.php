<?php

?>
<!DOCTYPE html>
<html>
<title>Supreme Manga</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="height=device-height, initial-scale=1">
<link rel="shortcut icon" href="imgs/logo.ico">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<script src="scripts/jquery-2.1.4.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>


<?php require("res/menu.php");?>
<body>
<div class="container-fluid" style="margin-top: 0;">
   <div class="row" id="banner-image" >
   
	<img src="imgs/cover/<?php echo rand(1, 5) ?>.png" style="max-height: 100%; max-width: 100%; width: 100%; height: auto;">

   </div>
</div>
<div class="container">
  <div class="row" >
    <div class="col-sm-9">
       <div class="row">
          <div class="col-lg-12">
             <div class="page-header" style="border-bottom:2px solid #efefef;">
                <h1>Recently Updated Manga</h1>      
             </div>
             <p>TEST</p>      
             <p>TEST2</p>  
          </div>
       </div>
     </div>
     <div class="col-sm-3">
      <h3>Most Read Manga</h3>
      <hr style="height: 2px; background-color: #efefef;">
      
      <ul class="nav nav-stacked">
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
        <li><p>TEST</p> </li>
      </ul>
      
      
    </div>
  </div>
</div> 
</bodY>
</html>
