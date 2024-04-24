<?php
// define("DB_HOST","localhost");define("DB_USER","nef4rate7rev_counterfoto_usr");define("DB_PASSWORD","A841MwJ55fFcwE");define("DB_NAME","nef4rate7rev_site_counterfoto");
// define("DB_HOSTAudit","localhost");define("DB_USERAudit","root");define("DB_PASSWORDAudit","");define("DB_NAMEAudit","shin25g6_demo01_audit");
define("DB_HOST","localhost");define("DB_USER","root");define("DB_PASSWORD","");define("DB_NAME","sharmin_db");
/*define("DB_HOST","localhost");define("DB_USER","iqra6n8e_root");define("DB_PASSWORD","4^q~47ew8(5H");define("DB_NAME","iqra6n8e_emm"); //Web
define("DB_HOSTAudit","localhost");define("DB_USERAudit","iqra6n8e_root");define("DB_PASSWORDAudit","4^q~47ew8(5H");define("DB_NAMEAudit","jugerchi_emmaudit"); //Web*/

global $connEMM;

if(@mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Please try after a while...")){
	$connEMM=@mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Please try after a while...");
	if($connEMM){
		@mysqli_query($connEMM, "SET CHARACTER SET utf8");
		@mysqli_query($connEMM, "SET SESSION collation_connection='utf8_general_ci'");
	}else{
		trigger_error("Please try after a while...");
		exit();
	}
}else{
	trigger_error("Please try after a while...");
	exit();
}