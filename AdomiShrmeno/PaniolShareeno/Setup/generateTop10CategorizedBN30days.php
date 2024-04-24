<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_bangla.php");require_once("../common/config.php"); ?>

<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">



<title>Access by IP :: Bangla Content</title>



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

	<?php include_once("../common/sidebar.php");?>

	<!-- Page Content -->

	<div id="page-content-wrapper">

		<div class="container-fluid">

			<?php include_once("../common/header.php"); ?>		

			<?php $qCategory="SELECT CategoryID FROM bn_bas_category WHERE ShowData=1 AND Deletable=1 ORDER BY CategoryID";

			$resultCategory=mysqli_query($connEMM, $qCategory) or die(mysql_error($connEMM));

			while($rsCategory=mysqli_fetch_assoc($resultCategory)){

				$iCatID=$rsCategory["CategoryID"];

				$myFile=$UploadXHTML_BN."Top/cat_".$iCatID.".htm";

				$fh=fopen($myFile, "w");

				$sData="";$sList="";



				$sData.='<div class="media">';

				$qSQL="SELECT bn_content.ContentID, bn_content.ContentSubHeading, bn_content.ContentHeading, bn_content.ImageSMPath, bn_totalhit.TotalHit FROM bn_totalhit INNER JOIN bn_content ON bn_totalhit.ContentID=bn_content.ContentID WHERE bn_content.CategoryID=".$iCatID." ORDER BY bn_totalhit.TotalHit ASC LIMIT 10";

				$resultSQL=mysqli_query($connEMM, $qSQL) or die(mysqli_error($connEMM));

				while($rsSQL=mysqli_fetch_assoc($resultSQL)){

					$sSubHead="";$sHead="";$sImg="";$sURL="";

					if(!empty($rsSQL["ContentSubHeading"])){$sSubHead='<span class="spnSubHead">'.$rsSQL["ContentSubHeading"].'</span><br>'; }

					if(!empty($rsSQL["ContentHeading"])){$sHead=$rsSQL["ContentHeading"];}

					if(!empty($rsSQL["ImageSMPath"])){$sImg='<img class="media-images" src='.$sSiteURL.'media/imgAll/'.$rsSQL["ImageSMPath"].' alt="'.$sHead.'" title="'.$sHead.'">';}

					$sURL=$sSiteURL.'details.php?nssl='.$rsSQL["ContentID"];

					$sData.='<div class="media-left"><a href="'.$sURL.'">'.$sImg.'</a></div>

					<div class="media-body media-heading"><a href="'.$sURL.'">'.$sSubHead.$sHead.'</a></div>';

				}mysqli_free_result($resultSQL);

				$sData.='</div>';



				//echo $sData."<br><br>";

				fwrite($fh, $sData);fclose($fh);

			} ?>

			<div class="page-title">

				<h3 class="title"><?php echo "Top 10 Categorized list (Bangla) generated"; ?></h3>

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