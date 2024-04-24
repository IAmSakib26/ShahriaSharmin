<?php
$sInitialBN="Shahria Sharmin | Photographer";
$sInitialEN="Shahria Sharmin | Photographer";
$sSiteName="Shahria Sharmin";
$sSiteTitle="Shahria Sharmin | Photographer";
$sAuthor="";
$sDeveloper="eMythMakers.com";
$sEmail="info@mail.com";

//Local
$sSiteURL="http://localhost/ShahriaSharmin/";
$sCurrURL="http://localhost/ShahriaSharmin".$_SERVER["REQUEST_URI"];
// $sSiteURL="http://localhost/shahriasharmin/demo2/";
// $sCurrURL="http://localhost/shahriasharmin/demo2".$_SERVER["REQUEST_URI"];

//Web
// $sSiteURL="https://www.emythmaker.com/project/Template/Personal/shahriasharmin/demo3/";
// $sCurrURL="https://www.emythmaker.com/project/Template/Personal/shahriasharmin/demo3".$_SERVER["REQUEST_URI"];


$dtTimeDifference=6*60*60;
$dtDate=gmdate("Y-m-d", time()+$dtTimeDifference);
$dtDateTime=gmdate("l", time()+$dtTimeDifference)." &nbsp; ".gmdate("d F Y", time()+$dtTimeDifference);
$dtDateTimeF=gmdate("d F, Y H:i:s", time()+$dtTimeDifference);


/*//Local
$sCSSBootStrap='<link rel="stylesheet" type="text/css" href="'.$sSiteURL.'common/bootstrap-5.0.1-dist/css/bootstrap.min.css">';
$sCSSAnimate='<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">';
$sCSSFontAwesome='<link rel="stylesheet" type="text/css" href="'.$sSiteURL.'common/fontawesome-free-5.15.3-web/css/all.css">';

$sJSjQuery='<script type="text/javascript" src="'.$sSiteURL.'common/jquery-3.6.0/jquery-3.6.0.min.js"></script>';
$sJSBootStrap='<script type="text/javascript" src="'.$sSiteURL.'common/bootstrap-5.0.1-dist/js/bootstrap.min.js"></script>';
$sJSAnimate='<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/animateCSS/1.2.2/jquery.animatecss.min.js"></script>';
$sJShtml5shiv='<script type="text/javascript" src="'.$sSiteURL.'common/IE9/html5shiv.min.js"></script>';
$sJSrespond='<script type="text/javascript" src="'.$sSiteURL.'common/IE9/respond.min.js"></script>';
$sPopper='<script type="text/javascript" src="'.$sSiteURL.'common/js/popper.min.js"></script>';*/

//Web
$sCSSBootStrap='<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">';
$sCSSAnimate='<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">';
$sCSSFontAwesome='<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer">';
$sCSSSlick='<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">';
$sGoogleFont='<link href="https://fonts.cdnfonts.com/css/helvetica-neue-55" rel="stylesheet">';
$sFancyBox='<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />';

$sJSjQuery='<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>';
$sJSBootStrap='<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>';
$sJSAnimate='<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/animateCSS/1.2.2/jquery.animatecss.min.js"></script>';
$sJSSlick='<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>';
$sJShtml5shiv='<script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>';
$sJSrespond='<script type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
$sPopper='<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>';
$sJSFancyBox='<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>';

//Common
$sCSSEMM='<link rel="stylesheet" type="text/css" href="'.$sSiteURL.'common/css/eMythMakers.css?'.$dtDateTimeF.'">';
$sJSEMM='<script type="text/javascript" src="'.$sSiteURL.'common/js/eMythMakers.js"></script>';
$sCSSSolaimanLipi='<link rel="stylesheet" type="text/css" href="'.$sSiteURL.'common/css/SolaimanLipi.css">';
$sCSSMeanMenu='<link rel="stylesheet" type="text/css" href="'.$sSiteURL.'common/css/meanmenu.min.css">';
$sJSEMM='<script type="text/javascript" src="'.$sSiteURL.'common/js/eMythMakers.js"></script>';


$sFbRoot='<div id="fb-root"></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=2689491844415645&autoLogAppEvents=1"></script>';
$sFbPage='<div class="fb-page" data-href="https://www.facebook.com/ric.bangladesh" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ric.bangladesh" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ric.bangladesh">Resource Integration Centre</a></blockquote></div>';
$sBackUpTop='<div id="back_to_top" class="back_to_top on"><span class="go_up"><i style="" class="fa fa-arrow-up"></i></span></div>';
$sAddThis='<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5db8647fb75fdf19"></script> ';

$sLogoURL=$sSiteURL."media/common/logo.png";
$sLogoURLFooter=$sSiteURL."media/common/logo.png";
$sLogoURLfb=$sSiteURL."media/common/logo-fb.jpg";
$sFavicon=$sSiteURL."media/common/favicon-1.png";
$sThumb=$sSiteURL."media/common/thumb.jpg";
$sSign=$sSiteURL."media/common/Sign.png";


function fFormatString($s){
	global $connEMM;
	/*Ommits HTML Code from the texts*/
	if(function_exists("mysqli_real_escape_string")){
		$sStr=mysqli_real_escape_string($connEMM, trim($s));/*Escapes special characters in a string for use in an SQL statement*/
		$sStr=strip_tags($sStr);/*Strip HTML and PHP tags from a string*/
		$sStr=str_replace("'", "`", $sStr);
	}else{
		$sStr=trim($s);/*Escapes special characters in a string for use in an SQL statement*/
		$sStr=strip_tags($sStr);/*Strip HTML and PHP tags from a string*/
		$sStr=str_replace("'", "`", $sStr);
	}
	return $sStr;
}
function fFormatStringHeading($s){
	global $connEMM;
	/*Passes HTML Code in the texts*/
	if(function_exists("mysqli_real_escape_string")){
		$sStr=mysqli_real_escape_string($connEMM, trim($s));/*Escapes special characters in a string for use in an SQL statement*/
		$sStr=htmlspecialchars($sStr);
		$sStr=str_replace("'", "&#39;", $sStr);
		$sStr=str_replace("'", "`", $sStr);
	}else{
		$sStr=trim($s);/*Escapes special characters in a string for use in an SQL statement*/
		$sStr=htmlspecialchars($sStr);
		$sStr=str_replace("'", "&#39;", $sStr);
		$sStr=str_replace("'", "`", $sStr);
	}
	return $sStr;
}
function fFormatStringHTML($s){
	global $connEMM;
	/*Passes HTML Code in the texts*/
	if(function_exists("mysqli_real_escape_string")){
		$sStr=mysqli_real_escape_string($connEMM, trim($s));/*Escapes special characters in a string for use in an SQL statement*/
		$sStr=str_replace("'", "`", $sStr);
	}else{
		$sStr=trim($s);/*Escapes special characters in a string for use in an SQL statement*/
		$sStr=str_replace("'", "`", $sStr);
	}
	return $sStr;
}
function fFormatURL($s){
	global $connEMM;
	/*Excludes HTML tags from a text*/
	$sStr=trim($s);
	$arrWords=array(":","‘","’","/","'","`","?", "“", '"', ",", "  ", "<", ">", "~", "!", "@", "$", "%", "^", "&", "*", "(", ")", "[", "]", "{", "}", "+", "॥", "ঃ", "।", "&#39;", ".", "..", "...", "....", ";", "#", "lsquo", "rsquo");
	$sStr=str_replace($arrWords, "", $sStr);
	$sStr=strip_tags($sStr);/*Strip HTML and PHP tags from a string*/
	$sStr=html_entity_decode($sStr);
	$sStr=str_replace("   ", " ", $sStr);
	$sStr=str_replace("  ", " ", $sStr);
	$sStr=str_replace(" ", "-", $sStr);
	return $sStr;
}
function fFormatHead($s){
	global $connEMM;
	/*Excludes HTML tags from a text*/
	$arrWords=array("&ldquo;", "&rdquo;", "&acute;", "<br>", "<br />", "<p>", "</p>", "</font>", "<blink>", "</blink>", "<font size=5>", "<font size=+5>", "<font size=4>", "<font size=+4>", "<font size=3>", "<font size=+3>", "<font color=black size=2>", "<strong>", "</strong>", "\r", "\n", "\r\n", "&nbsp;", "&rsquo;", "&lsquo;", "<iframe src=", "http:/*www.youtube.com/embed/", "</iframe>", "frameborder=", "width=", "height=", "color: #ff0000;", "<ul>", "</ul>", "<li>", "</li>", "<a href=", "</a>", "<span style=", "</span>", "color: #888888;", "<em>", "</em>", '0', '429', '276', ">", '\">', '\"', "&#39;");
	$sStr=trim($s);
	$sStr=mysqli_real_escape_string($connEMM, trim($s));/*Escapes special characters in a string for use in an SQL statement*/
	$sStr=strip_tags($sStr);/*Strip HTML and PHP tags from a string*/
	$sStr=str_replace("'", "`", $sStr);
	$sStr=str_replace($arrWords, " ", $sStr);
	$sStr=html_entity_decode($sStr);
	return $sStr;
}
function fEn2Bn($BDDate){
	/*Convert a English date to Bangla date*/
	$en=array("AM","PM","am","pm","Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Sat","Sun","Mon","Tue","Wed","Thu","Fri","January","February","March","April","May","June","July","August","September","October","November","December","0","1","2","3","4","5","6","7","8","9");
	$bn=array("এএম","পিএম","এএম","পিএম","শনিবার","রোববার","সোমবার","মঙ্গলবার","বুধবার","বৃহস্পতিবার","শুক্রবার","শনি","রোব","সোম","মঙ্গল","বুধ","বৃহস্পতি","শুক্র","জানুয়ারি","ফেব্রুয়ারি","মার্চ","এপ্রিল","মে","জুন","জুলাই","আগস্ট","সেপ্টেম্বর","অক্টোবর","নভেম্বর","ডিসেম্বর","০","১","২","৩","৪","৫","৬","৭","৮","৯");
	$BDDate=str_replace($en,$bn,$BDDate);
	return $BDDate;
}
function fGetWordsCount($sBrief, $iWordsNo){
	/*Get first 10 words from a lot of words*/
	$sBrief=implode(' ', array_slice(explode(' ', $sBrief), 0, $iWordsNo));
	return $sBrief;
}
function fGetCharCount($sBrief, $iCharNo){
	/*Get first 10 words from a lot of words*/
	$sBrief=substr($sBrief, 0, $iCharNo);
	return $sBrief;
}

//This function upd_spCat_Pos_ID_check($iContentID, $iSpCatID, $iSpCadPos) // Do not use this Function without checking
function upd_spCat_Pos_ID_check($iContentID, $iSpCatID, $iSpCadPos){
	//It is for Re-Serial by the System. // Date: 28.11.2018 // Do not use this Function without checking
	global $connEMM;
		echo "<br>Inside the update position id<br><br>";
	$qSQL="";$qSQL_Array=""; $qSQL_Total=""; $iTotal=0;$sPosition=array();
	$aAllData=array(); $aAllData[0] = array(); $aAllData[1] = array(); $aAllData[2] = array();  $aAllData[3] = array();
		//all record count
		$qSQL_Total="SELECT count(ContentID) as TotalRecord FROM bn_content WHERE Deletable=1 AND ShowContent=1 AND SpecialCategoryID=2 AND  SpecialCategoryIDPos>=$iSpCadPos";
		$qSQL_Total="SELECT count(ContentID) as TotalRecord FROM bn_content WHERE Deletable=1 AND ShowContent=1 AND SpecialCategoryID=2 AND  SpecialCategoryIDPos>=$iSpCadPos";
		echo "<br>Total Record SQL:".$qSQL_Total."<br><br>";
		$resultSQL=mysqli_query($connEMM, $qSQL_Total);
		if(mysqli_num_rows($resultSQL)>0){
			////echo "<br>WITH POS No.".$rsSQL["SpecialCategoryIDPos"]."<br>";
				$rsSQL=mysqli_fetch_assoc($resultSQL);
				$iTotal= $rsSQL["TotalRecord"];
		}//end of total row number

		echo "<br>Total Record:".$iTotal."<br><br>";
		//all data in an array
		$qSQL_Array="SELECT ContentID, CategoryID, SpecialCategoryID, SpecialCategoryIDPos FROM bn_content WHERE Deletable=1 AND ShowContent=1 AND SpecialCategoryID=2 AND SpecialCategoryIDPos>=$iSpCadPos 		ORDER BY SpecialCategoryIDPos, CategoryID, ContentID ";
		echo "<br>Array SQL:".$qSQL_Array."<br><br>";
		$resultSQL=mysqli_query($connEMM, $qSQL_Array);
			//$iT=0;
		while($rsSQL=mysqli_fetch_assoc($resultSQL)){
				array_push($aAllData[0], $rsSQL["ContentID"]);
				array_push($aAllData[1], $rsSQL["CategoryID"]);
				array_push($aAllData[2], $rsSQL["SpecialCategoryID"]);
				array_push($aAllData[3], $rsSQL["SpecialCategoryIDPos"]);
				//echo "<br>Inside Array Value of Record:.$iT<br><br>";
				//$iT++;
		}//end of all data in an array

		//echo "<br>After getting array values<br><br>";
		//compare & update position
		$iPos=$iSpCadPos+1;
		for($i=0;$i<=$iTotal;$i++){
			echo "<br>Content ID:".$aAllData[0][$i]."<br>";
			$qSQL="UPDATE bn_content SET SpecialCategoryIDPos=".$iPos." WHERE ContentID=".$aAllData[0][$i];
			echo "<br>".$qSQL."<br>";
			$resultInsert=mysqli_query($connEMM, $qSQL) or die(mysqli_error($connEMM));
			if($resultInsert){
				echo "<br> UPDATE SUCCESSFULL of Content ID: ".$aAllData[0][$i]."<br><br><br><br>";
			}
			$iPos++;
		}	//end of update
		//echo "<br>".$qSQL."<br><br>"; exit;
		mysqli_free_result($resultSQL);
		return 1;
} //End of Re-Serial by the System. // Date: 28.11.2018

?>