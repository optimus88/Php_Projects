<?php
include('blogic.php');
$ob = new blogic();
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
}
// Including the code for the selection and then displaying result set //

$teamSeriesQuery = "SELECT team_series FROM tally_teams GROUP BY team_series";
$result1 = $ob-> fetch_values($teamSeriesQuery);
if($result1 != 'false')
{
?>
<fieldset>
<legend>Please Select Series :</legend>
<form class="form-style" id="matchSeriesForm" action="match_list.php" name="matchSeriesForm" method="post" onsubmit="return match_details_selection();" > 
    <table class="match-details" style="cellpadding=15px; cellspacing=20px">
        <tr>
            <td style="width: 50% ;">Tournament Series :</td>
                <td><select name="series_name" id="series_name" onchange="this.form.submit();" >
                                <option value="select" >-----------------Select-----------------</option>
                                <?php 
                                while($row = mysql_fetch_array($result1))
                                    {
    	                               echo '<option value="'. $row['team_series'] . '" >'. $row['team_series']  . '</option>';
                                    }
                               ?>
                    </td>            
    
        </tr>
<!--        <tr>
            <td></td>
            <td>
                     <input class="styled-button-1" type="submit" name="submit_match_list_selection" value="Submit" />
                     <input class="styled-button-1" type="reset" name="Cancel" value="Cancel" /></td>
        </tr>--!>
    </table>
</form>
</fieldset>
<?php 
}
else
{
    echo '<script>alert("Sorry..!!! No Records Fetched.."); window.location = "sudo_welcome.php"</script>';
}

// Including the code for the selection and then displaying result set //
//if(isset($_POST['submit_match_list_selection']))
if(isset($_POST['series_name']))
    {  
        $series_name = $_POST['series_name'];
    
$matchListDisplay = "SELECT * FROM tally_match_details WHERE tally_series_type='$series_name' ORDER BY tally_match_date DESC ";
$matchDetailsList = $ob-> fetch_values($matchListDisplay);
?>
<br />
<fieldset>
<legend>Match Fixtures :</legend>
<br />

<form class="form-style" >
<table class="match-list" >
<tr><td>Teams</td><td>Match Type</td><td>Match Venue</td><td>Match Date</td><td>Match Result</td><td>Tournament</td></tr>
<?php
while ($row = mysql_fetch_array($matchDetailsList))
{
    $match_id = $row['match_details_id'];
    $teamName_1= $row['tally_team1'];
    $teamName_2= $row['tally_team2'];
    $matchType= $row['tally_match_type'];
    $matchVenue= $row['tally_match_venue'];
    $matchdate= $row['tally_match_date'];
    $seriesName = $row['tally_series_type'];
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
<tr><td><a href="match_details_player_addition.php?id=<?php echo $match_id;?> "><?php echo $teamName_1; ?> vs <?php echo $teamName_2; ?></a></td><td><?php echo $matchType; ?></td><td><?php echo $matchVenue; ?></td><td><?php echo $matchdate; ?></td><td><?php echo $flag_value; ?></td><td><?php echo $seriesName; ?></td></tr>

</form>

</fieldset>
<?php 
}
}
else
{
   //echo '<script>alert("Please Select the series..!!!"); window.location = "match_list.php"</script>';
   include ('sudo_footer_1.php');
}

?>
