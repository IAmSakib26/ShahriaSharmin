<div id="sidebar-wrapper">
<ul class="sidebar-nav">
<li class="sidebar-brand"><a href="<?php echo $sAdmnURL; ?>home.php"><?php echo $sAdmnTitle; ?></a></li>
<li><a href="<?php echo $sAdmnURL; ?>home.php"><span><i class="fa fa-home" aria-hidden="true"></i></span> &nbsp; DASHBOARD</a></li>

<!-- About  -->
<?php
if(isset($_SESSION["sessAdmnAbout"])){
if($_SESSION["sessAdmnAbout"]==1){ ?>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-edit" aria-hidden="true"></i></span> &nbsp; ABOUT &nbsp;&nbsp;<span class="caret"></span></a>
	<ul class="dropdown-menu active">
		<li>
			<a href="<?php echo $sAdmnURL; ?>About/aboutUpdateList.php">About Info Update</a>
			<!--<a href="<?php echo $sAdmnURL; ?>About/aboutUpdateList.php" class="pull-right">[List]</a>-->
		</li> 
	</ul>
</li>
<?php } } ?>

<!-- Work  -->
<?php
if(isset($_SESSION["sessAdmnWork"])){
if($_SESSION["sessAdmnWork"]==1){ ?>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-edit" aria-hidden="true"></i></span> &nbsp; WORK &nbsp;&nbsp;<span class="caret"></span></a>
	<ul class="dropdown-menu active">
		<li class="hz">
			<a href="<?php echo $sAdmnURL; ?>Work/albumInsert.php" class="ListL">Album</a>
			<a href="<?php echo $sAdmnURL; ?>Work/albumUpdateList.php" class="pull-right">[List]</a>
		</li> 
		<li class="hz">
			<a href="<?php echo $sAdmnURL; ?>Work/fotoInsert.php" class="ListL">Album Picture</a>
			<a href="<?php echo $sAdmnURL; ?>Work/fotoUpdateList.php" class="pull-right">[List]</a>
		</li> 
	</ul>
</li>
<?php } } ?>

<!-- Setup  -->
<?php
if(isset($_SESSION["sessAdmnSetup"])){
if($_SESSION["sessAdmnSetup"]==1){ ?>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-edit" aria-hidden="true"></i></span> &nbsp; GENERAL SETUP &nbsp;&nbsp;<span class="caret"></span></a>
	<ul class="dropdown-menu active">
		<li>
			<a href="<?php echo $sAdmnURL; ?>Home/homeUpdate.php">Home Image</a>
		</li> 
		<li>
			<a href="<?php echo $sAdmnURL; ?>Home/linkUpdateList.php">Social Meadias</a>
		</li> 
	</ul>
</li>
<?php } } ?>
<?php
//if(isset($_SESSION["sessAdmnSetup"])){
//if($_SESSION["sessAdmnSetup"]==1){ ?>
<!-- <li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-cogs" aria-hidden="true"></i></span> &nbsp; SETUP &nbsp;&nbsp;<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="<?php echo $sAdmnURL; ?>Setup/createMonthlyImageFolder.php">Create Montly Folder</a></li>
		<li class="hz">
			<a href="<?php echo $sAdmnURL; ?>Setup/Bangla/categoryInsert.php" class="ListL">Category (Bangla)</a>
			<a href="<?php echo $sAdmnURL; ?>Setup/Bangla/categoryUpdateList.php" class="pull-right">[List]</a>
		</li>
		<li class="hz">
			<a href="<?php echo $sAdmnURL; ?>Setup/Bangla/subCatInsert.php" class="ListL">Sub-Category (Bangla)</a>
			<a href="<?php echo $sAdmnURL; ?>Setup/Bangla/subCatUpdateList.php" class="pull-right">[List]</a>
		</li>
		<li class="hz">
			<a href="<?php echo $sAdmnURL; ?>Setup/Bangla/speCatInsert.php" class="ListL">Special Category (Bangla)</a>
			<a href="<?php echo $sAdmnURL; ?>Setup/Bangla/speCatUpdateList.php" class="pull-right">[List]</a>
		</li>
		<li class="hz">
			<a href="<?php echo $sAdmnURL; ?>Setup/English/categoryInsert.php" class="ListL">Category (English)</a>
			<a href="<?php echo $sAdmnURL; ?>Setup/English/categoryUpdateList.php" class="pull-right">[List]</a>
		</li>
		<li class="hz">
			<a href="<?php echo $sAdmnURL; ?>Setup/English/subCatInsert.php" class="ListL">Sub-Category (English)</a>
			<a href="<?php echo $sAdmnURL; ?>Setup/English/subCatUpdateList.php" class="pull-right">[List]</a>
		</li>
		<li class="hz">
			<a href="<?php echo $sAdmnURL; ?>Setup/English/speCatInsert.php" class="ListL">Special Category (English)</a>
			<a href="<?php echo $sAdmnURL; ?>Setup/English/speCatUpdateList.php" class="pull-right">[List]</a>
		</li>
	</ul>
</li> -->
<?php //}} ?>
<?php
if(isset($_SESSION["sessAdmnAdminOperation"])){
if($_SESSION["sessAdmnAdminOperation"]==1){ ?>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-lock" aria-hidden="true"></i></span> &nbsp; ADMIN OPERATION &nbsp;&nbsp;<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<!-- <li class="dropdown-submenu">
			<a href="#" class="test" tabindex="-1">Generate <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo $sAdmnURL; ?>Setup/generateLatest24Bn.php">Latest (BN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Setup/generateLatest24En.php">Latest (EN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Setup/generateTop24Bn.php">Top 10 (BN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Setup/generateTop24En.php">Top (EN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Setup/generateTop10CategorizedBN30days.php">Top 10 Categorized (BN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Setup/generateTop10CategorizedEN30days.php">Top 10 Categorized (EN)</a></li>
			</ul>
		</li>
		<li class="dropdown-submenu">
			<a href="#" class="test" tabindex="-1">Top Hit <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo $sAdmnURL; ?>Setup/topContentListBn.php">Bangla</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Setup/topContentListEn.php">English</a></li>
			</ul>
		</li>
		<li class="dropdown-submenu">
			<a href="#" class="test" tabindex="-1">Fix URL Alice <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo $sAdmnURL; ?>Setup/FixURLAliexBn.php">Bangla</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Setup/FixURLAliexEn.php">English</a></li>
			</ul>
		</li>
		<li class="dropdown-submenu">
			<a href="#" class="test" tabindex="-1">Fix Total Hit <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo $sAdmnURL; ?>Setup/FixTotalHitBn.php">Bangla</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Setup/FixTotalHitEn.php">English</a></li>
			</ul>
		</li> -->
		<!-- <li><a href="<?php echo $sAdmnURL; ?>Setup/optimize.php">Optimized</a></li> -->
		<li><a href="<?php echo $sAdmnURL; ?>Setup/adminuserInsert.php">Admin User</a></li>
		<li><a href="<?php echo $sAdmnURL; ?>Report/report.php">Audit Report</a></li>
	</ul>
</li>
<?php } }?>
<?php if(isset($_SESSION["sessReports"])){
if($_SESSION["sessReports"]==1){ ?>
<!-- <li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-bug" aria-hidden="true"></i></span> &nbsp; REPORTS &nbsp;&nbsp;<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li class="dropdown-submenu">
			<a class="test" tabindex="-1" href="#">Audit Trail <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo $sAdmnURL; ?>Reports/auditTrailCommonBn.php">Common (BN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Reports/auditTrailCommonEn.php">Common (EN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Reports/auditTrailBn.php">Content (BN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Reports/auditTrailEn.php">Content (EN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Reports/auditTrailPhoto.php">Photo </a></li>
			</ul>
		</li>
		<li class="dropdown-submenu">
			<a class="test" tabindex="-1" href="#">Access by IP <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo $sAdmnURL; ?>Reports/accessToCPCommonBn.php">Common (BN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Reports/accessToCPCommonEn.php">Common (EN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Reports/accessToCPBn.php">Content (BN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Reports/accessToCPEn.php">Content (EN)</a></li>
				<li><a href="<?php echo $sAdmnURL; ?>Reports/accessToCPPhoto.php">Photo </a></li>
			</ul>
		</li>

		<li><a href="<?php echo $sAdmnURL; ?>Reports/reportDetailsAnalytics.php">report Details Analytics</a></li>
		<li><a href="<?php echo $sAdmnURL; ?>Reports/reportDetailsAnalyticsEn.php">report Details Analytics En</a></li>
		<li><a href="<?php echo $sAdmnURL; ?>Reports/report.php">Reports (Short)</a></li>
		<li><a href="<?php echo $sAdmnURL; ?>Reports/reportDetails.php">Reports (Details)</a></li>
		<li><a href="<?php echo $sAdmnURL; ?>Reports/useraudit.php">Reports (User)</a></li>
		<li><a href="<?php echo $sAdmnURL; ?>Reports/reportEn.php">Reports EN (Short)</a></li>
		<li><a href="<?php echo $sAdmnURL; ?>Reports/reportDetailsEn.php">Reports EN (Details)</a></li>
		<li><a href="<?php echo $sAdmnURL; ?>Reports/newsbyCategory.php">News & HIT category wise (BN)</a></li>
		<li><a href="<?php echo $sAdmnURL; ?>Reports/newsbyCategoryEn.php">News & HIT category wise (EN)</a></li>
	</ul>
</li> -->
<?php }} ?>
<?php
if(isset($_SESSION["sessAdmnAdminOperation"])){
	if($_SESSION["sessAdmnAdminOperation"]==1){ ?>
	<!-- <li class="dropdown ">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-edit" aria-hidden="true"></i></span> &nbsp; Team &nbsp;&nbsp;<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo $sAdmnURL; ?>Profile/teamInsert.php">Team Insert</a></li>
			<li><a href="<?php echo $sAdmnURL; ?>Profile/teamUpdateList.php">Team Update</a></li>
		</ul>
	</li> -->
<?php }} ?>


</ul>
</div>