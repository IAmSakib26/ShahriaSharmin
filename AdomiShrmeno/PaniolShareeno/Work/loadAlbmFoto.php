<?php 
ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php");
if(isset($_GET['load'])){
    $salbum = $_GET['load'];
    // echo $student;
    $sql = mysqli_query($connEMM,"SELECT (SELECT AlbumName FROM com_work_album WHERE com_work_album.AlbumID=com_work_foto.AlbumID) Albumname,FotoID,ImagePath,DateTimeInsert,DateTimeUpdate,Deletable FROM com_work_foto"); 
    $i=0; 
    while($fetch = mysqli_fetch_assoc($sql)){
        echo '';
    $i++;}
}