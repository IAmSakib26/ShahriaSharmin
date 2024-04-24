<?php include_once('config.php'); include_once('mysqli_conneCT.php');
$user=$_REQUEST['user'];
$albumName = $_REQUEST['ablbumName'];
$action = $_REQUEST['action'];
$timestamp = date('Y-m-d H:i:s');
$location = $_REQUEST['location'];
$fotoid = $_REQUEST['fotoid'];
$albumid = $_REQUEST['albumid'];

$record = mysqli_prepare($connEMM,"INSERT INTO com_audit (`userName`, `userAction`, `auditReport`) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($record, 'sss', $user, $action, $albumName);
if(mysqli_stmt_execute($record)){
    header('Location: audit.php?location='.$location);
    // if($location == 'createAlbum'){
    //     header('Location: ../Work/albumInsert.php');
    // }
    // if($location == 'updateAlbum' || $location == 'deleteAlbum'){
    //     header('Location: ../Work/albumUpdateList.php');
    // }
    // if($location == 'createFoto' || $location == 'updateFoto'){
    //     header('Location: ../Work/fotoPosition.php?fotoid='.$fotoid.'&albumid='.$albumid);
    // }
    // if($location == 'deletephoto'){
    //     header('Location: ../Work/fotoUpdateList.php');
    // }

}else{
    echo mysqli_error($connEMM);
}