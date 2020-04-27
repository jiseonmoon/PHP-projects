<?php
include __DIR__ . '/include/inc.common.php';

checkLogin();
checkPriv('R');

$no        = $_GET['no'];

$aAssign['view'] = getBoard($conn, $no);

$templateFile = 'content.view.php';
include __DIR__ . '/template/page.view.php';
