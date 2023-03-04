<?php require'../app/config.php'; 
session_start();

define("RECAPTCHA_V3_SECRET_KEY",$set['skey']);

$chtoken = filter_input(INPUT_POST,'gtoken', FILTER_SANITIZE_STRING);

// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $chtoken)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
 $arrResponse = json_decode($response, true);
  
// // verify the response

// if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $temp_ran && $arrResponse["score"] >= 0.5) {
//     // valid submission



if($_SESSION['bitcrow_userid']=='' && $_SESSION['bitcrow_password']==''){echo "<script>window.location.href='".$url."/login';</script>";} 
else{

    $rowusr=$dbc->prepare("SELECT * FROM users WHERE id= ?");
    $rowusr->bind_param("i", $_SESSION['bitcrow_userid']);
    $rowusr->execute();
    $rowuser=$rowusr->get_result();
    $row=$rowuser->fetch_assoc();
    $rowusr->close();

//echo'fghh';

$temp_ran=mysqli_real_escape_string($dbc, trim($_POST['temp_ran']));
$token=(int)mysqli_real_escape_string($dbc, trim($_POST['token']));


if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $temp_ran && $arrResponse["score"] >= 0.5 && isset($_POST['selected']) && isset($_POST['credit']) && isset($_POST['limit']) && isset($_POST['url']) && $_POST['pleaseme']==$_SESSION['bitcrow_userid'] && $_POST['plese']==$_SESSION['rand'] && $row['password']==$_SESSION['bitcrow_password'] && $_POST['ll']==$_SESSION['goch'] && $_POST['gtoken']!='' ) 
//&& $_POST['ll']==$_SESSION['goch'] && $_POST['gtoken']!='')
{
    // checking if the tran_id exist or not
    $transid=str_replace(' ','',$_POST['plese']);
    $rowust=$dbc->prepare("SELECT * FROM transaction WHERE trans_id= ?");
    $rowust->bind_param("s", $transid);
    $rowust->execute();
    $rowuset=$rowust->get_result();
    $rowt=$rowuset->fetch_assoc();
    $rowust->close();
    if($transid==$rowt['trans_id']){
        echo $ken=json_encode(['code'=>'148']);

        
        file_put_contents('test.txt', $ken);

    } else{

            // checking if the url exist or not
    // $transurl=str_replace(' ','',$_POST['url']);
    // $rowusur=$dbc->prepare("SELECT * FROM transaction WHERE link= ?");
    // $rowusur->bind_param("s", $transurl);
    // $rowusur->execute();
    // $rowuseur=$rowusur->get_result();
    // $rowur=$rowuseur->fetch_assoc();
    // $rowusur->close();
    // if($transurl==$rowur['link']){
    //     echo json_encode(['code'=>'146']);

    // } else{


    $total=$_POST['credit']*$_POST['limit'];

    if(($row['bal']>=$total)){   

        // Debite customer
        $user_id=$row['id'];
        $bal_af=$row['bal']-$total;
        $b=$row['bal']-$total;
       // $a=$row['bal']+$total;
        //mysqli_query($dbc,"UPDATE users SET dep_balance='$b' WHERE id='$user_id' "); 
        $usersb=$dbc->prepare("UPDATE users SET bal= ? WHERE id= ?"); 
        $usersb->bind_param("ii", $b, $user_id);
      $updateusersb =$usersb->execute();
        $usersb->close();


    $status="in progress";
    $type="Premium";

    $sid=str_replace(' ','', $_POST['selected']);
    $rowusru=$dbc->prepare("SELECT * FROM service WHERE serviceid= ?");
    $rowusru->bind_param("s", $sid);
    $rowusru->execute();
    $rowuseru=$rowusru->get_result();
    $servic=$rowuseru->fetch_assoc();
    $rowusru->close();

    include'lik.php';
if($result==''){
    $result='no_server_resp';
}

$resulte=json_decode($result);

    if($updateusersb) {
    $sto =$dbc->prepare("INSERT INTO transaction (user_id,product_code,product_name,credit,user_name,date,credit_limit,link,status,bal_bf,bal_af,ttype,rstatus,trans_id,total) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sto->bind_param("sisisssssssssss", $_SESSION['bitcrow_userid'], $servic['code'], $servic['name'], $_POST['credit'], $row['fname'], $datetime, $_POST['limit'], $_POST['url'], $status, $row['bal'], $bal_af,$type,$result,$_POST['plese'], $total);
    $sto->execute();
    //echo $sto->error;
    $sto->close();
     


//successful
//{"order":"289000","service":13}



//$order_result=$resulte->order;

if($resulte->order!=''){

    echo $ken=json_encode(['code'=>'140']);
    file_put_contents('test.txt', $ken);

}
else {

    echo $ken=json_encode(['code'=>'145']);

    $usersb=$dbc->prepare("UPDATE users SET bal= ? WHERE id= ?"); 
    $usersb->bind_param("ii", $row['bal'], $user_id);
  $updateusersb =$usersb->execute();
    $usersb->close();

    $usersb=$dbc->prepare("UPDATE transaction SET bal_af= ? WHERE trans_id= ?"); 
    $usersb->bind_param("ii", $row['bal'], $_POST['plese']);
  $updateusersb =$usersb->execute();
    $usersb->close();

file_put_contents('test.txt', $ken);
    
}


    } 


    
    } else {
// low wallet
        echo $ken=json_encode(['code'=>'141']);
        file_put_contents('test.txt', $ken);
    }



    // }//end url check

    }//end trans_id check

} //end post
else {
// empty input
    echo $ken=json_encode(['code'=>'145']);
    file_put_contents('test.txt', $ken);
}



}
?>