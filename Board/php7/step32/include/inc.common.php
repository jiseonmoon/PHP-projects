<?php
session_start();

header('Cache-Control: no-cache, must-revalidate'); //HTTP 1.1
header('Pragma: no-cache'); //HTTP 1.0
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past

$db_host    = "localhost";
$db_user    = "scott";
$db_pass    = "tiger";
$db_name    = "DB_SIM_TRK";

$conn   = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('cannot connect to mysql.');
mysqli_set_charset($conn, "utf8");

include __DIR__ . '/inc.function.php';
include __DIR__ . '/../classes/Board.class.php';

$appRootPath = getAppRootPath(__DIR__, $_SERVER['DOCUMENT_ROOT']);
$appTemplatePath = $_SERVER['DOCUMENT_ROOT'] . $appRootPath . '/' . 'template';

function getAppRootPath($pathInclude, $pathDcoRoot)
{
    $pathInclude = str_replace('\\', '/', $pathInclude);
    $appRootPath = str_replace($pathDcoRoot, '', $pathInclude);
    return str_replace('/include', '',  $appRootPath);
}
