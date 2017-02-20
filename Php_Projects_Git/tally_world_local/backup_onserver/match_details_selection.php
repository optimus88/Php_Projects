<?php
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
}
include('blogic.php');
$ob = new blogic();
$teamSeriesQuery = "SELECT team_series FROM tally_teams GROUP BY team_series";
$result1 = $ob-> fetch_values($teamSeriesQuery);
if($result1 != 'false')
{
?>
<fieldset>
<legend>Please Select Series :</legend>
<form class="form-style" id="matchSeriesForm" action="match_details.php" name="matchSeriesForm" method="post" onsubmit="return match_details_selection();" > 
    <table class="match-details" style="cellpadding=15px; cellspacing=20px">
        <tr>
            <td style="width: 50% ;">Tournament Series :</td>
                <td><select name="series_name" id="series_name"  >
                                <option value="select" >-----------------Select-----------------</option>
                                <?php 
                                while($row = mysql_fetch_array($result1))
                                    {
    	                           echo '<option value="'. $row['team_series'] . '">'. $row['team_series']  . '</option>';
                                    }
                               ?>
                    </td>            
    
        </tr>
        <tr>
            <td></td>
            <td>
                     <input class="styled-button-1" type="submit" name="submit_match_details_selection" value="Submit" />
                     <input class="styled-button-1" type="reset" name="Cancel" value="Cancel" /></td>
        </tr>
    </table>
</form>
</fieldset>
<?php 
}
else
{
    echo '<script>alert("Sorry..!!! No Records Fetched.."); window.location = "index.php"</script>';
}
include ('sudo_footer_1.php');
?>