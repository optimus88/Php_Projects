function validate()
{
    var name = document.ContactForm.name;
    var email = document.ContactForm.email;
    var what = document.ContactForm.sso_id;
	var username = document.getElementById('username');
	var pass = document.getElementById('pass');
	
    
    if (name.value == "")
    {
        window.alert("Please enter your name.");
        name.focus();
        return false;
    }
	if (username.value == "")
	{
		window.alert("Please enter Username.");
        username.focus();
        return false;
	}
	if (pass.value == "")
	{
		window.alert("Please enter password");
        pass.focus();
        return false;
	}
    
    if (email.value == "")
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf("@", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf(".", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

    if (what.selectedIndex < 1)
    {
        alert("Please select SSO ID");
        what.focus();
        return false;
    }
	return true;
}

function welcome_validate()
{
	var order = document.getElementById('welcome_order');
	if (order.selectedIndex < 1)
    {
        alert("Please select Order nos");
        whaordert.focus();
        return false;
    }
	return true;
}

function validate_updatePassword()
{
    var current_pass = document.getElementById('current_pass');
    var new_pass = document.getElementById('new_password');
    var re_new_pass = document.getElementById('re_new_pass');
    
    if (current_pass.value == "")
    {
        window.alert("Please enter current password..!!");
        current_pass.focus();
        return false;
    }
    if (new_pass.value != re_new_pass.value)
    {
        window.alert("NEW Password entered do not match...!!");
        new_pass.focus();
        return false;
    }
    if (new_pass.value == "")
    {
        window.alert("Please enter new password..!!");
        new_pass.focus();
        return false;
    }
    return true;
    
}
function match_details_validate()
{
    var falg=true;
    var teamName_1 = document.getElementById('teamName_1');
    var teamName_2 = document.getElementById('teamName_2');
    var matchType = document.getElementById('matchType');
    var matchVenue = document.getElementById('matchVenue');
    var matchDate = document.getElementById('matchDate');
    //alert("hi");dep_reason
    
    if (teamName_1.value == "select")
    {
        window.alert("Please select valid Team Name-1...!!!");
        teamName_1.focus();
        falg=false;
        return false;
    }
    if (teamName_2.value == "select")
    {
        window.alert("Please select valid Team Name-2...!!!");
        teamName_2.focus();
        falg=false;
        return false;
    }
    if (matchType.value == "select")
    {
        window.alert("Please select Match Type..!!!");
        matchType.focus();
        falg=false;
        return false;
    }
    if (matchVenue.value == "select")
    {
        window.alert("Please select valid Branch-Name..!!!");
        matchVenue.focus();
        falg=false;
        return false;
    }
    if (matchDate.value == "")
    {
        window.alert("Please Enter Deployment Date..!!!");
        matchDate.focus();
        falg=false;
        return false;
        
    }
    //window.alert(falg);
    
    

     if(falg == "true") 
     { 
			return true;
//        window.alert("last node1223");
//       document.getElementById("myForm").submit();
//       // document.getElementById().submit()
     }

}
