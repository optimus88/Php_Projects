<?php
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
include('blogic.php');
$ob = new blogic();
$teamName_1=$_POST['teamName1'];
$teamName_2=$_POST['teamName2'];
//echo $order;
$matchType=$_POST['matchDate'];

//echo $version;
$match_details_id = $_POST['match_details_id'];
$matchResultDecide = "SELECT * FROM tallyworld.tally_match_details WHERE tally_match_flag=0 AND match_details_id=$match_details_id";
$result1 = $ob-> fetch_values($matchResultDecide);
?>
<fieldset>
<legend style="font-family: Monotype Corsiva,arial,sans-serif; font-size:20px;">Match Result Declaration :</legend>
<form action="result_manupulation.php" method="post" id="" name="match_result" >
<table class='match-details'>
<tr><th id="td-header">Teams</th><th>Match Type</th><th>Match Venue</th><th>Match Date</th><th>Match Result</th></tr>
<?php
if ($result1 == "false" || $result1 == null)
{
    echo '<script>alert("No Match for deciding the Result..!!!"); window.location = "sudo_welcome.php"</script>';
}

  else
    {
      while ($row = mysql_fetch_array($result1))
        {
        $match_id = $row['match_details_id'];
        $teamName_1= $row['tally_team1'];
        $teamName_2= $row['tally_team2'];
        $matchType= $row['tally_match_type'];
        $matchVenue= $row['tally_match_venue'];
        $matchdate= $row['tally_match_date'];

?>
<tr><td><?php echo $teamName_1; ?> VS <?php echo $teamName_2 ?> </td><td><?php echo $matchType; ?></td><td><?php echo $matchVenue; ?></td><td><?php echo $matchdate; ?></td>
<td colspan="2"><input type="radio" name="teamName" id="teamName" value="<?php echo $teamName_1;?>"/><?php echo $teamName_1;?>
                <input type="radio" name="teamName" id="teamName" value="<?php echo $teamName_2;?>"/><?php echo $teamName_2;?></td>
</tr>  
<?php      
    }
    } 
?>

<tr><td colspan="5">
<input class="styled-button-1" type="submit" name="Submit Result" />
<input class="styled-button-1" type="button" name="back" value="Back" onclick="window.history.go(-1); return false;" />
</td>
<tr>
    
        <input type="hidden" name="matchID" value="<?php echo $match_id;?>"  id="matchID" />
        <input type="hidden" name="matchDate" value="<?php echo $matchdate;?>"  id="matchDate" />
    
</tr></tr>
</table>

</form>
</fieldset>
<?php
}
include ('sudo_footer_1.php'); 
?>