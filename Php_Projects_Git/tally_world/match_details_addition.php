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
//window.location = "match_details_player_addition.php"
$matchDetailsInsertQuery = " INSERT INTO tally_match_details (tally_team1,tally_team2,tally_match_type,tally_match_venue,tally_match_date) VALUES ('$teamName_1','$teamName_2','$matchType','$matchVenue','$matchdate')";
//"SELECT * FROM login_replicate WHERE username='$userName' AND password='$pass'";
//"INSERT INTO deployment_tracker_replicate (file_name,env,order_no,version,root,branch,module,domain_name,deployment_owner,deployment_date,requirement_details) VALUES('$_POST[filename]','$Env','$order','$version','$root','$branch','$module','$domain','$owner','$date','$dep_reason')";
$result = $ob-> insert($matchDetailsInsertQuery);
    if($result == "true")
    {
        echo '<script>alert("Record successfully inserted..!!!"); </script>';
        
    }
    else
    {
        echo '<script>alert("Data Not inserted in the DB..!!!!"); window.location = "sudo_error_page.php"</script>';
    }
}
}
?>
<?php include ('sudo_header.php'); ?>
<fieldset>
<legend style="font-family: Monotype Corsiva,arial,sans-serif; font-size:20px;">Match Details</legend>

<table>
<tr>
<td>Match</td>
<td><?php echo "$teamName_1"?> vs <?php echo "$teamName_2"?></td>
</tr>
<tr>
<td><label>Match Date :</label></td>
<td><label><?php echo "$matchdate" ?></label></td>
</tr>
<tr>
<td><label>Match Type :</label></td>
<td><label><?php echo "$matchType" ?></label></td>
</tr>
<tr>
<td><label>Match Venue :</label></td>
<td><label><?php echo "$matchVenue" ?></label></td>
</tr>
</table>
</form>
</fieldset>

<?php
     include ('sudo_footer_1.php'); 
?>
