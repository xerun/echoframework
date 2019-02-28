<?php
	/*
		Script:		staticcontent.php
		Author:		PRITHU AHMED
		Purpose:	Implement the dynamic static content functionality
		Date:		Last updated 25-01-12
		Note:		
	*/

	//Return the static content. It automatically determines the current language code
	//$StaticContentName {string} =   Name of the content to return
	function StaticContent($StaticContentName){
		
	    DebugFunctionTrace($FunctionName="StaticContent", $Parameter=array("StaticContentName"=>$StaticContentName), $UseURLDebugFlag=true);

		global $Application;
	    $StaticContent=SQL_Select($Entity="StaticContent", $Where="SC.StaticContentName = '$StaticContentName' AND L.LanguageCode = '{$_REQUEST["LanguageCode"]}'", $OrderBy="SC.StaticContentName", $SingleRow=true);
        $StaticContentHTML=$StaticContentID=$StaticContentUUID="";
	    if(count($StaticContent)>0){
	        $StaticContentHTML.='
			<div class="row">
				<div class="col-md-12 portlets ui-sortable">
					<div class="panel">
			';
			if($_SESSION["UserTypeUUID"]==$Application["UserTypeIDSuperAdmin"] || $_SESSION["UserTypeUUID"]==$Application["UserTypeIDAdmin"]){
				$ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script="staticcontenteditaction","mco=t&StaticContentName=".$StaticContent["StaticContentName"]);
			$StaticContentHTML.='
						<div class="panel-content static-edit hide">
							<form name="frmStaticContentInsertUpdate" class="form-horizontal" id="app-form" action="'.$ActionURL.'" method="post" enctype="multipart/form-data" >
								<div class="row">
									<div class="col-md-12">
										<div id="StaticContentEdit">
											<textarea  id="StaticContent" name="StaticContent" class="tmce">'.$StaticContent["StaticContent"].'</textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-9 col-sm-offset-3">
										<div class="pull-right">
											<button class="cancel btn btn-embossed btn-default m-b-10 m-r-0" type="BUTTON" style="border:none" >Cancel</button>
											<button id="btnSubmit" class="btn btn-embossed btn-primary m-r-20 ladda-button" type="submit" name="btnSubmit" title="" size="" data-style="expand-right" style="" >Submit</button>
										</div>
									</div>
								</div>
							</form>
						</div>
			';
			}
			$StaticContentHTML.='
						<div class="panel-content static-view">
							<div class="row">
								<div class="col-md-12">
									<div id="StaticContent">'.$StaticContent["StaticContent"].'</div>
									<button class="btn btn-embossed btn-primary m-r-20 edit-content" type="button" name="btnSubmit"  >Edit Content</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			';
	        $StaticContentID=$StaticContent["StaticContentID"];
	        $StaticContentUUID=$StaticContent["StaticContentUUID"];
		}
	    //&&isset($_REQUEST["StaticContentEdit"])
	    //if(isset($_REQUEST["StaticContentEdit"]))$StaticContentHTML.=" <a href=\"#\" class=\"StaticContentControlButton\" onclick=\"PopUpStaticContentEditor('$StaticContentName')\">EDIT CONTENT</a>";
	    return $StaticContentHTML;
	}