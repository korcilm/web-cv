<?php 
$bilgilerim=$db->prepare("SELECT * FROM bilgilerim");
$bilgilerim->execute();
$bilgicek=$bilgilerim->fetch(PDO::FETCH_ASSOC);
?>

<!-- Left Column -->
<div class="w3-third">

  <div class="w3-white w3-text-grey w3-card-4">
    <div class="w3-display-container">
      <img src="<?php echo $bilgicek["bilgi_fotograf"] ?>" style="width:100%" alt="Avatar">
      <div class="w3-display-bottomleft w3-container w3-text-black">
        <h2 style="color: white;"><?php echo $bilgicek["bilgi_isim"] ?></h2>
      </div>
    </div>
    <div class="w3-container">

      <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-<?php echo $ayarcek["site_renk"]; ?>"></i><?php echo $bilgicek["bilgi_meslek"] ?></p>
      <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-<?php echo $ayarcek["site_renk"]; ?>"></i><?php echo $bilgicek["bilgi_ikamet"] ?></p>
      <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-<?php echo $ayarcek["site_renk"]; ?>"></i><?php echo $bilgicek["bilgi_mail"] ?></p>
      <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-<?php echo $ayarcek["site_renk"]; ?>"></i><?php echo $bilgicek["bilgi_telefon"] ?></p>
      <hr>

      <!-- beceriler bölümü -->
      <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-<?php echo $ayarcek["site_renk"]; ?>"></i>Becerilerim</b></p>
      <?php 
      $becerilerim=$db->prepare("SELECT * FROM becerilerim");
      $becerilerim->execute();
      $becericek=$becerilerim->fetchALL(PDO::FETCH_ASSOC);

      foreach ($becericek as $key ) {
       ?>
       <p><?php echo $key["beceri_adi"]; ?></p>
       <div class="w3-light-grey w3-round-xlarge w3-small">
        <div class="w3-container w3-center w3-round-xlarge w3-<?php echo $ayarcek["site_renk"]; ?>" style="width:<?php echo $key["beceri_yuzde"]; ?>%"><?php echo $key["beceri_yuzde"]; ?>%</div>
      </div>
      <?php  
    }
    ?>
    
    
    <!-- diller bölümü -->
    <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-<?php echo $ayarcek["site_renk"]; ?>"></i>Yabancı Dillerim</b></p>
    <?php 
    $dillerim=$db->prepare("SELECT * FROM dillerim"); 
    $dillerim->execute();
    $dilcek=$dillerim->fetchALL(PDO::FETCH_ASSOC);

    foreach ($dilcek as $row) {
      ?> 
      <p><?php echo $row["dil_adi"]; ?></p>
      <div class="w3-light-grey w3-round-xlarge w3-small">
        <div class="w3-container w3-center w3-round-xlarge w3-<?php echo $ayarcek["site_renk"]; ?>" style="width:<?php echo $row["dil_yuzde"]; ?>%"><?php echo $row["dil_yuzde"]; ?>%</div>
      </div>
      <?php  
    }
    ?> 

    <br>
  </div>
</div><br>

<!-- End Left Column -->
</div>