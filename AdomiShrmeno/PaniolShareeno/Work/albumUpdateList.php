<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Album :: Update List</title>
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
<div class="page-title"><h3 class="title">Dashboard / Album - Update List</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Album - Update List</h3>
				<div class="text-right"><a href="albumInsert.php"><button type="button" class="btn btn-info">Insert</button></a></div>
			</div>
			<div class="panel-body">
				<form id="basic-form" action="#">
					<div id="steps-uid-0" class="wizard clearfix" role="application">
						<div class="content clearfix">
							<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
								<div class="row">
									<div class="col-sm-12 DTable table-responsive">
										<table class="table table-hover table-bordered">
											<thead class="bg-info">
											<tr> 
												<th style="width:5%">#</th>
												<th>Album Name</th>
												<th style="width:20%">Action</th>
											</tr>
											</thead>
											<tbody>
											<?php $resultSlider=mysqli_query($connEMM, "SELECT a.* FROM com_work_album a ORDER BY a.AlbumID") or die(mysqli_error($connEMM));
											$i=1;
											while($rsSlider=mysqli_fetch_assoc($resultSlider)){ ?>
											<tr>
												<td>
													<b><?php echo $i; ?></b><br>
												</td>
												<td>
													<?php echo $rsSlider["AlbumName"]; ?>
												</td>
												<td align="center" class="d-flex align-items-center">
													<a href="albumUpdate.php?updateid=<?php echo $rsSlider["AlbumID"]; ?>"><button type="button" class="btn btn-primary">Update</button></a>
													<?php if($rsSlider['Deletable']==1){?>
													<a href="action.php?deleteid=<?php echo $rsSlider["AlbumID"]; ?>&deletetype=2"><button type="button" class="btn btn-danger">Hide</button></a>
													<?php }else{?>
													<a href="action.php?deleteid=<?php echo $rsSlider["AlbumID"]; ?>&deletetype=1"><button type="button" class="btn btn-success">Show</button></a>
													<?php }?>
												</td>
											</tr>
											<?php $i++;}mysqli_free_result($resultSlider); ?>
											</tbody>
										</table>
									</div>
								</div>
							</section>
						</div>
					</div>
				</form>
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