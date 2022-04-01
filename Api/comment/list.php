<?php 

$post_id   = mHelper::getIntegerVarible('post_id');
$postGet = $db->db->prepare("SELECT * from posts where id =?");
$postGet->execute(array($post_id));
$sonuc=$postGet->rowCount();
if($sonuc==0):
	$returnArray['message'] = "Böyle bir post yok";
	return;
endif;

$list = $db->db->prepare("SELECT * from comments where post_id =?");
$list->execute(array($post_id));
$commentGet= $list->fetchAll(PDO::FETCH_ASSOC);

$returnDataArray = [];
foreach ($commentGet as $key => $value) {
	$user = $db->db->prepare("SELECT * from users where id=?");
	$user->execute(array($value['user_id']));
	$userInfo = $user->fetch(PDO::FETCH_ASSOC);
	$returnDataArray[$key]['id']=  $value['id'];
	$returnDataArray[$key]['post_id'] = $value['post_id'];
	$returnDataArray[$key]['user'] = $userInfo['name']." ".$userInfo['surname'];
	$returnDataArray[$key]['text']=  $value['comment'];
	$returnDataArray[$key]['date'] = $value['comment_date'];
}

//$returnArray['data']=$commentGet;
$returnArray ['data'] = $returnDataArray;

 ?>