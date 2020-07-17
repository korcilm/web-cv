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
			}
			?>  
		</div>

		<?php 

		$query=$db->prepare("SELECT * FROM bilgilerim");
		$query->execute();
		$cek=$query->fetch(PDO::FETCH_ASSOC);
		?>
		
		<div class="col-md-10 panel-primary">
			<div class="content-box-header panel-heading">
				<div class="panel-title ">Bilgilerim</div>
			</div>
			<div class="content-box-large box-with-header">
				<div class="row">
					<form action="islem.php?bilgi_id=<?php echo $cek["bilgi_id"]; ?>" method="POST" class="form-horizontal" role="form">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Yüklü Fotoğraf</label>
							<div class="col-sm-9">
								<img width="200" src="<?php echo $cek["bilgi_fotograf"] ?>" alt="<?php echo $cek["bilgi_fotograf"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Fotoğraf Linki</label>
							<div class="col-sm-9">
								<input type="text" name="bilgi_fotograf" class="form-control"  value="<?php echo $cek["bilgi_fotograf"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">İsim</label>
							<div class="col-sm-9">
								<input type="text" name="bilgi_isim" class="form-control" value="<?php echo $cek["bilgi_isim"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Meslek</label>
							<div class="col-sm-9">
								<input type="text" name="bilgi_meslek" class="form-control"  value="<?php echo $cek["bilgi_meslek"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">İkamet</label>
							<div class="col-sm-9">
								<input type="text" name="bilgi_ikamet" class="form-control"   value="<?php echo $cek["bilgi_ikamet"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Mail</label>
							<div class="col-sm-9">
								<input type="text" name="bilgi_mail" class="form-control"  value="<?php echo $cek["bilgi_mail"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Telefon</label>
							<div class="col-sm-9">
								<input type="text" name="bilgi_telefon" class="form-control"  value="<?php echo $cek["bilgi_telefon"] ?>">
							</div>
						</div>
						<hr>

						<div class="col-md-11" >
							<button class="btn btn-success pull-right" name="bilgi-duzenle">Güncelle</button>						
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>