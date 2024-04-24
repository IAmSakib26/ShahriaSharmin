<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Dashboard :: User Insert</title>
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
<div class="page-title"><h3 class="title">Dashboard / Admin User - Insert</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
			<div class="panel-heading"><h3 class="panel-title">Admin User - Insert</h3><br></div>
			<?php if(isset($_REQUEST["msg"])){ ?><tr><td colspan="2" class="TdDuplicate">User already exist. Please type a different User Name.</td></tr><?php } ?>
			<div class="panel-body">
				<?php
				if(isset($_REQUEST["btnSubmit"])){
					require_once("../common/password_compat-master/password.php");//Password Hashing library
					$iWork=0;$iAbout=0;$iSetup=0;$iAdminOperation=0;
					$sUserName=fFormatString($_REQUEST["txtUserName"]);
					$sPasswordReal=fFormatString($_REQUEST["txtNewPassword"]);
					$sPasswordHash=password_hash($sPasswordReal, PASSWORD_BCRYPT);
					$iLock=fFormatString($_REQUEST["cboLock"]);
					if(isset($_POST['chkAccessRight']) && is_array($_POST['chkAccessRight'])){
						foreach($_POST['chkAccessRight'] as $sSlide){
							if($sSlide=="Work"){$iWork=1;}
							if($sSlide=="About"){$iAbout=1;}
							if($sSlide=="Setup"){$iSetup=1;}
							if($sSlide=="AdminOperation"){$iAdminOperation=1;}
						}
					}
					
					$qInsert="INSERT INTO s_secuser(
					UserName, UserPass02, LockType,
					Slider, About, Setup, AdminOperation) VALUES(
					'".$sUserName."',  '".$sPasswordHash."', ".$iLock.",
					".$iSlider.", ".$iAbout.", ".$iSetup.", ".$iAdminOperation.")";
					//echo $qInsert."<br>";
					$result = mysqli_query($connEMM, $qInsert);
					echo '</td></tr></table>';
				} ?>
			<!-- ********************************* --->
				<?php $arrUserName="";
				$resultUserName=mysqli_query($connEMM, "SELECT UserName FROM s_secuser") or die(mysqli_error($connEMM));
				while($rsUserName=mysqli_fetch_assoc($resultUserName)){
					$arrUserName=$arrUserName."'".$rsUserName["UserName"]."', ";
				}mysqli_free_result($resultUserName); ?>
				<form id="frmInsert" name="frmInsert" action="adminuserInsert.php" method="post" enctype="multipart/form-data" onsubmit="return checkUser();">
					<div id="steps-uid-0" class="wizard clearfix" role="application">
						<div class="content clearfix">
							<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
								<div class="form-group clearfix">
									<label class="col-sm-1 control-label text-center" for="#">User:</label>
									<div class="col-sm-2">
										<input type="text" id="txtUserName" name="txtUserName"  maxlength="50" class="form-control" required autofocus>
									</div>
									<label class="col-sm-1 control-label text-right" for="#">Password:</label>
									<div class="col-sm-2">
										<input type="password" id="txtNewPassword" name="txtNewPassword" minlength="5" maxlength="50" class="form-control" required>
									</div>
									<label class="col-sm-1 control-label text-right" for="#">Confirm Password:</label>
									<div class="col-sm-2">
										<input type="password" id="txtReTypePassword" name="txtReTypePassword" onkeyup='check();' minlength="5" maxlength="50" class="form-control" required>
										<span id="message" style="color:red"></span>
									</div>
									<label class="col-sm-1 control-label text-right" for="#">Lock:</label>
									<div class="col-sm-2">
										<select class="form-control" name="cboLock">
											<option value="1" selected>Open</option>
											<option value="2">Lock User</option>
										</select>
									</div>
								</div><br><br>
								<div class="form-group clearfix">
									<label class="col-sm-1 control-label text-center" for="#">Work:</label>
									<div class="col-sm-2">
										<label class="switch">
										  <input type="checkbox" name="chkAccessRight[]" value="Work" checked="checked">
										  <span class="slider round"></span>
										</label>
									</div>
									<label class="col-sm-1 control-label text-right" for="#">About:</label>
									<div class="col-sm-2">
										<label class="switch">
										  <input type="checkbox" name="chkAccessRight[]" value="About">
										  <span class="slider round"></span>
										</label>
									</div>
									<label class="col-sm-1 control-label text-right" for="#">Setup:</label>
									<div class="col-sm-2">
										<label class="switch">
										  <input type="checkbox" name="chkAccessRight[]" value="Setup">
										  <span class="slider round"></span>
										</label>
									</div>
									<label class="col-sm-2 control-label text-right" for="#">Admin Operation:</label>
									<div class="col-sm-1">
										<label class="switch">
										  <input type="checkbox" name="chkAccessRight[]" value="AdminOperation">
										  <span class="slider round"></span>
										</label>
									</div>

								</div>

								<!-- <div class="form-group clearfix">
									<label class="col-sm-1 control-label text-right" for="#">Admin Operation:</label>
									<div class="col-sm-1">
										<label class="switch">
										  <input type="checkbox" name="chkAccessRight[]" value="AdminOperation">
										  <span class="slider round"></span>
										</label>
									</div>
									<label class="col-sm-2 control-label text-right" for="#">AdminBody:</label>
									<div class="col-sm-1">
										<label class="switch">
										  <input type="checkbox" name="chkAccessRight[]" value="AdminBody">
										  <span class="slider round"></span>
										</label>
									</div>
									<label class="col-sm-2 control-label text-right" for="#">Kaalo:</label>
									<div class="col-sm-1">
										<label class="switch">
										  <input type="checkbox" name="chkAccessRight[]" value="Kaalo">
										  <span class="slider round"></span>
										</label>
									</div>
									<label class="col-sm-2 control-label text-right" for="#">Upcoming:</label>
									<div class="col-sm-1">
										<label class="switch">
										  <input type="checkbox" name="chkAccessRight[]" value="Upcoming">
										  <span class="slider round"></span>
										</label>
									</div>
								</div>
								<div class="form-group clearfix">
								<label class="col-sm-1 control-label text-right" for="#">Workshop:</label>
									<div class="col-sm-1">
										<label class="switch">
										  <input type="checkbox" name="chkAccessRight[]" value="Workshop">
										  <span class="slider round"></span>
										</label>
									</div>
								</div><br>
								<div class="row">
									<div class="col text-center ">
										<input type="submit" name="btnSubmit" value="Insert" class="btn btn-info">
									</div>
								</div> -->
							</section>
						</div>
					</div>
				</form>
			</div>
			<div class="panel-heading"><h3 class="panel-title"></h3></div><br>
				<div class="row">
					<div class="col-sm-12 DTable table-responsive">
						<table class="table table-hover table-bordered">
							<thead class="bg-info">
								<tr>
									<th style="width:15%">User Name</th>
									<th style="width:15%">Initial</th>
									<th style="width:15%">Lock</th>
									<th style="width:56%">Access Right</th>
									<th style="width:7%">UPDATE</th>
									<th style="width:7%">DELETE</th>
								</tr>
							</thead>
							<tbody>
								<?php $resultAdminUser=mysqli_query($connEMM, "SELECT * FROM s_secuser") or die(mysqli_error($connEMM));
								while($rsUserName=mysqli_fetch_assoc($resultAdminUser)){ ?>
								<tr>
									<td><?php echo $rsUserName["UserName"]; ?></td>
									<td><?php echo $rsUserName["initial"]; ?></td>
									<td><?php if($rsUserName["LockType"]=="1"){echo "Open";}else{echo "Lock User";} ?></td>
									<td>
										<?php if($rsUserName["Work"]==1){echo "Work &nbsp;&nbsp;";} ?>
										<?php if($rsUserName["About"]==1){echo "About &nbsp;&nbsp;";} ?>
										<?php if($rsUserName["AdminOperation"]==1){echo "Admin Operation &nbsp;&nbsp;";} ?>
										<?php if($rsUserName["Setup"]==1){echo "Setup &nbsp;&nbsp;";} ?>
										
									</td>
									<td><a href="adminuserUpdate.php?updateid=<?php echo $rsUserName["UserName"]; ?>"><button type="button" class="btn btn-info">Update</button></a></td>
									<td>
									<?php 
									if($rsUserName["Deletable"]==1){?>
										<a href="adminuserDelete.php?type=unP&deleteid=<?php echo $rsUserName["UserName"]; ?>" onClick="return confirm('Are you sure?');">
											<lable class="switch">
												<input type="checkbox" value="1" checked="checked">
												<span class="slider round"></span>
											</lable>
										</a>
									<?php 
									}else{
									?>
										<a href="adminuserDelete.php?type=P&deleteid=<?php echo $rsUserName["UserName"]; ?>" onClick="return confirm('Are you sure?');">
											<lable class="switch">
												<input type="checkbox" value="1">
												<span class="slider round"></span>
											</lable>
										</a>
									<?php 
									} ?>
									
									</td>
								</tr>
								<?php }mysqli_free_result($resultAdminUser); ?>
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
		$('#message').text('Not Matching').show();
		return false;		
	}else{
		return true;
	}
}
</script>
</body>
</html>