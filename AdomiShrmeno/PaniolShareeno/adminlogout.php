<?php ob_start();session_cache_expire(60);session_start();require_once("common/mysqli_conneCT.php");require_once("common/config.php"); session_destroy();?>

<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

<title>Admin Panel - Log out</title>



<meta name="robots" content="noindex, nofollow">

<meta name="googlebot" content="noindex, nofollow">

<meta name="author" content="<?php echo $sAuthor; ?>">



<link rel="stylesheet" type="text/css" href="<?php echo $sAdmnURL; ?>common/bootstrap-3.3.6-dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo $sAdmnURL; ?>common/font-awesome-4.6.3/css/font-awesome.min.css">

</head>

<body>



<div class="container">

<div class="row"><div class="col-sm-6 col-sm-offset-3 text-center">



<h2>You have been logged out from the system.</h2>

<a href="<?php echo $sAdmnURL; ?>"><p>To login again, click here</p></a>



</div></div>

</div>



<script type="text/javascript" src="<?php echo $sAdmnURL; ?>common/jQuery-2.1.4/jquery-2.1.4.min.js"></script>

<script type="text/javascript" src="<?php echo $sAdmnURL; ?>common/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>



<script type="text/javascript" src="<?php echo $sAdmnURL; ?>common/IE9/html5shiv.min.js"></script>

<script type="text/javascript" src="<?php echo $sAdmnURL; ?>common/IE9/respond.min.js"></script>

</body>

</html>