<?php 
class Home{

    public function homeImgUpdate($imagepath,$tempimage,$caption,$dateTime) {
        global $connEMM;
        $sMsgUploadFail="<div align='center' class='DMsgFail'>Error :: Your File was not Uploaded successfully.<br />Please ask your web master for help.</div>".mysqli_errno($connEMM).": ".mysqli_error($connEMM);
        $sPath=$_SERVER["DOCUMENT_ROOT"];
        $sProjDir="/ShahriaSharmin/";
        $UploadPhotoGallery=$sPath.$sProjDir."media/PhotoGallery/";
        if($imagepath != ""){
            $sql = "UPDATE com_home_image SET ImagePath=?,Caption=?,Update_at=? WHERE HomeImgID=?";
            $stmt =mysqli_prepare($connEMM, $sql);
            $id= 1;
            mysqli_stmt_bind_param($stmt, 'sssi', $imagepath, $caption, $dateTime,$id);
            if(mysqli_stmt_execute($stmt)){
                if($imagepath!=""){
                    if(move_uploaded_file($tempimage, $UploadPhotoGallery.$imagepath)){
                        header('location: homeUpdate.php');
                    }else{
                        echo $sMsgUploadFail;
                        print_r($_FILES);
                    }
                }
            }
        }else{
            $sql = "UPDATE com_home_image SET Caption=?,Update_at=? WHERE HomeImgID=?";
            $stmt =mysqli_prepare($connEMM, $sql);
            $id= 1;
            mysqli_stmt_bind_param($stmt, 'ssi',$caption,$dateTime,$id);
            if(mysqli_stmt_execute($stmt)){
                header('location: homeUpdate.php');
            }else{
                echo $sMsgUploadFail;
                print_r($_FILES);
            }
        }
    }
    public function linkUpdate($id,$name,$url){
        global $connEMM;
        $sMsgUploadFail="<div align='center' class='DMsgFail'>Error :: Your File was not Uploaded successfully.<br />Please ask your web master for help.</div>".mysqli_errno($connEMM).": ".mysqli_error($connEMM);
        $sql = "UPDATE com_links SET LinkName=?,LinkURL=? WHERE LinkID=?";
        $stmt =mysqli_prepare($connEMM, $sql);
        mysqli_stmt_bind_param($stmt, 'ssi', $name,$url,$id);
        if(mysqli_stmt_execute($stmt)){
            header('location: linkUpdateList.php');
        }else{
            echo $sMsgUploadFail;
            print_r($_FILES);
        }

    }
}