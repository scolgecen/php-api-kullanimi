<?php 

	if($_POST):
		
		$user_id =  mHelper::postVarible("user_id");
		$post_id =  mHelper::postVarible("post_id");
		$text = mHelper::postVarible("comment");

		if($text==""):

			$returnArray['message']="Text alanı boş bırakılamaz";
			return;
		endif;

		$postVarmi=$db->db->prepare("SELECT * from posts where id =?");
		$postVarmi->execute(array($post_id));
		$count = $postVarmi->rowCount();

		if($count==0):	
			$returnArray['message']="Böyle bir post yok";
			return;
		endif;
		$date=date('Y-m-d');
		$yorumEkle =$db->db->prepare("INSERT into comments(user_id,post_id,comment,comment_date) values(?,?,?,?)");
		$result =$yorumEkle->execute(array($user_id,$post_id,$text,$date));


		if($result):
					$returnArray['status'] = true;
					$returnArray['message'] = "Yorum Eklendi";
		else:
					$returnArray['message'] = "Yorum  Eklenemedi";
		endif;

	else:
		echo "post yok";
	endif;

 ?>