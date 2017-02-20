<?php
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
include ('sudo_header.php');
}
}
?>
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
<form action="add_bidders.php" >
<div>
<input type="button" onclick=window.open("button-child.php","demo","width=750,height=300,left=150,top=200,toolbar=0,status=0,"); value="Open child Window">
 <input type="submit" name="addBidders" value="Add Bidders" />
</div>
</form>
</fieldset>

<?php include ('sudo_footer_1.php'); ?>