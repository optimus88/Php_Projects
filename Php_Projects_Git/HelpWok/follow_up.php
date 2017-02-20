<?php
//include ('header.php')
session_start();
if(isset($_SESSION['sso_id']))
{
include ('header.php');
}
?> 


<form id="myForm" action="deploymentTracker.php"  name="myForm" method="post" onsubmit="return follow_up_validate();" >
<table style="cellpadding=5px; cellspacing=10px">
<tr>
<td>Order :</td>
<td><label><?php echo $_POST['order']; ?></label>
<input type="hidden" value="<?php echo $_POST['order']; ?>" name="order" size="30px"  /></td> 
</tr>
<?php
if(isset($_POST['submit']))
{
    $order=$_POST['order'];
    if($order == "select")
    {
        header("location: welcome.php?remarks=Please Select Order nos");
    }
    //echo $order;
    elseif($order == "ORDER-1")
    { 
?>
<tr>
<td>File Name O1:</td>
<td>
                            <select name="filename" id="filename_1"  >
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
                            </select>
                            
</td> 
</tr>
<?php 
}
elseif ($order == "ORDER-2")
//else
{
    ?>


<tr>
<td>File Name O2:</td>
<td>
                            <select name="filename" id="filename_1" >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="CDOAdmin.ear">CDOAdmin</option>
                            <option value="cpqtoolsadmin.ear">cpqtoolsadmin</option>
                            <option value="PAT.ear">PAT</option>
                            <option value="PET.ear">PET</option>
                            <option value="QuickBuy.ear">QuickBuy</option>
                            <option value="CBOmeditor.ear">CBOmeditor</option>
                            <option value="STEWPS.ear">STEWPS</option>
                            <option value="Gemscpqplugin.ear">Gemscpqplugin</option>
                            </select>
                            
</td> 
</tr>
<?php 
}
}
?>
<tr>
<td>Env :</td>
<td>
                            <select name="env" id="env_name" >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Dev1">Dev1</option>
                            <option value="Dev3">Dev3</option>
                            <option value="Dev4">Dev4</option>
                            <option value="Tst1">Tst1</option>
                            <option value="Tst2">Tst2</option>
                            <option value="Stage">Stage</option>
                            </select>
</td>
</tr>
<tr>
<td>Version :</td>
<td><input type="text" name="version" id="version" size="30px" /></td>
</tr>
<tr>
<td>Root :</td>
<td>
                            <select name="root" id="root_name" >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="MAIN">MAIN</option>
                            <option value="swbcpqvit">swbcpqvit</option>
                            <option value="swbsfdc">swbsfdc</option>
                            </select>
</td> 
</tr>
<tr>
<td>Branch :</td>
<td>
                            <select name="branch" id="branch_name" >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Release_phase2">Release Phase2</option>
                            <option value="Release_sfdc_simpl">Release_sfdc_simpl</option>
                            <option value="Release_simplf">Release_simplf</option>
                            </select>
</td>
</tr>
<tr>
<td>Repository/Module :</td>
<td>
                            <select name="module" id="module_name">
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Miscellaneous">Miscellaneous</option>
                            <option value="CPQ_TOOLS">CPQ_TOOLS</option>
                            <option value="SWB_TOOLS">SWB_TOOLS</option>
                            <option value="SWB">SWB</option>
                            <option value="GPM">GPM</option>
                            <option value="CPQ_TOOLS">CPQ_TOOLS</option>
                            <option value="CPQ_Repository">CPQ_Repository</option>
                            </select>
</td>
</tr>
<tr>
<td>Domain </td>
<td>
                            <select name="domain" id="domain_name">
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="WorkBench">WorkBench</option>
                            <option value="Tools">Tools</option>
                            </select>
</td>
</tr>
<tr>
<td>Deployment Owner </td>
<td><input type="text" name="owner" size="30px" id="deployment_owner" /></td>
</tr>
<tr>
<td>Deployment Date </td>
<td><input type="text" name="date" size="30px" id="deployment_date" /></td>
<!--<td><input type="text" size="30px" name="date" id="date_please" /></td>--!>
</tr>
<tr>
                      <td></td>
                      <td>
                        <input type="submit" name="submit" value="Save" />
                        <input type="reset" name="Cancel" value="Cancel" /></td>
                      </tr>
</table>
</form>
<?php include ('footer_1.php'); ?>
