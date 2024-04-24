<?php include_once "common/config.php"; include_once('common/mysqli_conneCT.php');
$cover = mysqli_query($connEMM,"SELECT ImagePath FROM com_home_image");
$fConver= mysqli_fetch_assoc($cover);
$coverImg = $fConver['ImagePath'];?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $sSiteTitle; ?></title>
    <meta name="description" content="<?php echo $sSiteTitle; ?>">
    <meta name="keywords" content="<?php echo $sSiteTitle; ?>">
    <meta http-equiv="refresh" content="">
    <meta name="author" content="<?php echo $sAuthor; ?>">
    <meta name="Developer" content="<?php echo $sDeveloper; ?>">
    <meta name="resource-type" content="document">
    <meta name="contact" content="<?php echo $sEmail; ?>">
    <meta name="copyright"
        content="Copyright (c) <?php echo gmdate("Y"); ?>. All Rights &reg; Reserved by <?php echo $sSiteURL; ?>.">
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
echo $sGoogleFont;
echo $sCSSEMM;
?>

</head>

<body class="home-body">

    <?php include_once "common/header.php";?>

    <main>
        <div class="page-wrapper">
            <?php include_once "common/header.php";?>
            <div class="body-images-wrap">
                <!-- <img src="https://shahriasharmin.com/wp-content/uploads/2019/10/shahriasharmin-cover-page-60.jpg" alt="" title=""> -->
                <img src="<?php echo $sSiteURL.'media/PhotoGallery/'.$coverImg?>" alt="" title="">
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
<?php echo $sJSEMM; ?>
</body>

</html>