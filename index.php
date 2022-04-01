<?php 

	header('Content-Type:application/json;charset=utf8');
	
	require_once 'config/database.php';
	require_once 'Helper/mHelper.php';
	$db = new Database();

	$returnArray = [];
	$returnArray['status'] =false;

	$mode =$_GET['mode']; 
	$process=$_GET['process'];
	$path='Api/'.$mode."/".$process.'.php';
	if(file_exists($path)):
		require_once 'Api/'.$mode.'/'.$process.'.php';
		echo json_encode($returnArray);
	else:
		die("Sayfa Bulunamadı");
	endif;
	
	

/*
	switch($_GET['mode'])
	{
		case 'user':
			//echo "burası user";
			//echo $_GET['mode']."-".$process;
			$process = $_GET['process'];

		break;
		default:
		echo "yanlış yer";
		break;
	}
*/


?>