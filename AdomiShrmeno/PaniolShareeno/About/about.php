<?php 
class About {

    public function update($sAbout,$sAward,$sExhibitions,$sPress,$iUpdateID){
        global $connEMM;
        $query = "UPDATE com_about SET AboutBrief=?, AboutAward=?, AboutExhibitions=?, AboutPress=? WHERE AboutID=?";
        $stmt = mysqli_prepare($connEMM, $query);
        mysqli_stmt_bind_param($stmt, 'ssssi', $sAbout, $sAward, $sExhibitions, $sPress, $iUpdateID);
        if(mysqli_stmt_execute($stmt)){
            return header('location: aboutUpdateList.php');
        }else{
            echo "Error: " . mysqli_error($connEMM);
        }
    }
    public function hide($iDeleteID){
        global $connEMM;
        $query = "UPDATE com_about SET Deletable=2 WHERE AboutID=?";
        $stmt = mysqli_prepare($connEMM, $query);
        if (!$stmt) {
            die("Preparation failed: " . mysqli_error($connEMM));
        }
        mysqli_stmt_bind_param($stmt, 'i', $iDeleteID);
        if(mysqli_stmt_execute($stmt)){
            return header('location: aboutUpdateList.php');
        } else {
            echo "Error: " . mysqli_error($connEMM);
        }
    }
    public function show($iDeleteID){
        global $connEMM;
        $query = "UPDATE com_about SET Deletable=1 WHERE AboutID=?";
        $stmt = mysqli_prepare($connEMM, $query);
        if (!$stmt) {
            die("Preparation failed: " . mysqli_error($connEMM));
        }
        mysqli_stmt_bind_param($stmt, 'i', $iDeleteID);
        if(mysqli_stmt_execute($stmt)){
            return header('location: aboutUpdateList.php');
        }else{
            echo "Error: " . mysqli_error($connEMM);
        }
    }
}