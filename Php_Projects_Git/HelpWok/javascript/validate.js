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
function follow_up_validate()
{
    var falg=true;
    var filename_1 = document.getElementById('filename_1');
    //var filename_2 = document.getElementById('filename_2');
    var env_name = document.getElementById('env_name');
    var ver = document.getElementById('version');
    var root_name = document.getElementById('root_name');
    var branch_name = document.getElementById('branch_name');
    var module_name = document.getElementById('module_name');
    var domain_name = document.getElementById('domain_name');
    var deployment_owner = document.getElementById('deployment_owner');
    var deployment_date = document.getElementById('deployment_date');
	var dep_reason = document.getElementById('dep_reason');
	var dp_team = document.getElementById('dp_team');
    //alert("hi");dep_reason
    
    if (filename_1.value == "select")
    {
        window.alert("Please select valid FILE-NAME...!!!");
        filename_1.focus();
        falg=false;
        return false;
    }
    //if(filename_2.value == "select")
//    {
//        window.alert("Please select valid FILE-NAME...!!!");
//        filename_2.focus();
//        falg=false;
//        return false;
//    }
    if (env_name.value == "select")
    {
        window.alert("Please select valid Env..!!!");
        env_name.focus();
        falg=false;
        return false;
    }
    if (root_name.value == "select")
    {
        window.alert("Please select valid Root-Name..!!!");
        root_name.focus();
        falg=false;
        return false;
    }
    if (branch_name.value == "select")
    {
        window.alert("Please select valid Branch-Name..!!!");
        branch_name.focus();
        falg=false;
        return false;
    }
    if (module_name.value == "select")
    {
        window.alert("Please select valid Module-Name..!!!");
        module_name.focus();
        falg=false;
        return false;
    }
    if (domain_name.value == "select")
    {
        window.alert("Please select valid Domain-Name..!!!");
        domain_name.focus();
        falg=false;
        return false;
    }
    if (deployment_owner.value == "")
    {
        window.alert("Please Enter the Deployment Owner..!!!");
        deployment_owner.focus();
        falg=false;
        return false;
    }
 
  if (ver.value == "")
      {
          window.alert("Please Enter the Deployment Version..!!!");
          ver.focus();
          falg=false;
          return false;
      }
 
    if (deployment_date.value == "")
    {
        window.alert("Please Enter Deployment Date..!!!");
        deployment_date.focus();
        falg=false;
        return false;
        
    }
	if (dep_reason.value == "")
    {
        window.alert("Please Enter Deployment Reason..!!!");
        dep_reason.focus();
        falg=false;
        return false;
        
    }
	if (dep_reason.value != "")
    {
		var new_var = dep_reason.value;
		if(new_var.length <= 10)
		{
		        window.alert("Deployment Reason should be greater than 10 letters..!!!");
				dep_reason.focus();
				falg=false;
				return false;
		}
    }
	
	if(env_name.value == "ENV-1")
	{
		if(dp_team.value != "CMQA")
		{
			dp_team.focus();
			falg=false;
			window.alert("Since Env is ENV-1 please select CMQA in team..!!!!");
			return false;
		}
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
