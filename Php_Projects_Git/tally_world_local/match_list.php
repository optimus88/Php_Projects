<?php
include('blogic.php');
$ob = new blogic();
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');

// Including the code for the selection and then displaying result set //

$teamSeriesQuery = "SELECT team_series FROM tally_teams GROUP BY team_series";
$result1 = $ob-> fetch_values($teamSeriesQuery);
if($result1 != 'false')
{
?>
<fieldset>
<legend>Please Select Series :</legend>
<form class="form-style" id="matchSeriesForm" action="match_list.php" name="matchSeriesForm" method="post" onsubmit="return match_details_selection();" > 
    <table class="match-details" style="cellpadding=15px; cellspacing=20px">
        <tr>
            <td style="width: 50% ;">Tournament Series :</td>
                <td><select name="series_name" id="series_name" onchange="this.form.submit();" >
                                <option value="select" >-----------------Select-----------------</option>
                                <?php 
                                while($row = mysql_fetch_array($result1))
                                    {
    	                               echo '<option value="'. $row['team_series'] . '" >'. $row['team_series']  . '</option>';
                                    }
                               ?>
                    </td>            
    
        </tr>
<!--        <tr>
            <td></td>
            <td>
                     <input class="styled-button-1" type="submit" name="submit_match_list_selection" value="Submit" />
                     <input class="styled-button-1" type="reset" name="Cancel" value="Cancel" /></td>
        </tr>--!>
    </table>
</form>
</fieldset>
<?php 
}
else
{
    echo '<script>alert("Sorry..!!! No Records Fetched.."); window.location = "sudo_welcome.php"</script>';
}

// Including the code for the selection and then displaying result set //
//if(isset($_POST['submit_match_list_selection']))
if(isset($_POST['series_name']) || isset($_GET['seriesName']))
    {  
        if (isset($_POST['series_name']))
        {
            $series_name = $_POST['series_name'];
        }
        elseif (isset($_GET['seriesName']))
        {
            $series_name = $_GET['seriesName'];
        }
        else
        {
            echo "Error...!!!";
        }
        
$num_rec_per_page=15;
if (isset($_GET["page"])) 
	{ 
	$page  = $_GET["page"];
    //$series_name = $_GET['seriesName'];
	} 
else 
	{ 
	$page=1;
    //$series_name = $_GET['seriesName'];
	}; 
$start_from = ($page-1) * $num_rec_per_page; 
//$sql = "SELECT * FROM student LIMIT $start_from, $num_rec_per_page"; 
//$rs_result = mysql_query ($sql); //run the query    
$matchListDisplay = "SELECT * FROM tally_match_details WHERE tally_series_type='$series_name' ORDER BY tally_match_date DESC LIMIT $start_from, $num_rec_per_page ";
$matchDetailsList = $ob-> fetch_values($matchListDisplay);
?>
<br />
<fieldset style="overflow: scroll auto;">
<legend>Match Fixtures :</legend>
<br />

<form class="form-style" >
<table class="match-list" >
<tr><td>Teams</td><td>Match Type</td><td>Match Venue</td><td>Match Date</td><td>Match Result</td><td>Tournament</td></tr>
<?php
while ($row = mysql_fetch_array($matchDetailsList))
{
    $match_id = $row['match_details_id'];
    $teamName_1= $row['tally_team1'];
    $teamName_2= $row['tally_team2'];
    $matchType= $row['tally_match_type'];
    $matchVenue= $row['tally_match_venue'];
    $matchdate= $row['tally_match_date'];
    $seriesName = $row['tally_series_type'];
    $flag=$row['tally_match_flag'];
    if ($flag == 0)
    {
        $flag_value="Not yet Decided";
    }
    else
    {
        $flag_value="Declared";
    }
    ?>
<tr><td><a href="match_details_player_addition.php?id=<?php echo $match_id;?> "><?php echo $teamName_1; ?> vs <?php echo $teamName_2; ?></a></td><td><?php echo $matchType; ?></td><td><?php echo $matchVenue; ?></td><td><?php echo $matchdate; ?></td><td><?php echo $flag_value; ?></td><td><?php echo $seriesName; ?></td></tr>
<?php 
}
?>
<tr><td colspan="6" style="text-decoration: none; padding-left: 100px;">
<?php
//===== Pagination Code here (NEW) ================

 
$sql = "SELECT * FROM tally_match_details WHERE tally_series_type='$series_name'"; 
$rs_result = $ob-> fetch_values($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

//echo "<a href='match_list.php?page=1'>".'|<'."</a> ";  //Goto 1st page  
echo "<a href='match_list.php?page=1&seriesName=".$series_name."'>".'First Page |'."</a> ";
for ($i=1; $i<=$total_pages; $i++) 
    { 
            echo "<a href='match_list.php?page=".$i."&seriesName=".$series_name."'>Page ".$i." |</a> "; 
    }; 
echo "<a href='match_list.php?page=$total_pages&seriesName=".$series_name."'>".'| Last Page'."</a> "; 

// ======= Pagination code ends here ====================
?>
</td></tr>
</table>
</form>
</fieldset>
<?php
include ('sudo_footer_1.php');
}
}
else
{
   echo '<script>alert("Please Select the series..!!!"); window.location = "match_list.php"</script>';
   include ('sudo_footer_1.php');
}

?>
