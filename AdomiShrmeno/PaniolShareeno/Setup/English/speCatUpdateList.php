<?php ob_start();session_cache_expire(60);session_start();require_once("../../common/mysqli_conneCT_english.php");require_once("../../common/config.php"); ?>

<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">



<title>Special Category :: List (English)</title>



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

<?php include_once("../../common/sidebar.php");?>

<!-- Page Content -->

<div id="page-content-wrapper">

<div class="container-fluid">

<?php include_once("../../common/header.php");?>

<div class="page-title"><h3 class="title">Dashboard / Special Category :: List (English)</h3></div>

<div class="row">

	<div class="col-sm-12 DPaddingLR">

		<div class="panel panel-default">

			<div class="panel-body">

				<div class="row">

					<div class="col-sm-offset-2 col-sm-8 bg-info text-center"><h4>Special Category :: List (English)</h4></div>

					<div class="col-sm-2 text-center"><a href="speCatInsert.php"><button type="button" class="btn btn-primary">Insert</button></a></div><br><br><br>

					<div class="col-sm-12 DTable table-responsive">

						<table class="table table-hover table-bordered">

							<thead class="bg-info">

								<tr>

									<th style="width:5%">Serial</th>

									<th style="width:20%">Special Category Name</th>

									<th style="width:15%">SLUG</th>

									<th style="width:10%">Remarks</th>

									<th style="width:20%">Priority & Show</th>

									<th style="width:10%">Image</th>

									<th style="width:10%">UPDATE</th>

									<th style="width:10%">DELETE</th>

								</tr>

							</thead>

							<tbody>

								<?php $resultCategory=mysqli_query($connEMM, "SELECT * FROM en_bas_specialcategory WHERE Deletable=1 ORDER BY SpecialCategoryID") or die(mysqli_error($connEMM));

								while($rsCategory=mysqli_fetch_assoc($resultCategory)){ ?>

								<tr>

									<td><?php echo $rsCategory["SpecialCategoryID"]; ?></td>

									<td><?php echo $rsCategory["SpecialCategoryName"]; ?> </td>

									<td><?php echo $rsCategory["Slug"]; ?></td>

									<td><?php echo $rsCategory["Remarks"]; ?></td>

									<td><?php echo $rsCategory["Priority"]; ?> &nbsp; <?php if($rsCategory["ShowData"]==1){echo "Show";}else{echo "Hide";} ?></td>

									<td><?php if($rsCategory["ImagePathIcon"]!=""){ ?><img src="<?php echo $sSiteURL; ?>media/category/<?php echo $rsCategory["ImagePathIcon"]; ?>" class="img-responsive"><?php } ?></td>

									<td><a href="speCatUpdate.php?updateid=<?php echo $rsCategory["SpecialCategoryID"]; ?>"><button type="button" class="btn btn-info">Update</button></a></td>

									<td><a href="speCatDelete.php?deleteid=<?php echo $rsCategory["SpecialCategoryID"]; ?>" onclick="return confirmDelete();"><button type="button" class="btn btn-danger">Delete</button></a></td>

								</tr>

								<?php }mysqli_free_result($resultCategory); ?>

							</tbody>

						</table>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<?php include_once("../../common/footer.php");?>

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