  <!-- Right Column -->

  <div class="w3-twothird">
   <!-- islerim -->

   <div class="w3-container w3-card w3-white w3-margin-bottom">
    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-<?php echo $ayarcek["site_renk"]; ?>"></i>İş Deneyimlerim</h2>

    <?php 
    $islerim=$db->prepare("SELECT * FROM islerim ORDER BY is_id DESC");   /*order by kısmı en son eklenenden başlayarak yazdırılmasını sağlıyor*/
    $islerim->execute();
    $iscek=$islerim->fetchALL(PDO::FETCH_ASSOC);

    foreach ($iscek as $row) {

      if ($row["is_devam"]==1) {
        ?>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $row["is_adi"]; ?> / <?php echo $row["is_link"]; ?></b></h5>
          <h6 class="w3-text-<?php echo $ayarcek["site_renk"]; ?>"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $row["is_tarih"]; ?>  <span class="w3-tag w3-<?php echo $ayarcek["site_renk"]; ?> w3-round">Devam Ediyor</span></h6>
          <p><?php echo $row["is_aciklama"]; ?></p>
          <hr>
        </div>
        <?php
      }
      else{
        ?>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $row["is_adi"]; ?> / <?php echo $row["is_link"]; ?></b></h5>
          <h6 class="w3-text-<?php echo $ayarcek["site_renk"]; ?>"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $row["is_tarih"]; ?></h6>
          <p><?php echo $row["is_aciklama"]; ?></p>
          <hr>
        </div>
        <?php
      }

    }
    ?>

    <!-- egitim -->

    <div class="w3-container w3-card w3-white">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-<?php echo $ayarcek["site_renk"]; ?>"></i>Okullarım</h2>
      <?php 
      $okullarim=$db->prepare("SELECT * FROM okullarim ORDER BY okul_id DESC");   /*order by kısmı en son eklenenden başlayarak yazdırılmasını sağlıyor*/
      $okullarim->execute();
      $okulcek=$okullarim->fetchALL(PDO::FETCH_ASSOC);

      foreach ($okulcek as $row) {

        if ($row["okul_devam"]==1) {
          ?>
          <div class="w3-container">
            <h5 class="w3-opacity"><b><?php echo $row["okul_adi"]; ?></b></h5>
            <h6 class="w3-text-<?php echo $ayarcek["site_renk"]; ?>"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $row["okul_tarih"]; ?> - <span class="w3-tag w3-<?php echo $ayarcek["site_renk"]; ?> w3-round">Devam Ediyor</span></h6>
            <p><?php echo $row["okul_aciklama"]; ?></p>
            <hr>
          </div>
          <?php
        }
        else{
          ?>
          <div class="w3-container">
            <h5 class="w3-opacity"><b><?php echo $row["okul_adi"]; ?></b></h5>
            <h6 class="w3-text-<?php echo $ayarcek["site_renk"]; ?>"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $row["okul_tarih"]; ?></h6>
            <p><?php echo $row["okul_aciklama"]; ?></p>
            <hr>
          </div>
          <?php
        }

      }
      ?>
      
    </div>

    <!-- End Right Column -->
  </div>
  
