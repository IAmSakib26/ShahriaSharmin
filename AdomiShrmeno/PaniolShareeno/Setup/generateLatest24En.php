<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_english.php");require_once("../common/config.php"); ?>

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

			<?php include_once("../common/header.php");?>

			<?php

			//Most Popular 50 News

			$sData="";$sList="";$sSubHead="";$sHead="";$sURL="";



			$resultSQL=mysqli_query($connEMM, "SELECT en_content.ContentID, en_content.ContentSubHeading, en_content.ContentHeading, en_content.URLAlies FROM en_content INNER JOIN en_totalhit ON en_totalhit.ContentID=en_content.ContentID WHERE Deletable=1 AND ShowContent=1 ORDER BY en_totalhit.TotalHit DESC LIMIT 50");



			$sData.='<ul class="UlTopList">';

			while($rsSQL=mysqli_fetch_assoc($resultSQL)){

				$sSubHead="";$sHead="";$sURL="";

				if(!empty($rsSQL["ContentSubHeading"])){$sSubHead='<span class="spnSubHead">'.$rsSQL["ContentSubHeading"].'</span><br>'; }

				if(!empty($rsSQL["ContentHeading"])){$sHead=$rsSQL["ContentHeading"];}

				$sURL=$sSiteURL.$rsSQL["URLAlies"].'/'.$rsSQL["ContentID"];



				$sList.='<li><a href="'.$sURL.'">'.$sSubHead.$sHead.'</a></li>';

			}mysqli_free_result($resultSQL);

			$sData.=$sList.'</ul>';

			//echo $sData."<br><br>";



			$myFile=$UploadXHTML_EN."liMostPopular.htm";

			$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh); ?>

			<div class="page-title">

				<h3 class="title"><?php echo "Latest 50 content (English) generated"; ?></h3>

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