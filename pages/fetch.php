<?php
//include('connect.php');
$u=(int)$_POST['user_id'];
// $u="1";

include("../app/config.php");

file_put_contents('test.txt', $u);

if(isset($_POST['view'])){

// $con = mysqli_connect("localhost", "root", "", "notif");

if(addslashes($_POST["view"] != ''))
{



  // $update_query = "UPDATE comments SET comment_status = 1 WHERE comment_status=0 and user_id='$u' "; mysqli_query($dbc, $update_query);

$comment_statuss=1;
$comment_status=0;

  $update_query=$dbc->prepare("UPDATE comments SET comment_status = ? WHERE comment_status=? and user_id= ?");
   $update_query->bind_param("iii", $comment_statuss, $comment_status, $u);
 $update_query->execute();
 $update_query->close();

}
$query = "SELECT * FROM comments where user_id='$u' ORDER BY comment_id DESC LIMIT 5";
$result = mysqli_query($dbc, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  $text=wordwrap($row["comment_text"], 50,"<br />\n");
   $output .= '
   <a class="dropdown-item border-radius-md" href="javascript:;">
   <div class="d-flex py-1">
     <div class="my-auto">
       <img src="assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
     </div>
     <div class="d-flex flex-column justify-content-center">
       <h6 class="text-sm font-weight-normal mb-1">
         <span class="font-weight-bold">New message</span> from Admin
       </h6> <span class="font-weight-bold">'.$row["comment_subject"].'</span>

       <p id="openm" class="text-xs text-secondary mb-0"> '.$text.'</p>

       <p class="text-xs text-secondary mb-0">
         <i class="fa fa-clock me-1"></i>
        <b> '.$row["timed"].'</b>
       </p>
     </div>
   </div>
 </a>';

 }
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}



$status_query = "SELECT * FROM comments WHERE comment_status=0 and user_id='$u' ";
$result_query = mysqli_query($dbc, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);

echo json_encode($data);

}

?>