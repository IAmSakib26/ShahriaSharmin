<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>About :: Update List</title>
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
<div class="page-title"><h3 class="title">Dashboard / About - Update List</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">About - Update List</h3>
				<div class="text-right"><a href="aboutInsert.php"><button type="button" class="btn btn-info">Insert</button></a></div>
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
												<th>About</th>
												<th style="width:20%">Action</th>
											</tr>
											</thead>
											<tbody>
											<?php $resultAbout=mysqli_query($connEMM, "SELECT * FROM com_about ORDER BY AboutID") or die(mysqli_error($connEMM));
											$i=1;
											while($rsAbout=mysqli_fetch_assoc($resultAbout)){ ?>
											<tr>
												<td>
													<b><?php echo $i; ?></b><br>
												</td>
												<td>
													<?php echo $rsAbout['AboutBrief'];?>
												</td>
												<td align="center" class="d-flex align-items-center">
													<a href="aboutUpdate.php?updateid=<?php echo $rsAbout["AboutID"]; ?>"><button type="button" class="btn btn-primary">Update</button></a>
													<?php if($rsAbout['Deletable']==1){?>
													<button type="button" class="btn btn-danger delete-btn" data-status="2">Hide</button>
													<?php }else{?>
													<button type="button" class="btn btn-success delete-btn" data-status="1">Show</button>
													<?php }?>
												</td>
											</tr>
											<?php $i++;}mysqli_free_result($resultAbout); ?>
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
<script>
	$(document).ready(function(){
		// $(".delete-btn").click(function(){
		// 	console.log($(this).attr("data-status"));
		// })
		var id = 1;
		var status = $('.delete-btn').attr("data-status");
		$(".delete-btn").click(function(){
			$.ajax({
				type: "POST",
				url: "aboutDelete.php",
				data: {deleteid: 1, status: status},
				success: function(response){
					console.log(response);
					location.reload();
				}
			})
		});
	});
</script>
</body>
</html>