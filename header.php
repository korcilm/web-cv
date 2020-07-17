<!--header-->
<?php include 'config.php'; ?>

<?php 
$ayarlar=$db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayarcek=$ayarlar->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<title><?php echo $ayarcek["site_title"]; ?></title>
<meta name="description" content="<?php echo $ayarcek["site_desc"]; ?>">
<meta name="keyword" content="<?php echo $ayarcek["site_keyw"]; ?>">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

	<!-- Page Container -->
	<div class="w3-content w3-margin-top" style="max-width:1400px;">

		<!-- The Grid -->
		<div class="w3-row-padding">
			