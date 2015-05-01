<?php

include 'includes/debugging.php';
if ($_SERVER['HTTP_HOST'] == "beta.napchart.com") {
    if (isset($_GET['test'])) {
        if ($_GET['test'] != "horse") {
            header("Location: http://napchart.com/");
            die();
        }
    }
}
if ($_SERVER['HTTP_HOST'] === "localhost" || $_SERVER['HTTP_HOST'] === "beta.napchart.com") {
    $local = true;
}else {
    $local = false;
}

//ChromePhp::log( 'Hello console!');
if ($local) {
}

//check url. WHICH PAGE SHOULD PHP DELIVER?
if(!isset($_GET["chartid"])){
	$pagetype="chart";
}
else{
	if($_GET["chartid"]=="about")
		$pagetype="about";
	else if(strlen($_GET["chartid"])==5)
	$pagetype="chart";
	else
	$pagetype="404";
}

ChromePhp::log($pagetype);

ob_start();
?><!DOCTYPE html>

<head>
    <title>Napchart - Polyphasic Sleep Visualizer</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/css.css?v=0.d47">
    <meta name="description" content="Polyphasic 24-hour clock web app">
    <meta http-equiv="pragma" content="no-cache"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script src="js/jquery-1.11.1.js?v=0.5"></script>
	<script src="js/hidpi-canvas.min.js"></script>
    <script src="js/declarations.js?v=0.5"></script>
    <script src="js/standalonefunctions.js?v=0.5"></script>
    <script src="js/inputhandler.js?v=0.5"></script>
    <script src="js/dynamics.js?v=0.5"></script>
    <script src="js/interactCanvas.js?v=0.5"></script>
    <script src="js/statistics.js?v=0.5"></script>
	<script src="zeroclipboard/ZeroClipboard.min.js"></script>
    <script src="js/js.js?v=0.5"></script>
    <script src="js/draw.js?v=0.5"></script>
    <script src="js/buttons.js?v=0.51"></script>
    <script src="js/onload.js?v=0.5"></script>
<link rel="apple-touch-icon" sizes="57x57" href="../apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="../favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="../favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="../favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="../android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="../favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="../manifest.json">
<meta name="msapplication-TileColor" content="#b91d47">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<meta name="theme-color" content="#a33333">
   
    <script src="js/debugger.js"></script>
    <?php
    if ($local) {
        ?>
        <script src="js/snippets.js"></script>
        <script>
            local = true;
        </script>
    <?php
    }else {
        include_once 'includes/tracking.php';
        }
    ob_start();
    ?>
</head>

<body>
    <div id="debugger"></div>
<?php if ($local) { ?>
<script>
window.ga=function(){};
</script>
<?php } ?>

<div id="messageBar">
<div id="innerMessageBar">
	<span id="logo"><a href="">napchart</a></span>
<div id="saveform">
<div id="savebutton"><i id="saveicon" class="fa fa-link"></i>save</div>
<input spellcheck="false" value="napchart.com/fT6Ty" type="text" id="saveURL">
	<div id="copyLink"><i id="copyLinkIcon" class="fa fa-copy"></i></div>
    </div>
    
    <span id="shareButtons">
    <a href="#"><i class="fa fa-facebook-square"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-pinterest"></i></a>
    </span>
    

<div class"shareButtons"></div>

</div>
</div>



</div>


<div id="wrapper-id" class="wrapper">
    <!-- wraps around all elements-->
	<?php

	if($pagetype=="chart")
include 'includes/chartViewer.html.php';
else if($pagetype=="about")
include 'files/about.html';
else if($pagetype=="404")
include 'files/404.html';

?>

</div>
    <div id="footer">
<div id="innerFooter">
Created by me. Thanks to everyone who has given feedback. You can find me at reddit or twitter or even real life. Contact at own risk.
</div>
</div>
</body>
</html>