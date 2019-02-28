<?php
	$BeforeEcho.='
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="admin-themes-lab">
		<meta name="author" content="themes-lab">
		<link rel="shortcut icon" href="../assets/global/images/favicon.png" type="image/png">
		<title>'.$Application["Title"].'</title>
		<link href="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/css/style.css" rel="stylesheet">
		<link href="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/css/theme.css" rel="stylesheet">
		<link href="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/css/ui.css" rel="stylesheet">
		<link href="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/css/layout.css" rel="stylesheet">
		<link href="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<link href="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet">
		<link href="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'//plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
		<link href="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/css/sweetalert2.min.css" rel="stylesheet">
		<script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/moment.min.js"></script>
		<script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/jquery/jquery-1.11.1.min.js"></script>
		<script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/datatables/jquery.dataTables.min.js" type="text/javascript" language="javascript" ></script>
		<script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/jquery.form.js" type="text/javascript" language="javascript" ></script>
	';