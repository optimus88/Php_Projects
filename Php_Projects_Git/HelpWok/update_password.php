<?php
//session_start();
//if(isset($_SESSION['sso_id']))
if(isset($_POST['submit']))
{
    include_once('blogic.php');
    $ob = new blogic();
        //$sso_id_user=$_SESSION['sso_id'];
		$email_id = $_POST['email_id'];
		//echo $email_id;
		
        $new_pass=md5($_POST['new_password']);
		//echo $new_pass;
        $query = "UPDATE login_replicate SET password='$new_pass' WHERE email_id='$email_id'";
        //echo $query;
        $result = $ob-> update_password($query);
            if($result == 'true')
                {
                        echo '<script>alert("Password Updated successfully...!!!"); window.location = "welcome.php"</script>';
               //header("location: welcome.php?remarks=success");
                }
            else
                {
                        //echo "error";
                        echo '<script>alert("Password could Not be Updated..!!!"); window.location = "welcome.php"</script>';
        //redirect('index.php', 'refresh');
        
                }
}
else
include ('index.php');
?>