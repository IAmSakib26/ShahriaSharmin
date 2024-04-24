<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Photo :: Update</title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">

<?php
$_SESSION["sessRedirectPageBN"]='contentUpdateList.php';
$_SESSION["dist"]="no";

echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;
echo $cssChosen;
echo $cssjsoembed;
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script type="text/javascript" src="../common/ckeditor/ckeditor.js"></script>
<!-- <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script> -->
<link href="../common/css/jquery.tagit.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper" class="toggled">
<?php include_once("../common/sidebar.php");?>
<!-- Page Content -->
<div id="page-content-wrapper">
<div class="container-fluid">
	<?php include_once("../common/header.php");?>
	<div class="page-title"><h3 class="title">Dashboard / Photo Update</h3></div>
	<div class="row">
		<div class="col-sm-12 DPaddingLR">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Photo - Update </h3>
					<div class="text-right"><a href="fotoUpdateList.php"><button type="button" class="btn btn-info">List</button></a></div>
				</div>
				<div class="panel-body">
					<?php 
						if(isset($_GET['updateid'])){
							$updateID = $_GET['updateid'];
							$sql = 'SELECT FotoID,Gaps,AlbumID,ImagePath,Widths,Heights,Caption,ImgOrVid FROM com_work_foto WHERE FotoID='.$updateID;
							$resultSlider = mysqli_query($connEMM,$sql);
							$rsSlider = mysqli_fetch_assoc($resultSlider);
						}
					?>
					<form method="post" action="action.php?fotoupdateid=<?php echo $rsSlider['FotoID']?>" enctype="multipart/form-data">
						<div id="steps-uid-0" class="wizard clearfix" role="application">
							<div class="content clearfix">
								<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
								<div class="form-group clearfix">
										<label class="col-sm-2 control-label " for="txtAlbumName">Album Name: *</label>
										<div class="col-sm-4">
											<select name="txtAlbumName" id="txtAlbumName" class="form-control required" required>
											</select>
										</div>
									</div>
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label " for="txtWidth">Image Width(px):</label>
										<div class="col-sm-4">
											<input type="number" step="any" name="txtWidth" class="form-control" id="txtWidth" min="1" value="<?php echo $rsSlider['Widths'] ?>">
										</div>
										<label class="col-sm-2 control-label " for="txtHeight">Image Height(px): </label>
										<div class="col-sm-4">
											<input type="number" step="any" name="txtHeight" class="form-control" id="txtHeight" min="1" value="<?php echo $rsSlider['Heights'] ?>">
										</div>
									</div>
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label " for="txtGap">Image or Video?:</label>
										<div class="col-sm-2">
											<input type="radio" name="txtimgorvid" value="1" class="form-check image" <?php echo($rsSlider['ImgOrVid']==1?'checked':'')?>> Image
										</div>
										<div class="col-sm-2">
											<input type="radio" name="txtimgorvid" value="2" class="form-check video" <?php echo($rsSlider['ImgOrVid']==2?'checked':'')?>> Video
										</div>
									</div>
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label " for="txtGap">Gap After Image?:</label>
										<div class="col-sm-2">
											<input type="radio" name="txtGap" value="1" class="form-check" <?php echo($rsSlider['Gaps']==1?'checked':'')?>> Yes
										</div>
										<div class="col-sm-2">
											<input type="radio" name="txtGap" value="2" class="form-check" <?php echo($rsSlider['Gaps']==2?'checked':'')?>> No
										</div>
									</div>
									<?php if($rsSlider['ImgOrVid']==1){?>
									<div class="form-group clearfix image-div">
										<div class="col-sm-12" style="padding:15px;">
											<div class="row" style="margin-bottom:10px;">
												<label class="col-sm-2 control-label" for="txtImageBGPath">Album Image: <span><?php //echo $sMsgImgInner; ?><span>image must be smaller than 3072 KB</span></span></label>
												<div class="col-sm-8">
													<img src="<?php echo $sSiteURL?>media/PhotoGallery/<?php echo $rsSlider['ImagePath']?>" class="img-fluid img-thumbnail" id="ImageBGPathbtn">
													<input type="file" id="ImageBGPathfl" name="txtImageBGPath">
												</div>
												<span id="errorBGIMg" class="alert alert-danger col-sm-8 col-sm-offset-4" style="display: none"></span>
											</div>
										</div>
									</div>
									<?php }else{?>
									<div class="form-group clearfix video-div">
										<div class="col-sm-12" style="padding:15px;">
											<div class="row" style="margin-bottom:10px;">
												<label class="col-sm-2 control-label" for="txtVideoath">Album Video: </label>
												<div class="col-sm-8">
													<input type="file" name="txtVideoath" id="txtVideoath" class="form-control" value="<?php echo $rsSlider['VideoPath'] ?>">
													<video id="dFrame" width="400" controls>
														<source src="<?php echo $sSiteURL?>media/PhotoGallery/<?php echo $rsSlider['ImagePath']?>" type="video/mp4">
														<source src="" type="video/ogg">
														Your browser does not support HTML video.
													</video>
												</div>
											</div>
										</div>
									</div>
									<?php }?>
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label " for="txtCaption">Caption: *</label>
										<div class="col-sm-4">
											<input type="text" name="txtCaption" id="txtCaption" class="form-control required" value="<?php echo $rsSlider['Caption'] ?>" required>
										</div>
									</div>
								</section>
							</div>
							<div class="form-group clearfix">
								<div class="col-lg-12 text-center">
									<input type="submit" name="btnSubmitfotoUp" class="inpSubmit btn-info btn" value="Update" id="submitit">
								</div>
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
echo $jsChosen;
echo $jsPrism;
echo $jsOembed;
?>
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../common/js/tag-it.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$('.image').click(function(){
		$('.image-div').show();
		$('.video-div').hide();
	})
	$('.video').click(function(){
		$('.image-div').hide();
		$('.video-div').show();
	});
	$('#txtVideoath').change(function(e) {
		var file = URL.createObjectURL(e.target.files[0]);
		$('#dFrame').attr('src', file);
	});

	$("#ImageBGPathbtn").click(function () {
		    $("#ImageBGPathfl").trigger('click');
	});
	
	$("#ImageBGPathfl").change(function () {
	    var _URL = window.URL || window.webkitURL;
   		var thisx=this;

        var file = $(this)[0].files[0];
        var size = file.size/3072;
        var type = file.type;
        console.log(type);

        if((size==0) || (size<0) || (size><?=$iMaxImgSizeContentBG?>) ){
        	$('#errorBGIMg').text('Please check file Size.Max <?=$iMaxImgSizeContentBG?>').show();
        }else{
        	var allowedTypes=['image/png','image/jpeg','image/gif','image/bnp','image/webp'];
	        if ($.inArray(type, allowedTypes) != -1) {
	        	console.log('type ok....');
	        	$('#errorBGIMg').text('').hide();
	        	img = new Image();
		        var imgwidth = 0;
		        var imgheight = 0;
		        var maxwidth = 0;
		        var maxheight = 0;
		        // var maxwidth = <?=$iImgBgWidth?>;
		        // var maxheight = <?=$iImgBgHeight?>;

	          	img.src = _URL.createObjectURL(file);
	          	img.onload = function() {
	           	imgwidth = this.width;
	           	imgheight = this.height;
	           	console.log(imgwidth +'- '+imgheight);
	           	//console.log(this);
		           	if(imgwidth !=''  && imgheight !='' && imgwidth > maxwidth && imgheight > maxheight){
		           		console.log('it ok');
		           		readURL(thisx, 'ImageBGPathbtn');
		           	}else{
	        			$('#errorBGIMg').text("Check image size, MaxWidth: "+maxwidth+" & MaxHeight: "+maxheight).show();
		           		console.log("Image Max width must be equal or more than "+maxwidth+" & Max Height Must be equal or more than "+maxheight);
		           		document.getElementById("ImageBGPathfl").value = "";
		           	}
	          	}
	        }else{
	        	console.log('type not ok....');
	        	$('#errorBGIMg').text('Please check file type').show();
	        }
        }

    });

	$.get('loadAlbm.php?albumid=<?=$rsSlider['AlbumID']?>',function(data){
		$('#txtAlbumName').html(data);
		// console.log(data);
	});
});
function readURL(input, output) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+output).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

</script>
</body>
</html>