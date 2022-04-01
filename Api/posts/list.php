<?php 

$category_id   = mHelper::getIntegerVarible('category_id');
$categoryVarmi = $db->db->prepare("SELECT * from category where id =?");
$categoryVarmi->execute(array($category_id));
$sonuc=$categoryVarmi->rowCount();
if($sonuc==0):
	$returnArray['message'] = "Böyle bir kategori yok";
	return;
endif;

$list = $db->db->prepare("SELECT * from posts where category_id =?");
$list->execute(array($category_id));
$postGet= $list->fetchAll(PDO::FETCH_ASSOC);
$returnArray['data']=$postGet;


 ?>