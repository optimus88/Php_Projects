<?php
session_start();
if(isset($_SESSION['sso_id']))
{
 include('blogic.php');
$object = new blogic();

$filename = $_POST['filename'];
$Env = $_POST['env'];
$branch = $_POST['branch'];
//echo "Filename = $filename";
//echo "Env = $Env";
//echo "branch = $branch";
if(isset($_POST['submit']))
{
    //$basic_query="SELECT * FROM login l, deployment_tracker_replicate dt WHERE l.sso_id=dt.sso_id_login";
	$basic_query="SELECT file_name,order_no,env,version,root,branch,module,domain_name,deployment_owner,deployment_date FROM deployment_tracker_replicate ";
    //$clause="ORDER BY dt.deployment_date DESC";
	$clause="ORDER BY deployment_date DESC";
if($filename != "select" && $Env == "select" && $branch == "select")
{
    
    $secondary_query="WHERE file_name='$filename'";
    $query="$basic_query $secondary_query $clause";
    //echo $query;
    //echo "In the first loop";
    //$query = "SELECT * FROM deployment_tracker WHERE file_name='$filename' ORDER BY deployment_date DESC";
    //echo $query;
}
elseif($Env == "select" && $branch != "select" && $filename == "select")
{
    //echo "In the 2nd loop";
    //$query = "SELECT * FROM deployment_tracker WHERE env='$Env' and branch='$branch' GROUP BY file_name";
    //$secondary_query="AND dt.branch='$branch'";
	$secondary_query="WHERE branch='$branch'";
    $query="$basic_query $secondary_query $clause";
    //$query = "SELECT * FROM deployment_tracker WHERE branch='$branch' GROUP BY file_name ORDER BY deployment_date DESC";
    //echo $query;
}

elseif($filename == "select" && $branch == "select" && $Env != "select")
{
    //echo "In the 3rd loop";
    //$secondary_query="AND dt.env='$Env'";
	$secondary_query="WHERE env='$Env'";
    $query="$basic_query $secondary_query $clause";
    //$query = "SELECT * FROM deployment_tracker WHERE env='$Env' GROUP BY file_name ORDER BY deployment_date DESC";
   //echo $query; 
}
else
{
    //echo "Last query";
    $query = "$basic_query $clause ";
    //echo $query;
}

include ('header.php');
?>


<table class="gridtable">
<tr><th id="td-header">Filename</th><th>Env</th><th>Order</th><th>CVS Version</th><th>CVS Root</th>
<th>CVS Branch</th><th>Module</th><th>Domain</th><th>Deployed By</th><th>Deployment Date</th></tr>
<!--<th>Deployer's Name</th> --!>

<?php
//echo $query;
$result = $object-> fetch_report($query);
if($result == 'false')
{
    echo '<script>alert("Sorry..!!! No Records Fetched.."); window.location = "welcome.php"</script>';
}
else
{
    while($row = mysql_fetch_array($result))
    {
        $filename = $row['file_name'];
        $order_no = $row['order_no'];
        $env = $row['env'];
        $version = $row['version'];
        $root = $row['root'];
        $branch = $row['branch'];
        $module = $row['module'];
        $domain = $row['domain_name'];
        $Deplyment_owner = $row['deployment_owner'];
        $Deplyment_date = $row['deployment_date'];
        //$Deployer_name = $row['name'];
        
        //$Date = $row['date'];
//        $Content = $row['content'];
//        $Category = $row['category'];
//        $Like = $row['like_post'];
//        $Dislike = $row['dislike_post']; 
 

?>
<tr><td><?php echo $filename; ?> </td><td><?php echo $env; ?></td><td><?php echo $order_no; ?></td><td><?php echo $version; ?></td><td><?php echo $root; ?></td>
<td><?php echo $branch; ?></td><td><?php echo $module; ?></td>
<td><?php echo $domain; ?></td><td><?php echo $Deplyment_owner; ?></td><td><?php echo $Deplyment_date; ?></td></tr>
<?php
}
}
}?>
</table>
<!--<a href="generate_result.php?report_query=<?php echo $query; ?>">report</a>--!>
<?php include ('footer.php'); }
else 
{
    include ('index.php');
}
?>