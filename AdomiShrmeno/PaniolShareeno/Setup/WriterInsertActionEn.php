<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_english.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Admin :: Writer Insert</title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">
<?php
echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;
?>
<script type="text/javascript" src="../common/ckeditor/ckeditor.js"></script>
</head>
<body>
<div id="wrapper" class="toggled">
	<?php include_once("../common/sidebar.php");?>
	<!-- Page Content -->
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<?php include_once("../common/header.php");?>
			<div class="page-title"><h3 class="title">Dashboard / Writer Insert</h3></div>
			<div class="row">
				<div class="col-sm-12 DPaddingLR">
					<div class="panel panel-default">
						<div class="panel-heading"><h3 class="panel-title">Writer Insert</h3></br></div>
						<div class="panel-body">
							<?php
							if(isset($_POST["btnSubmit"])){
								$UserName=""; $UserType="";	$sWriterName="";$sWriterNameEn="";	$InitialBn="";	$InitialEn="";	$sWriterBio="";	$sWriterBioEn="";
								$sImageSMPath="";$sImageSMPathNew="";
								if($_FILES["txtImageSMPath"]["name"]!=""){
									//Checking File Size
									$iSize=$_FILES["txtImageSMPath"]["size"]/1024;
									if(($iSize==0) || ($iSize<0) || ($iSize>$iMaxImgSizeAdvt) ){
										echo $sMsgImgUpldSizeMaxAdvt;die();
									}
									//Checking File Extension
									$iInvalid=array('jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp');
									$sFileName=$_FILES["txtImageSMPath"]["name"];
									$ext=pathinfo($sFileName, PATHINFO_EXTENSION);
									//echo "sFileName: ".$sFileName." - Ext: ".$ext."<br>";
									if(!in_array($ext, $iInvalid)){echo $sMsgImgInvalidImageExt;die();}
									//Checking Image dimension
									list($iWidth, $iHeight, $iType, $iAttr)=getimagesize($_FILES["txtImageSMPath"]["tmp_name"]);
									if( ($iWidth=="") || ($iHeight=="")){echo $sMsgImgInvalidImage;die();}
								}
								$UserType=$_POST["UserType"];
								$sWriterNameEn=fFormatString($_POST["txtWriterNameEn"]);
								$InitialEn=fFormatString($_POST["txtInitialEn"]);
								$sSlug=fFormatSlug($_POST["txtSlug"]);
								$sWriterBioEn=fFormatStringHTML($_POST["txtWriterBio"]);
								$sImageSMPath=$_FILES["txtImageSMPath"]["name"];if($sImageSMPath!=""){$sImageSMPathNew=$sImageSMPath;}
								$qInsert="INSERT INTO en_writer(Type, WriterNameEn, InitialEn, Slug, WriterBioEn, ImagePath, DateTimeInserted) 
								VALUES(".$UserType.", '".$sWriterNameEn."', '".$InitialEn."', '".$sSlug."', '".$sWriterBioEn."', '".$sImageSMPathNew."', '".$dtDateTime."')";
								//echo $qInsert."<br><br>";
								$resultInsert=mysqli_query($connEMM, $qInsert) or die(mysqli_error($connEMM));
								if(isset($resultInsert)){
									$iThisContentID=mysqli_insert_id($connEMM); //Inserted ID
									//Audit Trail
									$qAuditTrail="INSERT INTO com_audittrail_media(UserInfo, ActionType, ContentID, TableName, RemoteIP, RequestFileName, QueryDetails, DateTimeOccered)
									VALUES('".$_SESSION["sessUserName"]."', 1, ".$iThisContentID.", 'bn_writer', '".$_SERVER["REMOTE_ADDR"]."', '".$_SERVER["REQUEST_URI"]."', '".fAuTrail($qInsert)."', '".$dtDateTime."')";
									mysqli_query($connEMMAudit, $qAuditTrail) or die($sMsgAuTrailInsert);
									if($sImageSMPath!=""){
										if(is_dir($UploadPhotoWriter) && is_writable($UploadPhotoWriter)){
											if(move_uploaded_file($_FILES["txtImageSMPath"]["tmp_name"], $UploadPhotoWriter.$_FILES["txtImageSMPath"]["name"])){
												print_r($_FILES["txtImageSMPath"]);
												echo $sMsgUpload;
												//Renaming the uploaded file & Creating the NEW file name
												$sExtension=pathinfo($UploadPhotoWriter.$sImageSMPath);
												$sNewName=fFormatImageName($sExtension["filename"]).".".$sExtension["extension"];
												//echo "sNewName: ".$sNewName."<br><br>";
												$dir=opendir($UploadPhotoWriter);
												while($fileRen=readdir($dir)){
													if($fileRen==$sImageSMPath){
														$iFlag=rename($UploadPhotoWriter.$fileRen, $UploadPhotoWriter.$sNewName);
														if($iFlag==1){
															//If Rename was done properly
															//Update the new uploaded file name information into the database
															$sNewName=$sNewName;
															$qUpdate="UPDATE en_writer SET ImagePath='".$sNewName."' WHERE WriterID=".$iThisContentID;
															//echo "qUpdate: ".$qUpdate."<br>";
															mysqli_query($connEMM, $qUpdate) or die("Update ImagePath: ".mysqli_errno($connEMM).": ".mysqli_error($connEMM));
														} // End of IF Flag
													}
												} // End of While
												closedir($dir);
											}else{
												echo $sMsgUploadFail;
												echo "error: ".$_FILES['txtImageSMPath']['error']."<br><br>";
												print_r($_FILES['txtImageSMPath']);
											}
										}else{
											echo $sMsgDirFail;
										}
									}
									echo $sMsgInsert;
									header("Location: writerInsertEN.php");
								}else{
									echo $sMsgInsertFail;
								}
							} ?>
						</div>
					</div>
				</div>
			</div>
			<?php include_once("../common/footer.php");?>
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