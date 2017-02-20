<?php
include('blogic.php');
$ob = new blogic();
session_start();
if(isset($_SESSION['admin']) || isset($_SESSION['guest']))
{
include ('sudo_header.php');
 if(isset($_POST['submit_bidder']))
 
    {
        $bidderId=$_POST['bidderName'];
        $date1=$_POST['matchdate'];
        $date2=$_POST['matchdate1'];
        $d1="'$date1'";
        $d2="'$date2'";
        //echo $d1;
        //echo $d2;
        
        if (($d1 == "'dateFrom'" ) && ($d2 == "'dateTo'" ) )
        {
            //all transaction for the entire session.
            $calculateQuery="SELECT tnt.tally_net_amt,tb.bidder_name,tnt.tally_net_tranc_mdate, tmd.tally_team1, tmd.tally_team2,tmd.tally_match_winner_team,ttd.tally_team_name FROM tally_bidders tb 
            INNER JOIN tally_net_transaction tnt ON tb.bidder_id=tnt.tally_net_bidder_name
            INNER JOIN tally_match_details tmd ON tmd.match_details_id=tnt.tally_net_match_details_id_fk
            INNER JOIN tally_transaction_details ttd ON ttd.tally_transc_id=tnt.tally_net_transc_details_id_fk
            WHERE tb.bidder_id=$bidderId";
         }
         else
         {
            //incase of the date values are supplied for result fetching.
            $calculateQuery="SELECT tnt.tally_net_amt,tb.bidder_name,tnt.tally_net_tranc_mdate, tmd.tally_team1, tmd.tally_team2,tmd.tally_match_winner_team,ttd.tally_team_name FROM tally_bidders tb 
                                INNER JOIN tally_net_transaction tnt ON tb.bidder_id=tnt.tally_net_bidder_name
                                INNER JOIN tally_match_details tmd ON tmd.match_details_id=tnt.tally_net_match_details_id_fk
                                INNER JOIN tally_transaction_details ttd ON ttd.tally_transc_id=tnt.tally_net_transc_details_id_fk
                                WHERE tb.bidder_id=$bidderId AND tnt.tally_net_tranc_mdate BETWEEN $d1 AND $d2";

            
         }
    
//$calculateQuery="SELECT tnt.tally_net_amt,tb.bidder_name,tnt.tally_net_tranc_mdate, tmd.tally_team1, tmd.tally_team2,tmd.tally_match_winner_team,ttd.tally_team_name FROM tally_bidders tb 
//INNER JOIN tally_net_transaction tnt ON tb.bidder_id=tnt.tally_net_bidder_name
//INNER JOIN tally_match_details tmd ON tmd.match_details_id=tnt.tally_net_match_details_id_fk
//INNER JOIN tally_transaction_details ttd ON ttd.tally_transc_id=tnt.tally_net_transc_details_id_fk
//WHERE tb.bidder_id=$bidderName";



//echo $calculateQuery;


$bidderNetTransactionList = $ob-> fetch_values($calculateQuery);
    }
else
    {
      echo '<script>alert("Please Select a bidder...!!!"); window.location = "guest_welcome.php"</script>';  
    }
if ($bidderNetTransactionList == true || $bidderNetTransactionList != null)
  {
    
?>
<fieldset>
<legend>Bidder Tally : </legend>

<table class="match-details">
<tr><th >S.No</th><th>Bidder's Name</th><th>Bidding Date</th><th>Match Detail</th><th>Winning Team</th><th>Bidder's Team</th><th>Bidder's Net Amt(Rs.)</th></tr>
<?php   
        $i=1;
        $total_Net_Amount=0;
        while ($row = mysql_fetch_array($bidderNetTransactionList))
        {
            
            $bidderName = $row['bidder_name'];
            $tally_net_amt = $row['tally_net_amt'];
            $tally_net_tranc_mdate= $row['tally_net_tranc_mdate'];
            $tally_team1= $row['tally_team1'];
            $tally_team2= $row['tally_team2'];
            $tally_match_winner_team= $row['tally_match_winner_team'];
            $bidders_team_name= $row['tally_team_name'];
            //$matchdate= $row['tally_match_date'];
            $total_Net_Amount=$tally_net_amt+$total_Net_Amount;

?>

<tr><td><?php echo $i; ?> </td><td><?php echo $bidderName; ?></td><td><?php echo $tally_net_tranc_mdate; ?></td><td><?php echo $tally_team1; ?>&nbsp;vs&nbsp;<?php echo $tally_team2; ?></td>
<td><?php echo $tally_match_winner_team;  ?></td><td><?php echo $bidders_team_name;  ?></td><td><?php echo 'Rs.'. $tally_net_amt ;?></td>
<?php
            $i++; 
        }
        if ($total_Net_Amount > 0)
        {
            echo '<tr><td colspan="6">Total Net Earning  :</td><td><b style="color:green">Rs.'. $total_Net_Amount . '</b></td>';    
        }
        else
        {
            echo '<tr><td colspan="6">Total Net Earning  :</td><td><b style="color:red">Rs.'. $total_Net_Amount . '</b></td>';
        } 
    }
?>
</table>

<a href="new_report.php?Pid=<?php echo $bidderId;?> "><i>Click Here</i></a>for the Report
</fieldset>
<?php
}
else
{
   echo '<script>alert("Please Login to see the details...!!!"); window.location = "index.php"</script>';
}
?>