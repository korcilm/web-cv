<!--footer-->
<!-- End Grid -->
</div>

<!-- End Page Container -->
</div>

<footer class="w3-container w3-black w3-center w3-margin-top">
  <p>Sosyal medya hesaplarım</p>
  <?php 
  $sosyalmedya=$db->prepare("SELECT * FROM sosyalmedya");
  $sosyalmedya->execute();
  $sm_cek= $sosyalmedya->fetch(PDO::FETCH_ASSOC);
  ?>

  <?php 
  if ($sm_cek["sm_facebook"]=="") {
     null;
  }else{
    ?>
    <a href="<?php echo $sm_cek["sm_facebook"]; ?>" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <?php
  }
  ?>
  
<?php 
  if ($sm_cek["sm_instagram"]=="") {
     null;
  }else{
    ?>
    <a href="<?php echo $sm_cek["sm_instagram"]; ?>" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <?php
  }
  ?>
  
  <?php 
  if ($sm_cek["sm_snapchat"]=="") {
     null;
  }else{
    ?>
    <a href="<?php echo $sm_cek["sm_snapchat"]; ?>" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <?php
  }
  ?>

  <?php 
  if ($sm_cek["sm_pinterest"]=="") {
     null;
  }else{
    ?>
    <a href="<?php echo $sm_cek["sm_pinterest"]; ?>" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
    <?php
  }
  ?>

  <?php 
  if ($sm_cek["sm_twitter"]=="") {
     null;
  }else{
    ?>
    <a href="<?php echo $sm_cek["sm_twitter"]; ?>" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <?php
  }
  ?>
  
  <?php 
  if ($sm_cek["sm_linkedin"]=="") {
     null;
  }else{
    ?>
    <a href="<?php echo $sm_cek["sm_linkedin"]; ?>" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    <?php
  }
  ?>

  <?php 
  if ($sm_cek["sm_youtube"]=="") {
     null;
  }else{
    ?>
   <a href="<?php echo $sm_cek["sm_youtube"]; ?>" target="_blank"><i class="fa fa-youtube official w3-hover-opacity"></i></a>
    <?php
  }
  ?>

  <?php 
  if ($sm_cek["sm_google"]=="") {
     null;
  }else{
    ?>
    <a href="<?php echo $sm_cek["sm_google"]; ?>" target="_blank"><i class="fa fa-google official w3-hover-opacity"></i></a>
    <?php
  }
  ?>
  
  
  


  <p><?php echo $ayarcek["site_footer"]; ?> <a href="<?php echo $ayarcek["site_url"]; ?>" target="_self">Muhammet Korçil</a></p>
</footer>

</body>
</html>




