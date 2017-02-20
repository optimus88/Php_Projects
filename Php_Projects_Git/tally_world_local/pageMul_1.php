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
	$queryCount="SELECT count(*) FROM tally_transaction_details";
	$resultCount = $ob-> fetch_values($queryCount);
    echo $resultCount;
	$rec_limit = 10;
    $sno=0;
//------ BEGIN OF COPY CODE ------
    //$query="select id from pagination order by id asc";
    //$res    = mysqli_query($connection,$query);
    $counterVal  = mysql_fetch_row($resultCount);
    $count = $counterVal[0];
    echo "count of the result : $count";
$page = (int) (!isset($_GET["counter"]) ? 1 :$_GET["counter"]);
if (isset($_GET["counter"]))
{
   $page =  $_GET["counter"];
}
else
{
    $page =0;
}

//echo $_GET["Page"];
echo "value of page :$page ";
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 10;
$start = ($page-1) * $recordsPerPage;
$adjacents = "2";
    
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($count/$recordsPerPage);
$lpm1 = $lastpage - 1;   
$pagination = "";
if($lastpage > 1)
    {   
        $pagination .= "<div class='pagination'>";
        if ($page > 1)
            $pagination.= "<a href=\"#Page=".($prev)."\"&pageId=$counter onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span>";   
        if ($lastpage < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href=\"#Page=".($counter)."\"&pageId=$counter onClick='changePagination(".($counter).");'>$counter</a>";     
                         
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                    else
                        $pagination.= "<a href=\"#Page=".($counter)."\"&pageId=$counter onClick='changePagination(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
                $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href=\"#Page=".($counter)."\"&pageId=$counter onClick='changePagination(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
               $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
           }
           else
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "..";
               for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href=\"#Page=".($counter)."\"&pageId=$counter onClick='changePagination(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href=\"#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Next &raquo;</span>";
        
        $pagination.= "</div>";       
    }
    
if(isset($_GET["counter"]) && !empty($_GET["counter"]))
{
    $id=$_GET["counter"];
}
else
{
    $id=0;
}
    $queryPagination="SELECT  `tally_team_name` ,  `tally_rate` ,  `tally_amt` ,  `tally_date_of_match` , bidder_name FROM  `tally_transaction_details` , tally_bidders WHERE  `tally_bidder_name` = bidder_id LIMIT $start , $recordsPerPage";
    echo $queryPagination;
    $resultPagiation = $ob-> fetch_values($queryPagination);
//$query="select post,postlink from pagination order by id asc
//limit ".mysqli_real_escape_string($connection,$start).",$recordsPerPage";
//echo $query;
//$res    =   mysqli_query($connection,$query);
$count  =   mysql_num_rows($resultPagiation);
echo "last counter value = $count";
$HTML='';
?>
<fieldset>
<legend>Pagination Testing :</legend>
<table class="match-details">
<tr><th>S. No</th><th id="td-header">Bidder Name</th><th>Bidding Team</th><th>Bidding Rate</th><th>Bidding Amount</th><th>Bidding Date</th></tr>

<?php
if($count > 0)
{
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
}
else
{
        $HTML='No Data Found';
}
echo $HTML;
echo $pagination;
//------ END OF COPY CODE ------
}?>

