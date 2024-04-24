<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_english.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Writers List</title>
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
<div class="page-title"><h3 class="title">Dashboard / Writers List</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
		        <div class="col-sm-offset-9 text-center">
					<a href="<?php echo $sAdmnURL; ?>Setup/writerInsertEN.php"><button type="button" class="btn btn-info">Add Writer</button></a>
				</div>
				<div class="panel-heading"><h3 class="panel-title">Writers List</h3></div>
				<div class="row">
					<div class="col-sm-12 DTable table-responsive">
						<table class="table table-hover table-bordered">
							<thead class="bg-info">
								<tr>
									<th style="width:15%">WRITER NAME</th>
									<th style="width:56%">BIO</th>
									<th style="width:15%">PHOTO</th>
									<th style="width:7%">UPDATE</th>
									<th style="width:7%">DELETE</th>
								</tr>
							</thead>
							<tbody>
								<?php $resultWriter=mysqli_query($connEMM, "SELECT WriterID, WriterName, WriterNameEn, WriterBio, WriterBioEn, ImagePath, Deletable FROM en_writer ORDER BY WriterID DESC LIMIT 500") or die(mysqli_error($connEMM));
								while($rsWriter=mysqli_fetch_assoc($resultWriter)){ ?>
								<tr>
									<td><?php echo $rsWriter["WriterNameEn"]; ?></td>
									<td><?php echo $rsWriter["WriterBioEn"]; ?></td>
									<td><?php if($rsWriter["ImagePath"]!=""){ ?><img src="<?php echo $sSiteURL; ?>media/Writer/<?php echo $rsWriter["ImagePath"]; ?>"  class="img-responsive"><?php } ?></td>
									<td><a href="writerUpdateEn.php?updateid=<?php echo $rsWriter["WriterID"]; ?>"><button type="button" class="btn btn-info">Update</button></a></td>
									<td>
									
									<?php 
                        			if($rsWriter["Deletable"]==1){?>
                        				<a href="writerDelete.php?type=unP&deleteid=<?php echo $rsWriter["WriterID"]; ?>" onClick="return confirm('Are you sure?');">
                        					<lable class="switch">
                        						<input type="checkbox" value="1" checked="checked">
                        						<span class="slider round"></span>
                        					</lable>
                        				</a>
                        			<?php 
                        			}else{
                        			?>
                        				<a href="writerDelete.php?type=P&deleteid=<?php echo $rsWriter["WriterID"]; ?>" onClick="return confirm('Are you sure?');">
                        					<lable class="switch">
                        						<input type="checkbox" value="1">
                        						<span class="slider round"></span>
                        					</lable>
                        				</a>
                        			<?php 
                        			} ?>
									
									</td>
								</tr>
								<?php }mysqli_free_result($resultWriter); ?>
							</tbody>
						</table>
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
<script>
	CKEDITOR.replace( 'txtWriterBio' );
</script>
</body>
</html>