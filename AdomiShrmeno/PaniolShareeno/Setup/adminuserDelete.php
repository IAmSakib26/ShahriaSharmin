<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_general.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Admin :: User Delete</title>
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
			<div class="page-title"><h3 class="title">Dashboard / User Delete</h3></div>
			<div class="row">
				<div class="col-sm-12 DPaddingLR">
					<div class="panel panel-default">
						<div class="panel-heading"><h3 class="panel-title">User Delete</h3></br></div>
						<div class="panel-body">
							<?php
							$iDeleteID=0;
							if(isset($_REQUEST["deleteid"])){
								$iDeleteID=fFormatString($_REQUEST["deleteid"]);
								$iDeleteID=filter_var($iDeleteID, FILTER_SANITIZE_NUMBER_INT);
								$iDeleteID=filter_var($iDeleteID, FILTER_VALIDATE_INT);
								if(!is_numeric($iDeleteID)){$iDeleteID=0;}
								if($iDeleteID<0){$iDeleteID=0;}
							}
							$iDeleteID=$_REQUEST["deleteid"];
							if($iDeleteID=="emyth"){
								echo "Sorry you cannot delete SUPER ADMIN user<br>";
							}else{
								//$qDelete="UPDATE s_secuser SET Deletable=2 WHERE UserName='".$iDeleteID."'";
								if($_GET['type']=='unP'){
                        		$qDelete="UPDATE s_secuser SET Deletable=2 WHERE UserName='".$iDeleteID."'";
                            	}else{
                            	$qDelete="UPDATE s_secuser SET Deletable=1 WHERE UserName='".$iDeleteID."'";	
                            	}
								$resultDelete=mysqli_query($connEMM, $qDelete) or die(mysqli_error($connEMM));
								if($resultDelete){
									//Audit Trail
									$qAuditTrail="INSERT INTO com_audittrail_gen_bn(UserInfo, ActionType, TableName, RemoteIP, RequestFileName, QueryDetails, DateTimeOccered)
									VALUES('".$_SESSION["sessUserName"]."', 3, 's_secuser', '".$_SERVER["REMOTE_ADDR"]."', '".$_SERVER["REQUEST_URI"]."', '".fAuTrail($qDelete)."', '".$dtDateTime."')";
									mysqli_query($connEMMAudit, $qAuditTrail) or die($sMsgAuTrailInsert);
									echo $sMsgDelete;
									header("Location: adminuserInsert.php");
								}else{
									echo $sMsgDeleteFail;
								}
							}
							?>
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