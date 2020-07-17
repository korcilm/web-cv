<!-- header --> 
<?php include 'header.php'; ?>

<div class="page-content">
	<div class="row">
		<!-- side bar -->
		<?php include 'sidebar.php'; ?>
		
		<!-- alert uyarı bolmesi -->		
		<div class="col-md-10">
			<?php 
			if (@$_GET["is-ekle"]=="bos") {
				?>	
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> Boş alan bırakmayınız!</span>
				</div>
				<?php
			}elseif (@$_GET["is-ekle"]=="yes") {
				?>			
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>
				<?php
			}elseif (@$_GET["is-ekle"]=="no") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> İşleminiz gerçekleşirken hata oluştu!</span>
				</div>
				<?php
			}elseif (@$_GET["is-guncelle"]=="bos") {
				?>			
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> Boş alan bırakmayınız!</span>
				</div>
				<?php
			}elseif (@$_GET["is-guncelle"]=="yes") {
				?>			
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>
				<?php
			}elseif (@$_GET["is-guncelle"]=="no") {
				?>			
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> İşleminiz gerçekleşirken hata oluştu!</span>
				</div>
				<?php
			}elseif (@$_GET["is-sil"]=="yes") {
				?>
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>
				<?php
			}elseif (@$_GET["is-sil"]=="no") {
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

		$query=$db->prepare("SELECT * FROM islerim");
		$query->execute();
		$cek=$query->fetch(PDO::FETCH_ASSOC);
		?>
		
		<div class="col-md-10 panel-primary">
			<div class="content-box-header panel-heading">
				<div class="panel-title ">İşlerim</div>
				<div class="panel-options">
					<a href="is-ekle.php" data-rel="collapse" style="color: white;" title="İş Ekle"><i class="glyphicon glyphicon-plus" ></i></a>
				</div>
			</div>

			<div class="content-box-large box-with-header">
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>İş Adı</th>
								<th>İş Link</th>
								<th>İş Devam</th>
								<th width="200">İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$query =$db->prepare("SELECT * FROM islerim");
							$query->execute();
							$cek =$query->fetchALL(PDO::FETCH_ASSOC);
							$say =$query->rowCount();

							foreach ($cek as $row) {
								?>
								<tr>
									<td><?php echo $row["is_id"]; ?></td>
									<td><?php echo $row["is_adi"]; ?></td>
									<td><?php echo $row["is_link"]; ?></td>
									<td><?php 
										if ($row["is_devam"]==1) {
										?>
										<span class="glyphicon glyphicon-check"></span>
										 <?php
										}else{
											?>
											<span class="glyphicon glyphicon-remove"></span>
											 <?php
										}
									 ?></td>

									<td>
										<a href="is-duzenle.php?is_id=<?php echo $row["is_id"]; ?>"><button class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit">Düzenle</span></button></a>
										<a href="islem.php?issil_id=<?php echo $row["is_id"]; ?>"><button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span>Sil</button></a>
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