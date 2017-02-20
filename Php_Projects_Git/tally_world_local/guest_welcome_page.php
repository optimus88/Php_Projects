<?php
session_start();
if( isset($_SESSION["guest"]) )
{
    include('blogic.php');
    $ob = new blogic();
    include_once ('sudo_header.php');
    $userID = $_SESSION["guest_id"];
    $userName= $_SESSION["guest"];
    $IPLQuery="SELECT tnt.tally_net_amt,tmd.tally_series_type FROM tally_bidders tb 
            INNER JOIN tally_net_transaction tnt ON tb.bidder_id=tnt.tally_net_bidder_name
            INNER JOIN tally_match_details tmd ON tmd.match_details_id=tnt.tally_net_match_details_id_fk
            INNER JOIN tally_transaction_details ttd ON ttd.tally_transc_id=tnt.tally_net_transc_details_id_fk
            WHERE tb.bidder_id=$userID AND tmd.tally_series_type='IPL'";
    $WCT20Query="SELECT tnt.tally_net_amt,tmd.tally_series_type FROM tally_bidders tb 
            INNER JOIN tally_net_transaction tnt ON tb.bidder_id=tnt.tally_net_bidder_name
            INNER JOIN tally_match_details tmd ON tmd.match_details_id=tnt.tally_net_match_details_id_fk
            INNER JOIN tally_transaction_details ttd ON ttd.tally_transc_id=tnt.tally_net_transc_details_id_fk
            WHERE tb.bidder_id=$userID AND tmd.tally_series_type='WCT20'";
    //echo $IPLQuery;
    //echo $WCT20Query;
    $IPL_Result = $ob-> fetch_values($IPLQuery);
    $WCT20_Result = $ob-> fetch_values($WCT20Query);
    //echo $WCT20_Result;
    //echo $IPL_Result;
    //echo "hello";
    if ($IPL_Result == 'false' || $IPL_Result == null )
    {
        $total_Net_Amount_IPL=0;
        
    }
    else
    {
        $total_Net_Amount_IPL=0;
        while ($row = mysql_fetch_array($IPL_Result))
            {
               $tally_net_amt_IPL = $row['tally_net_amt'];
               $total_Net_Amount_IPL=$tally_net_amt_IPL+$total_Net_Amount_IPL; 
            }
    }
    if ( $WCT20_Result == 'false' || $WCT20_Result == null )
        {
            $total_Net_Amount_WCT20=0;
            //echo "in the if of WCT20";
        }
    else
    {
        $total_Net_Amount_WCT20=0;
        while ($row = mysql_fetch_array($WCT20_Result))
            {
               $tally_net_amt_WCT20 = $row['tally_net_amt'];
               $total_Net_Amount_WCT20=$tally_net_amt_WCT20+$total_Net_Amount_WCT20; 
            }
    }
    $total_Net_Amount=$total_Net_Amount_WCT20+$total_Net_Amount_IPL;
    ?>
    <form class="form-style">			
    <fieldset><legend ><i>Please Select :</i></legend>
        <table class="guest-login">           
            <tr><td style="font-size: 20px;"><a href="guest_match_list.php">Match List</a></td></tr>
        <tr><td style="font-size: 20px;"><a href="guest_welcome.php">Tally For Bidders</a></td></tr>
        </table>
    
    			 
    </fieldset>
       </form>
    <br />
    <form class="form-style" >
    <fieldset><legend>Current Tally :</legend>
    <table class="guest-login">
    <tr style="border: 2px;">
        <td >User Name :</td>
        <td  ><?php echo ucfirst("$userName"); ?></td>
    </tr>
    <tr>
        <td  >IPL Tally :</td>
        <td  >Rs. <?php echo $total_Net_Amount_IPL; ?></td>
    </tr>
    <tr>
        <td>WCT20 Tally :</td>
        <td>Rs. <?php echo $total_Net_Amount_WCT20; ?></td>
    </tr>
    <?php
            if ($total_Net_Amount > 0)
        {
            echo '<tr><td> Net Profit Made  :</td><td><b style="color:green">Rs.'. $total_Net_Amount . '</b></td>';    
        }
        else
        {
            echo '<tr><td> Net Loss Incured :</td><td><b style="color:red">Rs.'. $total_Net_Amount . '</b></td>';
        }?>
    </table>
    </fieldset>
    </form>
    <br />

<?php include ('guest_footer_1.php'); 
}
else
{
  include ('index.php');
}
?>