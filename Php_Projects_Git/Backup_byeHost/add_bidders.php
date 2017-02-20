<?php
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
include('blogic.php');
$ob = new blogic();
$matchID=$_POST['match_id'];
//echo $matchID;
$teamSelectQuery = "SELECT * FROM b17_14312762_tallyworld.tally_match_details WHERE match_details_id=$matchID";
//echo $teamSelectQuery;
$result1 = $ob-> fetch_values($teamSelectQuery);
$bidderSelectQuery = "SELECT * FROM b17_14312762_tallyworld.tally_bidders";
$result2 = $ob-> fetch_values($bidderSelectQuery);
$row = mysql_fetch_array($result1);
$team1= $row['tally_team1'];
$team2= $row['tally_team2'];
}
?>
<!-- Here is the player addition form -->
<fieldset>
<legend>Player Details </legend>
<form id="myForm" action="sudo_add_bidders.php"  name="myForm" method="post" onsubmit="return follow_up_validate();" >
<table class="match-details">
<input type="hidden" value="<?php echo $row['match_details_id']; ?>" name="match_details_id" id="match_details_id" />

<input type="hidden" value="<?php echo $row['tally_match_date']; ?>" name="match_date" id="match_date" />
<tr>
<td>
                            <select name="playerName" id="playerName"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <?php
                            while($row = mysql_fetch_array($result2))
                                {
	                           echo '<option value="'. $row['bidder_id'] . '">'. $row['bidder_name']  . '</option>';
                                }
                           ?>

                           </select>
                            
</td> 
<td>
                            <select name="teamName" id="teamName"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="<?php echo $team1; ?>" ><?php echo $team1; ?></option>
                            <option value="<?php echo $team2; ?>" ><?php echo $team2; ?></option>
                            </select>
</td> 
<td><input type="text" name="rate" id="rate" size="10px" value="rate" onfocus="if (this.value=='rate') this.value='';" onblur="if(this.value == ''){this.value='rate';}"/></td>
<td><input type="text" name="initialAmount" size="10px" id="initialAmount" value="amount" onfocus="if (this.value=='amount') this.value='';" onblur="if(this.value == ''){this.value='amount';}"/></td>
<tr>
                      
                      <td colspan="4">
                        <input style="alignment-adjust: central;" class="styled-button-1" type="submit" name="submit" value="SAVE" />
                        <input class="styled-button-1" action="action" type="button" value="BACK" onclick="window.history.go(-1); return false;" />
                        <!-- <input type="reset" name="Cancel" value="Cancel" /> -->
                       </td>
                      </tr>
</table>
</form>
</fieldset>
<?php include ('sudo_footer_1.php'); ?>