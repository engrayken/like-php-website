<?PHP 
// require_once'../app/config.php'; 
// session_start();

if(isset($_POST['selected']) && isset($_POST['credit']) && isset($_POST['limit']) && isset($_POST['url']) && $_POST['pleaseme']==$_SESSION['bitcrow_userid'] && $row['password']==$_SESSION['bitcrow_password']) 
//&& $_POST['ll']==$_SESSION['goch'] && $_POST['gtoken']!='')
{

$api_url = 'https://www.like4like.org/api/v1/';

$api_key = 'd3570169526132e7f940a7a18a'; // Your API key

// public $api_key = 'd3570169526132e7f940a7a18a'; // Your API key

$order = array('service' => $servic['code'], 'link' => str_replace(' ', '',$_POST['url']), 'quantity' => str_replace(' ', '',$_POST['limit']), 'cpc' => str_replace(' ', '',$_POST['credit'])); 


     $post = array_merge(array('key' => $api_key, 'action' => 'add'), $order);

   
    
    $_post = Array();
    if (is_array($post)) {
        foreach ($post as $name => $value) {
            if ($name == 'link') {
                $_post[] = $name.'='.urlencode(str_replace('&', '9ampersand9', $value));
            } else {
                $_post[] = $name.'='.urlencode($value);
            }
        }
    }
    

        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
       $result = curl_exec($ch);

        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
       // return $result;

    
    }     
   
//     $resulte='{"error":"The URL has already been inserted."}';
//     $resultee=json_decode($resulte);
//     if($resultee->order!=''){

//    // echo $resultee->error;
//    } else{
//     echo $resultee->error;
//    }

?>