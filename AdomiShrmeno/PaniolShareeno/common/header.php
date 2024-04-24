<?php if(!isset($_SESSION["sessUserName"])){
	if(trim(isset($_SESSION["sessUserName"]))==""){
		//session_start();
		$_SESSION["sessUserName"]=NULL;
		session_unset();
		session_destroy();
		if(isset($connEMM)){mysqli_close($connEMM);}
		header("location: ".$sAdmnURL);
		exit();
	}
} ?>
<header>
<div class="row">
	<div class="col-sm-12 DPadding0">
		<nav class="navbar navbar-default">
			<div class="container-fluid">

				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					  <span class="sr-only">Toggle navigation</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
			  </div>
			  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo $sAdmnURL; ?>home.php"><i class="fa fa-home fa-2x"></i> Admin Home</a></li>
						<li><a href="<?php echo $sSiteURL; ?>" target="_blank"><i class="fa fa-building fa-2x"></i> Site Home</a></li>
					</ul>
					<ul class="list-inline navbar-right top-menu top-right-menu">
						<li class="dropdown text-center">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
								<img class="img-circle profile-img thumb-sm" src="<?php echo $sAdmnURL; ?>media/avater-sign.png">
								<span class="username"><?php echo $_SESSION["sessUserName"]; ?></span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
								<li><a href="#"><i class="fa fa-briefcase"></i>Profile</a></li>
								<li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
								<li><a href="<?php echo $sAdmnURL; ?>adminlogout.php"><i class="fa fa-sign-out"></i>Log Out</a></li>
							</ul>
					  </li>
				  </ul>
			  </div>
		  </div>
	  </nav>
  </div>
</div>
</header>