<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Audit :: Report List</title>
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
<div class="page-title"><h3 class="title">Dashboard / Audit - Report List</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
			<div class="panel-body">
				<form id="basic-form">
					<div id="steps-uid-0" class="wizard clearfix" role="application">
						<div class="content clearfix">
							<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
								<div class="row">
									<div class="col-sm-12 DTable table-responsive">
										<table class="table table-hover table-bordered">
											<thead class="bg-info">
											<tr> 
												<th>User Name</th>
												<th>Action</th>
												<th>Report</th>
												<th>Date Time</th>
											</tr>
											</thead>
											<tbody>
                                                <?php $data = file_get_contents("../common/audit.json");
                                                $data = json_decode($data, true);
                                                // print_r($data);die();
                                                // $arrData = explode(",", $data);
                                                // print_r($arrData);die();
                                                foreach ($data as $value) {
													if($value['action'] == 'insert_photo' || $value['action'] == 'update_photo' || $value['action'] == 'delete_photo' || $value['action'] == 'undelete_photo'){
														// $fotoID = (int)$value['report'];
														// $type = gettype($fotoID);
														// echo $type;die();
														// if(is_numeric($fotoID)){
														// 	$sql = mysqli_query($connEMM,"SELECT Caption FROM com_work_foto WEHRE FotoID=".$fotoID);
														// 	$fetch = mysqli_fetch_assoc($sql);
														// 	$caption = $fetch['Caption'];
														// }
													}
                                                    // echo $value['user_name'];
                                                    // echo $value['action'];
                                                    // echo $value['report'];
                                                    // echo $value['timestamp'];?>
											<tr>
												<td>
                                                    <?php echo $value['user_name'];?>
												</td>
												<td>
                                                    <?php echo $value['action'];?>
												</td>
												<td>
                                                    <?php echo $value['report'];?>
												</td>
												<td>
                                                    <?php echo $value['date&time'];?>
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