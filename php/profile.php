<?php
include_once('conf/conf.php');
session_start();
$email=$_SESSION['logid'];
if(!empty($email)){
$stmt = $conn->prepare("SELECT * FROM userinfo WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if(count($row)>0){
    $row['res']=1;
    $s=$row;
} else {
    $s=array('res'=>0);
}
} else {
    $s=array('res'=>0);
}
print json_encode($s);
?>