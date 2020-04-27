<?php
include __DIR__ . '/include/inc.common.php';

checkLogin();
checkPriv('L');

$aAssign['list'] = listBoard($conn);

$templateFile = 'content.list.php';
include __DIR__ . '/template/page.list.php';
