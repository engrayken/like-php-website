<?php 
require'../app/config.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="assets/img/favicon.png">
<title>
<?php
 echo $sname;
 ?>
</title>
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<!-- Nucleo Icons -->
<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://js.paystack.co/v1/inline.js"></script> 

  	<!-- google chaptcher -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $set['pkey']; ?>"></script>

</head>
<?php 
// if($_SESSION['email']=='' && $_SESSION['pass']=='') {

//   redirect('login');
// }
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


?>

<?php
      $title="billed";
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
// Output: 54esmdr0qf
$per= substr(str_shuffle($permitted_chars), 0, 10);

$token = round(microtime(true));
$secret_key      = $title;  //change this
 $encrypted_value=$token.$secret_key;

$_SESSION['good']=$encrypted_value;
$_SESSION['goch']=$_SERVER['PHP_SELF'];

$encrypted_values=password_hash($encrypted_value, PASSWORD_DEFAULT);
$_SESSION['enscripted']=$encrypted_values;
?>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="dashboard">
        <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"><?php echo $sname; ?></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="tables">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tables</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="billing">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Add Fund/Trans History</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="tables">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Free Credits</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="rtl">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link text-white " href="notifications">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="profile">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="sign-out">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign out</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div> -->
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="dashboard">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Fund/Trans</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Fund/Trans</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <?php include'topnav.php'; ?>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">

          <div class="row">

          <?php 
if($row['bankName']=='0' && $row['customerName']=='0' && $row['accountNumber']=='0')
{ 

  echo'<div class="col-20 text-end">
  <a id="bankt" class="btn bg-gradient-info mb-0" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Generat Instant Wallet Funding Account Number Now</a>
</div>';


} else{ ?>
            <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl">
                  <img src="assets/img/illustrations/pattern-tree.svg" class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
                  <span class="mask bg-gradient-dark opacity-10"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="material-icons text-white p-2">wifi</i> <b>Account Number</b>&nbsp;&nbsp;&nbsp; <font style="color:white">Bal: <?php echo $row['bal']; ?></font>
                    <h5 class="text-white mt-4 mb-5 pb-2">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['accountNumber']; ?>
                    <!-- 4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852 -->
                  </h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Account Holder</p>
                          <h6 class="text-white mb-0"><?php echo $row['customerName']; ?></h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Bank Name</p>
                          <h6 class="text-white mb-0"><?php echo $row['bankName']; ?></h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="assets/img/logos/mastercard.png" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <?php } ?>
            <div class="col-xl-6">
              <div class="row">
                <!-- <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">account_balance</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Salary</h6>
                      <span class="text-xs">Belong Interactive</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">+$2000</h5>
                    </div>
                  </div>
                </div> -->
                <!-- <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">account_balance_wallet</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Paypal</h6>
                      <span class="text-xs">Freelance Payment</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">$455.00</h5>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>


  
   <!-- echo'<div id="bankt"><script">window.location="providus_log";</script></div>'; -->
            
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">

                <?php 
                if($_GET['status']=="successs" && $_SESSION['status']=="successs2718"){
                 echo' <div class="alert alert-success alert-dismissible text-white" role="alert">
                <span class="text-sm"> <b><center>Wallet Credited Successfully</center></b></span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
               
              
              $_SESSION['status']="";

                } else  if($_GET['status']=="failed" && $_SESSION['status']=="failed2718"){
                
                  echo' <div class="alert alert-danger alert-dismissible text-white" role="alert">
                <span class="text-sm"> <b><center>Wallet Not Credited Successfully</center></b></span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';

              $_SESSION['status']="";

                }
?>

                  <div class="row">  <b>   You can use above account number to instantly credit your wallet or use the card method below</b><br/>
                
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Payment Method</h6>
                    </div>
                    <div class="col-6 text-end">
                      <a id="payd" class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Credit with Card</a>
                    </div>

<div id="paym">
 
<div class="input-group input-group-outline">
              <label class="form-label">Type Amount here...</label>
              <input type="text" id="amount" class="form-control"></div> <br/>
              <input type="hidden" id="txnid" value="<?php echo time(); ?>">
              <input type="hidden" id="paydate" value="<?php echo date('Y-m-d');?>">
              <input type="hidden" id="links" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
          <form id="pur">
          <script>
   
       grecaptcha.ready(function() {
           grecaptcha.execute('<?php echo $set['pkey']; ?>', {action: '<?php echo clean($encrypted_value);?>'}).then(function(token) {
               $('#pur').prepend('<input type="hidden" id="gtoken" name="gtokens" value="' + token + '">');
               $('#pur').prepend('<input type="hidden" id="ll" name="ll" value="<?php echo clean($encrypted_value);?>">');
               //$('#pur').unbind('submit').submit();
               
         });
       });
// });
 </script>
 </form>
           <button id="paysub" class="nav-link text-white active bg-gradient-primary" style="border:0px; padding-left:4px; padding-right:4px; border-radius:5px; padding-top:4px; padding-bottom:4px;">Credit Your Wallet</button>
  
</div>
                  </div>
                </div>









                <!-- <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <img class="w-10 me-3 mb-0" src="assets/img/logos/mastercard.png" alt="logo">
                        <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                        <i class="material-icons ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">edit</i>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <img class="w-10 me-3 mb-0" src="assets/img/logos/visa.png" alt="logo">
                        <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
                        <i class="material-icons ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">edit</i>
                      </div>
                    </div>
                  </div>
                </div> -->
                <br/>
              </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">

          
$(document).ready(function() 
{
  

  $('#paym').hide();

$(document).on('click', '#paysub', function(){


  //insert to database
  var user_id =<?php echo $row['id'];?>;
  var paydate = $('#paydate').val();
    var amount = $('#amount').val();
    var trans_id = $('#txnid').val();
  var links = $('#links').val();
 var gtoken = $('#gtoken').val();
var ll = $('#ll').val();
 
//alert(gtoken);
  $.ajax({
   url:"bt",
   method:"POST",
   data:{user_id:user_id,paydate:paydate,amount:amount,trans_id:trans_id,links:links,gtoken:gtoken,ll:ll},
   dataType:"json",
    success:function(data)
    {
  //   if(data.fetch > 0)
  //   {


  //   }
   }
});


 // var pay = $('#amount').val();
 // alert(pay);
  // paymentForm.addEventListener('submit', payWithPaystack, false);
  // function payWithPaystack(){
    
    var paymentForm = document.getElementById('amount');
  
		  var handler = PaystackPop.setup({
			key: 'pk_test_a08bb45dbabde86b10df2f60954eda67f4715c76',
			email: '<?php echo $row['email']; ?>',
		  amount:  document.getElementById('amount').value * 100,
	  bearer: 'subaccount',
	  
	  ref: document.getElementById('txnid').value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
			metadata: {
			   custom_fields: [
				  {
					  display_name: '<?php echo $row['fname']; ?>',
					  // variable_name: "<?php //echo $phone; ?>",
					  value: document.getElementById('txnid').value
				  }
			   ]
			},
			callback: function(response){
		
        // let message = 'Payment complete! Reference: ' + response.reference;
    //alert(message);
			 window.location = "vv.php?kpcdmvsg=" + response.reference;
			},
			onClose: function(){
				 alert('window closed');

  $.ajax({
   url:"bf",
   method:"POST",
   data:{view:document.getElementById('txnid').value},
   dataType:"json",
  });
     
					}
		  });
		  handler.openIframe();
//     }


// window.onload = payWithPaystack;

  });


 $(document).on('click', '#payd', function(){
$('#paym').show();
$('#payd').hide();

  });

  $(document).on('click', '#bankt', function(){

     window.location="providus_log";

  });


  var user_id =<?php echo $row['id'];?>;
 function load_unseen_notification(view = '')
 

 {
  // alert("krrrn");
  $.ajax({
   url:"fetch",
   method:"POST",
   data:{view:view,user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#dropdown-menur').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
//alert(data.unseen_notification);

    }
   }
  });
 }
 
 load_unseen_notification();
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '#dropdownMenuButton', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);

});
  </script>


	 
<?php   
 $limit=5;

$transe =$dbc->prepare("SELECT * FROM payment WHERE user_id= ?  order by id desc limit ?");
  $transe->bind_param("is", $row['id'], $limit);
  $transe->execute();
  $trans=  $transe->get_result();
  $transe->close(); ?>
  

        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Invoices</h6>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-0">
            
               <?php  while($row1 = $trans->fetch_assoc()){?>
                   <ul class="list-group"><li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark font-weight-bold text-sm"> <?php echo $row1['date']; ?></h6>
                    <span class="text-xs"># <?php echo $row1['trans_id']; ?></span>
                  </div>
                  <div class="d-flex align-items-center text-sm">AMT:<?php echo $row1['total']; ?> <?php if($row1['status']=='paid') { echo'&nbsp;<font color="green"><b>success</b></font>'; } else{echo '&nbsp;<font color="red"><b> '.$row1['status'].'</b></font>'; } ?>
              <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> PDF</button>
                </div>
                </li></ul>
                <?php } ?>
              
            </div>
          </div>
        </div>
      </div>

      <?php   
      $limit=5;    
      $transe =$dbc->prepare("SELECT * FROM transaction WHERE user_id= ? order by id desc limit ?");
  $transe->bind_param("ii", $row['id'],$limit);
  $transe->execute();
  $trans=  $transe->get_result();
  $transe->close(); ?>
  
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Transaction Information</h6>
            </div>
            
            <div class="card-body pt-4 p-3">
               <?php  while($row1 = $trans->fetch_assoc()){?>
                <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm"><?php echo $row1['product_name']; ?></h6>
                    <span class="mb-2 text-xs">Credit Per User: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $row1['credit']; ?></span> Total: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $row1['total']; ?></span></span>
                    <span class="mb-2 text-xs">Limit:<span class="text-dark ms-sm-2 font-weight-bold"><?php echo $row1['credit_limit']; ?></span> <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $row1['date']; ?></span></span>
                    <span class="text-xs">Link: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $row1['link']; ?></span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;">
                      <!-- <i class="material-icons text-sm me-2">delete</i>Delete -->
                      <?php echo $row1['status']; ?>
                  </a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                  </div>
                </li>
               
              </ul>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Your Transaction's</h6>
                </div>

         <!-- <?php       $transe =$dbc->prepare("SELECT * FROM transaction WHERE user_id= ? order by id desc");
  $transe->bind_param("i", $row['id']);
  $transe->execute();
  $trans=  $transe->get_result();
  $transe->close(); ?>
        -->

                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg">date_range</i>
                  <small> <?php echo date("d - m M Y"); ?></small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <!-- <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Failed</h6>
              <?php  while($row1 = $trans->fetch_assoc()){?>
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_more</i></button>
                    <div class="d-flex flex-column">
                  
                      <h6 class="mb-1 text-dark text-sm"><?php echo $row1['product_name']; ?> </h6>
                      <span class="text-xs"><?php echo $row1['date']; ?></span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - <?php echo $row1['credit']; ?>
                  </div>
                </li>-->
                <!-- <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Apple</h6>
                      <span class="text-xs">27 March 2020, at 04:30 AM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 2,000
                  </div>
                </li> -->
              <!-- </ul> -->
              <!-- <?php } ?>  -->

              <?php   
              $limit=10;    
              $transes =$dbc->prepare("SELECT * FROM transaction WHERE user_id= ? order by id desc limit ?");
  $transes->bind_param("ii", $row['id'],$limit);
  $transes->execute();
  $trans2=  $transes->get_result();
  $transes->close(); ?>
       
              <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Successful Transaction</h6>
              <?php  while($row2 = $trans2->fetch_assoc()){?>
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm"><?php echo $row2['product_name']; ?> </h6>
                      <span class="text-xs"><?php echo $row2['date']; ?></span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + <?php echo $row2['credit']; ?>
                  </div>
                </li>
                <!-- <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                      <span class="text-xs">26 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 1,000
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                      <span class="text-xs">26 March 2020, at 08:30 AM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 2,500
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">priority_high</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                      <span class="text-xs">26 March 2020, at 05:00 AM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                    Pending
                  </div>
                </li> -->
              </ul>
              <?php } ?>


            </div>
          </div>
        </div>
      </div>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                <a href="<?php echo $social; ?>" class="font-weight-bold text-black" target="_blank"><?php echo $sname; ?></a>
                for a better Social Media Like.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <!-- <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li> -->
                <li class="nav-item">
                  <a href="#" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <!-- <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <!-- <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a> -->
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>