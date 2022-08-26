<?php
include_once("/home/indiamart/public_html/hellotravel-agents/includes/common.php");
function pass_all_parameterss_header_commo_new1($args){
        foreach($args as $k=>$v){
                $v=str_replace('||',"",$v);
                $v=str_replace('&&',"",$v);
                $v=str_replace('&&',"",$v);
                $v=str_replace('XOR',"",$v);
                $v=preg_replace('/sleep/i','',$v);
                $v=preg_replace('/\bdelete\b/i','',$v);
                if(preg_match('/DROP/i',$v) && (preg_match('/TABLE/i',$v) || preg_match('/DATABASE/i',$v))){
                        $v=preg_replace('/DROP/i','',$v);
                }
                $args[$k]=$v;
        }
        return $args;
  }
$_POST=pass_all_parameterss_header_commo_new1($_POST);
$name= $_POST['name'];
$email= $_POST['email'];
$mobile= $_POST['mobile'];

 // $to='ravi.1610910@kiet.edu';
 // $subject=' Hellotravel';
 // $message='
 // Name=$name
 // Email=$email
 // Mobile=$mobile
 // ';
 // 	$headers='From:ravivishu2@gmail.com'"\r\n";
 // 	mail($to,$subject,$message,$headers);

$insert= "INSERT INTO `holiday`(`name`, `email`, `mobile`) VALUES ('$name','$email','$mobile')";
#echo $insert;
 $run= idbprocess($insert);
//print_r($run);die(); 
  if($run)
  
  {  
   
    $fromemail = "satish.kumar@hellotravel.com";
    #$fromemail = "dharmendra.tiwari@hellotravel.com";
       $fromname = "Hellotravel";
       $toemail='gaurav@hellotravel.com';
       #$toemail='ravi.vishu@hellotravel.com';
       $subject=' Hellotravel';
       $content='Name='.$name.'<br>Email='.$email.'<br>Mobile='.$mobile;
       $category = "Enquiry Mail";
      $returndata = Falconide_Trans_Mail($fromemail, $fromname, $toemail, $subject, $content, $category);
      $data = json_decode($returndata,true);
      //print_r($data);
/*      if($data['message']=='SUCCESS'){*/
        echo "<h1 text >!!Thank You..</h1>"; die;
 /*     }else{
        echo "<h1>!Error</h1>"; die;
      }
*/
  }



?>
