
<!-- header -->
<?php include 'header.php'; ?>

<div class="page-content">
	<div class="row">
		<!-- side bar -->
		<?php include 'sidebar.php'; ?>
		
		<!-- alert uyarı bolmesi -->	
		<div class="col-md-10">
			<?php 
			if (@$_GET["sm-guncelle"]=="bos") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> Boş alan bırakmayınız!</span>
				</div>
				<?php
			}elseif (@$_GET["sm-guncelle"]=="yes") {
				?>
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>					
				<?php
			}elseif (@$_GET["sm-guncelle"]=="no") {
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
				<div class="panel-title ">Sosyal Medya</div>
			</div>
			<?php 
			$id=1;
			$query=$db->prepare("SELECT * FROM sosyalmedya");
			$query->execute();
			$cek=$query->fetch(PDO::FETCH_ASSOC);
			 ?>
			<div class="content-box-large box-with-header">
				<div class="row">
					<form action="islem.php?sm_id=<?php echo $id; ?>" method="POST" class="form-horizontal" role="form">

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Facebook</label>
							<div class="col-sm-9">
								<input type="text" name="sm_facebook" class="form-control"  value="<?php echo $cek["sm_facebook"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">İnstagram</label>
							<div class="col-sm-9">
								<input type="text" name="sm_instagram" class="form-control" value="<?php echo $cek["sm_instagram"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Snapchat</label>
							<div class="col-sm-9">
								<input type="text" name="sm_snapchat" class="form-control"  value="<?php echo $cek["sm_snapchat"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Pinterest</label>
							<div class="col-sm-9">
								<input type="text" name="sm_pinterest" class="form-control"   value="<?php echo $cek["sm_pinterest"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Twitter</label>
							<div class="col-sm-9">
								<input type="text" name="sm_twitter" class="form-control"  value="<?php echo $cek["sm_twitter"] ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Linkedin</label>
							<div class="col-sm-9">
								<input type="text" name="sm_linkedin" class="form-control"   value="<?php echo $cek["sm_linkedin"] ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Youtube</label>
							<div class="col-sm-9">
								<input type="text" name="sm_youtube" class="form-control"  value="<?php echo $cek["sm_youtube"] ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Google</label>
							<div class="col-sm-9">
								<input type="text" name="sm_google" class="form-control"  value="<?php echo $cek["sm_google"] ?>">
							</div>
						</div>
						<hr>

						<div class="col-md-11" >
							<button class="btn btn-success pull-right" name="sosyal-medya">Güncelle</button>						
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
