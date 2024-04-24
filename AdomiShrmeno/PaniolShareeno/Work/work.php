<?php
// ob_start();session_cache_expire(120);session_start();
class Work{
    public function createAlbum($name,$brief,$column){
        global $connEMM;
        $pattern = '/\s+/';
        $name = is_string($name) ? $name : '';
        $brief = is_string($brief) ? strip_tags($brief) : '';
        $cleanedParagraph = preg_replace($pattern, ' ', $brief);
        $column = is_numeric($column) ? $column : 1;
        if(!empty($name)){
            $sql = "INSERT INTO com_work_album (AlbumName, AlbumBrief, Columns) VALUES (?,?,?)";
            $stmt =mysqli_prepare($connEMM, $sql);
            mysqli_stmt_bind_param($stmt, 'ssi', $name, $cleanedParagraph, $column);
            if(mysqli_stmt_execute($stmt)){
                $action = 'create_album';
                $user = $_SESSION['sessUserName'];
                // return header('location: albumInsert.php');
                return header('location: ../common/record.php?action='.$action.'&ablbumName='.$name.'&user='.$user.'&location=createAlbum');
            }else{
                echo "Error: " . mysqli_error($connEMM);
            }
        }else{
            echo "Error: " . mysqli_error($connEMM);
        }
    }
    public function updateAlbum($name,$brief,$column,$id){
        global $connEMM;
        if(isset($_REQUEST["updateid"])){
            $id=fFormatString($_REQUEST["updateid"]);
            $id=filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            $id=filter_var($id, FILTER_VALIDATE_INT);
            if(!is_numeric($id)){$id=0;}
            if($id<0){$id=0;}
        }
        $pattern = '/\s+/';
        $name = is_string($name) ? $name : '';
        $brief = is_string($brief) ? strip_tags($brief) : '';
        $cleanedParagraph = str_replace('&nbsp;', ' ', $brief);
        $column = is_numeric($column) ? $column : 1;
        if(!empty($name)){
            $sql = "UPDATE com_work_album SET AlbumName=?, AlbumBrief=?, Columns=? WHERE AlbumID=?";
            $stmt =mysqli_prepare($connEMM, $sql);
            mysqli_stmt_bind_param($stmt, 'ssii', $name, $cleanedParagraph, $column, $id);
            if(mysqli_stmt_execute($stmt)){
                $action = 'update_album';
                $user = $_SESSION['sessUserName'];
                // return header('location: albumUpdateList.php');
                return header('location: ../common/record.php?action='.$action.'&ablbumName='.$name.'&user='.$user.'&location=updateAlbum');
            }else{
                echo "Error: " . mysqli_error($connEMM);
            }
        }else{
            echo "Error: " . mysqli_error($connEMM);
        }
    }
    public function deleteAlbum($id,$type){
        global $connEMM;
        $id = is_numeric($id) ? $id : 0;
        $type = is_numeric($type) ? $type : 0;
        if($id != 0 && $type == 2){
            $sql = "UPDATE com_work_album SET Deletable=2 WHERE AlbumID=?";
            $stmt =mysqli_prepare($connEMM, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            if(mysqli_stmt_execute($stmt)){
                $action = 'delete_album';
                $user = $_SESSION['sessUserName'];
                return header('location: albumUpdateList.php');
                // return header('location: ../common/record.php?action='.$action.'&ablbumName='.$id.'&user='.$user.'&location=deleteAlbum');
            }else{
                echo "Error: " . mysqli_error($connEMM);
            }
        }
        if($id != 0 && $type == 1){
            $sql = "UPDATE com_work_album SET Deletable=1 WHERE AlbumID=?";
            $stmt =mysqli_prepare($connEMM, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            if(mysqli_stmt_execute($stmt)){
                $action = 'delete_album';
                $user = $_SESSION['sessUserName'];
                return header('location: albumUpdateList.php');
                // return header('location: ../common/record.php?action='.$action.'&ablbumName='.$id.'&user='.$user.'&location=deleteAlbum');
            }else{
                echo "Error: " . mysqli_error($connEMM);
            }
        }
    }
    public function fotoInsert($gaps, $albumid, $imagepath, $tempimage, $widths, $heights, $datetimeinsert, $caption, $vidImg){
        global $connEMM;
        $sMsgUploadFail="<div align='center' class='DMsgFail'>Error :: Your File was not Uploaded successfully.<br />Please ask your web master for help.</div>".mysqli_errno($connEMM).": ".mysqli_error($connEMM);
        $sPath=$_SERVER["DOCUMENT_ROOT"];
        $sProjDir="/ShahriaSharmin/";
        $UploadPhotoGallery=$sPath.$sProjDir."media/PhotoGallery/";
        $sql = "INSERT INTO com_work_foto(Gaps,AlbumID,ImagePath,Widths,Heights,DateTimeInsert,Caption,ImgOrVid) VALUES(?,?,?,?,?,?,?,?)";
        $stmt =mysqli_prepare($connEMM, $sql);
        mysqli_stmt_bind_param($stmt, 'iisiissi', $gaps, $albumid, $imagepath, $widths, $heights, $datetimeinsert, $caption, $vidImg);
        if(mysqli_stmt_execute($stmt)){
            $id = mysqli_stmt_insert_id($stmt);
            if($imagepath!=""){
                if(move_uploaded_file($tempimage, $UploadPhotoGallery.$imagepath)){
                    $action = 'insert_photo';
                    $user = $_SESSION['sessUserName'];
                    // header('location: fotoPosition.php?fotoid='.$id.'&albumid='.$albumid);
                    return header('location: ../common/record.php?fotoid='.$id.'&albumid='.$albumid.'&action='.$action.'&ablbumName=inserted_albumid_is '.$albumid.'&user='.$user.'&location=createFoto');
                }else{
                    echo $sMsgUploadFail;
                    print_r($_FILES);
                }
            }
        }
    }
    public function fotoUpdate($id,$gaps,$albumid,$imagepath,$tempimage,$widths,$heights,$datetimeupdate,$caption,$vidImg){
        global $connEMM;
        $sMsgUploadFail="<div align='center' class='DMsgFail'>Error :: Your File was not Uploaded successfully.<br />Please ask your web master for help.</div>".mysqli_errno($connEMM).": ".mysqli_error($connEMM);
        $sPath=$_SERVER["DOCUMENT_ROOT"];
        $sProjDir="/ShahriaSharmin/";
        $UploadPhotoGallery=$sPath.$sProjDir."media/PhotoGallery/";
        if($imagepath==""){
            $sql = "UPDATE com_work_foto SET Gaps=?, AlbumID=?, Widths=?, Heights=?, DateTimeUpdate=?, Caption=?, ImgOrVid=? WHERE FotoID=?";
            // echo $sql;die();
            $stmt =mysqli_prepare($connEMM, $sql);
            mysqli_stmt_bind_param($stmt, 'iiiissii', $gaps, $albumid, $widths, $heights, $datetimeupdate, $caption, $vidImg, $id);
        }else{
            $sql = "UPDATE com_work_foto SET Gaps=?, AlbumID=?, ImagePath=?, Widths=?, Heights=?, DateTimeUpdate=?, Caption=?, ImgOrVid=? WHERE FotoID=?";
            // echo $sql;die();
            $stmt =mysqli_prepare($connEMM, $sql);
            mysqli_stmt_bind_param($stmt, 'iisiissii', $gaps, $albumid, $imagepath, $widths, $heights, $datetimeupdate, $caption, $vidImg, $id);
        }
        $action = 'update_photo';
        $user = $_SESSION['sessUserName'];
        
        if(mysqli_stmt_execute($stmt)){
            if($imagepath!=""){
                if(move_uploaded_file($tempimage, $UploadPhotoGallery.$imagepath)){
                    // header('location: fotoUpdateList.php');
                    // header('location: fotoPosition.php?fotoid='.$id.'&albumid='.$albumid);
                    return header('location: ../common/record.php?fotoid='.$id.'&albumid='.$albumid.'&action='.$action.'&ablbumName=updated_albumid_is '.$albumid.'&user='.$user.'&location=updateFoto');
                } else {
                    echo $sMsgUploadFail;
                    print_r($_FILES);
                }
            }else{
                // header('location: fotoPosition.php?fotoid='.$id.'&albumid='.$albumid);
                return header('location: ../common/record.php?fotoid='.$id.'&albumid='.$albumid.'&action='.$action.'&ablbumName=updated_albumid_is '.$albumid.'&user='.$user.'&location=updateFoto');
                // header('location: fotoUpdateList.php');
            }
        }
    }
    public function deleteFoto($id,$type){
        global $connEMM;
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!is_numeric($id)){$id=0;}
        
        $user = $_SESSION['sessUserName'];
        if($type == 2){
            $sql = "UPDATE com_work_foto SET Deletable=2 WHERE FotoID=?";
            $stmt =mysqli_prepare($connEMM, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            if(mysqli_stmt_execute($stmt)){
                $action = 'delete_photo';
                // header('location: fotoUpdateList.php');
                return header('location: ../common/record.php?action='.$action.'&ablbumName=deleted_photoid_is '.$id.'&user='.$user.'&location=deletephoto');
            }else{
                echo "Error: " . mysqli_error($connEMM);
            }
        }else if($type == 1){
            $action = 'undelete_photo';
            $sql = "UPDATE com_work_foto SET Deletable=1 WHERE FotoID=?";
            $stmt =mysqli_prepare($connEMM, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            if(mysqli_stmt_execute($stmt)){
                // header('location: fotoUpdateList.php');
                return header('location: ../common/record.php?action='.$action.'&ablbumName=undeleted_photoid_is '.$id.'&user='.$user.'&location=deletephoto');
            } else {
                echo "Error: " . mysqli_error($connEMM);
            }
        }
    }
}