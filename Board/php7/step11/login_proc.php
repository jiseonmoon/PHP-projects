<?php
session_start();

$user_id = $_GET['user_id'];

switch ($user_id) {
	case 'admin':
		$_SESSION['user_id'] = 'admin';
		$_SESSION['priv']	 = 'LRW';
		break;

	case 'user':
		$_SESSION['user_id'] = 'user';
		$_SESSION['priv']	 = 'LR';
		break;

	case 'guest':
		$_SESSION['user_id'] = 'guest';
		$_SESSION['priv']	 = 'L';
		break;
}

Header('Location: ./');
