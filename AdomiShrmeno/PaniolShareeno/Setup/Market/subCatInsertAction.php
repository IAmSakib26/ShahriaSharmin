<?php ob_start();session_cache_expire(60);session_start();require_once("../../common/mysqli_conneCT_general.php");require_once("../../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

<title>Sub-Category :: Insert (English)</title>

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
<div class="page-title"><h3 class="title">Dashboard / Sub-Category :: Insert (English)</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Sub-Category :: Insert (English)</h3>
			</div>
			<div class="panel-body">
				<?php
				if(isset($_POST["btnSubmit"])){
					$iCategoryID=1;$iPriority=1;$iShow=1;
					$sSubCategoryName="";$sCompanyName="";$sSubCategoryNameBN="";$sSlug="";$sEndNote="";$sRemarks="";$sImagePathIcon="";$sImagePathMenu="";$sImagePathCoverHome="";$sImagePathCoverInner="";

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
					

					$iCategoryID=$_POST["cboCategory"];
					$sSubCategoryName=fFormatString($_POST["txtSubCategoryName"]);
					$sCompanyName=fFormatString($_POST["txtCompanyName"]);
					$sSubCategoryNameBN=fFormatString($_POST["txtSubCategoryNameBN"]);
					$sSlug=fFormatString($_POST["txtSlug"]);
					$sSlug=fFormatSlug($sSlug);
					$sEndNote=fFormatString($_POST["txtEndNote"]);
					$sRemarks=fFormatStringHTML($_POST["txtRemarks"]);
					$sImagePathIcon=$_FILES["txtImageIcon"]["name"];
					$iShow=$_POST["rdoShow"];

					$qInsert="INSERT INTO com_market_subcategory(CategoryID, SubCategoryName, SubCategoryNameBN, Slug, CompanyName, Present_Price, Last_Price, ShowData, ImagePathIcon) VALUES(".$iCategoryID.", '".$sSubCategoryName."', '".$sSubCategoryNameBN."', '".$sSlug."', '".$sCompanyName."', '".$sEndNote."', '".$sRemarks."', ".$iShow.", '".$sImagePathIcon."')";

					if(mysqli_query($connEMM, $qInsert)){
						$iThisContentID=mysqli_insert_id($connEMM);//Inserted ID

						//Audit Trail
						$qAuditTrail="INSERT INTO com_audittrail_gen_en(UserInfo, ActionType, TableName, RemoteIP, RequestFileName, QueryDetails, DateTimeOccered)
						VALUES('".$_SESSION["sessUserName"]."', 1, 'com_market_subcategory', '".$_SERVER["REMOTE_ADDR"]."', '".$_SERVER["REQUEST_URI"]."', '".fAuTrail($qInsert)."', '".$dtDateTime."')";
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
											$qUpdate="UPDATE com_market_subcategory SET ImagePathIcon='".$sNewName."' WHERE SubCategoryID=".$iThisContentID;
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


						echo $sMsgInsert;
						$_SESSION["sessCategoryID"]=$iCategoryID;
						header("Location: subCatInsert.php");
					}else{
						if(mysqli_errno($connEMM)==1062){header("Location:".$_SERVER["HTTP_REFERER"]."?msg=duplicate");}
						echo $sMsgInsertFail;
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