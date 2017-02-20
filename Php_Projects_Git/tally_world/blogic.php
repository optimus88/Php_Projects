<?php
include_once('db.php');
class blogic
{
    function insert($qr)
    {
        $link = mysql_connect(SERVER,USER,PASSWORD);
        if(!$link)
        {
            echo "There is a link failure!!!!!!!!!";
            return false;
        }
    if(! mysql_select_db(DATABASE))
    {
        echo "There is no database of the desired destination";
        return false;
    }
    $res = mysql_query($qr,$link);
    if(mysql_affected_rows()>0)
    {
        
        //echo "The Data is written into the database";
        return true ;
        //header("location: scra.php?remarks=success");
    }
    else
    {
        return false;
        //die('Could not Insert data: ' . mysql_error());
        //return false;
    }
    }
    
    function fetch_values($qr)
    {
        $link = mysql_connect(SERVER,USER,PASSWORD);
        if(!$link)
        {
            echo "There is a link failure!!!!!!!!!";
            return false;
        }
                
    if(! mysql_select_db(DATABASE,$link))
    {
        echo "There is no database of the desired destination";
        return false;
    }
    $res = mysql_query($qr,$link);
    if(mysql_num_rows($res)>0)
    {
        //$number = mysql_num_rows($res) ;  
        //echo $num;   
        return $res;
        
    }
    else
    {
        //return false;
        //die('Could not fetch data: ' . mysql_error());
        return false;
        //echo '<script>alert("Sorry..!!! No Records Fetched.."); window.location = "sudo_welcome.php"</script>';
    }
    }
    
    function login($qr)
    {
        $link = mysql_connect(SERVER,USER,PASSWORD);
        if(!$link)
        {
            echo "There is a link failure!!!!!!!!!";
            return false;
        }
                
    if(! mysql_select_db(DATABASE,$link))
    {
        echo "There is no database of the desired destination";
        return false;
    }
    $result = mysql_query($qr,$link);
    if(mysql_num_rows($result)>0)
    {
        $num = mysql_num_rows($result) ;  
        session_start();
        $row = mysql_fetch_array($result);
        $_SESSION['sso_id']=$row['username'];
        
        //$_SESSION['name'] = mysql_fetch_array($result,username);  
        //echo "The Data is written into the database";
        //echo "Successful Login";
        return true ;
        //header("location: index.php?remarks=success");
    }
    else
    {
        die('Could not fetch data: ' . mysql_error());
    }
    }
    
    //can be used to update any entry.
    function update_password($qr)
    {
        $link = mysql_connect(SERVER,USER,PASSWORD);
        if(! $link)
        {
            echo "link Failed";
            return false;
        }
    if(! mysql_select_db(DATABASE))
    {
        echo "NO Database Found";
        return false;
    }
    $res = mysql_query($qr,$link);
    if(mysql_affected_rows()>0)
    //if(!$res)
    {
        //die('Could not update data: ' . mysql_error());
        //echo "Update query successful....!!!!";
        return true;
    }
    else
    {
        //echo "update query not woking...!!!!";
        return false;
		//echo "Password Updated ";
    }
    
    }
    function update_result($qr)
    {
        $link = mysql_connect(SERVER,USER,PASSWORD);
        if(! $link)
        {
            echo "link Failed";
            return false;
        }
        if(! mysql_select_db(DATABASE))
        {
            echo "NO Database Found";
            return false;
        }
            $res = mysql_query($qr,$link);
             if(mysql_affected_rows()>0)
                //if(!$res)
            {
                //die('Could not update data: ' . mysql_error());
                //echo $res;
                echo "Update query successful....!!!!";
                return true;
            }
                else
                {
                //echo "update query not woking...!!!!";
                return false;
                }
            
            }
            
}   
?>