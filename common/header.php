<?php //include_once('config.php'); include_once('mysqli_connect.php');?>
<header class="header-area">
    <div class="container">
        <div class="mobile-head d-lg-none d-block">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="navbar-brand" href="<?php echo $sSiteURL; ?>">
                                        <img src="<?php echo $sSiteURL; ?>media/common/logo.png" alt=""
                                            class="d-inline-block align-text-top">
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                        aria-expanded="false">work</a>
                                    <ul class="dropdown-menu">
                                        <?php $navWork = mysqli_query($connEMM,"SELECT AlbumID,AlbumName FROM com_work_album WHERE Deletable=1");
                                        while($row = mysqli_fetch_assoc($navWork)) {?>
                                        <li><a class="dropdown-item" href="<?php echo $sSiteURL;?>album/<?php echo $row2['AlbumID'];?>"><?php echo $row['AlbumName'];?></a></li>
                                        <?php }?>
                                        <!-- <li><a class="dropdown-item" href="call-me-hena.php">call me heena</a></li>
                                        <li><a class="dropdown-item" href="when-home-won’t-let-you-stay.php">when home won’t let you stay</a></li>
                                        <li><a class="dropdown-item" href="nur.php">nur</a></li>
                                        <li><a class="dropdown-item" href="bonds-unseen.php">bonds unseen</a></li> -->
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $sSiteURL?>about">about</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="desktop-header d-lg-block d-none">
            <div id="menu" class="sidenav">
                <div class="logo">
                    <a href="<?php echo $sSiteURL; ?>">
                        <img src="<?php echo $sLogoURL; ?>" alt="logo" title="logo">
                    </a>
                </div>
                <div class="menu-items">
                    <ul>
                        <li>
                            <button class="dropdown-btn">work</button>
                            <div class="dropdown-container">
                                <ul>
                                <?php $navWork2 = mysqli_query($connEMM,"SELECT AlbumID,AlbumName FROM com_work_album WHERE Deletable=1");
                                    while($row2 = mysqli_fetch_assoc($navWork2)) {?>
                                    <li><a class="dropdown-item" href="<?php echo $sSiteURL;?>album/<?php echo $row2['AlbumID'];?>"><?php echo $row2['AlbumName'];?></a></li>
                                <?php }?>
                                    <!-- <li class="full-bg"><a href="call-me-hena.php">call me heena</a></li>
                                    <li class="full-bg"><a href="when-home-won’t-let-you-stay.php">when home won’t let you stay</a></li>
                                    <li class="full-bg"><a href="nur.php">nur</a></li>
                                    <li class="full-bg"><a href="bonds-unseen.php">bonds unseen</a></li> -->
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?php echo $sSiteURL?>about">about</a></li>
                    </ul>
                </div>
                <?php include_once "common/footer.php";?>
            </div>
        </div>
    </div>
</header>