<?php
require'../app/config.php'; 
session_start();

if($_SESSION['bitcrow_userid']=='' && $_SESSION['bitcrow_password']==''){echo "<script>window.location.href='".$url."/login';</script>";}


$rowusr=$dbc->prepare("SELECT * FROM users WHERE id= ?");
$rowusr->bind_param("i", $_SESSION['bitcrow_userid']);
$rowusr->execute();
$rowuser=$rowusr->get_result();
$row=$rowuser->fetch_assoc();
$rowusr->close();

if($_SESSION['bitcrow_password']!=$row['password'] && $_SESSION['bitcrow_userid']!=$row['id']){
  echo "<script>window.location.href='".$url."/login';</script>";

}
else{
$user_id=$_POST['user_id'];
$paydate=$_POST['paydate'];
$amount=$_POST['amount'];
$trans_id=$_POST['trans_id'];
$link=$_POST['links'];
$gtoken=$_POST['gtoken'];
$ll=$_POST['ll'];
$method="card";
$status="pending";

//$_SESSION['trans_id']=$_POST['trans_id'];

    $sto =$dbc->prepare("INSERT INTO payment (user_name,user_id,date,status,total,trans_id,link,gtoken,ll,method) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sto->bind_param("ssssssssss", $row['fname'], $user_id, $paydate, $status, $amount, $trans_id,$link,$gtoken,$ll,$method);
    $sto->execute();
    //echo $sto->error;
    $sto->close();

   // file_put_contents('v.txt', $gtoken);
}
    ?>