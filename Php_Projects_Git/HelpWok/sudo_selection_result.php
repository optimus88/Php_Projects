<?php
session_start();
if(isset($_SESSION['sso_id']))
{
include ('sudo_header_reg.php');
?>

				<h4>Selection Combination</h4>
                <p>NOTE: Please select any one parameter to fetch the Deployment Tracker</p>
				<form action="sudo_result.php" method="post" id="selection_result">
                <p><table>
                <tr>
<td>File Name :</td>
<td>
                            <select name="filename"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Oredr_1-Ear-1">Oredr_1-Ear-1</option>
                            <option value="Oredr_1-Ear-2">Oredr_1-Ear-2</option>
                            <option value="Oredr_1-Ear-3">Oredr_1-Ear-3</option>
                            <option value="Oredr_1-Ear-4">Oredr_1-Ear-4</option>
                            <option value="Oredr_1-Ear-5">Oredr_1-Ear-5</option>
                            <option value="Oredr_2-Ear-1">Oredr_2-Ear-1</option>
                            <option value="Oredr_2-Ear-2">Oredr_2-Ear-2</option>
                            <option value="Oredr_2-Ear-3">Oredr_2-Ear-3</option>
                            <option value="Oredr_2-Ear-4">Oredr_2-Ear-4</option>
                            <option value="Oredr_2-Ear-5">Oredr_2-Ear-5</option>
                            </select>
                            
</td> 
</tr>

               <tr>
<td>Env :</td>
<td>
                            <select name="env"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="ENV-1">ENV-1</option>
                            <option value="ENV-2">ENV-2</option>
                            <option value="ENV-3">ENV-3</option>
                            <option value="ENV-4">ENV-4</option>
                            <option value="ENV-5">ENV-5</option>
                            <option value="ENV-6">ENV-6</option>
                            </select>
</td>
</tr>

<td>Branch :</td>
<td>
                            <select name="branch"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="PHASE_1">PHASE_1</option>
                            <option value="PHASE_2">PHASE_2</option>
                            </select>
</td>
</tr>

		

<tr>
                      <td></td>
                      <td>
                        <input type="submit" name="submit" value="Fetch Result" />
                        <input type="reset" name="Cancel" value="Cancel" /></td>
                    </tr>
                    
                </table></p>
			
<?php
include ('sudo_footer_1.php');
 } 
 else
 {
    include ('index.php');
 }
 ?>