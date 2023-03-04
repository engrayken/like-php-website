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
  $_SESSION['status']="failed2718";

}
else{

  define("RECAPTCHA_V3_SECRET_KEY",$set['skey']);


 

$tranusr=$dbc->prepare("SELECT * FROM payment WHERE trans_id= ?");
$tranusr->bind_param("s", $_GET['kpcdmvsg']);
$tranusr->execute();
$tranuser=$tranusr->get_result();
$tran=$tranuser->fetch_assoc();
$tranusr->close();

$chtoken =$tran['gtoken'];

// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $chtoken)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
 $arrResponse = json_decode($response, true);


if($tran['trans_id']!=$_GET['kpcdmvsg'] || $tran['status']!="pending")
{
	echo'<script>window.location="billing?status=failed";</script>';
	$_SESSION['status']="failed2718";
}
else if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $tran['ll'] && $arrResponse["score"] >= 0.5 && $tran['trans_id']==$_GET['kpcdmvsg'] && $tran['status']=='pending'){


  $curl = curl_init();
 
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$_GET['kpcdmvsg'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ".$set['bit_wallet'],
      "Cache-Control: no-cache",
    ),
  ));
 
  $response = curl_exec($curl);
  $err = curl_error($curl);

 
//   if ($err) {
//     echo "cURL Error #:" . $err;
//   } else {
//     echo $response;
//   }


 // $kk='{"status":true,"message":"Verification successful","data":{"id":2494048451,"domain":"test","status":"success","reference":"1675250583","amount":700,"message":null,"gateway_response":"Successful","paid_at":"2023-02-01T11:23:41.000Z","created_at":"2023-02-01T11:23:33.000Z","channel":"card","currency":"NGN","ip_address":"105.112.56.34","metadata":{"custom_fields":[{"display_name":"Ayogu Kenneth","value":"1675250583"}],"referrer":"http://localhost/likeground.com/billing?"},"log":{"start_time":1675250609,"time_spent":8,"attempts":1,"errors":0,"success":true,"mobile":false,"input":[],"history":[{"type":"action","message":"Attempted to pay with card","time":6},{"type":"success","message":"Successfully paid with card","time":8}]},"fees":11,"fees_split":null,"authorization":{"authorization_code":"AUTH_3bhfm5ybsx","bin":"408408","last4":"4081","exp_month":"12","exp_year":"2030","channel":"card","card_type":"visa ","bank":"TEST BANK","country_code":"NG","brand":"visa","reusable":true,"signature":"SIG_i7hgrreTPipFPX39TfJB","account_name":null,"receiver_bank_account_number":null,"receiver_bank":null},"customer":{"id":79734125,"first_name":"","last_name":"","email":"kennethayogu@gmail.com","customer_code":"CUS_tamx2gej2qosp65","phone":"","metadata":null,"risk_action":"default","international_format_phone":null},"plan":null,"split":{},"order_id":null,"paidAt":"2023-02-01T11:23:41.000Z","createdAt":"2023-02-01T11:23:33.000Z","requested_amount":700,"pos_transaction_data":null,"source":null,"fees_breakdown":null,"transaction_date":"2023-02-01T11:23:33.000Z","plan_object":{},"subaccount":{}}}';
	$kkk=json_decode($response);


	 $status=$kkk->data->status;
	  $total=$kkk->data->amount/100;
	  $paid_at=substr($kkk->data->paid_at, 0, 10);
	 $link=$kkk->data->metadata->referrer;
	 $trans_id=$kkk->data->reference;

	
	 if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $tran['ll'] && $arrResponse["score"] >= 0.5 && $tran['trans_id']==$_GET['kpcdmvsg'] && $trans_id==$tran['trans_id'] && $tran['status']=='pending' && $status!='paid' && $status=='success' && $paid_at==$tran['date'] && $total==$tran['total'] && $link==$tran['link']){

  //  ($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $temp_ran && $arrResponse["score"] >= 0.5	
		//echo'<script>window.location="billing?status=failed";</script>';
	
		 $link=$kkk->data->metadata->referrer;
		$paid='paid';
$referenceup =$dbc->prepare("UPDATE payment SET status= ? WHERE trans_id= ?");
$referenceup->bind_param("ss", $paid, $trans_id);
$referenceup->execute();
$referenceup->close();


$referenceupe =$dbc->prepare("UPDATE payment SET rstatus= ? WHERE trans_id= ?");
$referenceupe->bind_param("ss", $response, $trans_id);
$referenceupe->execute();
$referenceupe->close();


$user_id=$row['id'];

$b=$row['bal']+$total;
// $a=$row['bal']+$total;
//mysqli_query($dbc,"UPDATE users SET dep_balance='$b' WHERE id='$user_id' "); 
$usersb=$dbc->prepare("UPDATE users SET bal= ? WHERE id= ?"); 
$usersb->bind_param("ii", $b, $user_id);
$updateusersb =$usersb->execute();
$usersb->close();

echo'<script>window.location="billing?status=successs";</script>';
$_SESSION['status']="successs2718";


	 } else{

		echo'<script>window.location="billing?status=failed";</script>';

		$_SESSION['status']="failed2718";
	
	 }

	 
 curl_close($curl);

  }
}?>