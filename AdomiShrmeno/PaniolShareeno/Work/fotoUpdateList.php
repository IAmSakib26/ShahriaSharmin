<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Photo :: Update List</title>
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
<div class="page-title"><h3 class="title">Dashboard / Photo - Update List</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Photo - Update List</h3>
				<div class="text-right"><a href="fotoInsert.php"><button type="button" class="btn btn-info">Insert</button></a></div>
			</div>
			<div class="student-portion">
				<div class="row">
					<div class="col-sm-12">
						<form action="fotoUpdateList.php" method="get" style="display: felx;">
							<div class="row">
								<div class="col-sm-3">
									<h4 class="heading">Albums :</h4>
								</div>
								<div class="col-sm-5">
									<select name="txtalbum" id="txtalbum" class="form-control required">
										<option value="">Select Album</option>
										<?php 
											$qSQL = mysqli_query($connEMM,"SELECT AlbumID,AlbumName FROM com_work_album WHERE Deletable=1");
											while($fetch = mysqli_fetch_assoc($qSQL)){
										?>
										<option value="<?php echo $fetch['AlbumID']?>"><?php echo $fetch['AlbumName']?></option>
										<?php }?>
									</select>
								</div>
								<div class="col-sm-4">
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
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
												<th>Image Name & Path</th>
												<th style="width:20%">Action</th>
											</tr>
											</thead>
											<tbody>
											<?php
											if(isset($_REQUEST["txtalbum"]) && $_REQUEST["txtalbum"]!=""){
												$albumid = $_REQUEST["txtalbum"];
												// echo "AlbumID: ".$albumid;die();
												$sql = mysqli_query($connEMM,"SELECT (SELECT AlbumName FROM com_work_album WHERE com_work_album.AlbumID=com_work_foto.AlbumID) Albumname,FotoID,ImagePath,DateTimeInsert,DateTimeUpdate,Deletable,Caption,ImgOrVid FROM com_work_foto WHERE AlbumID=$albumid"); 
											}else{
												$sql = mysqli_query($connEMM,"SELECT (SELECT AlbumName FROM com_work_album WHERE com_work_album.AlbumID=com_work_foto.AlbumID) Albumname,FotoID,ImagePath,DateTimeInsert,DateTimeUpdate,Deletable,Caption,ImgOrVid FROM com_work_foto");
											}
											$i=0; 
											while($fetch = mysqli_fetch_assoc($sql)){$i++;?>
											<tr>
												<td><?php echo $i?></td>
												<td><?php echo $fetch['Albumname']?></td>
												<td>
													<!-- <p>Image Name : <?php echo 'media/PhotoGallery/'.$fetch['ImagePath'];?></p> -->
													<p>Image Name : <?php echo $fetch['Caption'];?></p>
													<?php echo ($fetch['DateTimeUpdate'] !=null?'Update Date : '.$fetch['DateTimeUpdate']:'Insert Date : '.$fetch['DateTimeInsert'])?>
													<br>
													<?php if($fetch['ImgOrVid']==1){?>
													<img src="<?php echo $sSiteURL.'media/PhotoGallery/'.$fetch['ImagePath']?>" alt="" style="width: 250px;">
													<?php }else if($fetch['ImgOrVid']==2){?>
														<video width="250" controls>
															<source src="<?php echo $sSiteURL.'media/PhotoGallery/'.$fetch['ImagePath']?>" type="video/mp4">
														</video>
													<?php }?>
												</td>
												<td>
													<a href="fotoUpdate.php?updateid=<?php echo $fetch['FotoID']?>" class="btn btn-success">Update</a>
													<?php if($fetch['Deletable'] == 1){?>
													<a href="action.php?fotodeleteid=<?php echo $fetch['FotoID']?>&deleteType=2" class="btn btn-danger">Hide</a>
													<?php }else{?>
													<a href="action.php?fotodeleteid=<?php echo $fetch['FotoID']?>&deleteType=1" class="btn btn-success">show</a>
													<?php }?>
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
<script>
	$(document).ready(function(){
		$.get('loadAlbmFoto.php?load='+$('#studentName').val(),function(data){
			$('#trow').html(data);
		})
		// $('#studentName').change(function(){
		// 	$.get('loadAlbmFoto.php?load='+$(this).val(),function(data){
		// 	$('#trow').html(data);
		// })
		// })
	})
</script>
</body>
</html>