<?php
$entity=$_REQUEST["entity"];
$entityAlias=$_REQUEST["alias"];
$pagename=$_REQUEST["pagename"];
$columns=$_REQUEST["columns"];
$columnSearch = explode(",",$_REQUEST['clmsearch']);
$columnType = explode(",",$_REQUEST['clmtype']);
$search=$_REQUEST["search"]["value"];
$orderclm=$_REQUEST["order"][0]["column"];
$orderO=$_REQUEST["order"][0]["dir"];
$limit = $_REQUEST["length"];
$start = $_REQUEST["start"];
$actionLinks = $_REQUEST["actionLinks"];
$additionalLinks = json_decode(stripslashes($_REQUEST['additionalLinks']),true);
$additionalActionParameter = $_REQUEST["additionalActionParameter"];

$datatable=array();
$datatabledata=array();
$condition="";
if(!empty($_REQUEST["condi"]))$Where=" WHERE ".$_REQUEST["condi"];
if(!empty($search))
{
    if(!empty($_REQUEST["condi"])){
        $condition .= " AND (";
    }else {
        $condition .= " WHERE (";
    }
    $cl=0;
    foreach($columnSearch as $key=>$columnS){
        switch(trim(strtolower($columnType[$key]))) {
            case "text":
                if($cl==0) {
                    $condition .= " " . $columnS . " like '%" . $search . "%' ";
                    $cl++;
                }else{
                    $condition .= " OR " . $columnS . " like '%" . $search . "%' ";
                }
                break;
            case "date":
                if($cl==0) {
                    $condition .= " DATE_FORMAT(" . $columnS . ", '%b %d %Y %h:%i %p') like '%" . $search . "%' ";
                    $cl++;
                }else{
                    $condition .= " OR DATE_FORMAT(" . $columnS . ", '%b %d %Y %h:%i %p') like '%" . $search . "%' ";
                }
                break;
            case "datetime":
                if($cl==0) {
                    $condition .= " DATE_FORMAT(" . $columnS . ", '%b %d %Y %h:%i %p') like '%" . $search . "%' ";
                    $cl++;
                }else{
                    $condition .= " OR DATE_FORMAT(" . $columnS . ", '%b %d %Y %h:%i %p') like '%" . $search . "%' ";
                }
                break;
            case "email":
                if($cl==0) {
                    $condition .= " " . $columnS . " like '%" . $search . "%' ";
                    $cl++;
                }else{
                    $condition .= " OR " . $columnS . " like '%" . $search . "%' ";
                }
                break;
            case "url":
                if($cl==0) {
                    $condition .= " " . $columnS . " like '%" . $search . "%' ";
                    $cl++;
                }else{
                    $condition .= " OR " . $columnS . " like '%" . $search . "%' ";
                }
                break;
        }
    }
    $condition.=")";
}
$select=$SQL_SelectStatement["$entity"];

$order=" order by ".$columns[$orderclm]["data"]." $orderO ";

$sqlC=$select.$Where.$order;
$rstC=MySQLQuery($sqlC,"","",$params,$options);

$sqlF=$select.$Where.$condition.$order;
$rstF=MySQLQuery($sqlF,"","",$params,$options);

$sql=$select.$Where.$condition.$order." LIMIT ".($start).",".$limit;
$rst=MySQLQuery($sql);

$datatable["draw"]=$_REQUEST["draw"];
$datatable["recordsTotal"]=$rstC->num_rows;
$datatable["recordsFiltered"]=$rstF->num_rows;
$i=0;
$sl=1;
while($row=$rst->fetch_object()){
    $ColumnUUID=$entity."UUID";
    $ActionParameter="uuid=".$row->$ColumnUUID;
    $sqlUUID=$row->$ColumnUUID;
    $IsParmanent=$row->IsParmanent;
    if($additionalActionParameter!="")$ActionParameter.="&$additionalActionParameter";
    foreach($additionalLinks as $AdditionalLink){
        $actionLink.="<a href=\"".ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$AdditionalLink["Action"] , $ActionParameter."&".$AdditionalLink["Parameter"])."\" title=\"{$AdditionalLink["Tooltip"]}\"><img src=\"".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/image/datagrid/datagrid_action_".$AdditionalLink["Image"].".png\"></a> ";
    }
    if($actionLinks==1){
        $actionLink.="<a href=\"".ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$pagename."insertupdate", $OtherParameter=$ActionParameter)."\" title=\"Edit\" class=\"edit btn btn-sm btn-default\"><i class=\"icon-note\"></i></a> ";
        if($Row["IsParmanent"]!=1){
            $actionLink.="<input type=\"hidden\" value=\"{$sqlUUID}\" name=\"uuid[]\" class=\"selectedId\" /><a href=\"javascript:;\" title=\"Delete\" class=\"delete btn btn-sm btn-danger\" onclick=\"javascript:action('Delete','".ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$pagename."delete", $OtherParameter="d=1&mco=t&".$ActionParameter)."');\"><i class=\"icons-office-52\"></i></a>
			";
        }
    }
    foreach($columns as $key=>$column){
        $columnData=$column["data"];
        /*if (strpos(strtolower($columnData), 'time') !== false) {
            $datatabledata[$i][$columnData]=$row->$columnData->format("M d, Y");
        }else{
            $datatabledata[$i][$columnData]=$row->$columnData;
        }*/
        //echo $columnType[$key];
        $yesNo="";
        switch(trim(strtolower($columnType[$key]))) {
            case "checkbox":
                $datatabledata[$i][$columnData]= "<input type=\"checkbox\" name=\"multiple_id[]\" class='cschkbox ncheckbox' value=\"".$sqlUUID."\" >";
                break;
            case "serial":
                $datatabledata[$i][$columnData]= $sl;
                break;
            case "text":
                $datatabledata[$i][$columnData]= $row->$columnData;
                break;
            case "textbox":
                $datatabledata[$i][$columnData]= "<input type='text' value='" . $row->$columnData . "' name='" . $columnData . "' id='" . $columnData . "_" . $sl . "' onblur=\"gridTextUpdate('" . $columnData . "_" . $sl . "','$entity','$sqlUUID','$columnData')\" style='width:100%;' />";
                break;
            case "date":
                $datatabledata[$i][$columnData]= date("M j Y",strtotime($row->$columnData));
                break;
            case "datetime":
                $datatabledata[$i][$columnData]= date("M j Y g:i A",strtotime($row->$columnData));
                break;
            case "email":
                $datatabledata[$i][$columnData]= "<a href=\"mailto:" . $row->$columnData . "\" class=\"\" title=\"Send email\"><img src=\"" . $Application["BaseURL"] . "/theme/" . $_REQUEST["Theme"] . "/images/datagrid/datagrid_action_email.png\"/></a>";
                break;
            case "url":
                $datatabledata[$i][$columnData]= "<a href=\"" . $row->$columnData . "\" target=\"_blank\" class=\"\" title=\"Visit web site\"><img src=\"" . $Application["BaseURL"] . "/theme/" . $_REQUEST["Theme"] . "/images/datagrid/datagrid_action_web.png\"/></a>";
                break;
            case "yes/no":
                if ($IsParmanent!= 1) {
                    $yesNo = "<a href=\"javascript:void(0);\" onclick=\"activeToggle('".$entity."','".$sqlUUID."','".$columnData."','".$row->$columnData."')\"><img src=\"" . $Application["BaseURL"] . "/theme/" . $_REQUEST["Theme"] . "/images/datagrid/datagrid_icon_";
                    if ($row->$columnData == 1) {
                        $yesNo .= "yes";
                    } else {
                        $yesNo .= "no";
                    }
                    $yesNo .= ".png\"/></a>";
                } else {
                    $yesNo = "<img src=\"" . $Application["BaseURL"] . "/theme/" . $_REQUEST["Theme"] . "/images/datagrid/datagrid_icon_";
                    if ($row->$columnData == 1) {
                        $yesNo .= "yes";
                    } else {
                        $yesNo .= "no";
                    }
                    $yesNo .= ".png\"/>";
                }
                $datatabledata[$i][$columnData]= $yesNo;
                break;
            case "file":
                if (file_exists($Application["UploadPath"] . $Row[$columnData[$c]]) && $Row[$columnData[$c]]) {
                    $datatabledata[$i][$columnData]= "<a href=\"" . $Application["BaseURL"] . "/" . $Application["UploadPath"] . $row->$columnData . "\" class=\"\" title=\"Download " . $row->$columnData . " \"><img src=\"" . $Application["BaseURL"] . "/theme/" . $_REQUEST["Theme"] . "/images/datagrid_action_download.png\"/></a>";
                } else {
                    $datatabledata[$i][$columnData]= "<img src=\"" . $Application["BaseURL"] . "/theme/" . $_REQUEST["Theme"] . "/images/datagrid/datagrid_icon_notavailable.gif\"/>";
                }
                break;
            case "imagelink":
                if (file_exists($Application["UploadPath"] . $row->$columnData) && $row->$columnData) {
                    $datatabledata[$i][$columnData]= "<a href=\"" . $Application["BaseURL"] . "/" . $Application["UploadPath"] . $row->$columnData . "\" class=\"fancybox\" data-fancybox-group=\"gallery\"><img src=\"" . $Application["BaseURL"] . "/" . $Application["UploadPath"] . $row->$columnData . "\" class=\"DataGrid_Image\"/></a>";
                } else {
                    $datatabledata[$i][$columnData]= "<img src=\"" . $Application["BaseURL"] . "/theme/" . $_REQUEST["Theme"] . "/images/datagrid/datagrid_icon_notavailable.gif\"/>";
                }
                break;
            case "profilelink":
                if (file_exists($Application["UploadPicture"] . $row->$columnData) && $row->$columnData) {
                    $datatabledata[$i][$columnData]= "<a href=\"" . $Application["BaseURL"] . "/" . $Application["UploadPicture"] . $row->$columnData . "\" class=\"fancybox\" data-fancybox-group=\"gallery\"><img src=\"" . $Application["BaseURL"] . "/" . $Application["UploadPicture"] . $row->$columnData . "\" class=\"DataGrid_Image\"/></a>";
                } else {
                    $datatabledata[$i][$columnData]= "<img src=\"" . $Application["BaseURL"] . "/theme/" . $_REQUEST["Theme"] . "/images/datagrid/datagrid_icon_notavailable.gif\"/>";
                }
                break;
            case "previewlink":
                if (file_exists($Application["UploadBinodonPreviewPath"] . $row->$columnData) && $row->$columnData) {
                    $datatabledata[$i][$columnData]= "<a href=\"" . $Application["BaseURL"] . "/" . $Application["UploadBinodonPreviewPath"] . $row->$columnData . "\" class=\"fancybox\" data-fancybox-group=\"gallery\"><img src=\"" . $Application["BaseURL"] . "/" . $Application["UploadBinodonPreviewPath"] . $row->$columnData . "\" class=\"DataGrid_Image\"/></a>";
                } else {
                    $datatabledata[$i][$columnData]= "<img src=\"" . $Application["BaseURL"] . "/theme/" . $_REQUEST["Theme"] . "/images/datagrid/datagrid_icon_notavailable.gif\"/>";
                }
                break;
            case "pdfpreviewlink":
                if (file_exists($Application["UploadMlibraryPreviewPath"] . $row->$columnData) && $row->$columnData) {
                    $datatabledata[$i][$columnData]= "<a href=\"" . $Application["BaseURL"] . "/" . $Application["UploadMlibraryPreviewPath"] . $row->$columnData . "\" class=\"fancybox\" data-fancybox-group=\"gallery\"><img src=\"" . $Application["BaseURL"] . "/" . $Application["UploadMlibraryPreviewPath"] . $row->$columnData . "\" class=\"DataGrid_Image\"/></a>";
                } else {
                    $datatabledata[$i][$columnData]= "<img src=\"" . $Application["BaseURL"] . "/theme/" . $_REQUEST["Theme"] . "/images/datagrid/datagrid_icon_notavailable.gif\"/>";
                }
                break;
            case "action":
                if($actionLinks==1 or count($AdditionalLinks)>0){$actionLink;
                    $datatabledata[$i][$columnData]= $actionLink;
                }
                break;
        }
    }
    $actionLink="";
    $sl++;
    $i++;
}
$datatable["data"]=$datatabledata;
echo json_encode($datatable);