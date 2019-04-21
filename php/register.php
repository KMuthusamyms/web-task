<?php
include_once('conf/conf.php');
include_once('json.php');
session_start();
$fname=$_POST['fname'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$pwd=md5($_POST['pwd']);
$dob=$_POST['dob'];
$gen=$_POST['gen'];
$lang=$_POST['lang'];
$stmt = $conn->prepare("INSERT INTO `userinfo`(`fullname`, `email`, `phonenumber`, `gender`, `dob`, `language`) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("ssssss", $fname,$email,$phno,$gen,$dob,$lang);
if($stmt->execute()){
    $id=$stmt->insert_id;
    $st = $conn->prepare("INSERT INTO `userauth`(`id`, `email`, `password`, `active`) VALUES (?,?,?,?)");
    $act=1;
    $st->bind_param("ssss", $id,$email,$pwd,$act);
    if($st->execute()){
        $s=array('res'=>1);
        $userinfo=array('id'=>$id,'fullname'=>$fname,'email'=>$email,'phonenumber'=>$phno,'gender'=>$gen,'dob'=>$dob,'language'=>$lang);
        $userauth=array('id'=>$id,'email'=>$email,'password'=>$pwd,'active'=>$act);
        jsonappend($userinfo,$userauth);
    } else {
        $s=array('res'=>0);
    }
} else {
    $s=array('res'=>0);
}
print json_encode($s);
?>