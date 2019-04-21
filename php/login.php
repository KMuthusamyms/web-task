<?php
include_once('conf/conf.php');
session_start();
$email=$_POST['email'];
$password=md5($_POST['pwd']);
$stmt = $conn->prepare("SELECT id FROM userauth WHERE email=? and password=?");
$stmt->bind_param("ss", $email,$password);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows>0){
    $s=array('res'=>1);
    $_SESSION['logid']=$email;
} else {
    $s=array('res'=>0);
    unset($_SESSION['logid']);
}
print json_encode($s);
?>