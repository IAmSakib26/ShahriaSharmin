<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Access by IP :: User</title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">
<?php
echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;
?>
<script type="text/javascript">
function confirmDelete(){return confirm("Are you sure you wish to delete this entry?");}
function confirmContentID(){alert("Please type a valid NUMBER for Content");return;}
</script>
</head>
<body>
<div id="wrapper" class="toggled">
	<?php include_once("../common/sidebar.php");?>
	<!-- Page Content -->
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<?php include_once("../common/header.php");?>
			<!-- Message alert after Fixing Totalhit (Bangla) -->
			<div class="page-title">
				<?php
				require_once("../common/password_compat-master/password.php");//Password Hashing library
				echo '<table border="0" cellpadding="5" cellspacing="0" align="center" class="Tbl98"><tr><td align="left" valign="middle">';
				if(isset($_REQUEST["btnSubmitPass"])){
					$sPasswordReal=fFormatString($_REQUEST["txtNewPassword"]);
					$sPasswordHash=password_hash($sPasswordReal, PASSWORD_BCRYPT);
					$iLock=fFormatString($_REQUEST["cboLock"]);
					$qUpdate="UPDATE s_secuser SET 
						 UserPass02='".$sPasswordHash."', LockType=".$iLock."
					WHERE UserName='".$_SESSION["UpdateID"]."'";
					//echo $qUpdate."<br>";
					$resultUpdate=mysqli_query($connEMM, $qUpdate);
				}
				if(isset($_REQUEST["btnSubmitAccess"])){
					$iWork=0;$iAbout=0;$iSetup=0;$iAdminOperation=0;
					if(isset($_POST['chkAccessRight']) && is_array($_POST['chkAccessRight'])){
						foreach($_POST['chkAccessRight'] as $sSlide){
							if($sSlide=="Work"){$iWork=1;}
							if($sSlide=="About"){$iAbout=1;}
							if($sSlide=="Setup"){$iSetup=1;}
							if($sSlide=="AdminOperation"){$iAdminOperation=1;}
						}
					}
					$qUpdate="UPDATE s_secuser SET 
						Work=".$iWork.", About=".$iAbout.", Setup=".$iSetup.", AdminOperation=".$iAdminOperation."  WHERE UserName='".$_SESSION["UpdateID"]."'";
					
					$resultUpdate=mysqli_query($connEMM, $qUpdate);
					// if($resultUpdate){
					// 	//Audit Trail
					// 	$qAuditTrail="INSERT INTO com_audittrail_gen_bn(UserInfo, ActionType, TableName, RemoteIP, RequestFileName, QueryDetails, DateTimeOccered)
					// 	VALUES('".$_SESSION["sessUserName"]."', 2, 's_secuser', '".$_SERVER["REMOTE_ADDR"]."', '".$_SERVER["REQUEST_URI"]."', '".fAuTrail($qUpdate)."', '".$dtDateTime."')";
					// 	mysqli_query($connEMMAudit, $qAuditTrail) or die($sMsgAuTrailInsert);
					// 	echo $sMsgUpdate;
					// 	header("Location: adminuserInsert.php");
					// }else{
					// 	echo $sMsgUpdateFail;
					// }
					header("Location: adminuserInsert.php");
				}
				echo '</td></tr></table>'; ?>
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