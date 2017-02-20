<?php 
include('blogic.php');
$ob = new blogic();
session_start();
if(isset($_SESSION['admin']))
{
	include ('sudo_header.php');

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 10;
    $queryPagination="SELECT  `tally_team_name` ,  `tally_rate` ,  `tally_amt` ,  `tally_date_of_match` , bidder_name
                      FROM  `tally_transaction_details` , tally_bidders WHERE  `tally_bidder_name` = bidder_id LIMIT $start_from, 10";
    $resultPagiation = $ob-> fetch_values($queryPagination); 
//$sql = "SELECT * FROM students ORDER BY name ASC LIMIT $start_from, 20"; 
//$rs_result = mysql_query ($sql,$connection); 
?> 
<fieldset>
<legend>Pagination Testing :</legend>
<table class="match-details">
<tr><th>S. No</th><th id="td-header">Bidder Name</th><th>Bidding Team</th><th>Bidding Rate</th><th>Bidding Amount</th><th>Bidding Date</th></tr>

<?php
if (isset($_GET["sid"]))
{
    $sno=$_GET["sid"];
}
else{
    $sno=0;
}
while($row = mysql_fetch_array($resultPagiation))
{
    //$bidderId = $row['bidder_id'];
    $sno++;
    $biddersName = $row['bidder_name'];
    $BiddersTeanName= $row['tally_team_name'];
    $BiddingRate= $row['tally_rate'];
    $BiddingAmount= $row['tally_amt'];
    $tally_date= $row['tally_date_of_match'];
  
//while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
<tr><td><?php echo $sno; ?></td><td><?php echo $biddersName; ?> </td><td><?php echo $BiddersTeanName; ?></td><td><?php echo $BiddingRate; ?></td><td><?php echo $BiddingAmount; ?></td>
<td><?php echo $tally_date; ?> </td></tr>


<?php 
}
	$queryCount="SELECT count(tally_transc_id) FROM tally_transaction_details";
	$resultCount = $ob-> fetch_values($queryCount);
//$sql = "SELECT COUNT(Name) FROM students"; 
//$rs_result = mysql_query($sql,$connection); 
$row = mysql_fetch_row($resultCount);
$total_records = $row[0];
$total_pages = ceil($total_records / 10);
 ?>
<tr><td colspan=6>Page >>
<?php 
for ($i=1; $i<=$total_pages; $i++)
{
    //$space="-->";
//echo "<a href='pageMul.php?page=".$i."'>".$space."" .$i."</a> ";
?>
			<a style="text-decoration: none; text-align: right;" href="pageMul.php?page=<?php echo $i;?>&sid=<?php echo $sno;?> "><?php echo " $i "; ?></a>
<?php
};
?>
</td></tr>
</table>
</fieldset> 
<?php
}
?>