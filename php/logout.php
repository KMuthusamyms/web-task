<?php
SESSION_start();
SESSION_unset();
SESSION_destroy();
$s=array('res'=>1);
print json_encode($s);
?>