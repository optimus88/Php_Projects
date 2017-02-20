<?php
session_start();
if(isset($_SESSION['admin']))
{
include ('sudo_header.php');
include('blogic.php');
$ob = new blogic();
}
$matchIdValue = $_GET["id"];
$teamSelectQuery = "SELECT * FROM tally_match_details WHERE tally_match_flag=0 AND match_details_id=$matchIdValue";
$result1 = $ob-> fetch_values($teamSelectQuery);
$teamSelectQuery_1 = "SELECT * FROM tally_match_details WHERE tally_match_flag=1 AND match_details_id=$matchIdValue";
$result2 = $ob-> fetch_values($teamSelectQuery_1);
if ($result1 == "false" || $result1 == null)
{
    
    while ($row = mysql_fetch_array($result2))
        {
        $match_id = $row['match_details_id'];
        $teamName_1= $row['tally_team1'];
        $teamName_2= $row['tally_team2'];
        $matchType= $row['tally_match_type'];
        $matchVenue= $row['tally_match_venue'];
        $matchdate= $row['tally_match_date'];
        }?>
        <fieldset>
            <legend style="font-family: Monotype Corsiva,arial,sans-serif; font-size:20px;">Match Details</legend>
            
            <table class="match-details">
            <tr>
            <td><b>Match</b></td><td><b>Match Date :</b></td><td><label><b>Match Type :</b></label></td><td><label><b>Match Venue :</b></label></td>
            </tr><tr>
            <td><?php echo "$teamName_1"?> vs <?php echo "$teamName_2"?></td>
            <td><label><?php echo "$matchdate" ?></label></td>
            <td><label><?php echo "$matchType" ?></label></td>
            <td><label><?php echo "$matchVenue" ?></label></td>
            </tr>
            
        </fieldset>
        <form action="match_result.php" method="post" >
            <table>
                <tr>
                <td><input type="hidden" value="<?php echo $match_id ; ?>" id="match_details_id" name="match_details_id" /></td>
                <td><input type="hidden" value="<?php echo "$teamName_1"?>" id="teamName1" name="teamName1" /></td>
                <td><input type="hidden" value="<?php echo "$teamName_2"?>" id="teamName2" name="teamName2" /></td>
                <td><input type="hidden" value="<?php echo "$matchdate"?>" id="matchDate" name="matchDate" /></td>
                <td><input type="hidden" value="<?php echo "yes"?>" id="resultDeclare" name="resultDeclare" /></td>
            
                </tr>
            </table>
            </form>
<?php
        if ($match_id != null && $match_id > 0)
            {
                include ('bidders_in_the_game_list.php');
                
            }
    //include ('sudo_footer_1.php');
}
  else
    {
      while ($row = mysql_fetch_array($result1))
        {
        $match_id = $row['match_details_id'];
        $teamName_1= $row['tally_team1'];
        $teamName_2= $row['tally_team2'];
        $matchType= $row['tally_match_type'];
        $matchVenue= $row['tally_match_venue'];
        $matchdate= $row['tally_match_date'];

?>
<fieldset>
<legend>Match Details :</legend>
<!--<legend > Match Details : </legend>--!>

<table class="match-details">
    <tr>
      <td><b>Match</b></td><td><b>Match Date :</b></td><td><label><b>Match Type :</b></label></td><td><label><b>Match Venue :</b></label></td>
    </tr>
    <tr>
            <td><?php echo "$teamName_1"?> vs <?php echo "$teamName_2"?></td>
            <td><label><?php echo "$matchdate" ?></label></td>
            <td><label><?php echo "$matchType" ?></label></td>
            <td><label><?php echo "$matchVenue" ?></label></td>
            </tr>
<?php      
    }
     
?>
</table>
<br />

<table>
<form action="add_bidders.php" method="post" >
<tr><td>
<!--<div>--!>
<input type="hidden" name="match_id" id="match_id" value="<?php echo $match_id ; ?> "/>
<input class="styled-button-1" type="submit" name="addBidders" value="Add Bidders" />
<!--</div>--!>
</td>
<!--</table>--!>
</form>
<form action="match_result.php" method="post" >
<!--<table>--!>
<td>
<input type="hidden" value="<?php echo $match_id ; ?>" id="match_details_id" name="match_details_id" />
<input type="hidden" value="<?php echo "$teamName_1"?>" id="teamName1" name="teamName1" />
<input type="hidden" value="<?php echo "$teamName_2"?>" id="teamName2" name="teamName2" />
<input type="hidden" value="<?php echo "$matchdate"?>" id="matchDate" name="matchDate" />
<input class="styled-button-1" type="submit" value="Result Declaration" name="result_declaration" />
<!--<input type="submit" id="matchResult" onclick=window.open("match_result.php","demo","width=750,height=300,left=150,top=200,toolbar=0,status=0,"); value="Open Result Window" />
-->
</td></tr>
</table>
</form>
</fieldset>
<br />

<?php 
//echo $match_id;
    if ($match_id != null && $match_id > 0)
    {
        include ('bidders_in_the_game.php');
    }
    //  include ('sudo_footer_1.php');
        
    }
?>
