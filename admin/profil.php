<!-- header -->
<?php include 'header.php'; ?>

<?php 
$admin_id=1;
$query=$db->prepare("SELECT * FROM admin WHERE admin_id=?");
$query->execute(array($admin_id));
$cek=$query->fetch(PDO::FETCH_ASSOC);
?>


<div class="page-content">
	<div class="row">
		<!-- side bar -->
		<?php include 'sidebar.php'; ?>

		<!-- alert uyarı bolmesi -->	
		<div class="col-md-10">
			<?php 
			if (@$_GET["admin-guncelle"]=="bos") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> Boş alan bırakmayınız!</span>
				</div>
				<?php
			}elseif (@$_GET["admin-guncelle"]=="yes") {
				?>
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-check"> İşleminiz başarıyla gerçekleştirildi!</span>
				</div>					
				<?php
			}elseif (@$_GET["admin-guncelle"]=="no") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> İşleminiz gerçekleşirken hata oluştu!</span>
				</div>
				<?php
			}elseif (@$_GET["sifre-degistir"]=="yes") {
				?>
				<div class="alert alert-success" >
					<span class="glyphicon glyphicon-ok-circle"> İşleminiz başarıyla yapıldı!</span>
				</div>
				<?php
			}elseif (@$_GET["sifre-degistir"]=="no") {
				?>
				<div class="alert alert-danger" >
					<span class="glyphicon glyphicon-remove"> İşleminiz gerçekleşirken hata oluştu!</span>
				</div>
				<?php
			}elseif (@$_GET["sifre-degistir"]=="hatali") {
				?>
				<div class="alert alert-warning" >
					<span class="glyphicon glyphicon-remove"> Girdiğiniz eski şifre hatalıdır!</span>
				</div>
				<?php
			}
			?>  
		</div>

		<div class="col-md-10">
			<div class="row">
				<div class="col-md-12 panel-primary">
					<div class="content-box-header panel-heading">
						<div class="panel-title ">Anasayfa Bilgilendirme</div>		
					</div>
					<div class="content-box-large box-with-header">
						<div class="row">
							
							<div class="col-md-12 panel-primary">
								<div class="content-box-header panel-heading">
									<div class="panel-title "><span class="glyphicon glyphicon-user"> Kullanıcı Adı Değiştir</span></div>		
								</div>
								<div class="content-box-large box-with-header">
									<div class="row">
										<form action="islem.php?admin_id=<?php echo $admin_id; ?>" method="POST" class="form-horizontal" role="form">

											<div class="form-group">
												<label for="inputEmail3" class="col-sm-2 control-label">Kullanıcı Adı</label>
												<div class="col-sm-9">
													<input type="text" name="admin_kadi" class="form-control"  value="<?php echo $cek["admin_kadi"] ?>">
												</div>
											</div>
											<hr>
											<div class="col-md-11" >
												<button class="btn btn-success pull-right" name="kullanici-adi">Güncelle</button>						
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="col-md-12 panel-primary">
								<div class="content-box-header panel-heading">
									<div class="panel-title "><span class="glyphicon glyphicon-lock"> Şifre Değiştir</span></div>		
								</div>
								<div class="content-box-large box-with-header">
									<div class="row">
										<form action="islem.php?admin_id=<?php echo $admin_id; ?>" method="POST" class="form-horizontal" role="form">

											<div class="form-group">
												<label for="inputEmail3" class="col-sm-2 control-label">Eski Şifre</label>
												<div class="col-sm-9">
													<input type="password" name="eski_sifre" class="form-control" required="" >
												</div>
											</div>

											<div class="form-group">
												<label for="inputEmail3" class="col-sm-2 control-label">Yeni Şifre</label>
												<div class="col-sm-9">
													<input type="password" name="yeni_sifre" class="form-control" required="" >
												</div>
											</div>
											<hr>
											<div class="col-md-11" >
												<button class="btn btn-success pull-right" name="sifre-degistir" >Güncelle</button>						
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- footer -->
<?php include 'footer.php'; ?>
