<?php 
include '../config.php';
if (!$_SESSION["admin_kadi"]) {
	header("Location: login.php");
}

//giriş işlemi
if (isset($_POST["loggin"])) {

	$admin_kadi= htmlspecialchars(trim($_POST["admin_kadi"]));
	$admin_sifre= htmlspecialchars(trim(md5($_POST["admin_sifre"])));

	if(!$admin_kadi || !$admin_sifre){
		header("Location: login.php?giris=bos");
	}else{

		$query=$db->prepare("SELECT * FROM admin WHERE admin_kadi=? AND admin_sifre=?");
		$query->execute(array($admin_kadi, $admin_sifre));
		$admin_giris=$query->fetch(PDO::FETCH_ASSOC);

		if ($admin_giris) {
			
			$_SESSION["login"] = true;
			$_SESSION["admin_kadi"] = $admin_giris["admin_kadi"];
			$_SESSION["admin_id"] 	= $admin_giris["admin_id"];

			header("Location: index.php");
		}else{
			header("Location: login.php?giris=no");
		}
	}
}
//profil işlemleri admin kullanıcı adı değiştirme
if (isset($_POST["kullanici-adi"])) {
	
	$admin_id   =$_GET["admin_id"];

	$admin_kadi =$_POST["admin_kadi"];

	if (!$admin_kadi) {

		header("Location: profil.php?admin-guncelle=bos");

	}else{

		$query=$db->prepare("UPDATE admin SET admin_kadi=? WHERE admin_id=?");
		$update=$query->execute(array($admin_kadi,$admin_id));

		if ($update) {
			header("Location: profil.php?admin-guncelle=yes");
		}else{
			header("Location: profil.php?admin-guncelle=no");
		}
	}

}

//profil işlemleri admin şifre değiştirme
if (isset($_POST["sifre-degistir"])) {
	
	$admin_id 	=$_GET["admin_id"];

	$eski_sifre =md5($_POST["eski_sifre"]);
	$yeni_sifre =md5($_POST["yeni_sifre"]);

	

	$query=$db->prepare("SELECT *FROM admin WHERE admin_sifre=?");
	$query->execute(array($eski_sifre));
	$query->fetch(PDO:: FETCH_ASSOC);
	$say=$query->rowCount();

	if ($say==0) {

		header("Location: profil.php?admin-guncelle=hatali");

	}else{

		$query=$db->prepare("UPDATE admin SET admin_sifre=?");
		$update=$query->execute(array($yeni_sifre));

		if ($update) {
			header("Location: profil.php?admin-guncelle=yes");
		}else{
			header("Location: profil.php?admin-guncelle=no");
		}


	}
	
}

// genel ayarlar
if (isset($_POST["genel-ayarlar"])) {
	
	$site_id		= $_GET["site_id"];

	$site_title		= $_POST["site_title"];
	$site_url		= $_POST["site_url"];
	$site_desc	    = $_POST["site_desc"];
	$site_keyw 		= $_POST["site_keyw"];
	$site_footer	= $_POST["site_footer"];
	$site_renk		= $_POST["site_renk"];

	if (!$site_title || !$site_url || !$site_desc || !$site_keyw || !$site_footer ) {
		header("Location: genel-ayarlar.php?ayar-guncelle=bos");
	}else{
		
		$query = $db->prepare("UPDATE ayarlar SET site_title=?, site_url=?, site_desc=?, site_keyw=?, site_footer=?, site_renk=? WHERE site_id=?");
		$update = $query->execute(array($site_title, $site_url, $site_desc, $site_keyw, $site_footer, $site_renk, $site_id));
		
		if ($update) {
			header("Location: genel-ayarlar.php?ayar-guncelle=yes");
		}else{
			header("Location: genel-ayarlar.php?ayar-guncelle=no");
		}
	}
}

//bilgilerim guncelle
if (isset($_POST["bilgi-duzenle"])) {
	
	$bilgi_id			= $_GET["bilgi_id"];

	$bilgi_fotograf		= $_POST["bilgi_fotograf"];
	$bilgi_isim			= $_POST["bilgi_isim"];
	$bilgi_meslek	    = $_POST["bilgi_meslek"];
	$bilgi_ikamet 		= $_POST["bilgi_ikamet"];
	$bilgi_mail			= $_POST["bilgi_mail"];
	$bilgi_telefon		= $_POST["bilgi_telefon"];

	if (!$bilgi_fotograf || !$bilgi_isim || !$bilgi_meslek || !$bilgi_ikamet || !$bilgi_mail || !$bilgi_telefon ) {
		header("Location: bilgilerim.php?bilgi-guncelle=bos");
	}else{
		
		$query = $db->prepare("UPDATE bilgilerim SET bilgi_fotograf=?, bilgi_isim=?, bilgi_meslek=?, bilgi_ikamet=?, bilgi_mail=?, bilgi_telefon=? WHERE bilgi_id=?");
		$update = $query->execute(array($bilgi_fotograf, $bilgi_isim, $bilgi_meslek, $bilgi_ikamet, $bilgi_mail, $bilgi_telefon, $bilgi_id));
		
		if ($update) {
			header("Location: bilgilerim.php?bilgi-guncelle=yes");
		}else{
			header("Location: bilgilerim.php?bilgi-guncelle=no");
		}
	}
}
// beceri ekle
if (isset($_POST["beceri-ekle"])) {
	
	$beceri_adi		= $_POST["beceri_adi"];
	$beceri_yuzde	= $_POST["beceri_yuzde"];	
	if (!$beceri_adi || !$beceri_yuzde  ) {
		header("Location: becerilerim.php?beceri-ekle=bos");
	}else{
		$query =$db->prepare("INSERT INTO becerilerim SET beceri_adi=? , beceri_yuzde=?");
		$insert =$query->execute(array($beceri_adi, $beceri_yuzde));

		if ($insert) {
			header("Location: becerilerim.php?beceri-ekle=yes");
		}else{
			header("Location: becerilerim.php?beceri-ekle=no");
		}
	}
}	
//beceri guncelle
if (isset($_POST["beceri-duzenle"])) {
	
	$beceri_id			= $_GET["beceri_id"];

	$beceri_adi			= $_POST["beceri_adi"];
	$beceri_yuzde		= $_POST["beceri_yuzde"];
	

	if (!$beceri_adi || !$beceri_yuzde  ) {
		header("Location: becerilerim.php?beceri-guncelle=bos");
	}else{
		
		$query = $db->prepare("UPDATE becerilerim SET beceri_adi=?, beceri_yuzde=? WHERE beceri_id=?");
		$update = $query->execute(array($beceri_adi, $beceri_yuzde, $beceri_id));
		
		if ($update) {
			header("Location: becerilerim.php?beceri-guncelle=yes");
		}else{
			header("Location: becerilerim.php?beceri-guncelle=no");
		}
	}
}
//beceri sil
$becerisil_id=$_GET["becerisil_id"];
if (isset($becerisil_id)) {
	$query=$db->prepare("DELETE FROM becerilerim WHERE beceri_id=?");
	$delete=$query->execute(array($becerisil_id));

	if ($delete) {
		header("Location: becerilerim.php?beceri-sil=yes");
	}else{
		header("Location: becerilerim.php?beceri-sil=no");
	}
}

// dil ekle
if (isset($_POST["dil-ekle"])) {
	
	$dil_adi		= $_POST["dil_adi"];
	$dil_yuzde		= $_POST["dil_yuzde"];	
	if (!$dil_adi || !$dil_yuzde  ) {
		header("Location: dillerim.php?dil-ekle=bos");
	}else{
		$query =$db->prepare("INSERT INTO dillerim SET dil_adi=? , dil_yuzde=?");
		$insert =$query->execute(array($dil_adi, $dil_yuzde));

		if ($insert) {
			header("Location: dillerim.php?dil-ekle=yes");
		}else{
			header("Location: dillerim.php?dil-ekle=no");
		}
	}
}	
//dil guncelle
if (isset($_POST["dil-duzenle"])) {
	
	$dil_id			= $_GET["dil_id"];

	$dil_adi		= $_POST["dil_adi"];
	$dil_yuzde		= $_POST["dil_yuzde"];
	

	if (!$dil_adi || !$dil_yuzde  ) {
		header("Location: dillerim.php?dil-guncelle=bos");
	}else{
		
		$query = $db->prepare("UPDATE dillerim SET dil_adi=?, dil_yuzde=? WHERE dil_id=?");
		$update = $query->execute(array($dil_adi, $dil_yuzde, $dil_id));
		
		if ($update) {
			header("Location: dillerim.php?dil-guncelle=yes");
		}else{
			header("Location: dillerim.php?dil-guncelle=no");
		}
	}
}
//dil sil
$dilsil_id=$_GET["dilsil_id"];
if (isset($dilsil_id)) {
	$query=$db->prepare("DELETE FROM dillerim WHERE dil_id=?");
	$delete=$query->execute(array($dilsil_id));

	if ($delete) {
		header("Location: dillerim.php?dil-sil=yes");
	}else{
		header("Location: dillerim.php?dil-sil=no");
	}
}

// is ekle
if (isset($_POST["is-ekle"])) {
	
	$is_adi		    = $_POST["is_adi"];
	$is_link		= $_POST["is_link"];
	$is_devam		= $_POST["is_devam"];
	$is_aciklama	= $_POST["is_aciklama"];	
	if (!$is_adi || !$is_link || !$is_aciklama ) {
		header("Location: islerim.php?is-ekle=bos");
	}else{
		$query =$db->prepare("INSERT INTO islerim SET is_adi=? , is_link=? , is_devam=? , is_aciklama=?");
		$insert =$query->execute(array($is_adi, $is_link, $is_devam, $is_aciklama));

		if ($insert) {
			header("Location: islerim.php?is-ekle=yes");
		}else{
			header("Location: islerim.php?is-ekle=no");
		}
	}
}	

//is Düzenle
if (isset($_POST["is-duzenle"])) {
	
	$is_id			= $_GET["is_id"];

	$is_adi		    = $_POST["is_adi"];
	$is_link		= $_POST["is_link"];
	$is_devam		= $_POST["is_devam"];
	$is_aciklama	= $_POST["is_aciklama"];
	

	if (!$is_adi || !$is_link || !$is_aciklama ) {
		header("Location: islerim.php?is-guncelle=bos");
	}else{
		
		$query = $db->prepare("UPDATE islerim SET is_adi=? , is_link=? , is_devam=? , is_aciklama=? WHERE is_id=?");
		$update = $query->execute(array($is_adi, $is_link, $is_devam, $is_aciklama, $is_id));
		
		if ($update) {
			header("Location: islerim.php?is-guncelle=yes");
		}else{
			header("Location: islerim.php?is-guncelle=no");
		}
	}
}
//is sil
$issil_id=$_GET["issil_id"];
if (isset($issil_id)) {
	$query=$db->prepare("DELETE FROM islerim WHERE is_id=?");
	$delete=$query->execute(array($issil_id));

	if ($delete) {
		header("Location: islerim.php?is-sil=yes");
	}else{
		header("Location: islerim.php?is-sil=no");
	}
}

// okul ekle
if (isset($_POST["okul-ekle"])) {
	
	$okul_adi       = $_POST["okul_adi"];
	$okul_devam		= $_POST["okul_devam"];
	$okul_aciklama	= $_POST["okul_aciklama"];

	if (!$okul_adi || !$okul_aciklama ) {
		header("Location: okullarim.php?okul-ekle=bos");
	}else{
		$query =$db->prepare("INSERT INTO okullarim SET okul_adi=? , okul_devam=? , okul_aciklama=? ");
		$insert =$query->execute(array($okul_adi, $okul_devam, $okul_aciklama));

		if ($insert) {
			header("Location: okullarim.php?okul-ekle=yes");
		}else{
			header("Location: okullarim.php?okul-ekle=no");
		}
	}
}	
//okul guncelle
if (isset($_POST["okul-duzenle"])) {
	
	$okul_id		= $_GET["okul_id"];

	$okul_adi       = $_POST["okul_adi"];
	$okul_devam		= $_POST["okul_devam"];
	$okul_aciklama	= $_POST["okul_aciklama"];
	

	if (!$okul_adi || !$okul_aciklama ) {
		header("Location: okullarim.php?okul-guncelle=bos");
	}else{
		
		$query = $db->prepare("UPDATE okullarim SET okul_adi=? , okul_devam=? , okul_aciklama=? WHERE okul_id=?");
		$update = $query->execute(array($okul_adi, $okul_devam, $okul_aciklama, $okul_id));
		
		if ($update) {
			header("Location: okullarim.php?okul-guncelle=yes");
		}else{
			header("Location: okullarim.php?okul-guncelle=no");
		}
	}
}
//okul sil
$okulsil_id=$_GET["okulsil_id"];
if (isset($okulsil_id)) {
	$query=$db->prepare("DELETE FROM okullarim WHERE okul_id=?");
	$delete=$query->execute(array($okulsil_id));

	if ($delete) {
		header("Location: okullarim.php?okul-sil=yes");
	}else{
		header("Location: okullarim.php?okul-sil=no");
	}
}

//sosyal medya guncelle
if (isset($_POST["sosyal-medya"])) {
	
	$sm_id			= $_GET["sm_id"];

	$sm_facebook	= $_POST["sm_facebook"];
	$sm_instagram	= $_POST["sm_instagram"];
	$sm_snapchat 	= $_POST["sm_snapchat"];
	$sm_pinterest	= $_POST["sm_pinterest"];
	$sm_twitter	    = $_POST["sm_twitter"];
	$sm_linkedin	= $_POST["sm_linkedin"];
	$sm_youtube		= $_POST["sm_youtube"];
	$sm_google		= $_POST["sm_google"];

	$query = $db->prepare("UPDATE sosyalmedya SET sm_facebook=?, sm_instagram=?, sm_snapchat=?, sm_pinterest=?, sm_twitter=?, sm_linkedin=?, sm_youtube=?, sm_google=? WHERE sm_id=?");
	$update = $query->execute(array($sm_facebook, $sm_instagram, $sm_snapchat, $sm_pinterest, $sm_twitter, $sm_linkedin, $sm_youtube, $sm_google, $sm_id ));

	if ($update) {
		header("Location: sosyal-medya.php?sm-guncelle=yes");
	}else{
		header("Location: sosyal-medya.php?sm-guncelle=no");
	}
}

?>