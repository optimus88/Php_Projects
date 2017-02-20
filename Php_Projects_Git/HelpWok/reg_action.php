<?php

include_once('blogic.php');
$ob = new blogic();

//$name=mysql_real_escape_string($_POST['name']);
$name=$_POST['name'];
//$username=mysql_real_escape_string($_POST['uname']);
$username=$_POST['uname'];
//$pass=mysql_real_escape_string(md5($_POST['pass']));
$pass=md5($_POST['pass']);
$email_id=$_POST['email'];
$sso = $_POST['sso_id'];
$status = 1;
echo $pass;
echo $name;
echo $username  ;
//$root=$_POST['root'];
//$domain = $_POST['domain'];
//$owner = $_POST['owner'];
//$date = $_POST['date'];
//$module = $_POST['module'];

//echo $filename;
//echo $Env;

if($name != '' || $username != '' || $email != '' || $sso != '' )
{
if(isset($_POST['submit']))
{

$query = "INSERT INTO login_replicate (sso_id,name,username,password,email_id,status) VALUES('$sso','$name','$username','$pass','$email_id','$status')";
  //$query = "INSERT INTO login_replicate VALUES($sso,$name,$username,$pass,$email_id,$status)";
    $result = $ob-> insert($query);
    if($result == 'true')
    {
               echo '<script>alert("User Successfully Created!"); window.location = "welcome.php"</script>';
               //header("location: welcome.php?remarks=success");
    }
    else
    {
        echo '<script>alert("Data Not inserted in the DB..!!!!"); window.location = "welcome.php"</script>';
        //redirect('index.php', 'refresh');
        
    }
    
   // header("location: welcome.php?remarks=success");
   //else
    //die('Could not fetch data: ' . mysql_error());
}

}    
?>