<?php
//include ('header.php')
session_start();
if(isset($_SESSION['sso_id']))
{
include ('sudo_header.php');
}
?> 


<form id="myForm" action="sudo_deploymentTracker.php"  name="myForm" method="post" onsubmit="return follow_up_validate();" >
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
        header("location: sudo_welcome.php?remarks=Please Select Order nos");
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
                            <option value="Oredr_1-Ear-1">Oredr_1-Ear-1</option>
                            <option value="Oredr_1-Ear-2">Oredr_1-Ear-2</option>
                            <option value="Oredr_1-Ear-3">Oredr_1-Ear-3</option>
                            <option value="Oredr_1-Ear-4">Oredr_1-Ear-4</option>
                            <option value="Oredr_1-Ear-5">Oredr_1-Ear-5</option>
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
                            <select name="filename" id="filename_1"  >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="Oredr_2-Ear-1">Oredr_2-Ear-1</option>
                            <option value="Oredr_2-Ear-2">Oredr_2-Ear-2</option>
                            <option value="Oredr_2-Ear-3">Oredr_2-Ear-3</option>
                            <option value="Oredr_2-Ear-4">Oredr_2-Ear-4</option>
                            <option value="Oredr_2-Ear-5">Oredr_2-Ear-5</option>
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
                            <option value="ENV-1">ENV-1</option>
                            <option value="ENV-2">ENV-2</option>
                            <option value="ENV-3">ENV-3</option>
                            <option value="ENV-4">ENV-4</option>
                            <option value="ENV-5">ENV-5</option>
                            <option value="ENV-6">ENV-6</option>
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
                            <option value="ROOT-1">ROOT-1</option>
                            <option value="ROOT-2">ROOT-2</option>
                            </select>
</td> 
</tr>

<tr>
<td>Deployment Team :</td>
<td>

		
							<select name="dp_team" id="dp_team" >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="CMQA">CMQA</option>
                            <option value="CMQA/WEBCOE">CMQA/WEBCOE</option>
                            </select>
							
</td> 
</tr>

<tr>
<td>Branch :</td>
<td>
                            <select name="branch" id="branch_name" >
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="PHASE_1">PHASE_1</option>
                            <option value="PHASE_2">PHASE_2</option>
                            </select>
</td>
</tr>
<tr>
<td>Repository/Module :</td>
<td>
                            <select name="module" id="module_name">
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="MODULE_1">MODULE_1</option>
                            <option value="MODULE_2">MODULE_2</option>
                            <option value="MODULE_3">MODULE_3</option>
                            <option value="MODULE_4">MODULE_4</option>
                            <option value="MODULE_5">MODULE_5</option>
                            <option value="MODULE_6">MODULE_5</option>
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

</tr>
<tr>
<td>Deployment Reason </td>
<td><textarea cols="30" rows="5" name="dep_reason" id="dep_reason"></textarea>
</td>
<tr>
                      <td></td>
                      <td>
                        <input type="submit" name="submit" value="Save" />
                        <input type="reset" name="Cancel" value="Cancel" /></td>
                      </tr>
</table>
</form>
<?php include ('sudo_footer_1.php'); ?>
