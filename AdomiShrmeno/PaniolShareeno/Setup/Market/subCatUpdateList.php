<?php ob_start();session_cache_expire(60);session_start();require_once("../../common/mysqli_conneCT_general.php");require_once("../../common/config.php"); ?>

<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">



<title>Sub-Category :: List (Market)</title>



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

<div class="page-title"><h3 class="title">Dashboard / Sub-Category :: List (Market)</h3></div>

<div class="row">

	<div class="col-sm-12 DPaddingLR">

		<div class="panel panel-default">

			<div class="panel-body">

				<div class="row">

					<div class="col-sm-offset-2 col-sm-8 bg-info text-center"><h4>Sub-Category :: List (Market)</h4></div>

					<div class="col-sm-2 text-center"><a href="subCatInsert.php"><button type="button" class="btn btn-primary">Insert</button></a></div><br><br><br>

					<div class="col-sm-12 DTable table-responsive">

						<table class="table table-hover table-bordered">

							<thead class="bg-info">

								<tr>

									<th style="width:15%">Category Name</th>

									<th style="width:15%">Sub-Category Name</th>

									<th style="width:10%">SLUG</th>

									<th style="width:10%">Present Price</th>

									<th style="width:20%">Last Price</th>

									<th style="width:10%">Image</th>

									<th style="width:10%">UPDATE</th>

									<th style="width:10%">DELETE</th>

								</tr>

							</thead>

							<tbody>

								<?php $resultCategory=mysqli_query($connEMM, "SELECT com_market_subcategory.*, com_market_category.CategoryName FROM com_market_subcategory INNER JOIN com_market_category ON com_market_category.CategoryID=com_market_subcategory.CategoryID WHERE com_market_subcategory.Deletable=1 ORDER BY com_market_subcategory.SubCategoryID") or die(mysqli_error($connEMM));

								while($rsCategory=mysqli_fetch_assoc($resultCategory)){ ?>

								<tr>

									<td><?php echo $rsCategory["CategoryName"]; ?> </td>

									<td><?php echo $rsCategory["SubCategoryName"]; ?> </td>

									<td><?php echo $rsCategory["Slug"]; ?></td>
                                    
									<td><?php echo $rsCategory["Present_Price"]; ?></td>
                                    
									<td><?php echo $rsCategory["Last_Price"]; ?></td>


									<td><?php if($rsCategory["ImagePathIcon"]!=""){ ?><img src="<?php echo $sSiteURL; ?>media/category/<?php echo $rsCategory["ImagePathIcon"]; ?>" class="img-responsive"><?php } ?> </td>

									<td><a href="subCatUpdate.php?updateid=<?php echo $rsCategory["SubCategoryID"]; ?>"><button type="button" class="btn btn-info">Update</button></a></td>

									<td><a href="subCatDelete.php?deleteid=<?php echo $rsCategory["SubCategoryID"]; ?>" onclick="return confirmDelete();"><button type="button" class="btn btn-danger">Delete</button></a></td>

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