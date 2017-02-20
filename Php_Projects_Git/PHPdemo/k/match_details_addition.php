<?php
include('blogic.php');
$ob = new blogic();
session_start();
if(isset($_SESSION['admin']))
{
 if(isset($_POST['submit_match_details']))
 {
    
 
$teamName_1=$_POST['teamName_1'];
$teamName_2=$_POST['teamName_2'];
//echo $order;
$matchType=$_POST['matchType'];
$matchVenue=$_POST['matchVenue'];
//echo $version;
$matchdate = $_POST['matchdate'];
//echo $branch;

$matchDetailsInsertQuery = "SELECT * FROM login_replicate WHERE username='$userName' AND password='$pass'";
//"INSERT INTO deployment_tracker_replicate (file_name,env,order_no,version,root,branch,module,domain_name,deployment_owner,deployment_date,requirement_details) VALUES('$_POST[filename]','$Env','$order','$version','$root','$branch','$module','$domain','$owner','$date','$dep_reason')";
$result = $ob-> insert($matchDetailsInsertQuery);
    if($result == "true")
    {
        echo '<script>alert("Record successfully inserted..!!!"); window.location = "match_details_player_addition.php"</script>';
        
    }
    else
    {
        echo '<script>alert("Data Not inserted in the DB..!!!!"); window.location = "sudo_error_page.php"</script>';
    }
}
}
?>