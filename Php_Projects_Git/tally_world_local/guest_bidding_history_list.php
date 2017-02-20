<fieldset>
<legend>Your Bidding Details :</legend>
<?php
//include('blogic.php');
//$ob = new blogic();
//session_start();
if(isset($_SESSION['guest']))
{
	  $userID = $_SESSION["guest_id"];
	  //$biddersDetails = "SELECT * FROM b17_14312762_tallyworld.tally_transaction_details WHERE tally_match_details_id_fk='$match_id' AND ";
	  $biddersDetails = "SELECT * FROM tally_transaction_details, tally_bidders WHERE tally_bidder_name=bidder_id AND tally_match_details_id_fk='$match_id' AND bidder_id = '$userID'";
	  //echo $biddersDetails;
	  $resultBiddersDetails = $ob-> fetch_values($biddersDetails);
	  if ($resultBiddersDetails == true || $resultBiddersDetails != null)
		{
?>

<table class="guest-login">
<tr style="font-size: 16px;"><td ><b>Bidder Name</b></td><td><b>Bidding Team</b></td><td><b>Bidding Ratio</b></td><td><b>Bidding Amount:</b></td><td><b>Result:</b></td><td><b>Net Amount:</b></td></tr>
<?php
while ($row = mysql_fetch_array($resultBiddersDetails))
{
    $bidderId = $row['bidder_id'];
    $biddersName = $row['bidder_name'];
    $BiddersTeanName= $row['tally_team_name'];
    $BiddingRate= $row['tally_rate'];
    $BiddingAmount= $row['tally_amt'];
    $transc_id= $row['tally_transc_id'];
    $transc_flag=$row['tally_transc_flag'];
    $transc_result=$row['tally_match_result'];
    
    if ($transc_result == 'W')
    {
        $result_final="WON";
        $netAmount = $BiddingRate*$BiddingAmount;
    }
    else
    {
        $result_final="LOST";
        $netAmount = -$BiddingAmount;
    }
    
    //$matchdate= $row['tally_match_date'];
 if ($transc_flag == 1) 
 {?>
    <tr><td><?php echo $biddersName; ?> </td><td><?php echo $BiddersTeanName; ?></td><td><?php echo $BiddingRate; ?></td><td><?php echo $BiddingAmount; ?></td>
    <td><?php echo $result_final;?></td><td><?php echo $netAmount;?></td>
    
    
    </fieldset>
    
 <?php }
    else 
        {
?>

<tr><td><?php echo $biddersName; ?> </td><td><?php echo $BiddersTeanName; ?></td><td><?php echo $BiddingRate; ?></td><td><?php echo $BiddingAmount; ?></td>
<td><a href="edit_n_delete.php?id=<?php echo $transc_id;?>&pid=<?php echo $bidderId;?> ">Edit</a></td><td><a href="edit_n_delete.php">Delete</a></td></tr>

</fieldset>

<?php 
    } 
    }
    }
    else
    {
        echo '<strong><p><i>Sorry to Say but you did not play this match..!!!<i></p></strong>';
    }
    }
      ?>