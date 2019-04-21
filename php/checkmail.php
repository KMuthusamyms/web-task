<?php
include_once('conf/conf.php');
$email=$_POST['email'];
$stmt = $conn->prepare("SELECT email FROM userinfo WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows>0){
    $s=array('res'=>1);
} else {
    $s=array('res'=>0);
}
print json_encode($s);
?>