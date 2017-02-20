<?php
if(isset($_SESSION['admin']))
{
  $biddersDetailsDeclared = "SELECT * FROM b17_14312762_tallyworld.tally_transaction_details, b17_14312762_tallyworld.tally_bidders WHERE tally_bidder_name=bidder_id AND tally_match_details_id_fk='$match_id' AND tally_transc_flag =1 ";
  $resultBiddersDetailsDeclared = $ob-> fetch_values($biddersDetailsDeclared);
  if ($resultBiddersDetailsDeclared == true || $resultBiddersDetailsDeclared != null)
  {
?>
<br />
<fieldset>
<legend>Bidders Played :</legend>
<table class="match-details">
<tr><th id="td-header">Bidder Name</th><th>Bidding Team</th><th>Bidding Rate</th><th>Bidding Amount</th><th>Match Result</th></tr>
<?php
while ($row = mysql_fetch_array($resultBiddersDetailsDeclared))
{
    $bidderId = $row['bidder_id'];
    $biddersName = $row['bidder_name'];
    $BiddersTeanName= $row['tally_team_name'];
    $BiddingRate= $row['tally_rate'];
    $BiddingAmount= $row['tally_amt'];
    $transc_id= $row['tally_transc_id'];
	$match_Result=$row['tally_match_result'];
?>

<tr><td><?php echo $biddersName; ?> </td><td><?php echo $BiddersTeanName; ?></td><td><?php echo $BiddingRate; ?></td><td><?php echo $BiddingAmount; ?></td>
<td><?php echo $match_Result;?></td>


<?php 
    } 
  }
}
?>
</table>
</fieldset>