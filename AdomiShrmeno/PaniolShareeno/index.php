<?php ob_start();session_cache_expire(60);session_start(); if(isset($_SESSION["sessUserName"])&& $_SESSION["sessUserName"]!=''){ header("Location: home.php"); }
// echo 'k';
require_once("common/mysqli_conneCT.php");require_once("common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Admin Panel - Log in</title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">
<?php
echo $cssBootstrap;
echo $cssFontAwesome;
?>
<style type="text/css">
body{font-family:Arial, Helvetica, sans-serif;}
input[type=text], input[type=password]{width:100%;padding:12px 20px;margin:8px 0;display:inline-block;border:1px solid #ccc;box-sizing:border-box;}
/*Set a style for all buttons*/
button{background-color:#4CAF50;color:white;padding:14px 20px;margin:8px 0;border:none;cursor:pointer;width:100%;}
button:hover{opacity:0.8;}
/*Extra styles for the cancel button*/
.bBtn{width:auto;padding:10px 18px;}
.bCancel{width:auto;padding:10px 18px;background-color:#f44336;}
/*Center the image and position the close button*/
.imgcontainer{text-align:center;margin:24px 0 12px 0;position:relative;}
img.avatar{width:40%;border-radius:50%;}
.container{padding:16px;}
span.txtPass{float:right;padding-top:16px;}
/*The Modal (background)*/
.modal{display:none;
position:fixed; /*Stay in place*/
z-index:1; /*Sit on top*/
left:0;top:0;width:100%; /*Full width*/
height:100%; /*Full height*/
overflow:auto; /*Enable scroll if needed*/
background-color:rgb(0,0,0); /*Fallback color*/
background-color:rgba(0,0,0,0.4); /*Black w/ opacity*/
padding-top:60px;}
/*Modal Content/Box*/
.modal-content{background-color:#fefefe;margin:5% auto 15% auto; /*5% from the top, 15% from the bottom and centered*/
border:1px solid #888;width:50%; /*Could be more or less, depending on screen size*/
}
/*The Close Button (x)*/
.close{position:absolute;right:25px;top:0;color:#000;font-size:35px;font-weight:bold;}
.close:hover, .close:focus{color:red;cursor:pointer;}
/*Add Zoom Animation*/

.animate{-webkit-animation:animatezoom 0.6s;animation:animatezoom 0.6s;}

@-webkit-keyframes animatezoom{

from{-webkit-transform:scale(0);}

to{-webkit-transform:scale(1);}

}

@keyframes animatezoom{

from{transform:scale(0);}

to{transform:scale(1);}

}



/*Change styles for span and cancel button on extra small screens*/

@media screen and (max-width:300px){

span.txtPass{display:block; float:none;}

.bCancel{width:100%;}

}

</style>

</head>

<body>



<div class="container">

<div class="row"><div class="col-sm-6 col-sm-offset-3 text-center">





<h2>Login to Admin Panel 9.5</h2>



<button onClick="document.getElementById('id01').style.display='block'" class="bBtn">Login</button>



<div id="id01" class="modal">

<form name="frmLogin" id="frmLogin" method="post" class="modal-content animate" action="adminLoginAction.php">

	<div class="container">

	<div class="row"><div class="col-sm-4 col-sm-offset-1">

		<div class="imgcontainer">

			<span onClick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

			<img src="<?php echo $sAdmnURL; ?>media/avater-bg.png" alt="Avatar" class="avatar img-responsive">

		</div>

		<label for="txtUser"><b>Username</b></label>

		<input type="text" placeholder="Enter Username" name="txtUser" required autofocus>

		<label for="txtPass"><b>Password</b></label>

		<input type="password" placeholder="Enter Password" name="txtPass" required>

		<button type="submit" class="bBtn" name="btnSubmit">Login</button>

		<button type="button" onClick="document.getElementById('id01').style.display='none'" class="bCancel">Cancel</button>

	</div></div>

	</div>

</form>

</div>





</div></div>

</div>



<?php

echo $jsjQuery;

echo $jsjBootstrap;

echo $jsHtml5Shiv;

echo $jsRespond;

?>



<script type="text/javascript">

// Get the modal

var modal=document.getElementById('id01');// When the user clicks anywhere outside of the modal, close it

window.onclick=function(event){

	if(event.target==modal){modal.style.display="none";}

}

</script>

</body>

</html>