<?php
session_start();
if(isset($_SESSION['sso_id']))
{
include ('header_reg.php');
?>

				<h4>Selection Combination</h4>
                <p>NOTE: Please select any one parameter to fetch the Deployment Tracker</p>
				<form action="result.php" method="post" id="selection_result">
                <p><table>
                <tr>
<td>File Name :</td>
<td>
                            <select name="filename"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Customer.ear">Customer</option>
                            <option value="deals.ear">deals</option>
                            <option value="forecastLD.ear">forecastLD</option>
                            <option value="HelpCDO.ear">HelpCDO</option>
                            <option value="Itemsearchservice.ear">Itemsearchservice</option>
                            <option value="ProductServiceApp.ear">ProductServiceApp</option>
                            <option value="ProductExtractServiceApp.ear">ProductExtractServiceApp</option>
                            <option value="workbenchcentralapp.ear">workbenchcentralapp</option>
                            <option value="ItemSearchApp.ear">ItemSearchApp</option>
                            <option value="ItemServiceApp.ear">ItemServiceApp</option>
                            <option value="SWB_Workbench.ear">SWB Workbench</option>
                            <option value="GPMIntegration.ear">GPMIntegration</option>
                            <option value="CPQwebservices.ear">CPQwebservices</option>
                            <option value="CDOAdmin.ear">CDOAdmin</option>
                            <option value="cpqtoolsadmin.ear">cpqtoolsadmin</option>
                            <option value="PAT">PAT.ear</option>
                            <option value="PET">PET.ear</option>
                            <option value="QuickBuy.ear">QuickBuy</option>
                            <option value="CBOmeditor.ear">CBOmeditor</option>
                            <option value="STEWPS.ear">STEWPS</option>
                            <option value="Gemscpqplugin.ear">Gemscpqplugin</option>
                            
</td> 
</tr>

               <tr>
<td>Env :</td>
<td>
                            <select name="env"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Dev1">Dev1</option>
                            <option value="Dev3">Dev3</option>
                            <option value="Dev4">Dev4</option>
                            <option value="Tst1">Tst1</option>
                            <option value="Tst2">Tst2</option>
                            <option value="Stage">Stage</option>
</td>
</tr>

<td>Branch :</td>
<td>
                            <select name="branch"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Release_phase2">Release Phase2</option>
                            <option value="Release_sfdc_simpl">Release_sfdc_simpl</option>
                            <option value="Release_simplf">Release_simplf</option>
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
include ('footer_1.php');
 } 
 else
 {
    include ('index.php');
 }
 ?>