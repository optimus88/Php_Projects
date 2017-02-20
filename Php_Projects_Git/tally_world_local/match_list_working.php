<?php
include('blogic.php');
$ob = new blogic();
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
}

$matchListDisplay = "SELECT * FROM tally_match_details ORDER BY tally_match_date DESC ";
$matchDetailsList = $ob-> fetch_values($matchListDisplay);
?>
<br />
<fieldset>
<legend>Match Fixtures :</legend>
<br />

<form class="form-style" >
<table class="match-list" >
<tr><td>Teams</td><td>Match Type</td><td>Match Venue</td><td>Match Date</td><td>Match Result</td></tr>
<?php
while ($row = mysql_fetch_array($matchDetailsList))
{
    $match_id = $row['match_details_id'];
    $teamName_1= $row['tally_team1'];
    $teamName_2= $row['tally_team2'];
    $matchType= $row['tally_match_type'];
    $matchVenue= $row['tally_match_venue'];
    $matchdate= $row['tally_match_date'];
    $flag=$row['tally_match_flag'];
    if ($flag == 0)
    {
        $flag_value="Not yet Decided";
    }
    else
    {
        $flag_value="Declared";
    }
    ?>
<tr><td><a href="match_details_player_addition.php?id=<?php echo $match_id;?> "><?php echo $teamName_1; ?> vs <?php echo $teamName_2; ?></a></td><td><?php echo $matchType; ?></td><td><?php echo $matchVenue; ?></td><td><?php echo $matchdate; ?></td><td><?php echo $flag_value; ?></td></tr>

</form>

</fieldset>
<?php 
}
?>
