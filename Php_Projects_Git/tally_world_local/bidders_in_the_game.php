<link href="css/new_style.css" rel="stylesheet" type="text/css" />
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
<fieldset>
<legend>Bidders in the Game :</legend>
<?php
//include('blogic.php');
//$ob = new blogic();
//session_start();
if(isset($_SESSION['admin']))
{
  //$biddersDetails = "SELECT * FROM tallyworld.tally_transaction_details WHERE tally_match_details_id_fk='$match_id'";
  $biddersDetails = "SELECT * FROM tally_transaction_details, tally_bidders WHERE tally_bidder_name=bidder_id AND tally_match_details_id_fk='$match_id' ";
  $resultBiddersDetails = $ob-> fetch_values($biddersDetails);
  if ($resultBiddersDetails == true || $resultBiddersDetails != null)
  {
?>
<table class="match-list">
<tr><td ><b>Bidder Name </b></td><td><b>Bidding Team </b></td><td><b>Bidding Rate </b></td><td><b>Bidding Amount </b></td><td colspan="2"><b>Edit/Delete </b></td></tr>
<!--<tr><th id="td-header">Bidder Name</th><th>Bidding Team</th><th>Bidding Rate</th><th>Bidding Amount</th><th colspan="2">Edit/Del</th></tr>--!>
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
    $eventDelete="del";
    $eventEdit="edit";

?>

<tr><td><?php echo $biddersName; ?> </td><td><?php echo $BiddersTeanName; ?></td><td><?php echo $BiddingRate; ?></td><td><?php echo $BiddingAmount; ?></td>
<!--<td><a href="edit_n_delete.php?id=<?php echo $transc_id;?>&pid=<?php echo $bidderId;?>&event=<?php echo $eventEdit;?> ">Edit</a></td><td><a href="sudo_edit_bidders.php?transc_id=<?php echo $transc_id;?>&m_id=<?php echo $match_id;?> " onclick="return confirm('Are you sure to delete bidder?')">Delete</a></td></td>--!>
<td><a href="edit_n_delete.php?id=<?php echo $transc_id;?>&pid=<?php echo $bidderId;?>&event=<?php echo $eventEdit;?> " ><img src="images\edit.png" height="24" width="24" style="padding: 2px;"  title="Edit" /></a></td><td><a href="sudo_edit_bidders.php?transc_id=<?php echo $transc_id;?>&m_id=<?php echo $match_id;?> " onclick="return confirm('Are you sure to delete bidder?')"><img src="images\del.png" height="24" width="24" style="padding: 2px;" title="Delete" /></a></td></td>
</fieldset>
<?php 
    } 
        include ('sudo_footer_1.php');
    }
    else
        {
            echo '<strong><i>Bidders yet to be Added for the Match..!!!<i></strong>';
            include ('sudo_footer_1.php');
        }
            //include ('sudo_footer_1.php');
}

?>