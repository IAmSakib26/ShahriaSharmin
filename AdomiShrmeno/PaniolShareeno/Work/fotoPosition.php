<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Photo :: Position Update</title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">
<style>
    .sortableUL {
        list-style-type: none;
        border: 1px solid #cecece;
        padding: 0;
        width: 50%;
    }
    .ui-state-default {
        cursor: move;
        font-weight: bold;
        font-size: 1.2em;
        background: #aab0aa;
        color: #ffffff;
        padding: 15px;
        border: 1px solid #fff;
    }
    .ui-icon.ui-icon-arrowthick-2-n-s {
        margin-right: 20px;
        background: #868686;
        padding: 10px;
    }
    .active{
        color: #fff;
        background: #4fc100;
    }
</style>
<?php
echo $jsjQuery;
echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;
?>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
<div id="wrapper" class="toggled">
<?php include_once("../common/sidebar.php");?>
<!-- Page Content -->
<div id="page-content-wrapper">
<div class="container-fluid">
<?php include_once("../common/header.php");?>
<div class="page-title"><h3 class="title">Dashboard / Photo - Position Update</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Photo - Position Update</h3>
			</div>
			<div class="panel-body">
                <ul id="sortable" class="sortableUL">
                    <?php $id = $_REQUEST['fotoid']; $album = $_REQUEST['albumid'];
                    $sql = mysqli_query($connEMM,"SELECT DISTINCT FotoID,AlbumID,Caption,(SELECT Position FROM foto_position WHERE foto_position.FotoID=com_work_foto.FotoID) pos FROM com_work_foto WHERE AlbumID=".$album." ORDER BY pos ASC");
                    // $sql = mysqli_query($connEMM,"SELECT FotoID,AlbumID,Caption FROM com_work_foto WHERE AlbumID=$album");
                    $i = 1;
                    while($rsSQL = mysqli_fetch_assoc($sql)){?>
                        <li id="<?php echo $rsSQL['FotoID']?>" class="ui-state-default <?php echo ($id==$rsSQL['FotoID']?'active':'')?>" data-content="<?php echo $rsSQL['AlbumID']?>" data-id="<?php echo 0;?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"><?php echo $i?></span> <?php echo $rsSQL['Caption']?></li>
                    <?php $i++;}?>
                </ul>
                <div class="text-center"><button type="button" id="saveButton" class="btn btn-primary">Save</button></div>
			</div>
		</div>
	</div>
</div>

<?php include_once("../common/footer.php");?>

</div>

</div>

<!-- /#page-content-wrapper -->

</div>
<?php
echo $jsjBootstrap;
echo $jsHtml5Shiv;
echo $jsRespond;
echo $jsEMM;
?>
<script>
    var arrList = [];
	$( "#sortable" ).sortable({
        update: function(event, ui) {
                
            $(this).children().each(function(index) {
                $(this).attr('data-id', index + 1); // Assuming 1-based indexing
                var id = $(this).attr('id');
                var dataid = $(this).data('id');
                var albumid = $(this).data('content');
                console.log('foto: '+id+' position: '+$(this).attr('data-id'));
                var itemObj = {
                    id: id,
                    albumid: albumid,
                    dataid: dataid
                }
            });
        }
    });
console.log(arrList);
    $(document).ready(function() {
        $("#saveButton").click(function() {
            var arrList = [];
            if(arrList.length == 0){
                $('#sortable').children().each(function(index) {
                    $(this).attr('data-id', index + 1); // Assuming 1-based indexing
                    var id = $(this).attr('id');
                    var dataid = $(this).data('id');
                    var albumid = $(this).data('content');
                    var itemObj = {
                        id: id,
                        albumid: albumid,
                        dataid: dataid
                    }
                    arrList.push(itemObj);
                });
                // console.log(arrList);
            }
            // console.log(arrList);
            $.ajax({
                url: 'save_sorted_list.php',
                type: 'POST',
                data: {data:JSON.stringify(arrList)},
                success: function(response) {
                    console.log(response); // Response from server
                    window.location.href = "fotoUpdateList.php";
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
</body>
</html>