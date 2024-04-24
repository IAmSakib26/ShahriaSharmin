<?php 
ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php");
if(isset($_POST['data'])){
    $arrList = $_POST['data'];
    $jsondata = json_decode($arrList,true);
    // print_r($jsondata);
    
    foreach($jsondata as $jsonItem){
        $fotoID =  $jsonItem['id'];
        $albumID = $jsonItem['albumid'];
        $position =  $jsonItem['dataid'];
        // echo 'foto id: '. $fotoID.'<br>';
        // echo 'album id: '. $albumID.'<br>';
        // echo 'position id: '. $position.'<br>';

        $sql = "SELECT * FROM foto_position WHERE FotoID = $fotoID";
        $sResult = mysqli_query($connEMM,$sql);
        if(mysqli_num_rows($sResult) > 0){
            $uSql = "UPDATE foto_position SET Position=".$position.", AlbumID =".$albumID.", FotoID=".$fotoID." WHERE FotoID=".$fotoID;
            $uResult = mysqli_query($connEMM,$uSql);
            if($uResult){
                echo "Position Updated";
            }else{
                echo "Position UpdateFailed";
            }
        }else{
            $iSql = "INSERT INTO foto_position (Position, AlbumID, FotoID) VALUES (".$position.", ".$albumID.", ".$fotoID.")";
            $iResult = mysqli_query($connEMM,$iSql);
            if($iResult){
                echo "Position Inserted";
            }else{
                echo "Insert Position Failed";
            }
        }
    }
}
