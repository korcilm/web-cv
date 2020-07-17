<!-- header -->
<?php include 'header.php'; ?>

<div class="page-content">
	<div class="row">
		<!-- side bar -->
		<?php include 'sidebar.php'; ?>
		
	
		<div class="col-md-10 panel-primary">
			<div class="content-box-header panel-heading">
				<div class="panel-title ">İş Ekle</div>
			</div>
			<div class="content-box-large box-with-header">
				<div class="row">
					<form action="islem.php" method="POST" class="form-horizontal" role="form">

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">İş Adı</label>
							<div class="col-sm-9">
								<input type="text" name="is_adi" class="form-control" placeholder="İşinizin adı giriniz" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">İş Linki</label>
							<div class="col-sm-9">
								<input type="text" name="is_link" class="form-control" placeholder="İşinizin linkini giriniz" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">İş Devam</label>
							<div class="col-sm-9">
								<select name="is_devam" class="form-control">
									<option value="1">Hala devam ediyor</option>
									<option value="0">Devam etmiyor</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">İş Linki</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="is_aciklama" cols="30" rows="5"></textarea>
							</div>
						</div>
						
						<div class="col-md-11" >
							<button class="btn btn-success pull-right" name="is-ekle">Ekle</button>						
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
