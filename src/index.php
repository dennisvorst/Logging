<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require_once "class/Logging.php";

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
	<!-- set the UTF-8 properties -->
	<!-- as defined in : https://www.toptal.com/php/a-utf-8-primer-for-php-and-mysql -->
    <meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Logging component</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- initiate font awesome -->
    <link rel="stylesheet" href="3rd/css/font-awesome.min.css">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="css/style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="css/style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="css/style.responsive.css" media="all">


	<style>
	.art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px;  }
    .ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
    .ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
    </style>
</head>
<body>

<?php
$logs = new Logging();
?>
<?php
$logs->Info("Started");
?>
<?php
$logs->Error("Started");
?>
<?php
$logs->Warning("Started");
?>
<?php
$logs->Debug("Started");
?>

</body>
</html>