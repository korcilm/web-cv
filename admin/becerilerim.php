<!-- header -->
<?php include 'header.php'; ?>

<div class="page-content">
	<div class="row">
		<!-- side bar -->
		<?php include 'sidebar.php'; ?>
		
		<!-- alert uyarı bolmesi -->		
		<div class="col-md-10">
			<?php 
			if (@$_GET["bilgi-guncelle"]=="bos") {
				?>	
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> Boş alan bırakmayınız!</span>
				</div>
				<?php
			}elseif (@$_GET["bilgi-guncelle"]=="yes") {
				?>			
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>
				<?php
			}elseif (@$_GET["bilgi-guncelle"]=="no") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> İşleminiz gerçekleşirken hata oluştu!</span>
				</div>
				<?php
			}elseif (@$_GET["beceri-guncelle"]=="bos") {
				?>			
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> Boş alan bırakmayınız!</span>
				</div>
				<?php
			}elseif (@$_GET["beceri-guncelle"]=="yes") {
				?>			
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>
				<?php
			}elseif (@$_GET["beceri-guncelle"]=="no") {
				?>			
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> İşleminiz gerçekleşirken hata oluştu!</span>
				</div>
				<?php
			}elseif (@$_GET["beceri-sil"]=="yes") {
				?>
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>
				<?php
			}elseif (@$_GET["beceri-sil"]=="no") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> İşleminiz gerçekleşirken hata oluştu!</span>
				</div>
				<?php
			}
			?>  
		</div>

		<?php 
		$id=1;

		$query=$db->prepare("SELECT * FROM bilgilerim");
		$query->execute();
		$cek=$query->fetch(PDO::FETCH_ASSOC);
		?>
		
		<div class="col-md-10 panel-primary">
			<div class="content-box-header panel-heading">
				<div class="panel-title ">Becerilerim</div>
				<div class="panel-options">
					<a href="beceri-ekle.php" data-rel="collapse" style="color: white;" title="Beceri Ekle"><i class="glyphicon glyphicon-plus" ></i></a>
				</div>
			</div>

			<div class="content-box-large box-with-header">
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Beceri Adı</th>
								<th>Beceri Yüzde</th>
								<th width="200">İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$query =$db->prepare("SELECT * FROM becerilerim");
							$query->execute();
							$cek =$query->fetchALL(PDO::FETCH_ASSOC);
							$say =$query->rowCount();

							foreach ($cek as $row) {
								?>
								<tr>
									<td><?php echo $row["beceri_id"]; ?></td>
									<td><?php echo $row["beceri_adi"]; ?></td>
									<td><?php echo $row["beceri_yuzde"]; ?></td>
									<td>
										<a href="beceri-duzenle.php?beceri_id=<?php echo $row["beceri_id"]; ?>"><button class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit">Düzenle</span></button></a>
										<a href="islem.php?becerisil_id=<?php echo $row["beceri_id"]; ?>"><button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span>Sil</button></a>
									</td>
								</tr>

								<?php 
							}
							?>


						</tbody>
					</table>		
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>