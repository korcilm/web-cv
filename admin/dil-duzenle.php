
<!-- header -->
<?php include 'header.php'; ?>

<div class="page-content">
	<div class="row">
		<!-- side bar -->
		<?php include 'sidebar.php'; ?>
		
		<!-- alert uyarı bolmesi -->	
		<div class="col-md-10">
			<?php 
			if (@$_GET["dil-duzenle"]=="bos") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> Boş alan bırakmayınız!</span>
				</div>
				<?php
			}elseif (@$_GET["dil-duzenle"]=="yes") {
				?>
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>					
				<?php
			}elseif (@$_GET["dil-duzenle"]=="no") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> İşleminiz gerçekleşirken hata oluştu!</span>
				</div>
				<?php
			}
			?>  
		</div>

		<?php 
		$dil_id=$_GET["dil_id"];
		$query =$db->prepare("SELECT * FROM dillerim WHERE dil_id=?");
		$query->execute(array($dil_id));
		$cek =$query->fetch(PDO::FETCH_ASSOC);
		 ?>

		<div class="col-md-10 panel-primary">
			<div class="content-box-header panel-heading">
				<div class="panel-title ">Dil Düzenle</div>
			</div>
			<div class="content-box-large box-with-header">
				<div class="row">
					<form action="islem.php?dil_id=<?php echo $cek["dil_id"]; ?>" method="POST" class="form-horizontal" role="form">

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Beceri Adı</label>
							<div class="col-sm-9">
								<input type="text" name="dil_adi" class="form-control" value="<?php echo $cek["dil_adi"]; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Beceri Yüzde (%)</label>
							<div class="col-sm-9">
								<input type="text" name="dil_yuzde" class="form-control" value="<?php echo $cek["dil_yuzde"]; ?>" required>
							</div>
						</div>
						
						<div class="col-md-11" >
							<button class="btn btn-success pull-right" name="dil-duzenle">Güncelle</button>						
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
