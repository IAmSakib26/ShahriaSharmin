<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_english.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Dash Board :: Fix Total Hit English</title>
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
				$notfound=0;
				$sSQL="SELECT ContentID FROM en_content ORDER BY ContentID ASC";
				$result=mysqli_query($connEMM, $sSQL);
				while($rsSQL=mysqli_fetch_array($result)){
					$iContentID=$rsSQL["ContentID"];
					$sTotalHit="SELECT ContentID FROM en_totalhit WHERE ContentID=".$iContentID;
					$resultTotalHit=mysqli_query($connEMM, $sTotalHit);
					if(!mysqli_num_rows($resultTotalHit)){
						$notfound=1;
						$qTotalHitInsert="INSERT INTO en_totalhit(ContentID) VALUES($iContentID)";
						echo "<h3 class='title'>Totalhit Id ".$iContentID." Fixed</h3><br>";
						$resultTotalHitInsert=mysqli_query($connEMM, $qTotalHitInsert);
					}
				}
				if($notfound==0){echo "<h3 class='title'>Totalhit Already Fixed</h3><br>";}
				?>
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