<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php");
require_once('about.php'); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>About :: Update</title>
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
<div class="page-title"><h3 class="title">Dashboard / About Update</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">About :: Update</h3>
			</div>
			<div class="panel-body">
				<?php
				if(isset($_POST["btnSubmit"])){
					$sAbout="";
					$iUpdateID=0;
					if(isset($_REQUEST["updateid"])){
						$iUpdateID=fFormatString($_REQUEST["updateid"]);
						$iUpdateID=filter_var($iUpdateID, FILTER_SANITIZE_NUMBER_INT);
						$iUpdateID=filter_var($iUpdateID, FILTER_VALIDATE_INT);
						if(!is_numeric($iUpdateID)){$iUpdateID=0;}
						if($iUpdateID<0){$iUpdateID=0;}
					}
                    $sAbout=$_POST['txtAbout'];
                    $sAward=$_POST['txtAwards'];
                    $sExhibitions=$_POST['txtExhibitions'];
                    $sPress=$_POST['txtPress'];
                    // $qUpdate="UPDATE com_about SET AboutBrief='".$sAbout."', AboutAward='".$sAward."', AboutExhibitions='".$sExhibitions."', AboutPress='".$sPress."', DateTimeUpdate=NOW() WHERE AboutID=".$iUpdateID;
                    // $resultUpdate=mysqli_query($connEMM, $qUpdate) or die(mysqli_error($connEMM));
                    // echo $sMsgUpdate;
                    // header("Location: aboutUpdateList.php");
                    $about = new About();
                    $about->update($sAbout,$sAward,$sExhibitions,$sPress,$iUpdateID);
                }else{

                    echo $sMsgUpdateFail;
                }
                    // $iDeleteID=0;
                if($_REQUEST["status"] == 2){
                    if($_REQUEST["deleteid"]){
                        $iDeleteID=fFormatString($_REQUEST["deleteid"]);
                        $iDeleteID=filter_var($iDeleteID, FILTER_SANITIZE_NUMBER_INT);
                        $iDeleteID=filter_var($iDeleteID, FILTER_VALIDATE_INT);
                        if(!is_numeric($iDeleteID)){$iDeleteID=0;}
                        if($iDeleteID<0){$iDeleteID=0;}
                    }
                    $about = new About();
                    $about->hide($iDeleteID);
                }
                if(isset($_REQUEST["deleteid"]) && isset($_REQUEST["status"]) && $_REQUEST["status"] == 1){
                    $iDeleteID=fFormatString($_REQUEST["deleteid"]);
                    $iDeleteID=filter_var($iDeleteID, FILTER_SANITIZE_NUMBER_INT);
                    $iDeleteID=filter_var($iDeleteID, FILTER_VALIDATE_INT);
                    if(!is_numeric($iDeleteID)){$iDeleteID=0;}
                    if($iDeleteID<0){$iDeleteID=0;}
                    $about = new About();
                    $about->show($iDeleteID);
                }
				?>
			</div>
		</div>
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