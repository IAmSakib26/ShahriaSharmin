<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Link :: Update List</title>
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
<div class="page-title"><h3 class="title">Dashboard / Link - Update List</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
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
												<th>Link Name</th>
												<th>Link URL</th>
												<th style="width:20%">Action</th>
											</tr>
											</thead>
											<tbody>
											<?php
                                            $sql = mysqli_query($connEMM,"SELECT LinkID,LinkName,LinkURL FROM com_links");
											$i=0; 
											while($fetch = mysqli_fetch_assoc($sql)){$i++;?>
											<tr>
												<td><?php echo $i?></td>
												<td><?php echo $fetch['LinkName']?></td>
												<td><?php echo $fetch['LinkURL']?></td>
												<td>
													<a href="linkUpdate.php?updateid=<?php echo $fetch['LinkID']?>" class="btn btn-success">Update</a>
												</td>
											</tr>
											<?php }?>
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