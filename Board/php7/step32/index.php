<?php
include __DIR__ . '/include/inc.common.php';

$aModes = array('index', 'list', 'view', 'priv', 'login');

$mode = 'index';
if (array_key_exists('mode', $_GET))
    $mode = trim($_GET['mode']);

if (!in_array($mode, $aModes))
    $mode = 'index';

if ($mode == 'index') {
    $templateFile = 'content.index.php';
} else if ($mode == 'priv') {
    $templateFile = 'content.priv.php';
} else if ($mode == 'login') {
    $templateFile = 'content.login.php';
} else if ($mode == 'list') {
    checkLogin();
    checkPriv('L');
    $oBoard = new Board($conn);
    $aAssign['list'] = $oBoard->listBoard();
    $templateFile = 'content.list.php';
} else if ($mode == 'view') {
    checkLogin();
    checkPriv('R');
    $no        = $_GET['no'];
    $oBoard = new Board($conn);
    $aAssign['view'] = $oBoard->getBoard($no);
    $templateFile = 'content.view.php';
}

include __DIR__ . '/template/layout.default.php';
