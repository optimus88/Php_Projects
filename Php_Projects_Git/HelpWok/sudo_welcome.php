<?php
session_start();
if(isset($_SESSION['sso_id']))
{
include ('sudo_header.php');
?>


				<form action="sudo_follow_up.php" id="" name="" method="post" onsubmit="return welcome_validate();">
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
<li>Oredr_1-Ear-1</li>
<li>Oredr_1-Ear-2</li>
<li>Oredr_1-Ear-3</li>
<li>Oredr_1-Ear-4</li>
<li>Oredr_1-Ear-5</li>
</ul>
</fieldset>
			</div>
	        </div>

		<div class="column3">
			<div class="feature">
				<fieldset>
				<ul><legend><h3>Order-2</h3></legend>
<li>Oredr_2-Ear-1</li>
<li>Oredr_2-Ear-2</li>
<li>Oredr_2-Ear-3</li>
<li>Oredr_2-Ear-4</li>
<li>Oredr_2-Ear-5</li>
</ul>
</fieldset>
<?php include ('sudo_footer_1.php'); 
}
else
{
  include ('index.php');
}
?>
			