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
  $closed="closed";
  $castro=$dbc->prepare("UPDATE payment SET status= ? WHERE trans_id= ?");
  $castro->bind_param("ss", $closed, $_POST['view']);
  $castro->execute();
  $castro->close();

}
    ?>