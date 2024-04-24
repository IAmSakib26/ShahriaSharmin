<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Dashboard / Admin User - Update</title>
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
<div class="page-title"><h3 class="title">Dashboard / Admin User - Update</h3></div>
<div class="row">
<div class="col-sm-12 DPaddingLR">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Admin User - Update</h3><br></div>
<div class="panel-body">
	<?php $_SESSION["UpdateID"]=$_REQUEST["updateid"];
	$qUpdate="SELECT * FROM s_secuser WHERE UserName='".$_SESSION["UpdateID"]."'";
	$resultUpdate=mysqli_query($connEMM, $qUpdate);$rsUpdate=mysqli_fetch_assoc($resultUpdate); ?>
	<form id="frmUpdate" name="frmUpdate" action="adminuserUpdateAction.php" method="post" onsubmit="return checkUser();">
		<div id="steps-uid-0" class="wizard clearfix" role="application">
			<div class="content clearfix">
				<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
					<div class="form-group clearfix">
						<label class="col-sm-1 control-label text-right" for="#">User: </label>
						<div class="col-sm-3 text-left"><?php echo $rsUpdate["UserName"]; ?></div>
					</div>
					<div class="form-group clearfix">
						<label class="col-sm-1 control-label text-right" for="#">New Password:</label>
						<div class="col-sm-2">
							<input  type="password" id="txtNewPassword" name="txtNewPassword" maxlength="50" class="form-control" required>
						</div>
						<label class="col-sm-1 control-label text-right" for="#">Confirm Password:</label>
						<div class="col-sm-2">
							<input type="password" id="txtReTypePassword" name="txtReTypePassword" onkeyup='check();' maxlength="50" class="form-control" required>
							<span id="message" style="color:red"></span>
						</div>
						<label class="col-sm-1 control-label text-right" for="#">Lock:</label>
						<div class="col-sm-2">
							<select class="form-control" name="cboLock">
								<option value="1" <?php if($rsUpdate["LockType"]=="1") echo ' selected="selected"'; ?>>Open</option>
								<option value="2" <?php if($rsUpdate["LockType"]=="2") echo ' selected="selected"'; ?>>Lock User</option>
							</select>
						</div>
					</div>
					<div class="col text-center ">
						<input type="submit" name="btnSubmitPass" value="Update Password" class="btn btn-info">
					</div>
				</section>
			</div>
		</div>
	</form><br><br>
	<form id="frmUpdate" name="frmUpdate" action="adminuserUpdateAction.php" enctype="multipart/form-data" method="post">
		<div id="steps-uid-0" class="wizard clearfix" role="application">
			<div class="content clearfix">
				<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
					<div class="form-group clearfix">
						<label class="col-sm-1 control-label text-center" for="#">Work:</label>
						<div class="col-sm-2">
							<label class="switch">
								<input type="checkbox" name="chkAccessRight[]" value="Work" <?php if($rsUpdate["Work"]==1) echo 'checked="checked"'; ?>>
								<span class="slider round"></span>
							</label>
						</div>
						<label class="col-sm-1 control-label text-right" for="#">About:</label>
						<div class="col-sm-2">
							<label class="switch">
								<input type="checkbox" name="chkAccessRight[]" value="About" <?php if($rsUpdate["About"]==1) echo 'checked="checked"'; ?>>
								<span class="slider round"></span>
							</label>
						</div>
						<label class="col-sm-1 control-label text-right" for="#">Setup:</label>
						<div class="col-sm-2">
							<label class="switch">
								<input type="checkbox" name="chkAccessRight[]" value="Setup" <?php if($rsUpdate["Setup"]==1) echo 'checked="checked"'; ?>>
								<span class="slider round"></span>
							</label>
						</div>
						<label class="col-sm-2 control-label text-right" for="#">Admin Operation:</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="chkAccessRight[]" value="AdminOperation" <?php if($rsUpdate["AdminOperation"]==1) echo 'checked="checked"'; ?>>
								<span class="slider round"></span>
							</label>
						</div>
					</div>

					<!-- <div class="form-group clearfix">
						<label class="col-sm-1 control-label text-right" for="#">Admin Operation:</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="chkAccessRight[]" value="AdminOperation" <?php if($rsUpdate["AdminOperation"]==1) echo 'checked="checked"'; ?>>
								<span class="slider round"></span>
							</label>
						</div>
						<br>
					</div> -->
					<div class="row">
						<div class="col text-center ">
							<input type="submit" name="btnSubmitAccess" value="Update" class="btn btn-info">
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
var check = function() {
  if (document.getElementById('txtNewPassword').value ==
	document.getElementById('txtReTypePassword').value) {
	document.getElementById('message').style.color = 'green';
	document.getElementById('message').innerHTML = 'matching';
  } else {
	document.getElementById('message').style.color = 'red';
	document.getElementById('message').innerHTML = 'not matching';
	return false;
  }
}
function checkUser(){
	var pass=$('#txtNewPassword').val();
	var repass=$('#txtReTypePassword').val(); 
	console.log(pass + '' + repass)
	if (pass!=repass){
		$('#txtReTypePassword').val(''); 
		$('#message').text('Password missmatch').show();
		return false;		
	}else{
		return true;
	}
}
</script>
</body>
</html>