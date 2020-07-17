<!-- header -->
<?php include 'header.php'; ?>



<div class="page-content">
	<div class="row">
		<!-- side bar -->
		<?php include 'sidebar.php'; ?>

		<div class="col-md-10">
			<div class="row">
				<div class="col-md-12 panel-primary">
					<div class="content-box-header panel-heading">
						<div class="panel-title ">Anasayfa Bilgilendirme</div>		
					</div>
					<div class="content-box-large box-with-header">
						<div class="row">
							
							<div class="col-md-3 panel-danger">
								<div class="content-box-header panel-heading">
									<div class="panel-title "><span class="glyphicon glyphicon-star"> Becerilerim</span></div>		
								</div>
								<div class="content-box-large box-with-header">
									<div class="row">
										<?php 
										$query=$db->prepare("SELECT * FROM becerilerim");
										$query->execute();
										$query->fetch(PDO::FETCH_ASSOC);
										$say=$query->rowCount();
										?>
										<center>
											<span style="font-size: 50px;"><?php echo $say ?></span>
											<p>Adet</p>
										</center>
									</div>
								</div>
							</div>

							<div class="col-md-3 panel-warning">
								<div class="content-box-header panel-heading">
									<div class="panel-title "><span class="glyphicon glyphicon-globe"> Dillerim</span></div>		
								</div>
								<div class="content-box-large box-with-header">
									<div class="row">
										<?php 
										$query=$db->prepare("SELECT * FROM dillerim");
										$query->execute();
										$query->fetch(PDO::FETCH_ASSOC);
										$say=$query->rowCount();
										?>
										<center>
											<span style="font-size: 50px;"><?php echo $say ?></span>
											<p>Adet</p>
										</center>
									</div>
								</div>
							</div>

							<div class="col-md-3 panel-info">
								<div class="content-box-header panel-heading">
									<div class="panel-title "><span class="glyphicon glyphicon-briefcase"> İşlerim</span></div>		
								</div>
								<div class="content-box-large box-with-header">
									<div class="row">
										<?php 
										$query=$db->prepare("SELECT * FROM islerim");
										$query->execute();
										$query->fetch(PDO::FETCH_ASSOC);
										$say=$query->rowCount();
										?>
										<center>
											<span style="font-size: 50px;"><?php echo $say ?></span>
											<p>Adet</p>
										</center>
									</div>
								</div>
							</div>

							<div class="col-md-3 panel-success">
								<div class="content-box-header panel-heading">
									<div class="panel-title "><span class="glyphicon glyphicon-certificate"> Okullarım</span></div>		
								</div>
								<div class="content-box-large box-with-header">
									<div class="row">
										<?php 
										$query=$db->prepare("SELECT * FROM okullarim");
										$query->execute();
										$query->fetch(PDO::FETCH_ASSOC);
										$say=$query->rowCount();
										?>
										<center>
											<span style="font-size: 50px;"><?php echo $say ?></span>
											<p>Adet</p>
										</center>
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
