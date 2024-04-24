<?php include_once "common/config.php"; include_once('common/mysqli_conneCT.php');?>
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
echo $sCSSSlick;
echo $sCSSEMM;
$links = mysqli_query($connEMM,"SELECT LinkURL FROM com_links WHERE LinkURL='shahria_sharmin@hotmail.com'");
$emial = mysqli_fetch_assoc($links);
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $name = strip_tags($name);
    $email = $_POST['email'];
    $email = strip_tags($email);
    $subject = $_POST['subject'];
    $subject = strip_tags($subject);
    $message = $_POST['message'];
    $message = strip_tags($message);

    $to = $emial['LinkURL'];
    $headers = "From: " . $email . "\r\n"  . "CC: ". $to;
    mail($to,$subject,$message,$headers);
}
?>

</head>

<body class="home-body">
    
    <main>
        <div class="page-wrapper">
			<div class="body-container">
				<?php include_once "common/header.php";?>
				<div id="container">
                    <div class="contact-page-area">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="contact-filled-wrap">
                                    <div class="contact-form">
                                        <div class="row">
                                            <div class="col-md-5 d-flex align-items-center justify-content-start">
                                                <div class="contact-details">
                                                    <p>
                                                        <a href="mailto:<?php echo $emial['LinkURL'];?>">
                                                            <?php echo $emial['LinkURL'];?></a> <br>
                                                    </p>
                                                    <p>
                                                        <a href="https://login.skype.com/">
                                                            <i class="fab fa-skype"></i> shahria_sharmin</a> <br>
                                                    </p>
                                                    <p>
                                                        <a href="tel:+8801714098800">+8801714098800</a>
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-7 d-flex">
                                                <div class="contact-form-wrapper">
                                                    <form action="contact.php" method="post">
                                                        <div class="form-group">
                                                            <input type="text" name="name" class="form-control"
                                                                id="name" placeholder="Enter Name Here" required=""
                                                                autofocus="">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" name="email" class="form-control"
                                                                id="email" aria-describedby="emailHelp"
                                                                placeholder="Enter Email Here" required="">
                                                            <p class="d-flex" id="error"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="message" rows="3"
                                                                placeholder="Enter Message Here"
                                                                name="message"></textarea>
                                                        </div>
                                                        <input type="submit" name="submit" value="Submit"
                                                            class="btn btn-success">
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<?php echo $sJSEMM; ?>
</body>

</html>