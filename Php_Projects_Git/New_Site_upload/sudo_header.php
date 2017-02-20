<?php

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'/>
<title style="font-family: Monotype Corsiva;">Tally Tracker</title>
<script type="text/javascript" src="javascript/validate.js"></script>
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<script type="text/javascript" src="javascript/jquery-ui.min.js"></script>
<script type="text/javascript" src="javascript/call_calander,js"></script>
<script type="text/javascript" src="javascript/datetimepicker_css.js"></script>
<script>
$(function(){
        $("#matchDate").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#from").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#to").datepicker( "option", "minDate", minValue );
        })
    });
$(function(){
        $("#matchDate1").datepicker({ dateFormat: 'yy-mm-dd' });
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
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="siteinfo">
		<h1 style="font-family: Monotype Corsiva;">Tally Tracker</h1>
        <?php 
        if(isset($_SESSION['admin']))
        { ?>
       <!-- ====== --!>
        <div id="navcontainer">
<ul>
<li><a>Welcome <?php echo $_SESSION['admin']; ?></a> </li>
<li><a href="sudo_welcome.php">Home</a></li>
<li><a href="guest_welcome.php">Reports</a></li>
<li><a href="logout.php">Log Out</a></li>
</ul>
</div> 
        <!-- ====== --!>
        
<?php
} 
    elseif (isset($_SESSION['guest']))
    {?>
        <div id="navcontainer">
            <ul>
            <li><a>Welcome <?php echo $_SESSION['guest']; ?></a> </li>
            
            <li><a href="guest_welcome.php">Reports</a></li>
            <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        
 <?php   }
?>
                <div class="columns">
		<div class="column4">
			<div class="feature">
