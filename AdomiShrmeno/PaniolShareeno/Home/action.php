<?php ob_start();session_cache_expire(120);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php");include_once('home.php');?>
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
if(isset($_POST["btnSubmitHome"])){
	$sImageBGPath="";
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

	$sImageBGPath=$_FILES["txtImageBGPath"]["name"];
    $sImageBGPathTem = $_FILES["txtImageBGPath"]["tmp_name"];

    $insertDate = date('Y-m-d H:i:s');
    $caption = $_POST['txtCaption'];

    $foto = new Home();
    $foto->homeImgUpdate($sImageBGPath,$sImageBGPathTem,$caption,$insertDate);
}else{
    echo $sMsgUpdateFail;
}
if(isset($_POST['btnSubmitLink']) && isset($_REQUEST['updateidlink'])){
    $linkName = "";$linkURL = "";$id = "";
    $id = $_REQUEST['updateidlink'];
    $linkName = $_POST['txtLink'];
    $linkURL = $_POST['txtLinkURL'];
    // echo $id." - ".$linkName." - ".$linkURL;die();
    $links = new Home();
    $links->linkUpdate($id, $linkName, $linkURL);
}
?>

</div>
</td>
</tr>
<tr><td align="left" valign="top" colspan="2"><?php include_once("../common/footer.php");?></td></tr>
</table>
</body>
</html>