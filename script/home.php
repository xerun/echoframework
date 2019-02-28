<?php
	$BeforeEcho.='<style>canvas {background-image: radial-gradient(#fff, #F5F5F5);width:100% !important;height:100% !important;}</style>';
	$Echo.=StaticContent($StaticContentName="Home")."<br>";
	$AfterEcho.='<script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/widgets/three.min.js"></script><script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/widgets/bas.js"></script><script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/slider.js"></script>';
?>	