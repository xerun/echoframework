<?php

	$Echo.='
            <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">&copy;</span> '.date("Y").' </span>
                <span>'.$Application["Title"].'</span>.
                <span>All rights reserved. </span>
              </p>
              <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
              </p>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->
    </section>
    <!-- BEGIN PRELOADER -->
    <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <div class="modal fade" id="modal-load" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
              <h4 class="modal-title"><strong>Basic</strong> modal</h4>
            </div>
            <div class="modal-body">
              My content...<br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary btn-embossed" data-dismiss="modal">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 

    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/gsap/main-gsap.min.js"></script>
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/charts-chartjs/Chart.min.js"></script>
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/tinymce.js"></script>
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/builder.js"></script> <!-- Theme Builder -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/application.js"></script> <!-- Main Application Script -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/quickview.js"></script> <!-- Chat Script -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/pages/search.js"></script> <!-- Search Script -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap-loading/dist/spin.min.js"></script>
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap-loading/lada.min.js"></script>
	<script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/sweetalert2.min.js"></script> <!-- Search Script -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

    <!-- BEGIN PAGE SCRIPTS -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/jquery-validation/jquery.validate.js"></script> <!-- Form Validation -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/jquery-validation/additional-methods.min.js"></script> <!-- Form Validation Additional Methods - OPTIONAL -->
    <!-- END  PAGE SCRIPTS -->
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/layout.js"></script>    
    <script type="text/javascript" src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/custom.js"></script>
	';