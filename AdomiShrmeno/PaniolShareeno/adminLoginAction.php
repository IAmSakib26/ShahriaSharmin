<?php ob_start();session_cache_expire(60);session_start();
include_once("common/mysqli_conneCT.php");include_once("common/config.php");
include_once("common/password_compat-master/password.php");//Password Hashing library


if(isset($_POST["btnSubmit"])){ //If SUBMITTED
	$sUser=fFormatString($_POST["txtUser"]);
	$sPass=fFormatString($_POST["txtPass"]);
	$qUser="SELECT * FROM s_secuser WHERE UserName='".$sUser."' AND Deletable=1";
	//echo $qUser."<br>";
	$resultUser=mysqli_query($connEMM, $qUser);

	if(mysqli_num_rows($resultUser)>0){ //If UserName Matched
	//echo $qUser."<br>";
		$rsUser=mysqli_fetch_assoc($resultUser);
		//echo $rsUser["UserPass02"]."<br>";
		if(password_verify($sPass, $rsUser["UserPass02"])){
			if($rsUser["LockType"]==1){ //If Locked Type Matched
				//echo "0. Valid Login";
				$_SESSION["sessUserName"]=$sUser;
				$_SESSION["sessAdmnWork"]=$rsUser["Work"];
				$_SESSION["sessAdmnAbout"]=$rsUser["About"];
				$_SESSION["sessAdmnSetup"]=$rsUser["Setup"];
				$_SESSION["sessAdmnAdminOperation"]=$rsUser["AdminOperation"];
				mysqli_free_result($resultUser);mysqli_close($connEMM);
				//echo "sUser: ".$sUser."<br>";
				//echo "User: ".$_SESSION["sessUserName"]."<br>";
				header("Location: home.php");
				exit();
				/*if($_SERVER["REMOTE_ADDR"]=="203.76.124.225"){header("Location: home.php");
				}else{header("Location: index.php?errip=Invalid Login Information");}*/
			}else{
				//If Locked Type DON'T Matched
				//echo "1. Invalid Login: Data not found";
				mysqli_free_result($resultUser);mysqli_close($connEMM);
				header("Location: ".$sAdmnURL."?err=Invalid Login Information");
				exit();
			}
		}else{
			//If Password DON'T Matched
			//echo "2. Invalid Login: Password";
			mysqli_free_result($resultUser);mysqli_close($connEMM);
			header("Location: ".$sAdmnURL."?err=Invalid Login Information");
			exit();
		}
	}else{
		//If UseName DON'T Matched
		//echo "3. Invalid Login: Login";
		mysqli_free_result($resultUser);mysqli_close($connEMM);
		header("Location: ".$sAdmnURL."?err=Invalid Login Information");
		exit();
	}
}else{
	//If Not SUBMITTED
	//echo "4. Invalid Login: Didn't submited";
	mysqli_close($connEMM);
	header("Location: ".$sAdmnURL."?err=Invalid Login Information");
	exit();
} ?>