<?php

require_once '../res/functions.php';

$manga = mangaInfo($_GET['siteId'], $_GET['mangaId']);

?>
<!DOCTYPE html>
<html>
<title>Supreme Manga - <?php echo $manga['title']; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="height=device-height, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../styles/styles.css">
<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<script src="../scripts/jquery-2.1.4.min.js"></script>
<script src="../scripts/bootstrap.min.js"></script>

<script>

	/*$(document).ready(function() {
			$.(function() {

			});
		  }); */
</script>

<style>


</style>

<?php require("../res/menu.php");?>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-9">
       <div class="row">
          <div class="col-lg-16">
             <div class="page-header" style="border-bottom:2px solid #efefef;">
                <h1><?php echo $manga['title']; ?></h1>      
             </div>
             <div class="col-sm-4">
             
		<img src="<?php if(empty($manga['cover'])){ echo '/imgs/not-found.png'; } else {echo $manga['cover'];} ?>" style="border-radius: 25px; border: 2px solid #8AC007;">

             </div>
	     <div class="col-sm-8">

		
		<table class="table-hover table" id="infotable">

			<tr>
		
				<td>Title: </td>

				<td><?php echo $manga['title']; ?></td>

			</tr>

			<tr>
				<td>Author(s):&nbsp;&nbsp;</td>

				<td><?php foreach($manga['authors'] as $authors) { echo $authors . "<br/>"; }?></td>

			<tr>
				<td>Artist(s): </td>

				<td><?php foreach($manga['artists'] as $artists) { echo $artists . "<br/>"; }?></td>

			</tr>

			<tr>
				<td>Status: </td>

				<td><?php echo $manga['status'];?></td>

			
			</tr>
			<tr>
				<td>Released: </td>

				<td><?php echo $manga['release'];?></td>

			
			</tr>
			<tr>
				<td>Genre(s): </td>

				<td><?php foreach($manga['genres'] as $genre) { echo $genre . "<br/>"; }?></td>

			
			</tr>
			<tr>
				<td>Synopsis: </td>

				<td style="text-align: justified;"><?php echo $manga['summary']; ?></td>

			
			</tr>

		

		</table>

	     </div>
	     <table class="table-hover" style="width: 100%;">


		<thead>

			<th style="text-align:center; padding-bottom: 2%;"> &nbsp;Chapter #&nbsp;</th>
			<th style="padding-left: 10%;padding-bottom: 2%;"> &nbsp;Chapter Title&nbsp;</th>

		</thead>		


		<tbody>

		<?php $i = 1; foreach($manga['chapters'] as $chapter){ if(isset($chapter)){ $title = $chapter; }else{ $title= 'No Title Available'; } echo "<tr><td align='center'><a href='read-manga?page=1&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $i . "'>" . $i . "</a></td><td style='padding-left: 10%;'><a href='read-manga?page=1&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $i . "'>" . $title . "</a></tr>"; $i++; }?>

		</tbody>
	     </table>
          </div>
       </div>
     </div>
     <div class="col-sm-3">
      <!-- right -->
      <h3>Most Read Manga</h3>
      <hr style="height: 1px; background-color: #efefef;">
      
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
</body>