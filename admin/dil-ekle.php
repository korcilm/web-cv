
<!-- header -->
<?php include 'header.php'; ?>

<div class="page-content">
	<div class="row">
		<!-- side bar -->
		<?php include 'sidebar.php'; ?>
		
		<!-- alert uyarı bolmesi -->	
		<div class="col-md-10">
			<?php 
			if (@$_GET["dil-ekle"]=="bos") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> Boş alan bırakmayınız!</span>
				</div>
				<?php
			}elseif (@$_GET["dil-ekle"]=="yes") {
				?>
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>					
				<?php
			}elseif (@$_GET["dil-ekle"]=="no") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> İşleminiz gerçekleşirken hata oluştu!</span>
				</div>
				<?php
			}
			?>  
		</div>
		<div class="col-md-10 panel-primary">
			<div class="content-box-header panel-heading">
				<div class="panel-title ">Dil Ekle</div>
			</div>
			<div class="content-box-large box-with-header">
				<div class="row">
					<form action="islem.php" method="POST" class="form-horizontal" role="form">

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Dil Adı</label>
							<div class="col-sm-9">
								<input type="text" name="dil_adi" class="form-control" placeholder="Dilinizin adı giriniz" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Dil Yüzde (%)</label>
							<div class="col-sm-9">
								<input type="text" name="dil_yuzde" class="form-control" placeholder="Dilinizin yüzdesi giriniz" required>
							</div>
						</div>
						
						<div class="col-md-11" >
							<button class="btn btn-success pull-right" name="dil-ekle">Ekle</button>						
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
