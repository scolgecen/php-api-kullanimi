<?php 

$post_id   = mHelper::getIntegerVarible('post_id');
$postVarmi = $db->db->prepare("SELECT * from posts where id =?");
$postVarmi->execute(array($post_id));
$sonuc=$postVarmi->rowCount();
if($sonuc==0):
	$returnArray['message'] = "Böyle bir post yok";
	return;
endif;

$data = $postVarmi->fetch(PDO::FETCH_ASSOC);
$returnArray['data']= $data;

 ?>