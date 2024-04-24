<?php 
include_once('config.php'); include_once('mysqli_conneCT.php');
$location = $_REQUEST['location'];
$records = mysqli_query($connEMM,"SELECT * FROM com_audit");

$auditArray = array();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$i = 0;
while($data = mysqli_fetch_assoc($records)){
    $auditArray[$i]['user_name'] = $data['userName'];
    $auditArray[$i]['action'] = $data['userAction'];
    $auditArray[$i]['report'] = $data['auditReport'];
    $auditArray[$i]['date&time'] = $data['timeStamp'];
    $i++;
}
$json_data = json_encode($auditArray, JSON_PRETTY_PRINT);
// echo $json_data;
$path = $_SERVER['DOCUMENT_ROOT'].'/'.$sProjDir.'AdomiShrmeno/PaniolShareeno/common/audit.json';
// echo $folder;
// file_put_contents($path,$json_data);
if(file_put_contents($path,$json_data)){
    // header('Location: eduUpdateList.php');
    if($location == 'createAlbum'){
        header('Location: ../Work/albumInsert.php');
    }
    if($location == 'updateAlbum' || $location == 'deleteAlbum'){
        header('Location: ../Work/albumUpdateList.php');
    }
    if($location == 'createFoto' || $location == 'updateFoto'){
        header('Location: ../Work/fotoPosition.php?fotoid='.$fotoid.'&albumid='.$albumid);
    }
    if($location == 'deletephoto'){
        header('Location: ../Work/fotoUpdateList.php');
    }
}else{
    echo 'failed';
}