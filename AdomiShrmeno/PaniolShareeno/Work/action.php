<?php ob_start();session_cache_expire(120);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php");include_once('work.php');?>
<?php if(!isset($_SESSION["sessUserName"])){
	if(trim(isset($_SESSION["sessUserName"]))==""){
		//session_start();
		$_SESSION["sessUserName"]=NULL;
		session_unset();
		session_destroy();
		if(isset($connEMM)){mysqli_close($connEMM);}
		header("location: ".$sAdmnURL);
		exit();
	}
} ?>
<!DOCTYPE html>
<html>
<head>
<title>Album - Insert</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<?php require_once($sAdmnPath."common/resizeLib.php"); ?>

</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" align="center" class="TblMain">
<tr><td align="left" valign="top" colspan="2"><?php //include_once("../common/header.php");?></td></tr>
<tr>
<td align="left" valign="top" class="TdMenu"><?php //include_once($sAdmnPath."common/menuLeft.php"); ?></td>
<td align="left" valign="top">
<div class="DContent">
<?php
if(isset($_POST["btnSubmitIn"])){
	$sName="";
	$sName=$_POST['txtName'];
    $sBrief = $_POST['txtBrief'];
    $iColumn = $_POST['txtColumn'];
    $insert = new Work();
    $insert->createAlbum($sName,$sBrief,$iColumn);
}
else{

    echo $sMsgUpdateFail;
}
if(isset($_POST["btnSubmitUp"])){
    $sName="";
    $iUpdateID=0;
    $sName=$_POST['txtName'];
    $sBrief = $_POST['txtBrief'];
    $iUpdateID=$_REQUEST["updateid"];
    $iColumn = $_POST['txtColumn'];
    $update = new Work();
    $update->updateAlbum($sName,$sBrief,$iColumn,$iUpdateID);
    
}else{

    echo $sMsgUpdateFail;
}
if(isset($_REQUEST["deleteid"]) && $_REQUEST["deletetype"]==2){
	$iDeleteID=fFormatString($_REQUEST["deleteid"]);
	$iDeleteID=filter_var($iDeleteID, FILTER_SANITIZE_NUMBER_INT);
	$iDeleteID=filter_var($iDeleteID, FILTER_VALIDATE_INT);
	if(!is_numeric($iDeleteID)){$iDeleteID=0;}
	if($iDeleteID<0){$iDeleteID=0;}
    $iType=filter_var($_REQUEST["deletetype"], FILTER_SANITIZE_NUMBER_INT);
    $iType=filter_var($iType, FILTER_VALIDATE_INT);
    if(!is_numeric($iType)){$iType=2;}
    if($iType<0){$iType=2;}
    $delete = new Work();
    $delete->deleteAlbum($iDeleteID,$iType);
}
else{
    echo $sMsgUpdateFail;
}
if(isset($_REQUEST["deleteid"]) && $_REQUEST["deletetype"]==1){
	$iDeleteID=fFormatString($_REQUEST["deleteid"]);
	$iDeleteID=filter_var($iDeleteID, FILTER_SANITIZE_NUMBER_INT);
	$iDeleteID=filter_var($iDeleteID, FILTER_VALIDATE_INT);
	if(!is_numeric($iDeleteID)){$iDeleteID=0;}
	if($iDeleteID<0){$iDeleteID=0;}
    $iType=filter_var($_REQUEST["deletetype"], FILTER_SANITIZE_NUMBER_INT);
    $iType=filter_var($iType, FILTER_VALIDATE_INT);
    if(!is_numeric($iType)){$iType=1;}
    if($iType<0){$iType=1;}
    $delete = new Work();
    $delete->deleteAlbum($iDeleteID,$iType);
}
else{
    echo $sMsgUpdateFail;
}
if(isset($_POST["btnSubmitFoto"])){
	$sImageBGPath="";$width="";$iAlbum="";$height="";$gap="";$sVideoPath="";$sVideoPathTem="";


	if($_FILES["txtImageBGPath"]["name"]!=""){
		//Checking File Size
		$iSize=$_FILES["txtImageBGPath"]["size"]/3072;
		if(($iSize==0) || ($iSize<0) || ($iSize>$iMaxImgSizeContentBG) ){
			echo 'BG: '. $sMsgImgUpldSizeMaxBG;die();
		}
		//Checking File Extension
		$iInvalid=array('jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp','webp');
		$sFileName=$_FILES["txtImageBGPath"]["name"];
		$ext=pathinfo($sFileName, PATHINFO_EXTENSION);
		//echo "sFileName: ".$sFileName." - Ext: ".$ext."<br>";
		if(!in_array($ext, $iInvalid)){echo $sMsgImgInvalidImageExt;die();}

		//Checking Image dimension & FB compatibility
		list($iWidth, $iHeight, $iType, $iAttr)=getimagesize($_FILES["txtImageBGPath"]["tmp_name"]);
		if( ($iWidth=="") || ($iHeight=="")){echo $sMsgImgInvalidImage;die();}
		//echo "iWidth: ".$iWidth." - iHeight: ".$iHeight."<br>";
		elseif( ($iWidth<0) || ($iHeight<0)){echo $sMsgImgInvalidFB;die();}

		$iImgThumbWidth=($iWidth/$iHeight)*$iImgThumbHeight;
		$iImgThumbWidth=round($iImgThumbWidth);
		//echo "iImgThumbWidth: ".$iImgThumbWidth." - iImgThumbHeight: ".$iImgThumbHeight."<br>";
		$iImgSmWidth=($iWidth/$iHeight)*$iImgSmHeight;
		$iImgSmWidth=round($iImgSmWidth);
		//echo "iImgSmWidth: ".$iImgSmWidth." - iImgSmHeight: ".$iImgSmHeight."<br>";
	}
    // if($_FILES["txtVideoath"]["name"] != ""){
        else{
        $sVideoPath = $_FILES["txtVideoath"]["name"];
        $sVideoPathTem = $_FILES["txtVideoath"]["tmp_name"];
        $videoFileType = strtolower(pathinfo($sVideoPath, PATHINFO_EXTENSION));
        $allowedTypes = array("mp4", "avi", "mov", "wmv","ogg");
        if(!in_array($videoFileType, $allowedTypes)){echo $sMsgImgInvalidImageExt;die();}
    }
    $sImageBGPath=$_FILES["txtImageBGPath"]["name"];

    if($sImageBGPath != ""){
        $sFile = $_FILES["txtImageBGPath"]["name"];
        $sFileTmp = $_FILES["txtImageBGPath"]["tmp_name"];
    }else if($sVideoPath != ""){
        $sFile = $_FILES["txtVideoath"]["name"];
        $sFileTmp = $_FILES["txtVideoath"]["tmp_name"];
    }else{
        $sFile = "";
        $sFileTmp = "";
    }

    $height = $_POST['txtHeight'];
    $height = filter_var($_POST['txtHeight'], FILTER_SANITIZE_NUMBER_INT);
    $height = filter_var($_POST['txtHeight'], FILTER_VALIDATE_INT);
    $height  = is_numeric($_POST['txtHeight']) ? $_POST['txtHeight'] : null;

	$width=$_POST['txtWidth'];
    $width = filter_var($_POST['txtWidth'], FILTER_SANITIZE_NUMBER_INT);
    $width = filter_var($_POST['txtWidth'], FILTER_VALIDATE_INT);
    $width  = is_numeric($_POST['txtWidth']) ? $_POST['txtWidth'] : null;

    $gap = filter_var($_POST['txtGap'], FILTER_SANITIZE_NUMBER_INT);
    $gap = filter_var($_POST['txtGap'], FILTER_VALIDATE_INT);
    $gap  = is_numeric($_POST['txtGap']) ? $_POST['txtGap'] : 2;

	$iAlbum=$_POST['txtAlbumName'];
    $insertDate = date('Y-m-d H:i:s');
    $caption = $_POST['txtCaption'];
    $iVidImd = $_POST['txtimgorvid'];

    $foto = new Work();
    $foto->fotoInsert($gap,$iAlbum,$sFile,$sFileTmp,$width,$height,$insertDate,$caption,$iVidImd);
}else{
    echo $sMsgUpdateFail;
}

if(isset($_POST["btnSubmitfotoUp"]) && isset($_REQUEST["fotoupdateid"])){
	$sImageBGPath="";$width="";$iAlbum="";$height="";$gap="";$caption="";$sVideoPath="";$sVideoPathTem="";

    $iUpdateID=0;
    if(isset($_REQUEST["fotoupdateid"])){
        $iUpdateID=fFormatString($_REQUEST["fotoupdateid"]);
        $iUpdateID=filter_var($iUpdateID, FILTER_SANITIZE_NUMBER_INT);
        $iUpdateID=filter_var($iUpdateID, FILTER_VALIDATE_INT);
        if(!is_numeric($iUpdateID)){$iUpdateID=0;}
        if($iUpdateID<0){$iUpdateID=0;}
    }

	if($_FILES["txtImageBGPath"]["name"]!=""){
		//Checking File Size
		$iSize=$_FILES["txtImageBGPath"]["size"]/3072;
		if(($iSize==0) || ($iSize<0) || ($iSize>$iMaxImgSizeContentBG) ){
			echo 'BG: '. $sMsgImgUpldSizeMaxBG;die();
		}
		//Checking File Extension
		$iInvalid=array('jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp','webp');
		$sFileName=$_FILES["txtImageBGPath"]["name"];
		$ext=pathinfo($sFileName, PATHINFO_EXTENSION);
		//echo "sFileName: ".$sFileName." - Ext: ".$ext."<br>";
		if(!in_array($ext, $iInvalid)){echo $sMsgImgInvalidImageExt;die();}

		//Checking Image dimension & FB compatibility
		list($iWidth, $iHeight, $iType, $iAttr)=getimagesize($_FILES["txtImageBGPath"]["tmp_name"]);
		if( ($iWidth=="") || ($iHeight=="")){echo $sMsgImgInvalidImage;die();}
		//echo "iWidth: ".$iWidth." - iHeight: ".$iHeight."<br>";
		elseif( ($iWidth<0) || ($iHeight<0)){echo $sMsgImgInvalidFB;die();}

		$iImgThumbWidth=($iWidth/$iHeight)*$iImgThumbHeight;
		$iImgThumbWidth=round($iImgThumbWidth);
		//echo "iImgThumbWidth: ".$iImgThumbWidth." - iImgThumbHeight: ".$iImgThumbHeight."<br>";
		$iImgSmWidth=($iWidth/$iHeight)*$iImgSmHeight;
		$iImgSmWidth=round($iImgSmWidth);
		//echo "iImgSmWidth: ".$iImgSmWidth." - iImgSmHeight: ".$iImgSmHeight."<br>";
	}
    // if($_FILES["txtVideoath"]["name"] != ""){
    else if($_FILES["txtVideoath"]["name"] != ""){
        $sVideoPath = $_FILES["txtVideoath"]["name"];
        $sVideoPathTem = $_FILES["txtVideoath"]["tmp_name"];
        $videoFileType = strtolower(pathinfo($sVideoPath, PATHINFO_EXTENSION));
        $allowedTypes = array("mp4", "avi", "mov", "wmv","ogg");
        if(!in_array($videoFileType, $allowedTypes)){echo $sMsgImgInvalidImageExt;die();}
    }
    $sImageBGPath=$_FILES["txtImageBGPath"]["name"];

	if($sImageBGPath != ""){
        $sFile = $_FILES["txtImageBGPath"]["name"];
        $sFileTmp = $_FILES["txtImageBGPath"]["tmp_name"];
    }else if($sVideoPath != ""){
        $sFile = $_FILES["txtVideoath"]["name"];
        $sFileTmp = $_FILES["txtVideoath"]["tmp_name"];
    }else{
        $sFile = "";
        $sFileTmp = "";
    }

    $height = $_POST['txtHeight'];
    $height = filter_var($_POST['txtHeight'], FILTER_SANITIZE_NUMBER_INT);
    $height = filter_var($_POST['txtHeight'], FILTER_VALIDATE_INT);
    $height  = is_numeric($_POST['txtHeight']) ? $_POST['txtHeight'] : null;

	$width=$_POST['txtWidth'];
    $width = filter_var($_POST['txtWidth'], FILTER_SANITIZE_NUMBER_INT);
    $width = filter_var($_POST['txtWidth'], FILTER_VALIDATE_INT);
    $width  = is_numeric($_POST['txtWidth']) ? $_POST['txtWidth'] : null;

    $gap = filter_var($_POST['txtGap'], FILTER_SANITIZE_NUMBER_INT);
    $gap = filter_var($_POST['txtGap'], FILTER_VALIDATE_INT);
    $gap  = is_numeric($_POST['txtGap']) ? $_POST['txtGap'] : 2;

    $caption = $_POST['txtCaption'];
	$iAlbum=$_POST['txtAlbumName'];
    $editedDate = date('Y-m-d H:i:s');
    $iVidImd = $_POST['txtimgorvid'];

    // echo 'gap: '.$gap;
    // echo 'width: '.$width;
    // echo 'height: '.$height;
    // echo 'iAlbum: '.$iAlbum;
    // echo 'insertDate: '.$editedDate;
    // echo 'caption: '.$caption;
    // echo 'iVidImd: '.$iVidImd;
    // echo 'File: '.$sFile;
    // die();

    $foto = new Work();
    $foto->fotoUpdate($iUpdateID,$gap,$iAlbum,$sFile,$sFileTmp,$width,$height,$editedDate,$caption,$iVidImd);
}else{
    echo $sMsgUpdateFail;
}

if(isset($_REQUEST['fotodeleteid']) && isset($_REQUEST['deleteType'])){
    $iDeleteID = $_REQUEST['fotodeleteid'];
    $iDeleteID = filter_var($_REQUEST['fotodeleteid'], FILTER_SANITIZE_NUMBER_INT);
    $iDeleteID = filter_var($_REQUEST['fotodeleteid'], FILTER_VALIDATE_INT);
    if(!is_numeric($iDeleteID)){$iDeleteID=0;}

    $iType = $_REQUEST['deleteType'];
    $iType = filter_var($_REQUEST['deleteType'], FILTER_SANITIZE_NUMBER_INT);
    $iType = filter_var($_REQUEST['deleteType'], FILTER_VALIDATE_INT);
    if(!is_numeric($iType)){$iType=0;}

    $delete = new Work();
    $delete->deleteFoto($iDeleteID,$iType);
}
else{
    echo $sMsgUpdateFail;
}
?>

</div>
</td>
</tr>
<tr><td align="left" valign="top" colspan="2"><?php include_once("../common/footer.php");?></td></tr>
</table>
</body>
</html>