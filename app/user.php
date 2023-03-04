<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
$func=$_GET['id'];
if($func=='subscribe'){
	subscribe();
}else if($func=='validate'){
	validate();
}else if($func=='message'){
	message();
}else if($func=='login'){
	user_login();
}else if($func=='register'){
	user_reg();
}else if($func=='depositinsert'){
	user_depositinsert();
}else if($func=='resetpass'){
	user_reset();
}else if($func=='referral'){
	user_referral();
}else if($func=='profile'){
	user_profile();
}else if($func=='bank'){
	user_bank();
}else if($func=='kyc'){
	user_kyc();
}else if($func=='addstatus'){
	user_status();
}else if($func=='password'){
	user_password();
}else if($func=='review'){
	user_review();
}else if($func=='logout'){
	user_logout();
}else if($func=='ticket'){
	user_ticket();
}else if($func=='replyticket'){
	user_replyticket();
}else if($func=='plan'){
	user_plan();
}else if($func=='pay'){
	user_pay();
}else if($func=='mpay'){
	user_mpay();
}else if($func=='forgot'){
	user_forgot();
}else if($func=='wallet'){
	user_wallet();
}else if($func=='withdraw'){
	user_withdraw();
}else if($func=='ufund'){
	ufund();
}else if($func=='sendfund'){
	send_fund();
}else if($func=='norder'){
	order_product();
}else if($func=='order'){
	create_order();
}else if($func=='dr'){
	$del=$_GET['del'];
	user_dr($del);
}else if($func=='delete_ticket'){
	$del=$_GET['del'];
	user_deleteticket($del);
}else if($func=='doffer'){
	$del=$_GET['del'];
	user_doffer($del);
}else if($func=='sendver'){
	$del=$_GET['del'];
	$token=$_GET['status'];
	user_verification($del, $token);
}else if($func=='confirm'){
	$del=$_GET['del'];
	user_confirm($del);
}else if($func=='process'){
	$user =$_GET['user'];
	$profit_id =$_GET['profit_id'];
	$amount =$_GET['amount'];
	user_profit($user, $profit_id, $amount);
}



function user_reset(){
	require_once("config.php");
	session_start();
	$passs=mysqli_escape_string($dbc,$_POST['password']);

$pass = addslashes($passs);
	$token=mysqli_escape_string($dbc,$_POST['token']);
	$password=password_hash($pass, PASSWORD_DEFAULT);
//	$castro=mysqli_query($dbc, "UPDATE users SET password='$password' WHERE token='$token'");
 $castro=$dbc->prepare("UPDATE users SET password= ? WHERE token= ?");
 $castro->bind_param("ss", $password, $token);
 $castro->execute();
 $castro->close();

	$_SESSION['bitcrow_loginerror']='success';
	//redirect($url."/login");
	echo"<script>window.location.href='".$url."/login';</script>";
}

function user_logout(){
	require_once("config.php");
	session_start();
	  //session_destroy();
	unset($_SESSION['bitcrow_userid']);
unset($_SESSION['bitcrow_password']);
	unset($_SESSION['bitcrow_loginerror']);
	unset($_SESSION['bitcrow_regerror']);
	unset($_SESSION['bitcrow_forgoterror']);
	unset($_SESSION['bitcrow_userhome']);
	unset($_SESSION['bitcrow_limit']);
	unset($_SESSION['bitcrow_pending']);
	unset($_SESSION['bitcrow_insufficient']);
	unset($_SESSION['bitcrow_offer']);
	unset($_SESSION['password']);
	unset($_SESSION['bitcrow_status']);
	//redirect($url."/login");
	echo"<script>window.location.href='".$url."/login';</script>";
}




function user_password(){
	require_once("config.php");
	$iuser_id=mysqli_real_escape_string($dbc, trim($_POST['user_id']));

$user_id=(int)$iuser_id;
	$soldpass=mysqli_escape_string($dbc,$_POST['oldpassword']);
$oldpass=addslashes($soldpass);
	$snewpass=mysqli_escape_string($dbc,$_POST['newpassword']);

$newpass=addslashes($snewpass);
	$sconpass=mysqli_escape_string($dbc,$_POST['confirmpassword']);

$conpass=addslashes($sconpass);
	//$user=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM users WHERE id='$user_id'"));

$userv=$dbc->prepare("SELECT * FROM users WHERE id= ?");
$userv->bind_param("i", $user_id);
$userv->execute();
$result = $userv->get_result();
$user = $result->fetch_assoc(); 
$userv->close();

	if($oldpass!='' && password_verify($oldpass, $user['password'])){
		if($newpass==$conpass){
			$password=password_hash($newpass, PASSWORD_DEFAULT);
			//mysqli_query($dbc, "UPDATE users SET password='$password' WHERE id='".$user_id."'");

$up=$dbc->prepare("UPDATE users SET password=? WHERE id= ?");
$up->bind_param("si", $password, $user_id);
$up->execute();
$up->close();
			session_start();
			unset($_SESSION['bitcrow_userid']);
			unset($_SESSION['password']);
			$_SESSION['bitcrow_loginerror']="eruptx";
			echo"<script language='javascript'>document.location='../../login';</script>";
		}else{
			echo "<script>window.location.href='".$url."/user/security/2';</script>";
		}
	}else{
		echo "<script>window.location.href='".$url."/user/security/1';</script>";
	}
}




function user_profile(){
	require_once("config.php");
	$iuser_id=mysqli_real_escape_string($dbc, trim($_POST['user_id']));

$user_id=(int)$iuser_id;
	$name=addslashes(mysqli_real_escape_string($dbc, trim($_POST['name'])));
//$name=addslashes($sname);

$sbname=mysqli_real_escape_string($dbc, trim($_POST['bname']));
$bname=addslashes($sbname);

$sbvn=mysqli_real_escape_string($dbc, trim($_POST['bvn']));

$bvn=addslashes($sbvn);
	$susername=mysqli_real_escape_string($dbc, trim($_POST['username']));
$username=addslashes($susername);
	$smobile=mysqli_real_escape_string($dbc, trim($_POST['mobile']));

$mobile=addslashes($smobile);

	//$castro=mysqli_query($dbc,"UPDATE users SET username='$username',name='$name',bname='$bname', bvn='$bvn',bvn_status='1', phonenumber='$mobile' WHERE id ='$user_id'");

$bvn_status=1;
$castro=$dbc->prepare("UPDATE users SET username= ?, name= ?, bname= ?, bvn= ?, bvn_status= ?, phonenumber= ? WHERE id = ?");
$castro->bind_param("sssiiii", $username, $name, $bname, $bvn, $bvn_status, $mobile, $user_id);
$castro->execute();

	if($castro->affected_rows>0){echo "<script>window.location.href='".$url."/user/profile/1';</script>";}
	else{echo "<script>window.location.href='".$url."/user/profile/2';</script>";}
$castro->close();

}
function user_login(){
	session_start();
	require_once("config.php");
//	require '../lib/phpmailer/PHPMailerAutoload.php';
	define("RECAPTCHA_V3_SECRET_KEY",$set['skey']);
  $token = filter_input(INPUT_POST,'gtoken', FILTER_SANITIZE_STRING);



	$femail=mysqli_escape_string($dbc,$_POST['email']);

if(!filter_var($femail,FILTER_VALIDATE_EMAIL))
{
$_SESSION['bitcrow_loginerror']='invaliddetails';		
		//redirect($url."/login");
		echo"<script>window.location.href='".$url."/login';</script>";
}

$email=addslashes($femail);
	$fpassword=mysqli_escape_string($dbc,$_POST['password']);

$password=addslashes($fpassword);

$ye_ran=mysqli_escape_string($dbc,$_POST['ye_ran']);

 $ll=mysqli_escape_string($dbc,$_POST['ll']);

//$password=$xxpassword.$ye_ran;
	//$row=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM users WHERE email='$email'"));

 
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
 $arrResponse = json_decode($response, true);
  
// verify the response

//  if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $ye_ran && $arrResponse["score"] >= 0.5) {
// //     // valid submission

//echo $arrResponse["action"];
	$ip_address=user_ip();

	//echo $email;
$stmt = $dbc->prepare("SELECT * FROM users WHERE email =?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if($result->num_rows>0) {
//fetching result would go here, but will be covered later

$row = $result->fetch_assoc(); 



	//if(mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM users WHERE email='$email'"))>0){
   
	// 	if($ip_address!=$row['ip_address'] & $eset['status']==1){
	//  require_once '../lib/mail/login_attempt.php';
	// $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	// $mail->SMTPDebug = 0;                                
	// $mail->isSMTP();                                      
	// $mail->Host = $eset['hoste'];; 
	// $mail->SMTPAuth = true;                        
	// $mail->Username = $eset['username'];                 
	// $mail->Password = $eset['password'];                          
	// $mail->SMTPSecure = 'ssl';                            
	// $mail->Port = $eset['porte'];                                    
	// $mail->setFrom($eset['frome'], $set['site_name']);
	// $mail->addAddress($email, $set['site_name']);          
	// $mail->addReplyTo($eset['reply_to'], $set['site_name']);
	// $mail->isHTML(true);                               // Set email format to HTML
	// $mail->Subject = 'Suspicious Login Attempt';
	// $mail->Body=$email_content;
	// $mail->AltBody = $set['site_name'];
	// $mail->send();
	// } 
	//echo $row['email'];
		if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $ll!="" && $arrResponse["action"] ==$ye_ran && $arrResponse["score"] >= 0.5 && password_verify($password, $row['password']) && $email==$row['email']) // && $ll==$_SESSION['goch'] && $arrResponse["action"] == $ye_ran
		{
			// if($row['status']==1){
			
			// 		$attempt="";
			// 	//update user and attempt login
			// 	$update=$dbc->prepare("UPDATE users SET attempt= ?  WHERE id= ?");
			// 	$update->bind_param("si", $attempt, $row['id']);
			// 	$update->execute();
			// 	$update->close();
					
			// 		$_SESSION['bitcrow_loginerror']='blockeduser';	
			// 	//redirect($url."/login");
			// 	echo"<script>window.location.href='".$url."/login';</script>";

			// 	}else{
				$_SESSION['bitcrow_userid']=$row['id'];
				$_SESSION['bitcrow_password']=$row['password'];
				$_SESSION['bitcrow_status']="";
				
	
				
// 				$update=$dbc->prepare("UPDATE users SET last_login= ?  WHERE id= ?");
// $update->bind_param("si", $datetime, $row['id']);
// $update->execute();
// $update->close();

//mysqli_query($dbc,"UPDATE users SET last_login='$datetime' WHERE id='".$row['id']."'");

	//	redirect($url."/user");
	echo"<script>window.location.href='".$url."/dashboard';</script>";
		//	}
		
		

} else {
	 $_SESSION['bitcrow_loginerror']='invaliddetails';

	echo"<script>window.location.href='".$url."/login';</script>";
	$_SESSION['bitcrow_status']="";
}
} else{
	$_SESSION['bitcrow_loginerror']='invaliddetails';

	echo"<script>window.location.href='".$url."/login';</script>";
	$_SESSION['bitcrow_status']="";

}
// } else{

// 	$_SESSION['bitcrow_loginerror']='invaliddetails';

// 	echo"<script>window.location.href='".$url."/login';</script>";
// 	$_SESSION['bitcrow_status']="";	
// }
}


function user_reg(){
	session_start();
	require_once("config.php");
//	require_once('../lib/geoplugin.class.php');
		define("RECAPTCHA_V3_SECRET_KEY",$set['skey']);
  $chtoken = filter_input(INPUT_POST,'gtoken', FILTER_SANITIZE_STRING);
	
//	$geoplugin = new geoPlugin();
//	$geoplugin->locate();
//	$username=addslashes(mysqli_escape_string($dbc,$_POST['username']));
	$femail=addslashes(mysqli_escape_string($dbc,$_POST['email']));
if(!filter_var($femail, FILTER_VALIDATE_EMAIL))
{
$_SESSION['bitcrow_regerror']='invalid';		
//echo'page 647';
	//	redirect($url."/register");
	echo"<script>window.location.href='".$url."/register';</script>";


} else{

 $email=$femail;
	$name=addslashes(mysqli_escape_string($dbc,$_POST['name']));

//$countryName=addslashes(mysqli_escape_string($dbc,$_POST['country']));
	$pass=addslashes(mysqli_escape_string($dbc,$_POST['password']));
	$password=password_hash($pass, PASSWORD_DEFAULT);
	$ip_address=user_ip();
	//$mobile=mysqli_escape_string($dbc,$_POST['format-international-phone']);
}
	
	$ye_ran=mysqli_escape_string($dbc,$_POST['ye_ran']);
	$ll=mysqli_escape_string($dbc,$_POST['ll']);

	$token = round(microtime(true));

// if(!filter_var($mobile, FILTER_SANITIZE_NUMBER_INT))
// {
// $_SESSION['bitcrow_regerror']='invalid';		
// 	//echo $reg->error;	
// //echo'pge 665';
// //redirect($url."/register");
// echo"<script>window.location.href='".$url."/register';</script>";
// }


//	$bal=$set['balance_reg'];
	// if(empty($_POST['news'])){
	// 	$promo=0;
	// }else{
	// 	$promo=1;
	// }
//	$country=$countryName;
// 	while(1){
// 	$token = round(microtime(true));
// if($country==''){
// $country='Nigeria';
// }
	//if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users WHERE token = $token")) < 1){ break;} 

// $sl=$dbc->prepare("SELECT * FROM users WHERE token = ?");
// $sl->bind_param("i", $token);
// $sl->execute();
// $sll=$sl->get_result();

// if($sll->num_rows<1) { break;} 
// $sl->close(); 


	
	
	
	//echo $email;
 
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $chtoken)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
 $arrResponse = json_decode($response, true);
  
// verify the response

if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $ye_ran && $arrResponse["score"] >= 0.5) {
    // valid submission
	
	
/*check authentication.
$confirm_auto=mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM auto WHERE (code='$auto')"));
	if($confirm_auto>0){ */
	//$confirm=mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users WHERE (username='$username') OR (email='$email') OR (phonenumber='$mobile')"));
	
$fconfirm=$dbc->prepare("SELECT * FROM users WHERE email= ?");
$fconfirm->bind_param("s",$email);
$fconfirm->execute();
//echo $username;

$confirm=$fconfirm->get_result();
$fconfirm->close(); 
//echo $confirm->num_rows;

	if($confirm->num_rows>0)
	{ 
		$_SESSION['bitcrow_regerror']='invaliddetails';
		//redirect($url."/register");
		echo"<script>window.location.href='".$url."/register';</script>";
//echo'user name or email or phone exit';

	}
	else if($confirm->num_rows<1 && $arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $ye_ran && $arrResponse["score"] >= 0.5 && $ll!=''){

		if ($set['email_activation']==1 & $eset['status']==1) {	
		    
		//    file_get('test.txt', 'jffjf');

//$reg=mysqli_query($dbc,"INSERT INTO users (id,date,username,image_link,email,name,dep_balance,bit_balance,password,phonenumber,country,status,active,token,ip_address,last_login,kyc_link,kyc_status,add_link,add_status,promotional_emails) VALUES(0, '$datetime','$username', '', '$email', '$name', '$bal', '0', '$password', '$mobile', '$country', '0', '0', '$token', '$ip_address', '', '', '0', '', '0', '$promo')");

$reg=$dbc->prepare("INSERT INTO user (date,email,fname,password,token) VALUES(?, ?, ?, ?, ?)");
$reg->bind_param("sssss", $datetime,$email, $name, $password, $token);
$reg->execute();
//echo $reg->affected_rows;
	
if($reg->affected_rows>0){
				//redirect($url."/app/user?id=sendver&del=1&status=".$token);
		//		echo"<script>window.location.href='".$url."/app/user?id=sendver&del=1&status=".$token."</script>";

echo"<script>window.location.href='".$url."/app/user?id=sendver&del=1&status=$token';</script>";

//echo'the detail wasnt affected';

//sleep(1); header( "location: $url/app/user?id=sendver&del=1&status=$token" ); 

//$del=mysqli_query($dbc,"DELETE FROM auto WHERE code = '$auto'"); 


			} 
$reg->close();
		}		
		else if ($set['email_activation']==0) {
			//$reg=mysqli_query($dbc,"INSERT INTO users (id,date,username,image_link,email,name,dep_balance,bit_balance,password,phonenumber,country,status,active,token,ip_address,last_login,kyc_link,kyc_status,add_link,add_status,promotional_emails) VALUES(0,'$datetime','$username', '', '$email', '$name', '$bal', '0', '$password','$mobile','$country','0','1','$token','$ip_address', '', '', '0', '', '0', '$promo')");

$active=1;
$reg=$dbc->prepare("INSERT INTO user (date,email,fname,password,token) VALUES(?, ?, ?, ?, ?)");
$reg->bind_param("sssss", $datetime, $email, $name, $password,$token);
$reg->execute();



//echo $reg->error;
			if($reg->affected_rows>0){

//
//$del=mysqli_query($dbc,"DELETE FROM auto WHERE code = '$auto'"); 
				$_SESSION['bitcrow_status']='success';
	//echo'page 762';			
//redirect($url."/login");
  echo"<script>window.location.href='".$url."/login';</script>";

//sleep(1);
//header( "location: $url/login" ); 
			} 
$reg->close();
		} 
//} 

} else {

$_SESSION['bitcrow_regerror']='invaliddetails';

//echo'page 775';
		//redirect($url."/register");\
		echo"<script>window.location.href='".$url."/register';</script>";
	}
//} else{ $_SESSION['bitcrow_regerror']='invalid';		

// echo"<script>window.location.href='".$url."/register';</script>";
 } else{

	$_SESSION['bitcrow_regerror']='invaliddetails';

	//echo'page 775';
			//redirect($url."/register");\
			echo"<script>window.location.href='".$url."/register';</script>";

 } //end captcha

	
}
 


function user_forgot(){
	session_start();
	require_once("config.php");
	$email=addslashes(mysqli_escape_string($dbc,$_POST['email']));

$ye_ran=mysqli_escape_string($dbc,$_POST['ye_ran']);

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{ $_SESSION['bitcrow_forgoterror']='invaliddetails';
//redirect($url."/forgot");
echo"<script>window.location.href='".$url."/forgot';</script>";
}

if($ye_ran!=$_SESSION['logieeee'])
{
 $_SESSION['bitcrow_forgoterror']='invaliddetails';
//redirect($url."/forgot");	
echo"<script>window.location.href='".$url."/forgot';</script>";

}

	//if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users WHERE email='$email'"))>0)
$n=$dbc->prepare("SELECT * FROM users WHERE email= ?");
$n->bind_param("s", $email);
$n->execute();
$nn=$n->get_result();
$n->close();
if($nn->num_rows>0)
{
		$token = round(microtime(true));

//mysqli_query($dbc, "UPDATE users SET token='$token' WHERE email='$email'");

$upi=$dbc->prepare("UPDATE users SET token= ? WHERE email= ?");
$upi->bind_param("is", $token, $email);
$upi->execute();
$upi->close();

require_once "../lib/mail/forgot_password.php";
		require '../lib/phpmailer/PHPMailerAutoload.php';
		if($eset['status']==1){
			$mail = new PHPMailer(true);                             // Passing `true` enables exceptions
			$mail->SMTPDebug = 0;                                
			$mail->isSMTP();                                      
			$mail->Host = $eset['hoste'];; 
			$mail->SMTPAuth = true;                        
			$mail->Username = $eset['username'];                 
			$mail->Password = $eset['password'];                          
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = $eset['porte'];                                    
			$mail->setFrom($eset['frome'], $set['site_name']);
			$mail->addAddress($email, $set['site_name']);          
			$mail->addReplyTo($eset['reply_to'], $set['site_name']);
			$mail->isHTML(true);                                 
			$mail->Subject = "Password Recovery";
			$mail->Body=$email_content;
			$mail->AltBody = $set['site_name'];
			if($mail->send()){
				$_SESSION['bitcrow_forgoterror']='success';
			}else{
				$_SESSION['bitcrow_forgoterror']='eruptx';
			}			
		}else{
			$_SESSION['bitcrow_forgoterror']='eruptx';
		}
	}else{
		$_SESSION['bitcrow_forgoterror']='invaliddetails';
	}
	//redirect($url."/forgot");
	echo"<script>window.location.href='".$url."/forgot';</script>";
}



function user_verification($del,$token){
	
	require_once("config.php");
	session_start();
	$reg=$token;
	//$ad= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE token ='".$reg."'" ));
	$ade=$dbc->prepare("SELECT * FROM user WHERE token = ?");
	$ade->bind_param("i", $reg);  
	$ade->execute();
	$adee=$ade->get_result();
	$ad=$adee->fetch_assoc();
	$ade->close();
	
	
	$status=$del;
	// 
	// require '../lib/phpmailer/PHPMailerAutoload.php';


	if($eset['status']==1){
		require_once '../hopeforce/reg_ver.php';
require '..\hopeforce\vendor\autoload.php';
		$mail = new PHPMailer(true);                    
		$mail->SMTPDebug = 0;                                
		$mail->isSMTP();                                      
		$mail->Host = $eset['hoste'];; 
		$mail->SMTPAuth = true;                        
		$mail->Username = $eset['username'];                 
		$mail->Password = $eset['password'];                          
		$mail->SMTPSecure = 'ssl';                            
		$mail->Port = $eset['porte'];                                    
		$mail->setFrom($eset['frome'], $set['site_name']);
		$mail->addAddress($ad['email'], $set['site_name']);          
		$mail->addReplyTo($eset['reply_to'], $set['site_name']);
		$mail->isHTML(true);               
		$mail->Subject = 'Account Verification';
		$mail->Body=$email_content;
		$mail->AltBody = $set['site_name'];
		if($mail->send()){
			if($status==2){
				$_SESSION['bitcrow_userhome']='email_versent';
				redirect($url."/user");
			}else if($status==1){
				$_SESSION['bitcrow_loginerror']='email_versent';
				redirect($url."/login");
			}
		}else{
			if($status==2){
				$_SESSION['bitcrow_userhome']='email_verfailed';
				redirect($url."/user");
			}else if($status==1){
				$_SESSION['bitcrow_loginerror']='email_verfailed';
				redirect($url."/login");
			}
		}
	}else{
		if($status==2){
			$_SESSION['bitcrow_userhome']='email_verfailed';
			redirect($url."/user");
		}else if($status==1){
			$_SESSION['bitcrow_loginerror']='email_verfailed';
			redirect($url."/login");
		}
	}
}

function user_confirm($del){
	require_once("config.php");
	session_start();
	$token=$del;
	//$ad= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE token ='".$token."'" ));
		$ade=$dbc->prepare("SELECT * FROM user WHERE token = ?");
	$ade->bind_param("i", $token);  
	$ade->execute();
	$adee=$ade->get_result();
	$ad=$adee->fetch_assoc();
	$ade->close();
	
	$active=1;
	
// $update=$dbc->prepare("UPDATE users SET active= ? WHERE token= ?");
// $update->bind_param("is", $active, $token);
// $update->execute(); 
// $update->close();

$aden=$dbc->prepare("SELECT * FROM users WHERE token = ?");
$aden->bind_param("i", $token);  
$aden->execute();
$adene=$aden->get_result();
$adn=$adene->fetch_assoc();
$aden->close();



if($adn['token']!=$token && $ad['token']==$token){


	$aden=$dbc->prepare("SELECT * FROM users WHERE email = ?");
$aden->bind_param("s", $ad['email']);  
$aden->execute();
$adene=$aden->get_result();
$adn=$adene->fetch_assoc();
$aden->close();

if($adn['email']!=$ad['email']){

$reg=$dbc->prepare("INSERT INTO users (date,email,fname,password,token) VALUES(?, ?, ?, ?, ?)");
$reg->bind_param("sssss", $ad['date'],$ad['email'], $ad['fname'], $ad['password'], $token);
$reg->execute();
//echo $reg->affected_rows;
	
if($reg->affected_rows>0){
	$del=mysqli_query($dbc,"DELETE FROM user WHERE token =$token");

		$_SESSION['bitcrow_loginerror']='email_confirm';
		redirect($url."/login");
	
	}
}else {
	$_SESSION['bitcrow_loginerror']='email_confirmed';
	//echo $_SESSION['bitcrow_loginerror'];
		redirect($url."/login");
}

}else {
	$_SESSION['bitcrow_loginerror']='email_confirm';
		redirect($url."/login");
}

}