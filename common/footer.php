<?php $links = mysqli_query($connEMM,"SELECT LinkURL FROM com_links");
$fLinks = mysqli_fetch_all($links);
$facebook = implode('',$fLinks[0]);
$twitter = implode('',$fLinks[1]);
$instagram = implode('',$fLinks[2]);
$email = implode('',$fLinks[3]);?>
<footer class="footer-bottom">
    <div class="side-footer-area">
        <ul>
            <li><a href="<?php echo $facebook;?>" target="_blank" class="s-con"><i class="fab fa-facebook-f"></i> </a> </li>
            <li><a href="<?php echo $twitter;?>" target="_blank" class="s-con"><i class="fab fa-twitter"></i></a></li>
            <li><a href="<?php echo $instagram;?>" target="_blank" class="s-con"><i class="fab fa-instagram"></i> </a> </li>
            <li><a href="<?php echo $sSiteURL?>contact" target="_blank" class="s-con"><i class="fas fa-envelope"></i></a></li>
        </ul>
        <div class="copy-right-wrap">
            <p>&copy; <?php echo $sSiteName; ?></p>
        </div>
    </div>
</footer>