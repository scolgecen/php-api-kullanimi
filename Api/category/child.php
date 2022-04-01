<?php 

$parent_id = mHelper::getIntegerVarible("parent_id");
$homeCategory = $db->db->prepare('SELECT * from category where id=?');
$homeCategory->execute(array($parent_id));
$varMi = $homeCategory->rowCount();
if($varMi==0):
	$returnArray['message'] = "Böyle bir kategori yok";
	return;
endif;

$sorgu = $db->db->prepare("SELECT * from category where parent_id=?");
$sorgu->execute(array($parent_id));
$sonuc =$sorgu->fetchAll(PDO::FETCH_ASSOC);

//print_r($sonuc);
$returnArray['status'] =true;
$returnArray['data'] = $sonuc;
 ?>