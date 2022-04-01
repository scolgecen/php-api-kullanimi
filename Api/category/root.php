<?php 

$parent_id =0;
$sorgu = $db->db->prepare("SELECT * from category where parent_id=?");
$sorgu->execute(array($parent_id));
$sonuc =$sorgu->fetchAll(PDO::FETCH_ASSOC);

//print_r($sonuc);
$returnArray['status'] =true;
$returnArray['data'] = $sonuc;
 ?>