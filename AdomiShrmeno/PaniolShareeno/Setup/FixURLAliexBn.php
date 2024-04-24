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

<script language="javascript">

function setfocus(){document.frmInsert.txtContentIDFrom.focus();}

$(document).ready(function(){

	$("#frmInsert").validate({rules:{

		txtContentIDFrom:{required:true,number:true}},

		txtContentIDTo:{required:true,number:true}}

	});

});

</script>

</head>

<body>

<div id="wrapper" class="toggled">

<?php include_once("../common/sidebar.php");?>

<!-- Page Content -->

<div id="page-content-wrapper">

<div class="container-fluid">

<?php include_once("../common/header.php");?>

<div class="page-title"><h3 class="title">Dashboard / Fix URL Alies (Bangla)</h3></div>

<div class="row">

	<div class="col-sm-12 DPaddingLR">

		<div class="panel panel-default">

			<div class="panel-heading"><h3 class="panel-title">Fix URL Alies (Bangla)</h3><br></div>

			<center><p>Total unsolved URL: <?php

				$qCount='SELECT COUNT(ContentID) AS TotalBlank FROM bn_content WHERE URLAlies IS NULL';

				$resultCount=mysqli_query($connEMM, $qCount) or die(mysqli_error($connEMM));

				$rsCount=mysqli_fetch_array($resultCount);

				echo $rsCount["TotalBlank"];

				mysqli_free_result($resultCount);

				?> </p>

			</center>

			<div class="panel-body">

				<form id="frmInsert" name="frmInsert" method="post" action="FixURLAliexBn.php">

				<div id="steps-uid-0" class="wizard clearfix" role="application">

					<div class="content clearfix">

						<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">

							<div class="row">

								<div class="col-sm-12 DTable table-responsive">

									<div class="form-group clearfix">

										<label class="col-sm-1 control-label " for="#"></label>

										<label class="col-sm-2 control-label text-right" for="#">Contend ID: From:</label>

										<div class="col-sm-3">

											<input type="text" name="txtContentIDFrom" maxlength="8" value="1" class="form-control required">

										</div>

										<label class="col-sm-1 control-label text-right" for="#">To:	</label>

										<div class="col-sm-3">

											<input  type="text" name="txtContentIDTo" maxlength="8" value="1000" class="form-control required">

										</div>

										<div class="col-sm-2 ">

											<input type="submit" name="btnSubmit" value="Fix" class="btn btn-info">

										</div>

									</div>

								</div>

							</div>

						</section>

					</div>

				</div>

				</form>

			</div>

			<div class="panel-heading"></div>

			<?php

			if(isset($_REQUEST["btnSubmit"])){

				$iContentIDFrom=$dtDate;$iContentIDTo=$dtDate;$iContentIDFrom=1;



				$iContentIDFrom=$_POST["txtContentIDFrom"];

				$iContentIDFrom=$iContentIDFrom-1;

				$iContentIDTo=$_POST["txtContentIDTo"];



				$qShow='SELECT ContentID, ContentHeading FROM bn_content WHERE URLAlies IS NULL ORDER BY ContentID ASC LIMIT '.$iContentIDFrom.', '.$iContentIDTo;

				//echo "qShow: ".$qShow."<br>";

				$resultShow=mysqli_query($connEMM, $qShow) or die(mysqli_error($connEMM));

				if(mysqli_num_rows($resultShow)>0){

				while($rsShow=mysqli_fetch_assoc($resultShow)){

					$iContentID=$rsShow["ContentID"];

					$sContentHeading=fFormatURL($rsShow["ContentHeading"]);

					//echo $iContentID." - ".$sContentHeading."<br>";



					$qUpdate="UPDATE bn_content SET URLAlies='".$sContentHeading."' WHERE ContentID=".$iContentID;

					//echo "qUpdate: ".$qUpdate."<br>";

					$resultUpdate=mysqli_query($connEMM, $qUpdate) or die(mysqli_error($connEMM));

					echo "<center><p>Completed ContentID=".$iContentID."</p></center><br>";

					}

				}else{ 

				echo "<center><p>All URL Alies are Fixed Already</p></center><br>"; 

				}

				mysqli_free_result($resultShow);

			}else{echo "<center><p>Not posted </p></center>";}

			?>

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