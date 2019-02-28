<?php
    $Entity="UserProfile";
    $EntityLower=strtolower($Entity);

    $User=SQL_Select($Entity="User", $Where="U.UserUUID = '".$_SESSION["UserUUID"]."'", $OrderBy="", $SignleRow=true, $Debug=false);

    $FormTitle="Role Permission";
    $ButtonCaption="Update Permission";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script="rolepermissionupdate");
    

    $Echo.='
        <script>
            jQuery(document).ready(function() {
                jQuery("#selectall").on("click", function () {
                    jQuery(this).closest(".frmTbl").find(".permission").prop("checked", this.checked);
                });
                jQuery("#UserTypeUUID").change(function(){
                    var selectVal = $(this).val();
                    jQuery.ajax({
                        url: "'.ApplicationURL($Theme=$_REQUEST["Theme"],$Script="rolepermissionload","mco=t&utid=\"+selectVal+\"").'",
                        success: function(data) {
                            jQuery(".perm").html(data);
                            jQuery("#basic-preview").hide();
                        }    
                    });
                    jQuery.ajax({
                        url: "'.ApplicationURL($Theme=$_REQUEST["Theme"],$Script="userloadbytype","mco=t&utid=\"+selectVal+\"").'",
                        success: function(data) {
                            jQuery("#UserUUID").html(data);
                            jQuery("#basic-preview").hide();
                        }
                    });
                });
                jQuery("#UserUUID").change(function(){
                    var usertype = jQuery("#UserTypeUUID").val();
                    var selectVal = $(this).val();
                    jQuery.ajax({
                        url: "'.ApplicationURL($Theme=$_REQUEST["Theme"],$Script="rolepermissionload","mco=t&utid=\"+usertype+\"&uid=\"+selectVal+\"").'",
                        success: function(data) {
                            jQuery(".perm").html(data);
                            jQuery("#basic-preview").hide();
                        }
                    });
                });
            });
            function highlight(chk){
                if($("#"+chk).is(":checked")) {
                    var lst = $("#"+chk).parents("li");
                    lst.addClass("selected");
                } else {
                    var lst = $("#"+chk).parents("li");
                    lst.removeClass("selected");
                }
            }
        </script>
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default frmTbl">
			        <div class="panel-header bg-dark"><h2>'.$FormTitle.'</h2></div>
			        <div class="panel-content bg-white">
				        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="content-loading"></div>
                                <label><input type="checkbox" id="selectall" title="Check All" /> Select All</label>
                                <form id="app-form" class="" enctype="multipart/form-data" method="post" action="'.$ActionURL.'" name="frmuserprofileInsertUpdate">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">User Type </label>
                                                <div class="append-icon">
                                                    '.CCTL_UserTypeLookup($Name="UserTypeUUID", $ValueSelected="", $Where="",$PrependBlankOption=true).'
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">User</label>
                                                <div class="append-icon">
                                                    <select id="UserUUID" class="FormComboBox" style="" name="UserUUID">
                                                        <option value="">Select User</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="perm"></ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <div class="pull-right">
                                                <input id="btnSubmit" class="btn btn-embossed btn-primary m-r-20 ladda-button" type="submit" data-style="expand-right" value="'.$ButtonCaption.'" name="btnSubmit">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="basic-preview" class="preview active" style="display:none">
                                        <div class="alert media fade in alert-success">
                                            <p></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';