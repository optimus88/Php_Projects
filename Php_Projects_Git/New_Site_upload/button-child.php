//button-child.php
<?php
session_start();
if(isset($_SESSION['admin']))
{
?>

<!-- Here is the player addition form -->
<fieldset>
<legend>Player Details </legend>
<form id="myForm" action="sudo_deploymentTracker.php"  name="myForm" method="post" onsubmit="return follow_up_validate();" >
<table style="cellpadding=5px; cellspacing=10px">
<tr>
<td>
                            <select name="playerName" id="playerName"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Ajay">Ajay</option>
							<option value="Abhishek">Abhishek</option>
							<option value="Mohan">Mohan</option>
							<option value="Nagmani">Nagmani</option>
							<option value="Indrajeet">Indrajeet</option>
                            </select>
                            
</td> 
<td>
                            <select name="teamName" id="teamName"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Oredr_2-Ear-1">Oredr_2-Ear-1</option>
                            <option value="Oredr_2-Ear-2">Oredr_2-Ear-2</option>
                            </select>
</td> 
<td><input type="text" name="rate" id="rate" size="10px" value="rate" onfocus="if (this.value=='rate') this.value='';" onblur="if(this.value == ''){this.value='rate';}"/></td>
<td><input type="text" name="initialAmount" size="10px" id="initialAmount" value="amount" onfocus="if (this.value=='amount') this.value='';" onblur="if(this.value == ''){this.value='amount';}"/></td>
<td><a href=#>Win</a></td>
<td><a href=#>Lose</a></td>
<tr>
                      <td></td>
                      <td>
                        <input class="styled-button-1" type="submit" name="submit" value="Save" />
                        <input action="action" type="button" value="Back1" onclick="window.history.go(-1); return false;" />
                        <input class="styled-button-1" type="button" onclick="location.href='match_details_player_addition.php'" value='Back'/>
                       <!-- <input type="reset" name="Cancel" value="Cancel" /> -->
                       <input type="button" onclick="self.close();" value="Close this window"/>
                       </td>
                      </tr>
</table>
</form>
</fieldset>
<?php }
?>