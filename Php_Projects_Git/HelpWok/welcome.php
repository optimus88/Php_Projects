<?php
session_start();
if(isset($_SESSION['sso_id']))
{
include ('header.php');
?>


				<form action="follow_up.php" id="" name="" method="post" onsubmit="return welcome_validate();">
<fieldset>
				<legend></legend>
                <label><i>Please select order</i></label>
<table >

<tr>
<td>Order :</td>
<td>
                            <select name="order" id="welcome_order">
                            <option value="select" >-----------------Select-----------------</option>
                            <option value="ORDER-1">Order-1</option>
                            <option value="ORDER-2">Order-2</option>
                            </select>
</td> 
</tr>
<br /><br />
<tr>
                      
                      <td colspan="2" >
                        <input type="submit" name="submit" value="Submit" />
                        <input type="reset" name="Cancel" value="Cancel" /></td>
</tr>
</table>
</fieldset>
			  </form>
			</div>
		</div>

		<div class="column2">
			<div class="feature">
            <fieldset>
				<ul><legend><h3>Order-1</h3></legend>
<li>Customer</li>
<li>deals</li>
<li>forecastLD</li>
<li>HelpCDO</li>
<li>Itemsearchservice</li>
<li>ProductServiceApp</li>
<li>ProductExtractServiceApp</li>
<li>workbenchcentralapp</li>
<li>ItemSearchApp</li>
<li>ItemServiceApp</li>
<li>SWB Workbench</li>
<li>GPMIntegration</li>
<li>CPQwebservices</li>
</ul>
</fieldset>
			</div>
	        </div>

		<div class="column3">
			<div class="feature">
				<fieldset>
				<ul><legend><h3>Order-2</h3></legend>
<li>CDOAdmin</li>
<li>cpqtoolsadmin</li>
<li>PAT</li>
<li>PET</li>
<li>QuickBuy</li>
<li>CBOmeditor</li>
<li>STEWPS</li>
<li>Gemscpqplugin</li>
</ul>
</fieldset>
<?php include ('footer_1.php'); 
}
else
{
  include ('index.php');
}
?>
			