<?php
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
}
include('blogic.php');
$ob = new blogic();
if(isset($_POST['submit_match_details_selection']))
    {  
        $series_name = $_POST['series_name'];
        //echo "name of the series : $series_name";
        $teamSelectQuery = "SELECT team_id,team_name FROM tally_teams WHERE team_series='$series_name'";
        //echo $teamSelectQuery;
        $result1 = $ob-> fetch_values($teamSelectQuery);
        $result2 = $ob-> fetch_values($teamSelectQuery);
        //echo "Result value :";
        //echo $result1;
        if($result1 != 'false')
        {
?>
<fieldset>
<legend style="font-family: Monotype Corsiva,arial,sans-serif; font-size:20px;">Match Details</legend>
<form class="form-style" id="myForm" action="match_details_addition.php" name="myForm" method="post" onsubmit="return match_details_validate();" >
<table class="match-details" style="cellpadding=15px; cellspacing=20px">
<!--<form id="myForm" action="match_details_player_addition.php" name="myForm" method="post" onsubmit="return match_details_validate();" >
<table class="profile_table" style="cellpadding=15px; cellspacing=20px">-->
<tr>
<td style="width: 50% ;">Team Name (T1) :</td>
<td>
                            <select name="teamName_1" id="teamName_1"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <?php 
                            while($row = mysql_fetch_array($result1))
                                {
	                           echo '<option value="'. $row['team_id'] . '">'. $row['team_name']  . '</option>';
                                }
                           ?>
                            

<tr>
<td></td>
<td><label id="vs">Vs</label></td>
</tr>                            
</td> 
</tr>
<tr>
<td>Team Name (T2) :</td>
<td>
                            <select name="teamName_2" id="teamName_2"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <?php 
                            while($row = mysql_fetch_array($result2))
                                {
	                           echo '<option value="'. $row['team_id'] . '">'. $row['team_name']  . '</option>';
                                }
	        
                            ?>

                            </select>
<?php 
}
    else
    echo '<script>alert("Sorry..!!! No Records Fetched.."); window.location = "index.php"</script>';
 ?>                           
</td> 
</tr>
<tr>
<td>Match Type :</td>
<td>
                            <select name="matchType" id="matchType" >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Day">Day</option>
                            <option value="D/N">Day & Night</option>
                            </select>
</td>
</tr>
<tr>
<td>Match Venue :</td>
<td>

		
							<select name="matchVenue" id="matchVenue" >
                            <option value="select" >-----------------Select-----------------</option>
							<option value="Delhi">Delhi</option>
							<option value="Punjab">Punjab</option>
							<option value="Chennai">Chennai</option>
                            <option value="Mumbai">Mumabai</option>
							<option value="Kolkata">Kolkata</option>	
							<option value="Hydrabad">Hydrabad</option>
							<option value="Rajsthan">Rajsthan</option>
							<option value="Bngalore">Bangalore</option>
                            </select>
							
</td> 
</tr>
<tr>
<td>Match Date :</td>
<td><input type="text" name="matchdate" size="24px" id="matchDate" /></td>

</tr>
<tr>
                      <!--<td></td>--!>
                      <td colspan="2" style="padding-left: 140px; alignment-adjust: middle;">
                      <input type="hidden" name="seriesType" id="seriesType" value="<?php echo $series_name; ?>" />
                        <input class="styled-button-1" type="submit" name="submit_match_details" value="Submit" />
                        <input class="styled-button-1" type="reset" name="Cancel" value="Cancel" /></td>
                        
                      </tr>
</table>
</form>
</fieldset>
<?php 
    }
    else
    {
        echo '<script>alert("Sorry..!!! SomeError Occoured.."); window.location = "sudo_welcome.php"</script>';
    }
include ('sudo_footer_1.php'); ?>
