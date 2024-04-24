<?php
define("DB_HOST","localhost");define("DB_USER","busine23_root");define("DB_PASSWORD","9_z9fTbTQB5A");define("DB_NAME","busine23_bangla"); //Web
define("DB_HOSTAudit","localhost");define("DB_USERAudit","busine23_root");define("DB_PASSWORDAudit","9_z9fTbTQB5A");define("DB_NAMEAudit","busine23_audit"); //Web

global $connEMM, $connEMMAudit, $dtDateTime;

if(@mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Please try after a while...")){
	$connEMM=@mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Please try after a while...");
	if($connEMM){
		@mysqli_query($connEMM, "SET CHARACTER SET utf8");
		@mysqli_query($connEMM, "SET SESSION collation_connection='utf8_general_ci'");
	}else{
		trigger_error("Please try after a while...");
		exit();
	}
}else{
	trigger_error("Please try after a while...");
	exit();
}


//Collecting the last iamge folder name
$resultImgFolder=mysqli_query($connEMM, "SELECT * FROM com_monthlyimagefoldername ORDER BY FolderID DESC LIMIT 1") or die(mysqli_error($connEMM));
$rsImgFolder=mysqli_fetch_assoc($resultImgFolder);
$sImgDir=$rsImgFolder["FolderName"];
mysqli_free_result($resultImgFolder);

//Web
$sSiteURL="https://www.banglarkolorob.com/";
$sCurrURL="https://www.banglarkolorob.com".$_SERVER["REQUEST_URI"];


$dtTimeDifference=6*60*60;
$dtDate=gmdate("Y-m-d", time()+$dtTimeDifference);
$dtDateTime=gmdate("Y-m-d G:i:s", time()+$dtTimeDifference);
$dtDateTimeRSS=gmdate("D, d M Y", time()+$dtTimeDifference);


$iMaxImgSizeContentSM=150; /*KiloByte*/
$iMaxImgSizeContentBG=200; /*KiloByte*/
$iMaxImgSizeGallery=200; /*KiloByte*/
$iMaxImgSizeAdvt=300; /*KiloByte*/
$iMaxImgSizeDoc=2048; /*KiloByte - 2MB*/
$iMaxImgSizeAudio=2020480; /*KiloByte 20MB*/

//Image Width & height in pixel
$iImgThumbWidth=138;
$iImgThumbHeight=78;
$iImgSmWidth=245;
$iImgSmHeight=138;
$iImgBgWidth=700;


$sPath=$_SERVER["DOCUMENT_ROOT"];
/*$sProjDir="/banglarkolorob.com/"; //Local
$sPathProjDir=$sPath."/Adp6Ne3l/CoN3tr8ols/"; //Local*/
$sProjDir="/"; //Web
$sPathProjDir=$sPath."/"; //Web




/*If the database and MonthlyImageFolder information is missing the following value will be initialize*/
if(!isset($sImgDir)){$sImgDir="";}
/*Local & Web*/
$UploadImageAll=$sPath.$sProjDir."media/imgAll/".$sImgDir."/";
//$UploadImageAll=$sSiteURL."media/imgAll/".$sImgDir."/";
//echo $UploadImageAll;
?>