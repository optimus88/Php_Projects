<?php

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'/>
<title style="font-family: Monotype Corsiva;">SWB-Deployment Tracker</title>
<script type="text/javascript" src="javascript/validate.js"></script>
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<script type="text/javascript" src="javascript/jquery-ui.min.js"></script>
<script>
$(function(){
        $("#to").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#from").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#to").datepicker( "option", "minDate", minValue );
        })
    });

</script> 
<link href="css/new_style.css" rel="stylesheet" type="text/css" />
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="siteinfo">
		<h1 style="font-family: Monotype Corsiva;">SWB-Deployment Tracker</h1>
        <?php 
        if(isset($_SESSION['sso_id']))
        { ?>
       <!-- ====== --!>
        <div id="navcontainer">
<ul>
<li><a>Welcome <?php echo $_SESSION['sso_id']; ?></a> </li>
<li><a href="welcome.php">HOME</a></li>
<li><a href="selection_result.php">Reports</a></li>
<li><a href="logout.php">Log Out</a></li>
</ul>
</div> 
        <!-- ====== --!>
        
    <?php } ?>

                <div class="columns">
		<div class="column4">
			<div class="feature">