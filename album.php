<?php include_once "common/config.php"; include_once('common/mysqli_connect.php');?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php echo $sSiteTitle; ?></title>
	<meta name="description" content="<?php echo $sSiteTitle; ?>">
	<meta name="keywords" content="<?php echo $sSiteTitle; ?>">
	<meta http-equiv="refresh" content="">
	<meta name="author" content="<?php echo $sAuthor; ?>">
	<meta name="Developer" content="<?php echo $sDeveloper; ?>">
	<meta name="resource-type" content="document">
	<meta name="contact" content="<?php echo $sEmail; ?>">
	<meta name="copyright" content="Copyright (c) <?php echo gmdate("Y"); ?>. All Rights &reg; Reserved by <?php echo $sSiteURL; ?>.">
	<meta name="robots" content="index, follow">
	<meta name="googlebot" content="index, follow">
	<meta name="googlebot-news" content="index, follow">
	<meta name="msnbot" content="index, follow">
	<meta property="fb:app_id" content="<?php echo $sAppId; ?>">
	<meta property="og:site_name" content="<?php echo $sSiteName; ?>">
	<meta property="og:title" content="<?php echo $sSiteTitle; ?>">
	<meta property="og:description" content="<?php echo $sSiteTitle; ?>">
	<meta property="og:url" content="<?php echo $sSiteURL; ?>">
	<meta property="og:type" content="article">
	<meta property="og:image" content="<?php echo $sLogoURLfb; ?>">
	<meta property="og:locale" content="en_US">
	<link rel="image_src" href="<?php echo $sLogoURLfb; ?>">
	<link rel="canonical" href="<?php echo $sSiteURL; ?>">
	<link type="image/x-icon" rel="shortcut icon" href="<?php echo $sFavicon; ?>">
	<link type="image/x-icon" rel="icon" href="<?php echo $sFavicon; ?>">

	<?php
	echo $sCSSBootStrap;
	echo $sCSSFontAwesome;
	echo $sFancyBox;
	echo $sGoogleFont;
	echo $sCSSEMM;

    if(isset($_REQUEST['albumid'])){
        $albumid = $_REQUEST['albumid'];
        $sAlbum = "SELECT AlbumBrief,Columns FROM com_work_album WHERE Deletable=1 AND AlbumID=".$albumid;
        $resultAlbum = mysqli_query($connEMM,$sAlbum);
        $rsAlbum = mysqli_fetch_assoc($resultAlbum);
		switch($rsAlbum['Columns']){
			case $rsAlbum['Columns']== 1 :
				$column = 'first';
				break;
			case $rsAlbum['Columns']== 2 :
				$column = 'second';
				break;
			case $rsAlbum['Columns']== 3 :
				$column = 'third';
				break;
			default :
				$column = 'first';
				break;
		}
    }
	?>

</head>

<body>
<main>
	<div class="page-wrapper">
		<div class="body-container">
			<?php include_once "common/header.php";?>
			<div id="container">
				<div class="post">
					<div class="content">
						<div class="colum-<?php echo $column;?> column">
                            <p><?php echo $rsAlbum['AlbumBrief'];?></p>
							<!-- <p>Hijra is a South Asian term with no exact match in the English language. Hijras are people designated male or intersex at birth who adopt a feminine gender identity. Often mislabeled as hermaphrodites, eunuchs, or transsexuals in literature, Hijras can be considered to fall under the umbrella term transgender, but many prefer the term third gender. Traditionally, Hijras held semi sacred status and were hired to sing, dance, and bless newly married couples or newborns at household parties. Earnings were pooled through the guru system, in which Hijras declare allegiance to a guru and submit to group rules, in exchange for financial and social security. Growing up in Bangladesh, I was influenced by predominant prejudices and stereotypes about Hijras. Then, I met Heena, who opened her life to me and helped me get to know the other members of her community as the mothers, daughters, friends, and lovers that they are. Call Me Heena is my attempt to show the beauty in Hijra lives, despite the challenges and discrimination they face.</p>
							<p>The project features Hijras in Bangladesh, as well as a number of Hijras who migrated to India. While Hijras continue to face discrimination once in India, some have found greater social acceptance than in Bangladesh. At the same time, many Hijras in Bangladesh and other South Asian countries have stood up for their rights and gained at least limited legal recognition</p>
							<p>for a third gender. I hope my work will help amplify Hijra voices that are largely quieted, and inspire Hijras to open even more space for themselves within Bangladeshi society.</p> -->
						</div>
					</div>
                    <?php $albumFoto = "SELECT f.Gaps,f.ImagePath,f.Caption,f.Widths,f.Heights,f.ImgOrVid FROM com_work_foto f JOIN foto_position p ON p.FotoID=f.FotoID WHERE f.Deletable=1 AND f.AlbumID=".$albumid." ORDER BY p.Position ASC";
                    $query_foto = mysqli_query($connEMM,$albumFoto);
                    while($rsFoto = mysqli_fetch_assoc($query_foto)){
						if($rsFoto['ImgOrVid']==1){?>
                    <div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/PhotoGallery/<?php echo $rsFoto['ImagePath'];?>">
							<img  src="<?php echo $sSiteURL; ?>media/PhotoGallery/<?php echo $rsFoto['ImagePath'];?>" alt="" style="height: <?php echo $rsFoto['Heights'];?>px; width: <?php echo $rsFoto['Widths'];?>px;">
						</a>
					</div>
					<?php }else{?>
					<div class="imageElement">
						<video width="<?php echo $rsFoto['Widths'];?>" height="<?php echo $rsFoto['Heights'];?>" controls>
							<source src="<?php echo $sSiteURL.'media/PhotoGallery/'.$rsFoto['ImagePath']?>" type="video/mp4">
						</video>
						<!-- <a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/PhotoGallery/<?php echo $rsFoto['ImagePath'];?>">
							<img  src="<?php echo $sSiteURL; ?>media/PhotoGallery/<?php echo $rsFoto['ImagePath'];?>" alt="" style="height: <?php echo $rsFoto['Heights'];?>px; width: <?php echo $rsFoto['Widths'];?>px;">
						</a> -->
					</div>
					<?php } if($rsFoto['Gaps']==1){?>
					<div class="imageElement">
						<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/blank-1.png" alt="" style="height: 623px; width:457px;">
					</div>
                    <?php }}?>
					<!-- <div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/1.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/1.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/2.jpg">
						<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/2.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/12-1.jpg">
						<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/12-1.jpg" alt="" style="height: 623px; width: 726.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/4-e1524493822895.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/4-e1524493822895.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/5-e1524495033155.jpg">
							<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/5-e1524495033155.jpg" alt="" style="height: 623px; width:533.847px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/6-1.jpg">
							<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/6-1.jpg" alt=""  style="height: 623px; width:533.847px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/7-e1524494669988.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/7-e1524494669988.jpg" alt="" style="height: 623px; width:733.847px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/8-e1524494520686.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/8-e1524494520686.jpg" alt="" style="height: 623px; width:733.847px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/9-e1524494871613.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/9-e1524494871613.jpg" alt="" style="height: 623px; width:733.847px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/3.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/3.jpg" alt=""  style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/10-e1524494970930.jpg">
							<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/10-e1524494970930.jpg" alt=""  style="height: 623px; width: 533.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/11.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/11.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/12.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/12.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/13.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/13.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/14.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/14.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/15.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/15.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/16.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/16.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/17.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/17.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<div class="Video-wrap">
							<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/video/Final_MakeUP_4_2_.mp4">
								<video muted loop preload="false" controls="true" tabindex="0" style="height: 623px; width: 1107px;">
									<source src="<?php echo $sSiteURL; ?>media/imgAll/video/Final_MakeUP_4_2_.mov">
									<source src="<?php echo $sSiteURL; ?>media/imgAll/video/Final_MakeUP_4_2_.mp4">
								</video>
							</a>
                              </div>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/19.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/19.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/20.jpg">
						<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/20.jpg" alt="" style="height: 623px; width: 533px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/21.jpg">
							<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/21.jpg" alt="" style="height: 623px; width: 533px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/22.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/22.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/23.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/23.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/24.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/24.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/25.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/25.jpg" alt="" style="height: 623px; width: 726.954px;">
						</a>
					</div>
					<div class="imageElement" >
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/26.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/26.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/27.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/27.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/28.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/28.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/29.jpg">
							<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/29.jpg" alt="" style="height: 623px; width:533px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/30.jpg">
							<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/30.jpg" alt="" style="height: 623px; width:533px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/31.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/31.jpg" alt="" style="height: 623px; width: 732.043px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/32.jpg">
							<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/32.jpg" alt="" style="height: 623px; width: 533px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/33.jpg">
							<img src="<?php echo $sSiteURL; ?>media/imgAll/bg/33.jpg" alt="" style="height: 623px; width:533px;">
						</a>
					</div>
					<div class="imageElement">
						<a data-fancybox="fancy-gallery" href="<?php echo $sSiteURL; ?>media/imgAll/bg/01_193.jpg">
							<img  src="<?php echo $sSiteURL; ?>media/imgAll/bg/01_193.jpg" alt=""  style="height: 623px; width:726px;">
						</a>
					</div> -->
				</div>
				<div class="tracer"></div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</main>
<?php echo $sJSjQuery; ?>
<?php echo $sJSBootStrap;?>

<script>
	  var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	};
</script>


<?php echo $sJSFancyBox;?>
<?php echo $sJSEMM; ?>

</body>

</html>