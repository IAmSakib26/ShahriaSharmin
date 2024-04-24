<?php ob_start();session_cache_expire(60);session_start();require_once("../../common/mysqli_conneCT_general.php");require_once("../../common/config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Generate</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">

<meta http-equiv="cache-control" content="max-age=0">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="-1">
<meta http-equiv="pragma" content="no-cache">
</head>
<body>
<?php
$sData="";
$sDataBN="";

$resultSQL=mysqli_query($connEMM, "SELECT CategoryID, Slug, CategoryName, CategoryNameBN FROM com_market_category WHERE Deletable=1 ORDER BY CategoryName ASC");

$sData.='<div class="row">';
$sDataBN.='<div class="row">';
 
while($rsSQL=mysqli_fetch_assoc($resultSQL)){
//print_r($rsSQL);
$sHead="#";
$link='';
$linkM='';
	if($rsSQL["CategoryName"]!=""){
		$sHead=$rsSQL["CategoryName"];
		$sHeadBN=$rsSQL["CategoryNameBN"];
		$sSlug=$rsSQL["Slug"];
		
		
		$sData.='<div class="col-sm-6">
            <div class="MarketItem">
                <a href="'.$sSiteURL.'market/'.$sSlug.'">
                '.$sHead.'
                </a>
            </div>
        </div>
        ';
        $sDataBN.='<div class="col-sm-6">
            <div class="MarketItem">
                <a href="'.$sSiteURLBn.'market/'.$sSlug.'">
                '.$sHeadBN.'
                </a>
            </div>
        </div>
        ';
	}
}mysqli_free_result($resultSQL);
    
$sData.='</div>';      
$sDataBN.='</div>';      
    
//echo $sData."<br><br>";
//echo $sDataBN."<br><br>";
//die();
$myFile=$UploadXHTML_BN."gen_Market.htm";
$myFile1=$UploadXHTML_BNBN."gen_Market.htm";
$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
$fh1=fopen($myFile1, "w");fwrite($fh1, $sDataBN);fclose($fh1);
    
    
    
/*$sDataBN.='<div class="row">';
 
while($rsSQL=mysqli_fetch_assoc($resultSQL)){
//print_r($rsSQL);
$sHead="#";
$link='';
$linkM='';
	if($rsSQL["CategoryNameBN"]!=""){
		$sHead=$rsSQL["CategoryNameBN"];
		$sSlug=$rsSQL["Slug"];
		
		
		$sDataBN.='<div class="col-sm-6">
            <div class="MarketItem">
                <a href="'.$sSiteURL.'market/'.$sSlug.'">
                '.$sHead.'
                </a>
            </div>
        </div>
        ';
	}
}mysqli_free_result($resultSQL);
    
$sDataBN.='</div>';      
    
echo $sData."<br><br>";
die();
$myFile=$UploadXHTML_BNBN."gen_Market.htm";
$fh=fopen($myFile, "w");fwrite($fh, $sDataBN);fclose($fh);*/
    


header("Location: categoryUpdateList.php");
mysqli_close($connEMM); ?>
</body>
</html>