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
<?php echo $sname; ?>
  </title>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />

	<!-- google chaptcher -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $set['pkey']; ?>"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  
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
      $title="homed";
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
// Output: 54esmdr0qf
$per= substr(str_shuffle($permitted_chars), 0, 10);

$token = round(microtime(true));
$secret_key      = $per.$row['id'].$title;  //change this
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
      <a class="navbar-brand m-0" href="dashboard" target="_blank">
        <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"> <?php echo $sname; ?> Dashboard</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="dashboard">
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
          <a class="nav-link text-white " href="billing">
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
              <i class="material-icons opacity-10">notifications </i><b class="count"></b>
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
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign Out</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="sign-up">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li> -->
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
            <!-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li> -->
            <!-- <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li> -->
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
       <?php include'topnav.php'; ?>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">account_balance</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Credit's</p>
                <h4 class="mb-0"><?php echo $row['bal']; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Total </span>Credits on wallet</p>
            </div>
          </div>
        </div>
        <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                <h4 class="mb-0">2,300</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
            </div>
          </div>
        </div> -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Transaction History</p>
                <h4 class="mb-0">          <?php      $trans = mysqli_query($dbc, "SELECT sum(total) FROM transaction WHERE user_id = '".$row['id']."' ");
        while($transn = mysqli_fetch_array($trans)){ 

echo clean($transn['sum(total)']);

}
?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">Total</span> Transaction</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Fund History</p>
                <h4 class="mb-0"><?php $trans = mysqli_query($dbc, "SELECT sum(total) FROM payment WHERE user_id = '".$row['id']."' ");
                while($transn = mysqli_fetch_array($trans)){ echo clean($transn['sum(total)']);}?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Total </span>fund deposited</p>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Website Views</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Daily Sales </h6>
              <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 4 min ago </p>
              </div>
            </div>
          </div>
        </div> 


        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Completed Tasks</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">just updated</p>
              </div>
            </div>
          </div>
        </div>-->
      </div>
      


      <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>How <?php echo $sname; ?> Works?</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">With <?php echo $sname; ?>
                  </span> you get real social  media like / Followers by using <b>Free credits</b>
                   or <b>Paid Credits</b>
                  </p>
                  <br/>
              <font color="red">    Most relevant Like / follower and subscription are available on <?php echo $sname; ?> just select our service below to proceed. </font>
                  <br/>
                  <br/>   
               <table><tr><td>    <div class="mx-3">
      <a class="btn bg-gradient-primary" href="tables" type="button">Get unlimited free Credits</a>
      </div> </td><td>OR </td><td>     <div class="mx-3">
      <a class="btn bg-gradient-primary" href="tables" type="button">Buy Credits</a>
      </div></td></tr></table>
     



                  <h6> Select Our Service  </h6>
<b id="notify" style="color:red; border:1px solid green">Please note that some field can not be empty! </b>
<b id="low" style="color:red; border:1px solid green">You have a low credit for this task! </b>
<b id="input" style="color:red; border:1px solid green">Some input can not be empty! </b>
<b id="success" style="color:green; border:1px solid green">Order as been successfully placed click here to view status </b>

<b id="inputtrans" style="color:red; border:1px solid green">This transaction already exist please reload the page and try again </b>

<div id='loading'> <b>Loading.........</b></div>
<div id='vloading' style="background: #b8b8b8; border:10px; border-radius:10px; padding:5px">

<!-- <div class="count"></div> -->

<form id="pur" action="" method="post">
   <br/>
<select id="select-featuree" name="select-feature" size="1" style="width:90%" onchange="ChangeNetwork()" style="border:0px">
      <option value="select-feature"   selected="selected">Select feature</option>
			<option value="askfml"  >AskFm Likes </option>
      <option value="facebookcom">Facebook Comments </option>
      <option value="facebook">Facebook Likes</option>
      <option value="facebooksub">Facebook Page Follow </option>
      <option value="facebookusersub"  >Facebook Profile Followers </option>
      <option value="facebooksha"  >Facebook Shares </option>
      <option value="facebookvid"  >Facebook Views </option>
      <option value="flickr"  >Flickr Favorites </option>
      <option value="instagramcom"  >Instagram Comments </option>
      <option value="instagramfol"  >Instagram Followers </option>
      <option value="instagramlik"  >Instagram Likes </option>
      <option value="myspacecon"  >Myspace Connections </option>
      <option value="odrujoi">Odnoklassniki Joins </option>
      <option value="pinterestfol"  >Pinterest Followers </option>
      <option value="pinterestrep"  >Pinterest Saves </option>
      <option value="reverbnationfan"  >Reverbnation Fans </option>
      <option value="soundcloudfol"  >Soundcloud Followers </option>
      <option value="soundcloudlik"  >Soundcloud Likes </option>
      <option value="soundcloudlis"  >Soundcloud Listenings </option>
      <option value="soundcloudrep"  >Soundcloud Reposts </option>
      <option value="tiktokfol"  >TikTok Followers </option>
      <option value="tiktoklike"  >TikTok Likes </option>
      <option value="twitch"  >Twitch Followers </option>
      <option value="twitter"  >Twitter Followers </option>
      <option value="twitterfav"  >Twitter Likes </option>
      <option value="twitterret"  >Twitter Retweets </option>
      <option value="vkontaktefol"  >VKontakte Followers </option>
      <option value="vkontaktejoi"  >VKontakte Joins </option>
      <option value="vimeolik"  >Vimeo Likes </option>
      <option value="sites"  >Websites Views </option>
      <option value="youtubec"  >Youtube Comments </option>
      <option value="youtube"  >Youtube Likes </option>
      <option value="youtubes"  >Youtube Subscribers </option>
      <option value="youtubev"  >Youtube Views </option>			
    </select>
    <br/>

<div id="board">
  <b style="color:darkblue;">Credit Per Like</b>
<select id="credit" name="credits" size="1" style="width:90%" onchange="ChangeNetwork()" style="border:1px solid green; padding-left:4px;">
<option value="2"  >2 too slow </option>
<option value="3">3 slow </option>
<option value="4">4 good </option>
<option value="5">5 good </option>
<option value="6"  >6 Better</option>
<option value="7">7 Better </option>
<option value="8"  >8 Better </option>
<option value="9">9  great</option>
<option value="10"  >10 great </option>
<option value="11"  >11 great </option>
<option value="12"  >12 great </option>
<option value="13"  >13 great </option>
<option value="14"  >14 Too Great </option>
<option value="15"  >15 Too Great </option>
<option value="16"  >16 More Great </option>
<option value="17"  >17 More Great </option>
<option value="18"  >18 Fast </option>
<option value="19"  >19 Fast </option>
<option value="20"  >20 very fast </option>	
<option value="paused"  >Paused </option>
</select>

<br/>
<b style="color:darkblue;">Set Credit Limit For This Service</b>
<select id="limit" name="limits" size="1" style="width:90%" onchange="ChangeNetwork()" style="border:1px solid green; padding-left:4px;">

<option value="10"  >10 </option>
<option value="20"  >20  </option>
<option value="50"  >50</option>
<option value="100"  >100</option>
<option value="500"  >500</option>
<option value="1000"  >1,000</option>
<option value="5000"  >5,000</option>
<option value="10000"  >10,000</option>
<option value="20000"  >20,000  </option>
<option value="50000"  >50,000  </option>
<option value="100000"  >100,000  </option>	
<option value="nolimit"  >No Limite </option>
</select>
<b  style="color:darkblue;">Input Your <b id="selected"></b> Link</b><br/>
<input type="text" id="url" style="width:90%" size="35px" placeholder="eg <?php echo $social; ?>" style="border:1px solid green"/>
<br/><br/>
<input value="<?php echo clean($encrypted_value);?>" name="temp_ran" id="temp_ran" type="hidden"  />
<button id="submit" class="btn bg-gradient-primary"> Place Order</button>
<button id="submite" class="btn bg-gradient-primary"> Confirm Order</button>

<script>
    $('#submite').hide();
    $('#pur').submit(function(event) {
        event.preventDefault();
       //  var submitair = $('#submitair').val();
	//   $('#submitairt').show();

		
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo $set['pkey']; ?>', {action: '<?php echo clean($encrypted_value);?>'}).then(function(token) {
                $('#pur').prepend('<input type="hidden" id="gtoken" name="gtokens" value="' + token + '">');
                $('#pur').prepend('<input type="hidden" id="ll" name="ll" value="<?php echo clean($_SESSION['goch']); ?>">');
                $('#pur').unbind('submit').submit();
                
				$('#submit').hide();
				$('#submite').show();
				alert("Are you sure you want proceed. Click confirm buttton");
            });
        });
  });

  
  </script>



</div>
</form>
</div>



 <script type="text/javascript">
$(document).ready(function() 
{

 


 $("#board").hide();

    $('#select-featuree').change(function()
    {
      var selected = $("#select-featuree").val();
        // alert(buy);
        $("#board").show();

        $('#selected').html(selected);
    });


    $('#vloading').show();
    $("#notify").hide();
    $("#success").hide();
    $("#low").hide();
    $("#input").hide();
    $("#inputtrans").hide();
    $('#loading').hide();
    $('#submite').click(function(e){
      e.preventDefault();

      $("#notify").hide();
    $("#success").hide();
    $("#low").hide();
    $("#input").hide();
    $("#inputtrans").hide();
    $('#loading').hide();

      var selected = $("#select-featuree").val();
      var url = $("#url").val();
      var limit = $("#limit").val();
      var credit = $("#credit").val();
      var temp_ran = $("#temp_ran").val();
      var gtoken = $("#gtoken").val();
      var ll = $("#ll").val();

      var pleaseme ="<?php echo $row['id']; ?>";
      var plese ="<?php echo $_SESSION['rand']=rand(10,30).date('His'); ?>";
      //alert(selected);
      if(url=="") {
        $("#notify").show();

      }else{
      $.ajax({
        type:'POST',
            url:'metrics.php',
            dataType: 'json',
            data:{'selected':selected, 'credit':credit,'url':url,'limit':limit,'pleaseme':pleaseme,'plese':plese,'temp_ran':temp_ran,'ll':ll,'gtoken':gtoken},
            
            beforeSend:function(){
             $('#loading').show();
            $('#vloading').hide();
   
                $("#notify").hide();
    $("#success").hide();
    $("#low").hide();
    $("#input").hide();
    $("#inputtrans").hide();
   
            }, 
            
 success:function(data) {

  if(data.code=='140') { 
  $("#notify").hide();
//alert("success");

$("#success").show();

$('#vloading').show();
    $('#loading').hide();       
   } else if(data.code=='141') { 
  $("#notify").hide();
//alert("success");
$("#low").show();
  
$('#vloading').show();
    $('#loading').hide();
  } else if(data.code=='145') { 
  $("#notify").hide();
//alert("success");
$("#input").show();
  

$('#vloading').show();
    $('#loading').hide();
  }

  else if(data.code=='148') { 
  $("#notify").hide();
//alert("success");
$("#inputtrans").show();

$('#vloading').show();
    $('#loading').hide();
  }



}
          });

        } // end if(url==""){

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
  load_unseen_notification(); 
 }, 5000);




});

    </script>
  
  
  </div>
              
              </div>
            </div>
            <div class="card-body px-0 pb-2">


            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Orders overview</h6>
              <!-- <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
              </p> -->
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
              <?php      
              $limit=8;
              $transe =$dbc->prepare("SELECT * FROM transaction WHERE user_id= ? order by id desc limit ?");
  $transe->bind_param("ii", $row['id'],$limit);
  $transe->execute();
  $trans=  $transe->get_result();
  $transe->close(); ?>
                <!-- <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient">notifications</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">code</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-info text-gradient">shopping_cart</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-warning text-gradient">credit_card</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-primary text-gradient">key</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                  </div>
                </div> -->
                <div class="timeline-block">
                <?php  while($row1 = $trans->fetch_assoc()){?>
                  <span class="timeline-step">
                    <i class="material-icons text-dark text-gradient">payments</i>
                  </span>
                  <div class="timeline-content">
                 

                    
                    <h6 class="text-dark text-sm font-weight-bold mb-0">
       
                  <?php echo $row1['product_name']; ?> #<?php echo $row1['trans_id']; ?></h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo $row1['date']; ?></p>
                   
                  </div>
                  <?php  } ?>
                </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer py-4  ">
      <?php	//$shoGod=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM God WHERE uid='1'")); */
$shoGods=$dbc->prepare("SELECT * FROM god WHERE uid= ?");
$shoGods->bind_param("i", $row['id']);
$shoGods->execute();
$shoGodss=$shoGods->get_result();
$shoGod=$shoGodss->fetch_assoc();
$shoGods->close();

$encrypted_values=password_hash($encrypted_value, PASSWORD_DEFAULT);


	if($shoGodss->num_rows<1)
{

/*$sto = mysqli_query($dbc,"INSERT INTO God (uid,words)VALUES('$row[id]','$encrypted_value');"); */


$sto =$dbc->prepare("INSERT INTO god (uid, words) VALUES(?, ?)");
$sto->bind_param("is", $row['id'], $encrypted_values);
$sto->execute();
$sto->close();

} else {
//echo $shoGod['words'];

//$upd=mysqli_query($dbc,"UPDATE God SET words='$encrypted_value' WHERE uid='$row[id]' "); 
$upd=$dbc->prepare("UPDATE god SET words= ? WHERE uid= ?"); 
$upd->bind_param("si", $_SESSION['enscripted'], $row['id']);
$upd->execute();
$upd->close();

} ?>


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
        <a href="javascript:void" class="switch-trigger background-color">
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
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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