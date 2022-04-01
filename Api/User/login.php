<?php 

if($_POST):
	$email = mHelper::postVarible("email");
	$password = mHelper::postVarible("password");

	if($email=="" and $password==""):
		$returnArray['message'] = "Lütfen Tüm alanları doldurunuz";
		return;
	endif;
	$c =$db->db->prepare("SELECT * from users where email =?");
	$c->execute(array($email));
	$count = $c->rowCount();
	if($count==0):
		$returnArray['message'] = "Bu email sistemde kayıtlı değil";
		return;
	endif;

	$w =$db->db->prepare("SELECT * from users where email =?");
	$w->execute(array($email));
	$result = $w->fetch(PDO::FETCH_ASSOC);
	if($result['password']!=md5($password)):
		$returnArray['message'] = "Şifreler uyuşmuyor";
		return;
	endif;
	$returnArray['status']=true;
	$returnArray['userId']=$result['id'];
	$returnArray['message']="Başarılı bir şekilde giriş yaptınız.";

else:
	echo "post tan gelmiyorsunkardeş";
	return;
endif;


 ?>