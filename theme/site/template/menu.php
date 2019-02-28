<?php
$homeLink="report-campaign-summary";
if($_SESSION["UserTypeUUID"]==$Application["UserTypeIDSuperAdmin"]) {
    $homeLink="home";
}
    $Echo.='
    <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <h1>
            <a href="'.ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$homeLink).'"></a>
          </h1>
        </div>
        <div class="sidebar-inner">
          <div class="menu-title">
            Navigation
            <!--<div class="pull-right menu-settings">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300">
              <i class="icon-settings"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#" id="reorder-menu" class="reorder-menu">Reorder menu</a></li>
                <li><a href="#" id="remove-menu" class="remove-menu">Remove elements</a></li>
                <li><a href="#" id="hide-top-sidebar" class="hide-top-sidebar">Hide user &amp; search</a></li>
              </ul>
            </div>-->
          </div>
          <ul class="nav nav-sidebar">
          ';
        if($_SESSION["UserTypeUUID"]==$Application["UserTypeIDSuperAdmin"]) {
            $Echo.='
            <li id="home"><a href="'.ApplicationURL($Theme=$_REQUEST["Theme"],$Script="home").'"><i class="icon-home"></i><span>Home</span></a></li>
            ';
        }
    $Menus=SQL_Select($Entity="PermissionMenu", $Where="P.UserTypeUUID = '".$_SESSION["UserTypeUUID"]."' AND M.MenuPosition='Admin' AND M.MenuIsActive=1", $OrderBy="M.MenuName", $SingleRow=false);
    if(!empty($Menus)) {
        $Echo.='
            <li class="nav-parent">
                <a href="#"><i class="icon-layers"></i><span>Admin</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
        ';
        if($_SESSION["UserTypeUUID"]==$Application["UserTypeIDSuperAdmin"]) {
            $Echo .= '
                    <li id="menumanage"><a href="' . ApplicationURL($Theme = $_REQUEST["Theme"], $Script = "menumanage") . '"><i class="icon-note"></i><span>Manage Menu</span></a></li>';
        }
        foreach ($Menus as $Row) {
            $Echo .= '
                    <li id="'.$Row["MenuUrl"].'"><a href="' . ApplicationURL($Theme = $_REQUEST["Theme"], $Script = $Row["MenuUrl"]) . '"><i class="icon-note"></i><span>' . $Row["MenuName"] . '</span></a></li>
        ';
        }
        $Echo.='
                </ul>
            </li>
        ';
    }
    $Menus=SQL_Select($Entity="PermissionMenu", $Where="P.UserTypeUUID = '".$_SESSION["UserTypeUUID"]."' AND M.MenuPosition='Manage' AND M.MenuIsActive=1", $OrderBy="M.MenuName", $SingleRow=false);
    if(!empty($Menus)) {
        $Echo.='
            <li class="nav-parent">
                <a href="#"><i class="icon-note"></i><span>Manage</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
';
        foreach ($Menus as $Row) {
            $Echo .= '
                    <li id="'.$Row["MenuUrl"].'"><a href="' . ApplicationURL($Theme = $_REQUEST["Theme"], $Script = $Row["MenuUrl"]) . '"><i class="icon-note"></i><span>' . $Row["MenuName"] . '</span></a></li>
';
        }
        $Echo.='
                </ul>
            </li>
';
    }
    $Menus=SQL_Select($Entity="PermissionMenu", $Where="P.UserTypeUUID = '".$_SESSION["UserTypeUUID"]."' AND M.MenuPosition='Report' AND M.MenuIsActive=1", $OrderBy="M.MenuName", $SingleRow=false);
    if(!empty($Menus)) {
        $Echo.='
            <li class="nav-parent">
                <a href="#"><i class="icon-bar-chart"></i><span>Reports</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
';
        foreach ($Menus as $Row) {
            $Echo .= '
                    <li id="'.$Row["MenuUrl"].'"><a href="' . ApplicationURL($Theme = $_REQUEST["Theme"], $Script = $Row["MenuUrl"]) . '"><i class="icon-note"></i><span>' . $Row["MenuName"] . '</span></a></li>
';
        }
        $Echo.='
                </ul>
            </li>
';
    }
        $Echo.='
          </ul>
          <!-- SIDEBAR WIDGET FOLDERS
          <div class="sidebar-widgets">
            <p class="menu-title widget-title">Folders <span class="pull-right"><a href="#" class="new-folder"> <i class="icon-plus"></i></a></span></p>
            <ul class="folders">
              <li>
                <a href="#"><i class="icon-doc c-primary"></i>My documents</a>
              </li>
              <li>
                <a href="#"><i class="icon-picture"></i>My images</a>
              </li>
              <li><a href="#"><i class="icon-lock"></i>Secure data</a>
              </li>
              <li class="add-folder">
                <input type="text" placeholder="Folder\'s name..." class="form-control input-sm">
              </li>
            </ul>
          </div>-->
          <div class="sidebar-footer clearfix">
            <!--<a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
<i class="icon-settings"></i></a>-->
            <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
            <i class="icon-size-fullscreen"></i></a>
            <!--<a class="pull-left" href="user-lockscreen.html" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen">
            <i class="icon-lock"></i></a>-->
            <a class="pull-left btn-effect load-page" href="' . ApplicationURL($Theme = $_REQUEST["Theme"], $Script = "logout","mco=t") . '" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
            <i class="icon-power"></i></a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR -->
      ';
    $menuName=$_REQUEST["Script"];
    if(strpos($menuName,"insertupdate")!==false){
        $menuName=str_replace("insertupdate","manage",$menuName);
    }
    $AfterEcho.='
    <script>
        var menuname="'.$menuName.'";
        $("#"+menuname).addClass("active");
        $("#"+menuname).closest(".nav-parent").addClass("active");
    </script>
    ';