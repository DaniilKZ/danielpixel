<?php
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Origin: *');
header('Content-type: application/x-javascript');

include 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty( $_GET['callback'] ) && !empty($_GET['func'])) {

	$userip_value    = (!empty($_SERVER['REMOTE_ADDR']))? $_SERVER['REMOTE_ADDR'] : '';

	$sitename_value  = (!empty($_GET['link'])) ? $_GET['link'] : '-';

	$datetime_value  = date('Y-m-d H:i');

	$useragent_value = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';

	 switch ($_GET['func'] ) {
	 	case 'setSites':

			$insert = $conn->prepare('INSERT INTO `sites`(`sitename`, `userip`, `datetime`) VALUES (?,?,?)');
			$param = 'sss'; 
			$insert->bind_param($param, $sitename_value, $userip_value, $datetime_value );  
			
			$insert->execute();
			$conn->close();

			$_GET['userip'] = $userip_value;

			echo $_GET['callback']."([".json_encode( $_GET )."])"; 
	 	break;
	 	case 'setUniqs':
			$insert = $conn->prepare('INSERT INTO `uniqs`(`userip`, `datetime`, `site`, `useragent`) 
				VALUES (?,?,?,?)');

			$param = 'ssss'; 

			$insert->bind_param($param, $userip_value,  $datetime_value, $sitename_value, $useragent_value );  
			
			$insert->execute();
			$result = $insert->get_result();
			$conn->close();

			echo $_GET['callback']."([".json_encode( $result )."])"; 
	 	break;
	 	case 'setHistory':
			$insert = $conn->prepare('INSERT INTO `history`(`link`, `datetime`, `userip`) VALUES (?,?,?)');

			$param = 'sss'; 

			$insert->bind_param($param, $sitename_value, $datetime_value, $userip_value );  
			
			$insert->execute();
			$result = $insert->get_result();
			$conn->close();

			echo $_GET['callback']."([".json_encode( $result )."])"; 
	 	break;
	 	default:
	 	break;
	 }
	die;
}elseif(!empty($_GET['callback'])){
	echo $_GET['callback']."([".json_encode(array('response' => 'Ошибка!' ))."])";
}else{
	echo json_encode(array('response' => 'Работает через встраиваемый виджет!' ));
}


