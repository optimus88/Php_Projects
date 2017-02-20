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
//$qr = "SELECT * FROM login_replicate WHERE username='$userName' AND password='$pass'";
//echo $qr;
   //$result = $ob-> login($qr);
   
   if($userName == 'admin' && $pass == 'admin@123' )
   {
    //session_start();
    //$_SESSION['name'] = $name;
    //echo "The Login is SuccessFull and i am logged in";
    session_start();
    $_SESSION['admin']='Keshav_IPL_Tally';
    header("location: sudo_welcome.php?remarks=success");
    //location : "index.php";
   }
   else
   {
    //echo "Unsuccessful login";
    header("location: index.php?remarks=unsuccessful");
   }

//header("location: index.php?remarks=success");

}


?>