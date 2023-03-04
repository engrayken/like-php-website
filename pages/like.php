<html>
  <head>
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>

<style type="text/css">
    /* body {
width:520px;
margin:0; padding:0; border:0;
font-family: verdana;
background:url(repeat.png) repeat;
margin-bottom:10px;
} */
/* p, h1 {width:450px; margin-left:50px; color:#FFF;}
p {font-size:11px;} */

#container_notlike, #container_like, #login {
    display:none
}
    </style>
  </head>
  <body>
  <div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({
    appId  : '569222711893252',
    status : true, 
    cookie : true, 
    xfbml  : true  
   // test app 569222711893252
  });
</script>

<div id="login" style="padding-left:5px; text-align:center;">
    You are not logged in to FB, Please click<a href="#"> here </a> to login.
</div>

<div id="container_notlike">
YOU DONT LIKE
</div>

<div id="container_like">
YOU LIKE
</div>

<script>
var hideLogin = function(){
   $("#login").hide();
}
    
var showLogin = function(){
   $("#login").show();
}


var doLogin = function(){
    FB.login(function(response) {
      if (response.session) {
           hideLogin();
           checkLike(response.session.uid)
      } else {
        // user is not logged in
      }
    });
}
    
var checkLike = function(user_id){
    var page_id = "102798099396060"; //coca cola
    var fql_query = "SELECT uid FROM page_fan WHERE page_id = "+page_id+"and uid="+user_id;
    var the_query = FB.Data.query(fql_query);
          
          the_query.wait(function(rows) {

              if (rows.length == 1 && rows[0].uid == user_id) {
                  $("#container_like").show();

                  //here you could also do some ajax and get the content for a "liker" instead of simply showing a hidden div in the page.
                  
              } else {
                  $("#container_notlike").show();
                  //and here you could get the content for a non liker in ajax...
              }
          });        
}
    
$(document).ready(function(){
    FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        hideLogin();
        checkLike(response.authResponse.userID)
      } else {
        showLogin();
      }
     });
    
    $("#login a").click(doLogin);

});

  </script>
  </body>
</html>