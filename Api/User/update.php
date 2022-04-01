<?php 
	$id  = mHelper::postVarible("id");
	$name = mHelper::postVarible("name");
	$surname = mHelper::postVarible("surname");
	$email = mHelper::postVarible("email");
	$password = mHelper::postVarible("password");
	$gender = mHelper::postIntegerVarible("gender");

	if($name=="" and $surname=="" and $email==""):
		$returnArray['message'] = "Lütfen tüm alanları doldurunuz";
		return;
	endif;

	$w =$db->db->prepare("SELECT * from users where id =?");
	$w->execute(array($id));
	$count = $w->rowCount();
	if($count==0):
		$returnArray['message'] = "Böyle bir kullanıcı yok";
		return;
	endif;

	$c =$db->db->prepare("SELECT * from users where id !=? and email =?");
	$c->execute(array($id,$email));
	$countEmail = $c->rowCount();
	if($countEmail!=0):
		$returnArray['message'] ="Bu email kullanımda";
		return;
	endif;


	$passControl =$db->db->prepare("SELECT * from users where id =?");
	$passControl->execute(array($id));
	$result = $passControl->fetch(PDO::FETCH_ASSOC);
	//print_r($result);

	if($password ==""):
		$password = $result['password'];
	else:
		$password=md5($password);
	endif;

	$update = $db->db->prepare("UPDATE users set name=?,surname=?,email=?,password=?,gender=? where id=?");
	$guncelle =$update->execute(array($name,$surname,$email,$password,$gender,$id));

	if($guncelle):
		$returnArray['status'] =true;
		$returnArray['message'] ="Güncelleme yapıldı";
	else:
		$returnArray['message'] ="Güncelleme yapılamadı";

	endif;
 ?>