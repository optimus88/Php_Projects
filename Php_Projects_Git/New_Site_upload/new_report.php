<?php 
include('blogic.php');
$ob = new blogic();
session_start();
if(isset($_SESSION['admin']) || isset($_SESSION['guest']))
{
//============Old Code for report generation

    $matchIdValue= $_GET["Pid"];
    $calculateQuery="SELECT tnt.tally_net_amt,tb.bidder_name,tnt.tally_net_tranc_mdate, tmd.tally_team1, tmd.tally_team2,tmd.tally_match_winner_team,ttd.tally_team_name FROM tally_bidders tb 
            INNER JOIN tally_net_transaction tnt ON tb.bidder_id=tnt.tally_net_bidder_name
            INNER JOIN tally_match_details tmd ON tmd.match_details_id=tnt.tally_net_match_details_id_fk
            INNER JOIN tally_transaction_details ttd ON ttd.tally_transc_id=tnt.tally_net_transc_details_id_fk
            WHERE tb.bidder_id=$matchIdValue";
            
            //echo $calculateQuery;

    $result=$ob->fetch_values($calculateQuery);
    if (!$result) die('Couldn\'t fetch records');
    $num_fields = mysql_num_fields($result);
    $headers = array();
	//$headers[] = array("Net Amount","Bidder's Name","Date of Bidding","Winner Of the Match", "Bidder's Team");

	
	for ($i = 0; $i < $num_fields; $i++) 
    {
        $headers[] = mysql_field_name($result , $i);
    }

    $fp = fopen('php://output', 'w');
    if ($fp && $result)
    {
              header('Content-Type: text/csv');
              header('Content-Disposition: attachment; filename="export.csv"');
              header('Pragma: no-cache');
              header('Expires: 0');
              fputcsv($fp, $headers);
 
            
            

            while ($row = mysql_fetch_row($result)) 
            {
                 fputcsv($fp, array_values($row));
            }
            die;
     }


//============Old Code for report generation
}
?>
