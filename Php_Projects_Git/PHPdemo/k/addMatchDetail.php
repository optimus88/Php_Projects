<?php
//to add detail of the match -should open in a pop-up
include 'database.php';
$pdo = Database::connect();
$sql = 'SELECT TEAM_ID,NAME FROM TEAM_INFO';
$result1=$pdo->query($sql);
$result2=$pdo->query($sql);
Database::disconnect();
?>

<?php 
include 'pop_up_header.php';
?>
<script>
$(document).ready(function () {

	 $(document).on("click", "#addMatchDetails submit_match_details", function (e) {

		 alert("hi");
		 $.ajax({
			    type: "POST",
			    url: "/PHPdemo/k/saveMatchDetails.php",
			    data: $('form').serialize(),
			    //contentType: "application/json; charset=utf-8",
			    dataType: "",
			    success: function(result){
			        alert(result);
			        console.log(result);
			    }
			});

	 });	


});


/* function submit_match_details(){
	alert("hi");
	
	document.getElementById("addMatchDetails").submit();
	
} */


</script>

<fieldset>
	<legend>Match Details </legend>
	<form id="addMatchDetails" action="saveMatchDetails.php"
		name="addMatchDetails" method="post">
		<table>
			<tr>
				<td>Team Name (T1) :</td>
				<td><select name="teamName_1" id="teamName_1">
						<option value="select">-----------------Select-----------------</option>
        <?php 
	        foreach ($result1 as $row) {
	          echo '<option value="'. $row['TEAM_ID'] . '">'. $row['NAME']  . '</option>';
	        }
	        
        ?>
  </select>
			
			
			<tr>
				<td></td>
				<td><label id="vs">Vs</label></td>
			</tr>
			</td>
			</tr>
			<tr>
				<td>Team Name (T2) :</td>
				<td><select name="teamName_2" id="teamName_2">
						<option value="select">-----------------Select-----------------</option>
        <?php 
	        foreach ($result2 as $row) {
	          echo '<option value="'. $row['TEAM_ID'] . '">'. $row['NAME']  . '</option>';
	        }
        ?>
  </select></td>
			</tr>
			<tr>
				<td>Match Type :</td>
				<td><select name="matchType" id="matchType">
						<option value="select">-----------------Select-----------------</option>
						<option value="Y">Day</option>
						<option value="N">Day & Night</option>
				</select></td>
			</tr>
			<tr>
				<td>Match Venue :</td>
				<td><select name="matchVenue" id="matchVenue">
						<option value="select">-----------------Select-----------------</option>
						<option value="Del">Delhi</option>
						<option value="Pun">Punjab</option>
						<option value="Chn">Chennai</option>
						<option value="Mum">Mumbai</option>
						<option value="Kol">Kolkata</option>
						<option value="Hyd">Hydrabad</option>
						<option value="Raj">Rajsthan</option>
						<option value="Bng">Bangalore</option>
				</select></td>
			</tr>
			<tr>
				<td>Match Date :</td>
				<td><input type="text" name="matchdate" id="matchDate" /></td>

			</tr>
			<tr>
				<td></td>
				<td><input type="button" name="submit_match_details" value="Submit"/> <input type="reset"
					name="close" value="close" onclick="self.close();" /></td>
			</tr>
		</table>

	</form>
</fieldset>
