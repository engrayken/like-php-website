<?php require'app/config.php'; 
session_start();
?>
   <!DOCTYPE html>
<html lang="en">
<?php 
         		use PHPMailer\PHPMailer\PHPMailer;
             use PHPMailer\PHPMailer\Exception;
         if(isset($_POST['email'])!='' && isset($_POST['name'])!='' && isset($_POST['msg'])!='' && isset($_POST['gtoken'])!='' && isset($_POST['ll'])!='') {
define("RECAPTCHA_V3_SECRET_KEY",$set['skey']);

$chtoken = filter_input(INPUT_POST,'gtoken', FILTER_SANITIZE_STRING);

$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING);
$msg = filter_input(INPUT_POST,'msg', FILTER_SANITIZE_STRING);


// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $chtoken)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
 $arrResponse = json_decode($response, true);

 if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["score"] >= 0.5){

  require_once 'hopeforce/reg_ver.php';
  require 'hopeforce/vendor/autoload.php';
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
      $mail->addAddress($email, $set['site_name']);          
      $mail->addReplyTo($eset['reply_to'], $set['site_name']);
      $mail->isHTML(true);               
      $mail->Subject = $sname.' Contact Form';
      $mail->Body='Name: '.$name.' <br/>'.$msg;
      $mail->AltBody = $set['site_name'];
      if($mail->send()){
         $show="show";
       
      } else{
        $show="eshow";
      }
 
 } else{

  $show="eshow";
 }



         } else{ $show="nshow"; }

         ?>
         <head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title><?php echo $sname; ?> -Social Media Explore</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assetss/css/fontawesome.css">
    <link rel="stylesheet" href="assetss/css/templatemo-liberty-market.css">
    <link rel="stylesheet" href="assetss/css/owl.css">
    <link rel="stylesheet" href="assetss/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 577 Liberty Market

https://templatemo.com/tm-577-liberty-market

-->
	<!-- google chaptcher -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $set['pkey']; ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  </head>
  <?php
      $title="reged";
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
<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <?php
$home="details"; 
include'nav.php'; ?>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading normal-space">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6><?php echo $sname; ?> Market</h6>
          <h2>About Us / Contact</h2>
          <!-- <span>Home > <a href="#">Item Details</a></span>
          <div class="buttons">
            <div class="main-button">
              <a href="explore.html">Explore Our Items</a>
            </div>
            <div class="border-button">
              <a href="create.html">Create Your NFT</a>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>

  <div class="item-details-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>We At <?php echo $sname; ?></em></h2>
            <span class="author"> <h6><i>
 are a group dedicated to bring more traffic to your social pages.<br/> We are building a system to make your social pages more popular.<br/>

<h6>Why is that important?</h6><br/>
Like other search engines, Facebook takes into account the number of Facebook likes when deciding what to display on your friend's home page. More likes mean more likely that your page or status will appear. The math is simple. More likes mean a higher rate and more exposure.

<br/><a href="#"><?php echo $sname; ?></a> website and its system are programmed from the ground up and do not contain third-party programs, plugins, or components. <br/>
Our team of programmers has a mission to develop natural flowing websites that are fair and just for all its members!

<br/>
We also hope that users will like our website, find value in its system, and continue using it in the future.
<br/><br/>
We encourage our user to give us feedback, so... Do not hesitate to contact us and leave your comment Below. The better user feedback we get, the better system we will develop!


Thank you for using <?php echo $sname; ?>!</i></h6></span>
          </div>
        </div>
        <center><h2>Contact Us Below</h2></center><hr/>
        <div class="col-lg-7"> 
      
          <div class="left-image">
            <img src="assetss/images/item-details-01.jpg" alt="" style="border-radius: 20px;">
          </div>
        </div>
       
        <div class="col-lg-5 align-self-center">
         
          <span class="author">
       
          <form id="pur" action="" method="post">
        <?php if($show=="show"){ echo'<h4>Message Sent Successfully</h4>'; }
        else if($show=="nshow"){ echo'<h4 style="color:red">Please Complete The Input</h4>';  }
        else if($show=="eshow"){ echo'<h4 style="color:red">Error Sending Message</h4>';  } ?>
            <input type="text" placeholder="Input Your Name" style="width: 300px;" name="name" Required/>
            <br/><br/><input type="email" placeholder="Your Email eg <?php echo str_replace(' ','',$sname); ?>@gmail.com" style="width: 300px;" name="email" Required/>
            <br/><br/><textarea name="msg" style="width: 300px;" placeholder="Type your message here" Required></textarea><br/><br/>
             <button type="submit" id="form-submit" class="main-button">Submit Now</button>
         Or Message us On: Support@<?php echo str_replace(' ','',$sname); ?>.com.ng 
        
         <script>
       grecaptcha.ready(function() {
           grecaptcha.execute('<?php echo $set['pkey']; ?>', {action: '<?php echo clean($encrypted_value);?>'}).then(function(token) {
               $('#pur').prepend('<input type="hidden" id="gtoken" name="gtoken" value="' + token + '">');
               $('#pur').prepend('<input type="hidden" id="ll" name="ll" value="<?php echo clean($_SESSION['goch']); ?>">');
               //$('#pur').unbind('submit').submit();
               
         });
       });

 </script>
        
        </form>
</span>
        </div>
        <!-- <div class="col-lg-12">
          <div class="current-bid">
            <div class="row">
              <div class="col-lg-6">
                <div class="mini-heading"><h4>Current Biddings Prices ( ETH )</h4></div>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <select name="Category" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                      <option selected>Sort By: Latest</option>
                      <option type="checkbox" name="option1" value="old">Sort By: Oldest</option>
                      <option value="low">Sort By: Lowest</option>
                      <option value="high">Sort By: Highest</option>
                  </select>
              </fieldset>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="item">
                  <div class="left-img">
                    <img src="assetss/images/current-01.jpg" alt="">
                  </div>
                  <div class="right-content">
                    <h4>David Walker</h4>
                    <a href="#">@davidwalker</a>
                    <div class="line-dec"></div>
                    <h6>Bid: <em>0.06 ETH</em></h6>
                    <span class="date">24/07/2022, 22:00</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="item">
                  <div class="left-img">
                    <img src="assetss/images/current-02.jpg" alt="">
                  </div>
                  <div class="right-content">
                    <h4>David Walker</h4>
                    <a href="#">@davidwalker</a>
                    <div class="line-dec"></div>
                    <h6>Bid: <em>0.06 ETH</em></h6>
                    <span class="date">24/07/2022, 22:00</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="item">
                  <div class="left-img">
                    <img src="assetss/images/current-03.jpg" alt="">
                  </div>
                  <div class="right-content">
                    <h4>David Walker</h4>
                    <a href="#">@davidwalker</a>
                    <div class="line-dec"></div>
                    <h6>Bid: <em>0.06 ETH</em></h6>
                    <span class="date">24/07/2022, 22:00</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="item">
                  <div class="left-img">
                    <img src="assetss/images/current-02.jpg" alt="">
                  </div>
                  <div class="right-content">
                    <h4>David Walker</h4>
                    <a href="#">@davidwalker</a>
                    <div class="line-dec"></div>
                    <h6>Bid: <em>0.06 ETH</em></h6>
                    <span class="date">24/07/2022, 22:00</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="item">
                  <div class="left-img">
                    <img src="assetss/images/current-04.jpg" alt="">
                  </div>
                  <div class="right-content">
                    <h4>David Walker</h4>
                    <a href="#">@davidwalker</a>
                    <div class="line-dec"></div>
                    <h6>Bid: <em>0.06 ETH</em></h6>
                    <span class="date">24/07/2022, 22:00</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="item">
                  <div class="left-img">
                    <img src="assetss/images/current-01.jpg" alt="">
                  </div>
                  <div class="right-content">
                    <h4>David Walker</h4>
                    <a href="#">@davidwalker</a>
                    <div class="line-dec"></div>
                    <h6>Bid: <em>0.06 ETH</em></h6>
                    <span class="date">24/07/2022, 22:00</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>

  <!-- <div class="create-nft">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Create Your NFT & Put It On The Market.</h2>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="main-button">
            <a href="create.html">Create Your NFT Now</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item first-item">
            <div class="number">
              <h6>1</h6>
            </div>
            <div class="icon">
              <img src="assetss/images/icon-02.png" alt="">
            </div>
            <h4>Set Up Your Wallet</h4>
            <p>There are 5 different HTML pages included in this NFT <a href="https://templatemo.com/page/1" target="_blank" rel="nofollow">website template</a>. You can edit or modify any section on any page as you required.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item second-item">
            <div class="number">
              <h6>2</h6>
            </div>
            <div class="icon">
              <img src="assetss/images/icon-04.png" alt="">
            </div>
            <h4>Add Your Digital NFT</h4>
            <p>If you would like to support our TemplateMo website, please visit <a rel="nofollow" href="https://templatemo.com/contact" target="_parent">our contact page</a> to make a PayPal contribution. Thank you.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item">
            <div class="icon">
              <img src="assetss/images/icon-06.png" alt="">
            </div>
            <h4>Sell Your NFT &amp; Make Profit</h4>
            <p>NFT means Non-Fungible Token that are used in digital cryptocurrency markets. There are many different kinds of NFTs in the industry.</p>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <p>Copyright © <?php echo date('Y'); ?> <a href="#"><?php echo $sname; ?></a>. All rights reserved.
          &nbsp;&nbsp;</p>        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assetss/js/isotope.min.js"></script>
  <script src="assetss/js/owl-carousel.js"></script>

  <script src="assetss/js/tabs.js"></script>
  <script src="assetss/js/popup.js"></script>
  <script src="assetss/js/custom.js"></script>
  </body>
</html>