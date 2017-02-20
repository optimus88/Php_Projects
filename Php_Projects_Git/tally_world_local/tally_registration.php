<?php
include ('sudo_header.php')
?>
<div>    </div>
<form id="regForm" name="regForm" action="reg_action.php" method="post" onsubmit="return registration_validation();" >
<fieldset>  
<legend><p>Please Register :</p></legend>
<table class="match-details">
<tr><td>Login Name</td>
<td><input type="text" name="username" id="username" maxlength="15"/></td>
</tr>
<tr><td>Your Name</td>
<td><input type="text" name="uname" id="uname" /></td>
</tr>
<tr><td>Email Id</td>
<td><input type="text" name="email_id" id="email_id" /></td>
</tr>
<tr><td>Password</td>
<td><input type="password" name="upass" id="upass" maxlength="15"/></td>
</tr>


<tr><td colspan="2"><input class="styled-button-1" type="submit" value="Submit" name="chk_reg" />
<input class="styled-button-1" type="reset" value="Reset" />
<input class="styled-button-1" type="button" value="Back" onClick="document.location.href='index.php'"/></td></tr>

</table>
</fieldset>
</form>
<?php include ('sudo_footer_login.php');
?>