<?php
include('blogic.php');
$ob = new blogic();
session_start();
if(isset($_SESSION['admin']))
{
	include ('sudo_header.php');
    //$queryPagination="SELECT  `tally_team_name` ,  `tally_rate` ,  `tally_amt` ,  `tally_date_of_match` , bidder_name
      //                FROM  `tally_transaction_details` , tally_bidders WHERE  `tally_bidder_name` = bidder_id";
    //$resultPagiation = $ob-> fetch_values($queryPagination);
	$queryCount="SELECT count(tally_transc_id) FROM tally_transaction_details";
	$resultCount = $ob-> fetch_values($queryCount);
    echo $resultCount;
	$rec_limit = 10;
    $sno=0;

?>
<fieldset>
<legend>Pagination Testing :</legend>
<table class="match-details">
<tr><th>S. No</th><th id="td-header">Bidder Name</th><th>Bidding Team</th><th>Bidding Rate</th><th>Bidding Amount</th><th>Bidding Date</th></tr>

<?php

/* Get total number of records */
$row = mysql_fetch_array($resultCount);
$rec_count = $row[0];

if( isset($_GET{'page'} ) )
{
   $page = $_GET{'page'} + 1;
   $offset = $rec_limit * $page ;
}
else
{
   $page = 0;
   $offset = 0;
}
$left_rec = $rec_count - ($page * $rec_limit);

    $queryPagination="SELECT  `tally_team_name` ,  `tally_rate` ,  `tally_amt` ,  `tally_date_of_match` , bidder_name
                      FROM  `tally_transaction_details` , tally_bidders WHERE  `tally_bidder_name` = bidder_id LIMIT $offset, $rec_limit";
    $resultPagiation = $ob-> fetch_values($queryPagination);
    
//$sql = "SELECT emp_id, emp_name, emp_salary "."FROM employee "."LIMIT $offset, $rec_limit";

while($row = mysql_fetch_array($resultPagiation))
{
    //$bidderId = $row['bidder_id'];
    $sno++;
    $biddersName = $row['bidder_name'];
    $BiddersTeanName= $row['tally_team_name'];
    $BiddingRate= $row['tally_rate'];
    $BiddingAmount= $row['tally_amt'];
    $tally_date= $row['tally_date_of_match'];
 
?>
<tr><td><?php echo $sno; ?></td><td><?php echo $biddersName; ?> </td><td><?php echo $BiddersTeanName; ?></td><td><?php echo $BiddingRate; ?></td><td><?php echo $BiddingAmount; ?></td>
<td><?php echo $tally_date; ?> </td></tr>
</fieldset>
<?php
}
if( $page > 0 )
{
   $last = $page - 2;
   //echo "<a href=\"pageMul.php?page=$last\">Last 10 Records</a> |";
   //echo "<a href=\"pageMul.php?page=$page\">Next 10 Records</a>";
   echo "<a href=\"$_PHP_SELF?page=$last\">Last 10 Records</a> |";
   echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Records</a>";
}
else if( $page == 0 )
{
	
   //echo "<a href=\"pageMul.php?page=$page\">Next 10 Records</a>";
   echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Records</a> |";
}
else if( $left_rec <= $rec_limit )
{
   $last = $page - 2;
   //echo "<a href=\"pageMul.php?page=$last\">Last 10 Records</a>";
   echo "<a href=\"$_PHP_SELF?page=$last\">Last 10 Records</a>";
}
}
else
{
    echo "Sorry...!!!";
}
?>
