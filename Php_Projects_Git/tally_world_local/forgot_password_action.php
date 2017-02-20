<?php
/**
 * @author optimus
 * @copyright 2016
 */
include('blogic.php');
$ob = new blogic();

if(isset($_POST['chk_forgot_password']))
{
    $userName=$_POST['uname'];
    $password=$_POST['upass'];
    //echo $userName;
    //echo $password;
    $userExistQuery = "SELECT * FROM tally_bidders WHERE bidder_login_name='$userName'";
//echo $qr;
   $result = $ob-> login($userExistQuery);
   //echo "echo of the result : $result";
   if ($result != false && $result != null)
   {
        $row = mysql_fetch_array($result);
        $bidderID=$row['bidder_id'];
        echo $bidderID;
        //UPDATE `tally_bidders` SET `bidder_password`='guest1' WHERE `bidder_login_name`='guest'
        $passwordResetQuery="UPDATE tally_bidders SET bidder_password='$password' WHERE bidder_login_name='$userName' AND bidder_id=$bidderID";
        echo $passwordResetQuery;
        $passwordUpdate = $ob-> update_password($passwordResetQuery);
        echo $passwordUpdate;
        if ($passwordUpdate == true )
        {
           echo '<script>alert("Password updated successfully.Please login with the new password..!!"); window.location = "index.php"</script>'; 
        }
        else
        {
            echo '<script>alert("Opps! Really sorry. Seems to be some problem. Please Re-Try..!!"); window.location = "forgot_password.php"</script>';
        }
   }
   else
   {
    //echo "Unsuccessful login";
    echo '<script>alert("Currently You do not hold any account with us..! Please Register"); window.location = "tally_registration.php"</script>';
    //header("location: index.php?remarks=unsuccessful");
   }
}
?>