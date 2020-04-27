<?php
include __DIR__ . '/include/inc.common.php';

checkLogin();
checkPriv('L');

$aAssign['list'] = listBoard($conn);

include __DIR__ . '/template/page.list.php';
