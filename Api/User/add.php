<?php 

	if($_POST):
		
		$name = mHelper::postVarible("name");
		$surname = mHelper::postVarible("surname");
		$email = mHelper::postVarible("email");
		$password = mHelper::postVarible("password");
		$gender = mHelper::postIntegerVarible("gender");//o ise erkek 1 ise kadın
		if($name!="" and $surname!="" and $email!="" ):
			//1.Email Kontrolü yap
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)):
				$returnArray['message']="Email Formatı Hatalı";
			endif;

			////////////////////////////////////////////////////////

			$c=$db->db->prepare("SELECT * from users where email =?");
			$c->execute(array($email));
			$count = $c->rowCount();
			echo $count;
			if($count!=0):
				
				$returnArray['message']="Bu Email Kullanımda";
				return;
			else:
				
				$password =md5($password);
				$date = date("Y-m-d");
				$eklemeSorgu = $db->db->prepare("INSERT into users(name,surname,email,password,gender,date) values(?,?,?,?,?,?)");
				$result =$eklemeSorgu->execute(array($name,$surname,$email,$password,$gender,$date));
				if($result):
					$returnArray['status'] = true;
					$returnArray['message'] = "Kullanıcı başarı ile eklendi";
				else:
					$returnArray['message'] = "Kullanıcı Eklenemedi";
				endif;

			endif;
			
			

			
			
		else:
			$returnArray['status'] =false;
			$returnArray['message']="Lütfen tüm alanları doldurunuz.";
		endif;
	else:
		echo "post yok";
	endif;

 ?>