<fieldset>
<legend>Bidders in the Game :</legend>
<?php
//include('blogic.php');
//$ob = new blogic();
//session_start();
if(isset($_SESSION['admin']))
{
  //$biddersDetails = "SELECT * FROM b17_14312762_tallyworld.tally_transaction_details WHERE tally_match_details_id_fk='$match_id'";
  $biddersDetails = "SELECT * FROM b17_14312762_tallyworld.tally_transaction_details, b17_14312762_tallyworld.tally_bidders WHERE tally_bidder_name=bidder_id AND tally_match_details_id_fk='$match_id' ";
  $resultBiddersDetails = $ob-> fetch_values($biddersDetails);
  if ($resultBiddersDetails == true || $resultBiddersDetails != null)
  {
?>
<table class="match-details">
<tr><th id="td-header">Bidder Name</th><th>Bidding Team</th><th>Bidding Rate</th><th>Bidding Amount</th><th colspan="2">Edit/Del</th></tr>
<?php
while ($row = mysql_fetch_array($resultBiddersDetails))
{
    $bidderId = $row['bidder_id'];
    $biddersName = $row['bidder_name'];
    $BiddersTeanName= $row['tally_team_name'];
    $BiddingRate= $row['tally_rate'];
    $BiddingAmount= $row['tally_amt'];
    $transc_id= $row['tally_transc_id'];
    //$matchdate= $row['tally_match_date'];

?>

<tr><td><?php echo $biddersName; ?> </td><td><?php echo $BiddersTeanName; ?></td><td><?php echo $BiddingRate; ?></td><td><?php echo $BiddingAmount; ?></td>
<td><a href="edit_n_delete.php?id=<?php echo $transc_id;?>&pid=<?php echo $bidderId;?> ">Edit</a></td><td><a href="edit_n_delete.php">Delete</a></td></td>
</fieldset>
<?php 
    } 
    }
    else
    {
        echo '<strong><i>Bidders yet to be Added for the Match..!!!<i></strong>';
    }
    }
      ?>