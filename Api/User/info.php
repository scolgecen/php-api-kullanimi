<?php 
	$id = intval($_GET['id']);
	$w =$db->db->prepare("SELECT * from users where id =?");
	$w->execute(array($id));
	$count = $w->rowCount();
	if($count==0):
		$returnArray['message'] = "Böyle bir kullanıcı bulunamadı";
		return;
	endif;

	$c =$db->db->prepare("SELECT * from users where id =?");
	$c->execute(array($id));
	$result = $c->fetch(PDO::FETCH_ASSOC);
	$returnArray['data'] = $result;
	$returnArray['status'] = true;

 ?>