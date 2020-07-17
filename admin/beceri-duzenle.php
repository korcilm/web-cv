
<!-- header -->
<?php include 'header.php'; ?>

<div class="page-content">
	<div class="row">
		<!-- side bar -->
		<?php include 'sidebar.php'; ?>
		
		<!-- alert uyarı bolmesi -->	
		<div class="col-md-10">
			<?php 
			if (@$_GET["beceri-ekle"]=="bos") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> Boş alan bırakmayınız!</span>
				</div>
				<?php
			}elseif (@$_GET["beceri-ekle"]=="yes") {
				?>
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>					
				<?php
			}elseif (@$_GET["beceri-ekle"]=="no") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> İşleminiz gerçekleşirken hata oluştu!</span>
				</div>
				<?php
			}
			?>  
		</div>

		<?php 
		$beceri_id=$_GET["beceri_id"];
		$query =$db->prepare("SELECT * FROM becerilerim WHERE beceri_id=?");
		$query->execute(array($beceri_id));
		$cek =$query->fetch(PDO::FETCH_ASSOC);
		 ?>

		<div class="col-md-10 panel-primary">
			<div class="content-box-header panel-heading">
				<div class="panel-title ">Beceri Düzenle</div>
			</div>
			<div class="content-box-large box-with-header">
				<div class="row">
					<form action="islem.php?beceri_id=<?php echo $cek["beceri_id"]; ?>" method="POST" class="form-horizontal" role="form">

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Beceri Adı</label>
							<div class="col-sm-9">
								<input type="text" name="beceri_adi" class="form-control" value="<?php echo $cek["beceri_adi"]; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Beceri Yüzde (%)</label>
							<div class="col-sm-9">
								<input type="text" name="beceri_yuzde" class="form-control" value="<?php echo $cek["beceri_yuzde"]; ?>" required>
							</div>
						</div>
						
						<div class="col-md-11" >
							<button class="btn btn-success pull-right" name="beceri-duzenle">Güncelle</button>						
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
