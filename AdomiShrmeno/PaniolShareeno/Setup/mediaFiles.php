<?php
ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); 

$mPath=$UploadImageAll;
$mUrl=$sSiteURL."media/imgAll/".$sImgDir."/";
// echo $mPath;


function remove_element(&$array,$value) {
 if(($key = array_search($value,$array)) !== false) {
       unset($array[$key]);
  }    
}

$arrMediaList = scandir($mPath);
remove_element($arrMediaList,'.');
remove_element($arrMediaList,'..');
remove_element($arrMediaList,'.htaccess');
remove_element($arrMediaList,'.thumbs');
remove_element($arrMediaList,'SM');
remove_element($arrMediaList,'images');
// echo '<pre>';
// print_r($arrMediaList);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Dashboard :: User Insert</title>
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
<div class="page-title"><h3 class="title">Dashboard / Admin User - Insert</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
<!-- 				<div class="row"  style="padding: 15px;border-bottom: 1px solid;">
					<div class="col-sm-1">SL#</div>
					<div class="col-sm-3">
						Thumbnail
					</div>		
					<div class="col-sm-8">
						<p>Name</p>
						<p>Url</p>
					</div>
				</div> -->
				<div class="row">
			<?php
				$i=1;
				foreach ($arrMediaList as $media) {
				?>
				<!-- <div class="row"  style="padding: 15px"> -->
					
					<div class="col-sm-3" style="padding: 15px; border: 1px solid; border-radius: 5px; background: #777; color:#fff;    height: 235px;">
						<a href="<?php echo $mUrl. $media;?>" style="color:#fff" target="_NEW">
						<img src="<?php echo $mUrl. $media;?>" class="img-responsive">
						<p>SR# <?php echo $i;?></p>
						<p><?php echo $media?></p>
						</a>
					</div>		
					
				<!-- </div> -->				
				<?php
				$i++;
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