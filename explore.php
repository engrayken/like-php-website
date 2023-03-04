<?php require'app/config.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

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
  </head>

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
$home="explore"; 
include'nav.php'; ?>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6><?php echo $sname; ?> Marketing</h6>
          <h2>Discover Some Top Items</h2>
          <span>Home > <a href="#">Explore</a></span>
        </div>
      </div>
    </div>
    <div class="featured-explore">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-features owl-carousel">
              <div class="item">
                <div class="thumb">
                  <img src="assetss/images/facebookb.png" alt="" style="border-radius: 20px;">
                  <div class="hover-effect">
                    <div class="content">
                      <h4>FaceBook</h4>
                      <span class="author">
                        <img src="assetss/images/facebook.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                        <h6>Grow your audience with facebook follwers. <a href="sign-up">Just click here to signup</a></h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="thumb">
                  <img src="assetss/images/twitterb.png" alt="" style="border-radius: 20px;" height="350px">
                  <div class="hover-effect">
                    <div class="content">
                      <h4>Twitter</h4>
                      <span class="author">
                        <img src="assetss/images/twitter.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                        <h6>Grow your audience with Twitter Like and follower. <a href="sign-up">Just click here to signup</a></h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="thumb">
                <img src="assetss/images/tiktokb.png" alt="" style="border-radius: 20px;" height="350px">
                  <div class="hover-effect">
                    <div class="content">
                      <h4>Tiktok</h4>
                      <span class="author">
                        <img src="assetss/images/tiktokb.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                        <h6>Grow your audience with Tiktok Like and follower. <a href="sign-up">Just click here to signup</a></h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="thumb">
                <img src="assetss/images/youtubeb.png" alt="" style="border-radius: 20px;" height="350px">
                  <div class="hover-effect">
                    <div class="content">
                      <h4>YouTube</h4>
                      <span class="author">
                        <img src="assetss/images/youtubeb.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                        <h6>Grow your audience with Youtube Subscribers and likes. <a href="sign-up">Just click here to signup</a></h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="discover-items">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Discover Some Of Our <em>Items</em>.</h2>
          </div>
        </div>
        <div class="col-lg-7">
          <form id="search-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
              <!-- <div class="col-lg-4">
                <fieldset>
                    <input type="text" name="keyword" class="searchText" placeholder="Type Something..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-3">
                <fieldset>
                    <select name="Category" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                        <option selected>All Categories</option>
                        <option type="checkbox" name="option1" value="Music">Music</option>
                        <option value="Digital">Digital</option>
                        <option value="Blockchain">Blockchain</option>
                        <option value="Virtual">Virtual</option>
                    </select>
                </fieldset>
              </div>
              <div class="col-lg-3">
                <fieldset>
                    <select name="Price" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                        <option selected>Available</option>
                        <option value="Ending-Soon">Ending Soon</option>
                        <option value="Coming-Soon">Coming Soon</option>
                        <option value="Closed">Closed</option>
                    </select>
                </fieldset>
              </div>
              <div class="col-lg-2">                        
                <fieldset>
                    <button class="main-button">Search</button>
                </fieldset>
              </div> -->
            </div>
          </form>
        </div>
        <div class="col-lg-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="banner">Double Item</span>
              </div>
              <div class="col-lg-6 col-sm-6">
                <span class="author">
                  <img src="assetss/images/facebook.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assetss/images/facebookb.png" alt="" style="border-radius: 20px;">
                <h4>Facebook</h4>
              </div>
              <div class="col-lg-6 col-sm-6">
                <span class="author">
                  <img src="assetss/images/instagramb.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assetss/images/instagramb.png" alt="" style="border-radius: 20px;">
                <h4>InstaGram</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                  
                    <span>Get upto 1000 or More Facebook / Instagram like & follower for free</span>
                  
                 
                </div>
              </div>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="sign-up">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assetss/images/tiktokb.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assetss/images/tiktokb.png" alt="" style="border-radius: 20px;" height="230px">
                <h4>Tiktok</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                   
                <span>Get upto 1000 or More Tiktok like & follower for free</span>
                 
                </div>
              </div>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="sign-up">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assetss/images/twitter.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assetss/images/twitterb.png" alt="" style="border-radius: 20px;" height="200px">
                <h4>Twitter</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                <span>Get upto 1000 or More Twitter like & follower for free</span>
               
                </div>
              </div>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="sign-up">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assetss/images/youtubeb.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assetss/images/youtubeb.png" alt="" style="border-radius: 20px;">
                <h4>Youtube</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                <span>Get upto 1000 or More Youtube like & Subscribers for free</span>
               
               </div>
             </div>
             <div class="col-lg-12">
               <div class="main-button">
                 <a href="sign-up">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assetss/images/current-03.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assetss/images/current-03.jpg" alt="" style="border-radius: 20px;">
                <h4>Website Views</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                <span>Get upto 1000 or More Website Views for free</span>
               
               </div>
             </div>
             <div class="col-lg-12">
               <div class="main-button">
                 <a href="sign-up">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assetss/images/pinterest.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assetss/images/pinterest.png" alt="" style="border-radius: 20px;" height="220px">
                <h4>Pinterest</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                <span>Get upto 1000 or More Pinterest Save & follower for free</span>
               
               </div>
             </div>
             <div class="col-lg-12">
               <div class="main-button">
                 <a href="sign-up">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assetss/images/vimeo.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assetss/images/vimeo.png" alt="" style="border-radius: 20px;">
                <h4>Vimeo</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                <span>Get upto 1000 or More Vimeo Likes for free</span>
               
               </div>
             </div>
             <div class="col-lg-12">
               <div class="main-button">
                 <a href="sign-up">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="top-seller">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Other Items.</h2>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h4>1.</h4>
                <img src="assetss/images/askFm.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>AskFm<br><a href="sign-up">Upto 1000 Like for free</a></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>2.</h4>
                <img src="assetss/images/flickr.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Flickr<br><a href="sign-up">Upto 1000 Favorites for free</a></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>3.</h4>
                <img src="assetss/images/Myspace.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Myspace<br><a href="sign-up">Upto 1000 Connections for free</a></h6>
             </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h4>4.</h4>
                <img src="assetss/images/Odnoklassniki.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Odnoklassniki<br><a href="sign-up">Upto 1000 Joins for free</a></h6>
           </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>5.</h4>
                <img src="assetss/images/Soundcloud.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Soundcloud<br><a href="sign-up">Upto 1000 Like & Followers for free</a></h6>
        
            </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>6.</h4>
                <img src="assetss/images/Twitch.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Twitch<br><a href="sign-up">Upto 1000 Like & Followers for free</a></h6>
         </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h4>7.</h4>
                <img src="assetss/images/VKontakte.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>VKontakte<br><a href="sign-up">Upto 1000 Join & Followers for free</a></h6>
          </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>8.</h4>
                <img src="assetss/images/Reverbnation.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Reverbnation<br><a href="sign-up">Upto 1000 Fans for free</a></h6>
         </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>9.</h4>
                <img src="assetss/images/facebook.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Facebook Views<br><a href="sign-up">Upto 1000 Views for free</a></h6>
       </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h4>10.</h4>
                <img src="assetss/images/youtubeb.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Youtube Views<br><a href="sign-up">Upto 1000 Views for free</a></h6>
       </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>11.</h4>
                <img src="assetss/images/twitter.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Twitter Retweets<br><a href="sign-up">Upto 1000 Retweets for free</a></h6>
   </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>12.</h4>
                <img src="assetss/images/instagramb.png" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Instagram Comments<br><a href="sign-up">Upto 1000 Comments for free</a></h6>
        </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <p>Copyright © <?php echo date('Y'); ?> <a href="#"><?php echo $sname; ?></a>. All rights reserved.
          &nbsp;&nbsp;</p>
        </div>
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