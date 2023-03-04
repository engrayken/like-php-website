<?php
require_once("../app/config.php");
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


$name=clean($row['fname']);
$email=clean($row['email']);
//$bvn=clean($row['bvn']);
$token=$row['token'];
echo'please wait';
//reserve account login to monnify api account

//session_start();


//reserve account login to monnify api account

//$clientSecret='TJ7HX8MHYQT2AXAAVELWBUB3XFNBVD89';

$clientSecret='W45X3ABJPLGLQ5W77EUG9EXVJG7XZQ3G'; //test

//$str = 'MK_PROD_6DMHKUCMD4';

$str = 'MK_TEST_M5L6E43SPL:W45X3ABJPLGLQ5W77EUG9EXVJG7XZQ3G'; //real

//$str = 'Hello World!!';
$b64 = base64_encode($str);

//$contractCode='627986244989';

$contractCode='2531279357';



//start login to monify
if ($b64 === false) {
  echo 'Invalid input';
} else {
//  echo $b64; //-> "SGVsbG8gV29ybGQhIQ=="

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://sandbox.monnify.com/api/v1/auth/login/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Basic $b64"
));

 $response = curl_exec($ch);
curl_close($ch);



$resp=json_decode($response);



if($resp->requestSuccessful=='true')
{
$Bearer= $resp->responseBody->accessToken;

//start setup açcount

if($row['bankName']=='0' && $row['customerName']=='0' && $row['accountNumber']=='0')
{


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://sandbox.monnify.com/api/v1/bank-transfer/reserved-accounts");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, '{
  "accountName": "'.$name.'",
  "accountReference": "'.$token.'",
  "currencyCode": "NGN",
  "contractCode": "'.$contractCode.'",
  "customerName": "'.$name.'",
  "customerEmail": "'.$email.'"}');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Bearer $Bearer"
));

 $response = curl_exec($ch);
curl_close($ch);

file_put_contents('v.txt', $response);

$res=json_decode($response);

$customerName=htmlspecialchars($res->responseBody->customerName);




 $accountNumber=htmlspecialchars($res->responseBody->accountNumber);

 $bankName=htmlspecialchars($res->responseBody->bankName);


if($res->requestSuccessful=='true')
{

 $ref=$row['token'];

/*
$bankName1 = mysqli_query($dbc, "UPDATE users SET bankName='$bankName' WHERE email='$email' ");

$customerName1 = mysqli_query($dbc, "UPDATE users SET customerName='$customerName' WHERE email='$email' ");


$accountNumber1 = mysqli_query($dbc, "UPDATE users SET accountNumber='$accountNumber' WHERE email='$email' ");



$reference = mysqli_query($dbc, "UPDATE users SET reference='$ref' WHERE email='$email' "); */


$bankName1 =$dbc->prepare("UPDATE users SET bankName= ? WHERE email= ? ");
$bankName1->bind_param("ss", $bankName, $email);
$bankName1->execute();
$bankName1->close();


$customerName1 =$dbc->prepare("UPDATE users SET customerName= ? WHERE email= ? ");
$customerName1->bind_param("ss", $customerName, $email);
$customerName1->execute();
$customerName1->close();




$accountNumber1 =$dbc->prepare("UPDATE users SET accountNumber= ? WHERE email= ? ");
$accountNumber1->bind_param("ss", $accountNumber, $email);
$accountNumber1->execute();
$accountNumber1->close();



$reference =$dbc->prepare("UPDATE users SET reference= ? WHERE email= ? ");
$reference->bind_param("ss", $ref, $email);
$reference->execute();
$reference->close();



if($bankName1!='' && $customerName1!='' && $accountNumber1!='' && $reference!='')
{
echo'<script>window.location="billing";</script>';

}


}

}

else {
echo' <div class="card card-body"><h5>error occure while creating account</h5><a href="billing"><h2>Back</h2></a></div>';
}// end setup


}



} // end login to monify

?>