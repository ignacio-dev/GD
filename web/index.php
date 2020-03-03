<?php
	
	require_once('back/config/bootstrap.php');
	#ob_start('minimizeHtmlOutput');

?>
<!DOCTYPE html>
<html>
<? require_once('front/inc/head.php') ?>
<body>
	<? require_once('front/inc/header.php') ?>
	<main>
		<? new Content\Main() ?>
	</main>
	<? require_once('front/inc/scripts.php') ?>
</body>
</html>