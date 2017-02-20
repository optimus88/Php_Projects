<?php

include_once('blogic.php');
$ob = new blogic();
$filename=$_POST['filename'];
$order=$_POST['order'];
//echo $order;
$Env=$_POST['env'];
$version=$_POST['version'];
//echo $version;
$branch = $_POST['branch'];
//echo $branch;
$root=$_POST['root'];
//echo $root;
$domain = $_POST['domain'];
//echo $domain;
$owner = $_POST['owner'];
//echo $owner;
$date = $_POST['date'];
//echo $date;
$module = $_POST['module'];
$dep_reason = $_POST['dep_reason'];
//echo $module;

//echo $filename;
//echo $Env;

if($version != '' && $owner != '' && $date != '' && $dep_reason != '' )
{
if(isset($_POST['submit']))
{

$query = "INSERT INTO deployment_tracker_replicate (file_name,env,order_no,version,root,branch,module,domain_name,deployment_owner,deployment_date,requirement_details) VALUES('$_POST[filename]','$Env','$order','$version','$root','$branch','$module','$domain','$owner','$date','$dep_reason')";
  
    $result = $ob-> insert($query);
    if($result == "true")
    {
	
		/* $subject = "Email Test"; 
		$message = "This is just a mail test"; 
		$emailaddress = "keshav4u.88@gmail.com"; 
		$mail=mail($emailaddress, $subject, $message, "From:admin_tracker@optimus.byethost17.com"); 
			if ($mail)
				{ 
					echo"Message has been sent"; 
				} 
			else
				{ 
					echo"Message not sent this time"; 
				}  */

               echo '<script>alert("You Have Successfully inserted Record!"); window.location = "sudo_welcome.php"</script>';
               //header("location: welcome.php?remarks=success");
    }
    else
    {
        echo '<script>alert("Data Not inserted in the DB..!!!!"); window.location = "sudo_error_page.php"</script>';
        //redirect('index.php', 'refresh');
        
    }
    
   // header("location: welcome.php?remarks=success");
   //else
    //die('Could not fetch data: ' . mysql_error());
}
else
echo '<script>alert("Data Not inserted in the DB..!!!!"); window.location = "sudo_error_page.php"</script>';
}
else
echo '<script>alert("Data Not inserted in the DB..!!!!"); window.location = "sudo_error_page.php"</script>';    
?>