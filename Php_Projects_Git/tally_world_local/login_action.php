<?php
include('blogic.php');
$ob = new blogic();

if(isset($_POST['chk_login']))
{
    //$sso=mysql_real_escape_string( $_POST['uname'] );
    $userName=$_POST['uname'];
    //$pass=mysql_real_escape_string( md5($_POST['upass']) );
    $pass=$_POST['upass'];
//if ( empty($sso) || empty($pass) )
//{
//    echo '<script>alert("Please Enter both username and password...!!"); window.location = "index.php"</script>';
//}
//else
//{
//$qr = "SELECT * FROM reg where username =$name AND password =$pass";
    $loginQuery = "SELECT * FROM tally_bidders WHERE bidder_login_name='$userName' AND bidder_password='$pass'";
//echo $qr;
   $result = $ob-> login($loginQuery);
   $user_sessionName="";
     if ($result != false && $result != null)
        {
            $row = mysql_fetch_array($result);
            $userNameDB = $row['bidder_login_name'];
            $passwordDb = $row['bidder_password'];
            $displayNameDB = $row['bidder_name'];
            $userID_DB = $row['bidder_id'];
         if ($row['bidder_type'] == 'admin')
         {
            session_start();
            $user_sessionName="$displayNameDB";
            $_SESSION["admin"]=$user_sessionName;
            header("location: sudo_welcome.php?remarks=success");
            
         } 
         elseif ($row['bidder_type'] == 'user')
        {
           session_start();
           $user_sessionName=ucfirst("$displayNameDB");
           $_SESSION["guest"]=$user_sessionName;
           $_SESSION["guest_id"]=$userID_DB;
           header("location: guest_welcome_page.php?remarks=success");
        }  
         
   }
   
   else
   {
    //echo "Unsuccessful login";
    echo '<script>alert("Could not find your Details please register...!!"); window.location = "index.php"</script>';
    //header("location: index.php?remarks=unsuccessful");
   }

//header("location: index.php?remarks=success");

}


?>