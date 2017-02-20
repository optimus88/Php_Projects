<?php
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
}
?>
<fieldset>
<legend style="font-family: Monotype Corsiva,arial,sans-serif; font-size:20px;">Match Details</legend>
<!--<form id="myForm" action="match_details_addition.php" name="myForm" method="post" onsubmit="return match_details_validate();" >
<table class="profile_table" style="cellpadding=15px; cellspacing=20px"> -->
<form id="myForm" action="match_details_player_addition.php" name="myForm" method="post" onsubmit="return match_details_validate();" >
<table class="profile_table" style="cellpadding=15px; cellspacing=20px">
<tr>
<td style="width: 50% ;">Team Name (T1) :</td>
<td>
                            <select name="teamName_1" id="teamName_1"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Oredr_1-Ear-1">Oredr_1-Ear-1</option>
                            <option value="Oredr_1-Ear-2">Oredr_1-Ear-2</option>
                            <option value="Oredr_1-Ear-3">Oredr_1-Ear-3</option>
                            <option value="Oredr_1-Ear-4">Oredr_1-Ear-4</option>
                            <option value="Oredr_1-Ear-5">Oredr_1-Ear-5</option>
                            </select>


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
                            <option value="Oredr_2-Ear-1">Oredr_2-Ear-1</option>
                            <option value="Oredr_2-Ear-2">Oredr_2-Ear-2</option>
                            <option value="Oredr_2-Ear-3">Oredr_2-Ear-3</option>
                            <option value="Oredr_2-Ear-4">Oredr_2-Ear-4</option>
                            <option value="Oredr_2-Ear-5">Oredr_2-Ear-5</option>
                            </select>
                            
</td> 
</tr>
<tr>
<td>Match Type :</td>
<td>
                            <select name="matchType" id="matchType" >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="D">Day</option>
                            <option value="D/N">Day & Night</option>
                            </select>
</td>
</tr>
<tr>
<td>Match Venue :</td>
<td>

		
							<select name="matchVenue" id="matchVenue" >
                            <option value="select" >-----------------Select-----------------</option>
							<option value="Del">Delhi</option>
							<option value="Pun">Punjab</option>
							<option value="Chn">Chennai</option>
                            <option value="Mum">Mumabai</option>
							<option value="Kol">Kolkata</option>	
							<option value="Hyd">Hydrabad</option>
							<option value="Raj">Rajsthan</option>
							<option value="Bng">Bangalore</option>
                            </select>
							
</td> 
</tr>
<tr>
<td>Match Date :</td>
<td><input type="text" name="matchdate" size="30px" id="matchDate" /></td>

</tr>
<tr>
                      <td></td>
                      <td>
                        <input type="submit" name="submit_match_details" value="Submit" />
                        <input type="reset" name="Cancel" value="Cancel" /></td>
                      </tr>
</table>
</form>
</fieldset>
<?php include ('sudo_footer_1.php'); ?>
