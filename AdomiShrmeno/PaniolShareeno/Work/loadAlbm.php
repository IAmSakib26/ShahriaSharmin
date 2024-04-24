<?php 
ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php");
if(isset($_GET['albumid'])){
    $album = $_GET['albumid'];
    // echo "AlbumID: ".$album;die();
    $result = mysqli_query($connEMM,"SELECT * FROM com_work_album");
    echo "<option value='0'>Select Album</option>";
    if($result){
        while($fetch = mysqli_fetch_assoc($result)){
            echo "<option value='".$fetch['AlbumID']."' ".($fetch['AlbumID']===$album?"selected":"").">".$fetch['AlbumName']."</option>";
        }
    }
}else{
    $result = mysqli_query($connEMM,"SELECT * FROM com_work_album");
    echo "<option value='0'>Select Album</option>";
    if($result){
        while($fetch = mysqli_fetch_assoc($result)){
            echo "<option value='".$fetch['AlbumID']."'>".$fetch['AlbumName']."</option>";
        }
    }
}