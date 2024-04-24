<?php ob_start();session_cache_expire(60);session_start();require_once("../../common/mysqli_conneCT_bangla.php");require_once("../../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

<title>Special Category :: Update (Bangla)</title>

<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">

<?php
echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;
?>
<script type="text/javascript" src="../../common/ckeditor/ckeditor.js"></script>
</head>
<body>
<div id="wrapper" class="toggled">
<?php include_once("../../common/sidebar.php");?>
<!-- Page Content -->
<div id="page-content-wrapper">
<div class="container-fluid">
<?php include_once("../../common/header.php");?>
<div class="page-title"><h3 class="title">Dashboard / Special Category :: Update (Bangla)</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Special Category :: Update (Bangla)</h3>
			</div>
			<div class="panel-body">
				<?php
				if(isset($_POST["btnSubmit"])){
					$iPriority=1;$iShow=1;
					$sSpecialCategoryName="";$sSlug="";$sEndNote="";$sRemarks="";$sImagePathIcon="";$sImagePathMenu="";$sImagePathCoverHome="";$sImagePathCoverInner="";

					$iUpdateID=0;
					if(isset($_REQUEST["updateid"])){
						$iUpdateID=fFormatString($_REQUEST["updateid"]);
						$iUpdateID=filter_var($iUpdateID, FILTER_SANITIZE_NUMBER_INT);
						$iUpdateID=filter_var($iUpdateID, FILTER_VALIDATE_INT);
						if(!is_numeric($iUpdateID)){$iUpdateID=0;}
						if($iUpdateID<0){$iUpdateID=0;}
					}

					if($_FILES["txtImageIcon"]["name"]!=""){
						//Checking File Size
						$iSize=$_FILES["txtImageIcon"]["size"]/1024;
						if(($iSize==0) || ($iSize<0) || ($iSize>$iMaxImgSizeContentSM) ){
							echo $sMsgImgUpldSizeMaxSM;die();
						}

						//Checking File Extension
						$iInvalid=array('jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp');
						$sFileName=$_FILES["txtImageIcon"]["name"];
						$ext=pathinfo($sFileName, PATHINFO_EXTENSION);
						//echo "sFileName: ".$sFileName." - Ext: ".$ext."<br>";
						if(!in_array($ext, $iInvalid)){echo $sMsgImgInvalidImageExt;die();}

						//Checking Image dimension
						list($iWidth, $iHeight, $iType, $iAttr)=getimagesize($_FILES["txtImageIcon"]["tmp_name"]);
						if( ($iWidth=="") || ($iHeight=="")){echo $sMsgImgInvalidImage;die();}
					}
					if($_FILES["txtImageMenu"]["name"]!=""){
						//Checking File Size
						$iSize=$_FILES["txtImageMenu"]["size"]/1024;
						if(($iSize==0) || ($iSize<0) || ($iSize>$iMaxImgSizeContentSM) ){
							echo $sMsgImgUpldSizeMaxSM;die();
						}

						//Checking File Extension
						$iInvalid=array('jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp');
						$sFileName=$_FILES["txtImageMenu"]["name"];
						$ext=pathinfo($sFileName, PATHINFO_EXTENSION);
						//echo "sFileName: ".$sFileName." - Ext: ".$ext."<br>";
						if(!in_array($ext, $iInvalid)){echo $sMsgImgInvalidImageExt;die();}

						//Checking Image dimension

						list($iWidth, $iHeight, $iType, $iAttr)=getimagesize($_FILES["txtImageMenu"]["tmp_name"]);
						if( ($iWidth=="") || ($iHeight=="")){echo $sMsgImgInvalidImage;die();}
					}
					if($_FILES["txtImageCoverHome"]["name"]!=""){
						//Checking File Size
						$iSize=$_FILES["txtImageCoverHome"]["size"]/1024;
						if(($iSize==0) || ($iSize<0) || ($iSize>$iMaxImgSizeContentSM) ){
							echo $sMsgImgUpldSizeMaxSM;die();
						}
						//Checking File Extension
						$iInvalid=array('jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp');
						$sFileName=$_FILES["txtImageCoverHome"]["name"];
						$ext=pathinfo($sFileName, PATHINFO_EXTENSION);
						//echo "sFileName: ".$sFileName." - Ext: ".$ext."<br>";
						if(!in_array($ext, $iInvalid)){echo $sMsgImgInvalidImageExt;die();}

						//Checking Image dimension
						list($iWidth, $iHeight, $iType, $iAttr)=getimagesize($_FILES["txtImageCoverHome"]["tmp_name"]);
						if( ($iWidth=="") || ($iHeight=="")){echo $sMsgImgInvalidImage;die();}
					}

					if($_FILES["txtImageCoverInner"]["name"]!=""){
						//Checking File Size
						$iSize=$_FILES["txtImageCoverInner"]["size"]/1024;
						if(($iSize==0) || ($iSize<0) || ($iSize>$iMaxImgSizeContentBG) ){
							echo $sMsgImgUpldSizeMaxBG;die();
						}

						//Checking File Extension
						$iInvalid=array('jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp');
						$sFileName=$_FILES["txtImageCoverInner"]["name"];
						$ext=pathinfo($sFileName, PATHINFO_EXTENSION);
						//echo "sFileName: ".$sFileName." - Ext: ".$ext."<br>";
						if(!in_array($ext, $iInvalid)){echo $sMsgImgInvalidImageExt;die();}

						//Checking Image dimension & FB compatibility
						list($iWidth, $iHeight, $iType, $iAttr)=getimagesize($_FILES["txtImageCoverInner"]["tmp_name"]);
						if( ($iWidth=="") || ($iHeight=="")){echo $sMsgImgInvalidImage;die();}
					}

					$sSpecialCategoryName=fFormatString($_POST["txtSpecialCategoryName"]);
					$sSlug=fFormatString($_POST["txtSlug"]);
					$sSlug=fFormatSlug($sSlug);
					$sEndNote=fFormatString($_POST["txtEndNote"]);
					$sRemarks=fFormatStringHTML($_POST["txtRemarks"]);
					$iPriority=fFormatString($_POST["txtPriority"]);
					$sImagePathIcon=$_FILES["txtImageIcon"]["name"];
					$sImagePathMenu=$_FILES["txtImageMenu"]["name"];
					$sImagePathCoverHome=$_FILES["txtImageCoverHome"]["name"];
					$sImagePathCoverInner=$_FILES["txtImageCoverInner"]["name"];
					$iShow=$_POST["rdoShow"];

					$qUpdate="UPDATE bn_bas_specialcategory SET
					SpecialCategoryName='".$sSpecialCategoryName."',
					Slug='".$sSlug."',
					EndNote='".$sEndNote."',
					Remarks='".$sRemarks."',
					Priority=".$iPriority.",";
					if($sImagePathIcon!=""){$qUpdate.="ImagePathIcon='".$sImagePathIcon."', ";}
					if($sImagePathMenu!=""){$qUpdate.="ImagePathMenu='".$sImagePathMenu."', ";}
					if($sImagePathCoverHome!=""){$qUpdate.="ImagePathCoverHome='".$sImagePathCoverHome."', ";}
					if($sImagePathCoverInner!=""){$qUpdate.="ImagePathCoverInner='".$sImagePathCoverInner."', ";}
					$qUpdate.="ShowData=".$iShow."
					WHERE SpecialCategoryID=".$iUpdateID;
					//echo $qUpdate."<br>";

					if(mysqli_query($connEMM, $qUpdate)){
						//Audit Trail
						$qAuditTrail="INSERT INTO com_audittrail_gen_bn(UserInfo, ActionType, TableName, RemoteIP, RequestFileName, QueryDetails, DateTimeOccered)
						VALUES('".$_SESSION["sessUserName"]."', 2, 'bn_bas_specialcategory', '".$_SERVER["REMOTE_ADDR"]."', '".$_SERVER["REQUEST_URI"]."', '".fAuTrail($qUpdate)."', '".$dtDateTime."')";
						mysqli_query($connEMMAudit, $qAuditTrail) or die($sMsgAuTrailInsert);

						if($sImagePathIcon!=""){
							if(move_uploaded_file($_FILES["txtImageIcon"]["tmp_name"], $UploadCategory.$_FILES["txtImageIcon"]["name"])){
								echo $sMsgUpload;
								//Renaming the uploaded file
								$sFileName=pathinfo($UploadCategory.$sImagePathIcon);$sDateTime=date("YmdHis");$sNewName=$sFileName["filename"].$sDateTime.".".$sFileName["extension"];

								$dir=opendir($UploadCategory);
								while($fileRen=readdir($dir)){
									if($fileRen==$sImagePathIcon){
										$iFlag=rename($UploadCategory.$fileRen, $UploadCategory.$sNewName);
										if($iFlag==1){
											//If Rename was done properly -- Update the new uploaded file name information into the database
											$qUpdate="UPDATE bn_bas_specialcategory SET ImagePathIcon='".$sNewName."' WHERE SpecialCategoryID=".$iUpdateID;
											//echo $qUpdate."<br>";
											mysqli_query($connEMM, $qUpdate) or die("Update ImagePath Icon: ".mysqli_errno($connEMM).": ".mysqli_error($connEMM));
										}
									}
								}
								closedir($dir);
							}else{
								echo $sMsgUploadFail;
								print_r($_FILES);
							}
						}

						if($sImagePathMenu!=""){
							if(move_uploaded_file($_FILES["txtImageMenu"]["tmp_name"], $UploadCategory.$_FILES["txtImageMenu"]["name"])){
								echo $sMsgUpload;
								//Renaming the uploaded file
								$sFileName=pathinfo($UploadCategory.$sImagePathMenu);$sDateTime=date("YmdHis");$sNewName=$sFileName["filename"].$sDateTime.".".$sFileName["extension"];

								$dir=opendir($UploadCategory);
								while($fileRen=readdir($dir)){
									if($fileRen==$sImagePathMenu){
										$iFlag=rename($UploadCategory.$fileRen, $UploadCategory.$sNewName);
										if($iFlag==1){
											//If Rename was done properly -- Update the new uploaded file name information into the database
											$qUpdate="UPDATE bn_bas_specialcategory SET ImagePathMenu='".$sNewName."' WHERE SpecialCategoryID=".$iUpdateID;
											//echo $qUpdate."<br>";
											mysqli_query($connEMM, $qUpdate) or die("Update ImagePath Menu: ".mysqli_errno($connEMM).": ".mysqli_error($connEMM));
										}
									}
								}
								closedir($dir);
							}else{
								echo $sMsgUploadFail;
								print_r($_FILES);
							}
						}

						if($sImagePathCoverHome!=""){
							if(move_uploaded_file($_FILES["txtImageCoverHome"]["tmp_name"], $UploadCategory.$_FILES["txtImageCoverHome"]["name"])){
								echo $sMsgUpload;
								//Renaming the uploaded file
								$sFileName=pathinfo($UploadCategory.$sImagePathCoverHome);$sDateTime=date("YmdHis");$sNewName=$sFileName["filename"].$sDateTime.".".$sFileName["extension"];
								$dir=opendir($UploadCategory);

								while($fileRen=readdir($dir)){
									if($fileRen==$sImagePathCoverHome){
										$iFlag=rename($UploadCategory.$fileRen, $UploadCategory.$sNewName);
										if($iFlag==1){
											//If Rename was done properly -- Update the new uploaded file name information into the database
											$qUpdate="UPDATE bn_bas_specialcategory SET ImagePathCoverHome='".$sNewName."' WHERE SpecialCategoryID=".$iUpdateID;
											//echo $qUpdate."<br>";
											mysqli_query($connEMM, $qUpdate) or die("Update ImagePath Cover Home: ".mysqli_errno($connEMM).": ".mysqli_error($connEMM));
										}
									}
								}
								closedir($dir);
							}else{
								echo $sMsgUploadFail;
								print_r($_FILES);
							}
						}

						if($sImagePathCoverInner!=""){
							if(move_uploaded_file($_FILES["txtImageCoverInner"]["tmp_name"], $UploadCategory.$_FILES["txtImageCoverInner"]["name"])){
								echo $sMsgUpload;
								//Renaming the uploaded file
								$sFileName=pathinfo($UploadCategory.$sImagePathCoverInner);$sDateTime=date("YmdHis");$sNewName=$sFileName["filename"].$sDateTime.".".$sFileName["extension"];
								$dir=opendir($UploadCategory);

								while($fileRen=readdir($dir)){
									if($fileRen==$sImagePathCoverInner){
										$iFlag=rename($UploadCategory.$fileRen, $UploadCategory.$sNewName);
										if($iFlag==1){
											//If Rename was done properly -- Update the new uploaded file name information into the database
											$qUpdate="UPDATE bn_bas_specialcategory SET ImagePathCoverInner='".$sNewName."' WHERE SpecialCategoryID=".$iUpdateID;
											//echo $qUpdate."<br>";
											mysqli_query($connEMM, $qUpdate) or die("Update ImagePath Cover Inner: ".mysqli_errno($connEMM).": ".mysqli_error($connEMM));
										}
									}
								}
								closedir($dir);
							}else{
								echo $sMsgUploadFail;
								print_r($_FILES);
							}
						}
						echo $sMsgUpdate;
						header("Location: speCatUpdateList.php");
					}else{
						if(mysqli_errno($connEMM)==1062){header("Location:".$_SERVER["HTTP_REFERER"]."&msg=duplicate");}
						echo $sMsgUpdateFail;
					}
				} ?>
			</div>				
		</div>
	</div>
</div>
</div>
</div>
<?php include_once("../../common/footer.php");?>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>

<?php
echo $jsjQuery;
echo $jsjBootstrap;
echo $jsHtml5Shiv;
echo $jsRespond;
echo $jsEMM;
?>
</body>
</html>