<?php
include ('header_reg.php');
?>
<form method="post" action="reg_action.php" name="ContactForm" onSubmit="return validate();">
<table>
    <tr><p><td>Name :</td><td><input type="text" size="25" name="name"/></td></p></tr>
	<tr><p><td>Username :</td><td><input type="text" size="25" name="uname" id="username" /></td></p></tr>
	<tr><p><td>Password :</td><td><input type="password" size="25" name="pass" id="pass" /></td></p></tr>
    <tr><p><td>E-mail Address :</td><td><input type="text" size="25" name="email" id="email_id" /></td></p></tr>
	<tr><p><td>Select Your SSO ID :</td>
        <td><select name="sso_id">
            <option value="">-------Select----------</option>
            <option value="502170891">502170891</option>
            </select></td></p></tr>		
    <tr><p><td></td>
	<td><input type="submit" value="Submit" name="submit" />
    <input type="reset" value="Reset" name="reset" /></td></p></tr>
</table>
	</form>

</body>
</html>