<?php

require_once 'res/functions.php';

$manga = getChapter($_GET['siteId'], $_GET['mangaId'], $_GET['chapterId']);

$info = mangaInfo($_GET['siteId'], $_GET['mangaId']);

$nextpage = $_GET['page'] + 1;

$previouspage = $_GET['page'] - 1;

$nextchapter = $_GET['chapterId'] + 1;

$previouschapter = $_GET['chapterId'] - 1;

?>
<!DOCTYPE html>
<html>
<title><?php echo $info['title'] . " " . $_GET['chapterId'] . " - Page " . $_GET['page']; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="height=device-height, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css">
<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<script src="scripts/jquery-2.1.4.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>

<script>

	/*$(document).ready(function() {
			$.(function() {

			});
		  }); */
</script>
<style>


</style>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=' <?php echo "pages/mangapage?siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId']; ?>'><i class="glyphicon glyphicon-chevron-left"></i> Back to Chapter List</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<h3 style="size: 15%; color: #eeeeee; padding-left: 40vw;"><?php echo $info['title'] . " - Chapter " . $_GET['chapterId'];?></h3>       
    </div>
</nav>

<body>

<a href=' <?php echo "pages/readmanga?page=" . $nextpage . "&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $_GET['chapterId']; ?>'><img class="center-block" id="mangapage" src="<?php echo $manga[$_GET['page']]; ?>"></a>


</body>

    <div class="footer">
    
	<div style="display: inline; font-size: 3vmin; text-align: center;">

	<a id="button" href=' <?php echo "pages/readmanga?page=1&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $previouschapter; ?>'><i class="glyphicon glyphicon-backward"></i> &nbsp;</a>
	<a id="button" href=' <?php echo "pages/readmanga?page=" . $previouspage . "&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $_GET['chapterId']; ?>'><i class="glyphicon glyphicon-chevron-left"></i> &nbsp;</a>
	<a id="button" href=' <?php echo "pages/readmanga?page=" . $nextpage . "&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $_GET['chapterId']; ?>'>&nbsp; <i class="glyphicon glyphicon-chevron-right"></i></a>
	<a id="button" href=' <?php echo "pages/readmanga?page=1&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $nextchapter; ?>'>&nbsp;<i class="glyphicon glyphicon-forward"></i></a>

	</div>       

    </div>

</html>

