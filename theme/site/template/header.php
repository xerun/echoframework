<?php
    $Echo.='
  <body class="fixed-topbar fixed-sidebar theme-sdtl color-default">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>';
    include "./theme/".$_REQUEST["Theme"]."/template/menu.php";
    $Echo.='
        <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar">
          <div class="header-left">
            <div class="topnav">
              <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
              <!--<ul class="nav nav-icons">
                <li><a href="#" class="toggle-sidebar-top"><span class="icon-user-following"></span></a></li>
                <li><a href="mailbox.html"><span class="octicon octicon-mail-read"></span></a></li>
                <li><a href="#"><span class="octicon octicon-flame"></span></a></li>
                <li><a href="builder-page.html"><span class="octicon octicon-rocket"></span></a></li>
              </ul>-->
            </div>
          </div>
          <div class="header-right">
            <ul class="header-menu nav navbar-nav">
              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/images/avatars/avatar12.png" alt="user image">
                <span class="username">Hi, '.$_SESSION["UserName"].'</span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="' . ApplicationURL($Theme = $_REQUEST["Theme"], $Script = "userprofile") . '"><i class="icon-user"></i><span>My Profile</span></a>
                  </li>
                  <li>
                    <a href="' . ApplicationURL($Theme = $_REQUEST["Theme"], $Script = "passwordreset") . '"><i class="fa fa-key"></i><span>Change Password</span></a>
                  </li>
                  <li>
                    <a href="' . ApplicationURL($Theme = $_REQUEST["Theme"], $Script = "logout","mco=t") . '" class="load-page"><i class="icon-logout"></i><span>Logout</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
              <!-- CHAT BAR ICON
              <li id="quickview-toggle"><a href="#"><i class="icon-bubbles"></i></a></li>-->
            </ul>
          </div>
          <!-- header-right -->
        </div>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
    ';
		