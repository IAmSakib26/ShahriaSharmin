<?php ob_start();session_cache_expire(60);session_start();require_once("../../common/mysqli_conneCT_bangla.php");require_once("../../common/config.php"); ?>

<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">



<title>Category :: List (Bangla)</title>



<meta name="robots" content="noindex, nofollow">

<meta name="googlebot" content="noindex, nofollow">

<meta name="author" content="<?php echo $sAuthor; ?>">



<?php

echo $cssBootstrap;

echo $cssFontAwesome;

echo $cssEMM;

?>

</head>

<body>

<div id="wrapper" class="toggled">

	<?php include_once("../../common/sidebar.php");?>

	<!-- Page Content -->

	<div id="page-content-wrapper">

		<div class="container-fluid">

			<?php include_once("../../common/header.php");?>

			<?php

			$iDeleteID=0;

			if(isset($_REQUEST["deleteid"])){

				$iDeleteID=fFormatString($_REQUEST["deleteid"]);

				$iDeleteID=filter_var($iDeleteID, FILTER_SANITIZE_NUMBER_INT);

				$iDeleteID=filter_var($iDeleteID, FILTER_VALIDATE_INT);

				if(!is_numeric($iDeleteID)){$iDeleteID=0;}

				if($iDeleteID<0){$iDeleteID=0;}

			}



			$qDelete="UPDATE bn_bas_category SET Deletable=2 WHERE CategoryID=".$iDeleteID;

			//echo $qDelete."<br>";



			if(mysqli_query($connEMM, $qDelete)){

				//Audit Trail

				$qAuditTrail="INSERT INTO com_audittrail_gen_bn(UserInfo, ActionType, TableName, RemoteIP, RequestFileName, QueryDetails, DateTimeOccered)

				VALUES('".$_SESSION["sessUserName"]."', 3, 'bn_bas_category', '".$_SERVER["REMOTE_ADDR"]."', '".$_SERVER["REQUEST_URI"]."', '".fAuTrail($qDelete)."', '".$dtDateTime."')";

				mysqli_query($connEMMAudit, $qAuditTrail) or die($sMsgAuTrailInsert);

				echo $sMsgDelete;

				header("Location: categoryUpdateList.php");

			}else{

				echo $sMsgDeleteFail;

			} ?>

			<?php include_once("../../common/footer.php");?>

		</div>

	</div>

</div>

</body>

</html>