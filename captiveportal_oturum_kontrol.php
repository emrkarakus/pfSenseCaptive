<?php
$range=60;
require("functions.inc");
require_once("filter.inc");
require("captiveportal.inc");
$cpzone = "labs";
if (!empty($cpzone)) {
        $database = captiveportal_read_db();
}

$nowtime = time();

foreach ($database as $user) {
echo "{$user[16]}\n";
        if (($nowtime - intval($user[16]) ) > $range ){
                $dbrow = $user;
                captiveportal_disconnect_client($dbrow[5],1,"POPUP-KAPALI");
        }
}
exit;
?>
