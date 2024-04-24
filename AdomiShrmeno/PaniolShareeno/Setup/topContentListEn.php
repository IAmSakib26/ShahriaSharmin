<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_english.php");require_once("../common/config.php"); ?>

<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">



<title>Access by IP :: English Content</title>



<meta name="robots" content="noindex, nofollow">

<meta name="googlebot" content="noindex, nofollow">

<meta name="author" content="<?php echo $sAuthor; ?>">



<?php

echo $cssBootstrap;

echo $cssFontAwesome;

echo $cssEMM;

?>

<script type="text/javascript">function confirmDelete(){return confirm("Are you sure you wish to delete this entry?");}</script>

</head>

<body>

<div id="wrapper" class="toggled">

<?php include_once("../common/sidebar.php");?>

<!-- Page Content -->

<div id="page-content-wrapper">

<div class="container-fluid">

<?php include_once("../common/header.php");?>

<div class="page-title"><h3 class="title">Dashboard / Top Content List (English)</h3></div>

<div class="row">

	<div class="col-sm-12 DPaddingLR">

		<div class="panel panel-default">

			<div class="panel-heading">

				<h3 class="panel-title">Content - Top Content List (English)</h3>

				<div class="text-right">

					<a href="topContentListBn.php"><button type="button" class="btn btn-info">Bangla</button></a>

					<a href="topContentListEn.php"><button type="button" class="btn btn-info">English</button></a>

				</div>

			</div>

			<div class="panel-body">

				<form id="basic-form" action="#">

				<div id="steps-uid-0" class="wizard clearfix" role="application">

					<div class="content clearfix">

						<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">

							<div class="form-group clearfix">

								<label class="col-sm-2 control-label " for="userName">Category:</label>

								<div class="col-sm-2">

									<select class="form-control" onchange="navigateCategory(this.value)">

										<option value="0">ALL</option>

										<?php $resultCategory=mysqli_query($connEMM, "SELECT * FROM en_bas_category WHERE Deletable=1 ORDER BY CategoryName ASC") or die(mysqli_error($connEMM));

										while($rsCategory=mysqli_fetch_assoc($resultCategory)){

											$select='';

											if( isset($_GET["catid"]) && $rsCategory["CategoryID"]==$_GET["catid"]){

												$select='selected';

											}

										echo "<option value=".$rsCategory["CategoryID"]." ".$select."> ".$rsCategory["CategoryName"]."</option>";

										}mysqli_free_result($resultCategory); ?>

									</select>

								</div>

								<label class="col-sm-2 control-label " for="userName">Sub-Category:</label>

								<div class="col-sm-2">

									<select class="form-control" onchange="navigateSubCategory(this.value)" id="exampleFormControlSelect1">

										<?php $resultSubCategory=mysqli_query($connEMM, "SELECT * FROM en_bas_subcategory WHERE Deletable=1 ORDER BY SubCategoryName ASC") or die(mysqli_error($connEMM));

										while($rsSubCategory=mysqli_fetch_assoc($resultSubCategory)){

											if($_REQUEST["subcatid"]==$rsSubCategory['SubCategoryID']){

												$selected='selected';

											}else{

												$selected='';

											}

										echo "<option value='".$rsSubCategory['SubCategoryID']."' ".$selected.">".$rsSubCategory['SubCategoryName']."</option>";

										}mysqli_free_result($resultSubCategory); ?>

									</select>

								</div>

								<label class="col-sm-2 control-label " for="userName">Special Category:</label>

								<div class="col-sm-2">

									<select class="form-control" onchange="navigateSpeCategory(this.value)" id="exampleFormControlSelect1">

										<?php $resultSpecialCategory=mysqli_query($connEMM, "SELECT * FROM en_bas_specialcategory WHERE Deletable=1 ORDER BY SpecialCategoryName ASC") or die(mysqli_error($connEMM));

										while($rsSpecialCategory=mysqli_fetch_assoc($resultSpecialCategory)){

											if($_REQUEST["spcatid"]==$rsSpecialCategory['SpecialCategoryID']){

												$selected='selected';

											}else{

												$selected='';

											}

										echo "<option value='".$rsSpecialCategory['SpecialCategoryID']."' ".$selected.">".$rsSpecialCategory['SpecialCategoryName']."</option>";

										}mysqli_free_result($resultSpecialCategory); ?>

									</select>

								</div>

							</div>

							<div class="row">

								<div class="col-sm-12 DTable table-responsive">

									<table class="table table-hover table-bordered text-left">

										<thead class="bg-info">

										<tr>

											<th style="width:20%">Category</th>

											<th style="width:20%">Heading</th>

											<th style="width:44%">Brief Content</th>

											<th style="width:16%">Content Situation</th>

										</tr>

										</thead>

										<tbody>

											<?php $rowsPerPage=30;$pageNum=1;

											if(isset($_GET["page"])){$pageNum=$_GET["page"];}

											if(isset($_GET["catid"])){$iCategoryID=$_GET["catid"];}else{$iCategoryID=0;}

											if(isset($_REQUEST["subcatid"])){$iSubCategoryID=$_REQUEST["subcatid"];}else{$iSubCategoryID=0;}

											if(isset($_REQUEST["spcatid"])){$iSpeCategoryID=$_REQUEST["spcatid"];}else{$iSpeCategoryID=0;}

											$offset=($pageNum-1)*$rowsPerPage;



											if($iCategoryID>0){

												$qContent="SELECT en_content.ContentID, en_content.CategoryID, en_bas_category.CategoryName, en_bas_specialcategory.SpecialCategoryName, en_content.ContentSubHeading, en_content.ContentHeading, en_content.ContentBrief, en_totalhit.TotalHit, en_content.Deletable FROM en_content INNER JOIN en_bas_category ON en_content.CategoryID=en_bas_category.CategoryID INNER JOIN en_totalhit ON en_totalhit.ContentID=en_content.ContentID INNER JOIN en_bas_specialcategory ON en_bas_specialcategory.SpecialCategoryID=en_content.SpecialCategoryID WHERE en_content.CategoryID=".$iCategoryID." ORDER BY en_totalhit.TotalHit DESC LIMIT $offset, $rowsPerPage";

											}

											elseif($iSubCategoryID>0){

												$qContent="SELECT en_content.*, en_bas_category.CategoryName, en_bas_category.Slug, en_bas_subcategory.SubCategoryName, en_bas_specialcategory.SpecialCategoryName,  en_totalhit.TotalHit FROM en_content INNER JOIN en_bas_category ON en_content.CategoryID=en_bas_category.CategoryID INNER JOIN en_bas_subcategory ON en_content.SubCategoryID=en_bas_subcategory.SubCategoryID INNER JOIN en_bas_specialcategory ON en_bas_specialcategory.SpecialCategoryID=en_content.SpecialCategoryID INNER JOIN en_totalhit ON en_totalhit.ContentID=en_content.ContentID WHERE en_content.Deletable=1 AND en_content.SubCategoryID=".$iSubCategoryID." ORDER BY en_content.ContentID DESC LIMIT $offset, $rowsPerPage";

											}

											elseif($iSpeCategoryID>0){

												$qContent="SELECT en_content.*, en_bas_category.CategoryName, en_bas_category.Slug, en_bas_subcategory.SubCategoryName, en_bas_specialcategory.SpecialCategoryName,  en_totalhit.TotalHit FROM en_content INNER JOIN en_bas_category ON en_content.CategoryID=en_bas_category.CategoryID INNER JOIN en_bas_subcategory ON en_content.SubCategoryID=en_bas_subcategory.SubCategoryID INNER JOIN en_bas_specialcategory ON en_bas_specialcategory.SpecialCategoryID=en_content.SpecialCategoryID INNER JOIN en_totalhit ON en_totalhit.ContentID=en_content.ContentID WHERE en_content.Deletable=1 AND en_content.SpecialCategoryID=".$iSpeCategoryID." ORDER BY en_content.ContentID DESC LIMIT $offset, $rowsPerPage";

											}

											else{

												$qContent="SELECT en_content.ContentID, en_content.CategoryID, en_bas_category.CategoryName, en_bas_specialcategory.SpecialCategoryName, en_content.ContentSubHeading, en_content.ContentHeading, en_content.ContentBrief, en_totalhit.TotalHit, en_content.Deletable FROM en_content INNER JOIN en_bas_category ON en_content.CategoryID=en_bas_category.CategoryID INNER JOIN en_totalhit ON en_totalhit.ContentID=en_content.ContentID INNER JOIN en_bas_specialcategory ON en_bas_specialcategory.SpecialCategoryID=en_content.SpecialCategoryID ORDER BY en_totalhit.TotalHit DESC LIMIT $offset, $rowsPerPage";}

											//echo $qContent."<br>";

											$resultContent=mysqli_query($connEMM, $qContent) or die(mysqli_error($connEMM));

											while($rsContent=mysqli_fetch_assoc($resultContent)){

											$sContentID=$rsContent["ContentID"];

											$sHead=$rsContent["ContentHeading"]; ?>

											<tr class="text-left">

												<td>

													<b><a href="../topContentListBn.php?catid=<?php echo $rsContent["CategoryID"]; ?>&page=1"><?php echo $rsContent["CategoryName"]; ?></a></b> <br>

													<b>Special Category: </b> <?php echo $rsContent["SpecialCategoryName"]; ?><br>

												</td>

												<td><b><a href="<?php echo $sSiteURL.fFormatURL($sHead).'/'.$sContentID; ?>" target="_blank">

													<?php echo "<h4>".$rsContent["ContentSubHeading"]."</h4>".$rsContent["ContentHeading"]; ?></a></b>

												</td>

												<td class="text-left"><?php echo $rsContent["ContentBrief"]; ?></td>

												<td><h4>Total hit: <?php echo $rsContent["TotalHit"]; ?></h4>

													Deletable: <?php if($rsContent["Deletable"]==1){ echo "No";}else{echo "<b>Yes..</b>";} ?>

												</td>

											</tr>

											<?php }mysqli_free_result($resultContent); ?>

										</tbody>

									</table>

								</div>

							</div>

						</section>

					</div>

					<div class="actions clearfix DMarginTop20">

						<ul role="menu" aria-label="Pagination">

							<?php if($iCategoryID>0){$qCoutner="SELECT COUNT(ContentID) AS numrows FROM en_content WHERE CategoryID=".$iCategoryID;

							}else{$qCoutner="SELECT COUNT(ContentID) AS numrows FROM en_content";}

							$result=mysqli_query($connEMM, $qCoutner) or die("Error, query failed");

							$row=mysqli_fetch_assoc($result);

							$numrows=$row["numrows"];

							$maxPage=ceil($numrows/$rowsPerPage);

							$self=$_SERVER["PHP_SELF"];$nav="";

							

							for($page=1;$page<=$maxPage;$page++){if($page==$pageNum){$nav.=" $page ";}else{$nav.=" <a href=\"$self?categoryid=$iCategoryID&page=$page\">$page</a> ";}}

							if($pageNum>1){

								$page=$pageNum-1;

								$prev=" <li aria-hidden='false' aria-disabled='false'><a href=\"$self?catid=$iCategoryID&page=$page\">Previous</a></li> ";

								$first=" <li class='disabled' aria-disabled='true'><a href=\"$self?catid=$iCategoryID&page=1\">First Page</a></li> ";

							}else{$prev="&nbsp;";$first="&nbsp;";}

							if($pageNum<$maxPage){

								$page=$pageNum+1;

								$next="<li class='disabled' aria-disabled='true'> <a href=\"$self?catid=$iCategoryID&page=$page\">Next</a></li> ";

								$last=" <li aria-hidden='false' aria-disabled='false'><a href=\"$self?catid=$iCategoryID&page=$maxPage\">Last Page</a> </li>";

							}else{$next="&nbsp;";$last="&nbsp;";}mysqli_free_result($result); ?>

							<?php echo $first.$prev; ?><?php echo $next.$last; ?>

						</ul>

					</div>

				</div>

				</form>

			</div>

		</div>

	</div>

</div>

<?php $_SESSION["sessRedirectPageBN"]=$_SERVER["REQUEST_URI"]; ?>

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

<script type="text/javascript">

	function navigateCategory(id) {

		window.location.assign("topContentListEn.php?catid="+id+"&page=1")

	}

	function navigateSubCategory(id) {

		window.location.assign("topContentListEn.php?subcatid="+id+"&page=1")

	}

	function navigateSpeCategory(id) {

		window.location.assign("topContentListEn.php?spcatid="+id+"&page=1")

	}

</script>

</body>

</html>