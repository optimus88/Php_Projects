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
function player_selection()
{
    var falg=true;
    var bidderName = document.getElementById('bidderName');
    
    if (bidderName.value == "select")
    {
        window.alert("Please select Bidder's Name..!!!");
        bidderName.focus();
        falg=false;
        return false;
    }
    if (flag == "true")
    {
        return true;
    }
    else
    {
        return false;
    }
}
function registration_validation()
{
    var falg=true;
    var userName = document.getElementById('username');
    var uname = document.getElementById('uname');
    var email_id = document.getElementById('email_id');
    var upass = document.getElementById('upass');
    //var userName = document.getElementById('bidderName');
    
    if (userName.value == "")
    {
        window.alert("Please enter Login Name..!!!");
        username.focus();
        falg=false;
        return false;
    }
    if (uname.value == "")
    {
        window.alert("Please enter Your Name..!!!");
        uname.focus();
        falg=false;
        return false;
    }
    if (email_id.value == "")
    {
        window.alert("Please enter Email-ID..!!!");
        email_id.focus();
        falg=false;
        return false;
    }
    if (upass.value == "")
    {
        window.alert("Paaword cannot be blank..!!!");
        upass.focus();
        falg=false;
        return false;
    }  
    if (email_id.value.indexOf("@", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email_id.focus();
        return false;
    }
    if (email_id.value.indexOf(".", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email_id.focus();
        return false;
    }  
    if (flag == "true")
    {
        return true;
    }
    else
    {
        return false;
    }
}
//========= New JavaScript Addition ======
function match_details_selection()
{
    var falg=true;
    var series_name = document.getElementById('series_name');
    //alert("hi");dep_reason
    
    if (series_name.value == "select")
    {
        window.alert("Please select Tournament Series...!!!");
        series_name.focus();
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
// =================== Forgot password Validation =============

function chk_forgot_password()
{
    var falg=true;
    var userName = document.getElementById('uname');
    var upass = document.getElementById('upass');
    var upass_1 = document.getElementById('upass_1'); 
    
    if (userName.value == "")
    {
        window.alert("Please enter your username..!!!");
        uname.focus();
        falg=false;
        return false;
    }
    if (upass.value == "")
    {
        window.alert("Please enter New Password..!!!");
        upass.focus();
        falg=false;
        return false;
    }
    if (upass_1.value == "")
    {
        window.alert("Please enter New Password..!!!");
        upass_1.focus();
        falg=false;
        return false;
    }
    if (upass_1.value != upass.value)
    {
        window.alert("Both Passwords dont match.Please re-enter..!!");
        upass_1.focus();
        falg=false;
        return false;
    }
    if (flag == "true")
    {
        return true;
    }
    else
    {
        return false;
    }  
}

function confirm_click() 
{
    var falg=false;
    if (confirm('Are you sure you want to revert the match result?')) 
    {
          flag=true;
    } 
    else 
    {
           flag=false;
    }
    if (flag == "true" )
    {
        document.getElementById("revertResult").submit();
    }
    else
    {
        return false;
    }
}
function bigImg(x) {
    x.style.height = "32px";
    x.style.width = "32px";
}

function normalImg(x) {
    x.style.height = "24px";
    x.style.width = "24px";
}