<?php

require_once '../res/functions.php';

$manga = getChapter($_GET['siteId'], $_GET['mangaId'], $_GET['chapterId']);

$info = mangaInfo($_GET['siteId'], $_GET['mangaId']);

$nextpage = $_GET['page'] + 1;

$previouspage = $_GET['page'] - 1;

$nextchapter = $_GET['chapterId'] + 1;

$previouschapter = $_GET['chapterId'] - 1;

if (empty($manga[$_GET['page']])){


	header('Location: read-manga?page=1&siteId=' . $_GET['siteId'] . '&mangaId=' . $_GET['mangaId'] . '&chapterId=' . $nextchapter);

	die();


}
else if ($_GET['page'] == 0){

	$manga2 = getChapter($_GET['siteId'], $_GET['mangaId'], $previouschapter);

	$lastpage = sizeof($manga2) - 1;

	header('Location: read-manga?page=' . $lastpage . '&siteId=' . $_GET['siteId'] . '&mangaId=' . $_GET['mangaId'] . '&chapterId=' . $previouschapter);

	die();


}
?>
<!DOCTYPE html>
<html>
<title><?php echo $info['title'] . " " . $_GET['chapterId'] . " - Page " . $_GET['page']; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="height=device-height, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../styles/styles.css">
<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<script src="../scripts/jquery-2.1.4.min.js"></script>
<script src="../scripts/bootstrap.min.js"></script>

<script>

	$(".overlay, .overlay-message").show();

	$('#mangapage').ready(function() {
				$(".overlay, .overlay-message").hide();
			});
</script>
<style>

.overlay {
	position:fixed;
	top:0;
	bottom:0;
	left:0;
	right:0;
	background-color:#000;
	opacity:0.8;
	display:block;
	z-index:1001;
}
.overlay-message{
	
}
</style>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=' <?php echo "manga?siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId']; ?>'><i class="glyphicon glyphicon-chevron-left"></i> Back to Chapter List</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<h3 style="size: 15%; color: #eeeeee; padding-left: 40vw;"><?php echo $info['title'] . " - Chapter " . $_GET['chapterId'];?></h3>       
    </div>
</nav>

<body>

<a href=' <?php echo "read-manga?page=" . $nextpage . "&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $_GET['chapterId']; ?>'><img class="center-block" id="mangapage" src="<?php echo $manga[$_GET['page']]; ?>"></a>

<div class="overlay"></div>
<span class="overlay-message">

</span>

</body>

    <div class="footer" style="text-align: center;">
    
	<div style="display: inline; font-size: 3vmin;">

	<a id="button" style="margin-left: auto;" href=' <?php echo "read-manga?page=1&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $previouschapter; ?>'><i class="glyphicon glyphicon-backward"></i> &nbsp;</a>
	<a id="button" href=' <?php echo "read-manga?page=" . $previouspage . "&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $_GET['chapterId']; ?>'><i class="glyphicon glyphicon-chevron-left"></i> &nbsp;</a>
	<a id="button" href=' <?php echo "read-manga?page=" . $nextpage . "&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $_GET['chapterId']; ?>'>&nbsp; <i class="glyphicon glyphicon-chevron-right"></i></a>
	<a id="button" style="margin-left: auto;" href=' <?php echo "read-manga?page=1&siteId=" . $_GET['siteId'] . "&mangaId=" . $_GET['mangaId'] . "&chapterId=" . $nextchapter; ?>'>&nbsp;<i class="glyphicon glyphicon-forward"></i></a>

	</div>       

    </div>

</html>

