<?php
include ('sudo_header.php')
?>
<div>    </div>
<form id="regForm" name="regForm" action="reg_action.php" method="post" onsubmit="return registration_validation();" >
<fieldset>  
<legend><p>Register Please :</p></legend>
<table class="match-details">
<tr><td>Login Name</td>
<td><input type="text" name="username" id="username" /></td>
</tr>
<tr><td>Your Name</td>
<td><input type="text" name="uname" id="uname" /></td>
</tr>
<tr><td>Email Id</td>
<td><input type="text" name="email_id" id="email_id" /></td>
</tr>
<tr><td>Password</td>
<td><input type="password" name="upass" id="upass" /></td>
</tr>


<tr><td colspan="2"><input type="submit" value="submit" name="chk_reg" />
<input type="reset" value="Cancel" /></td></tr>

</table>
</fieldset>
</form>
<?php include ('sudo_footer_login.php');
?>