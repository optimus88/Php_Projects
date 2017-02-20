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
        //header("location: index.php?remarks=success");
    }
    else
    {
        echo "Error";
    }
    }
    
    function update_profile($qr)
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
    {
        
        //echo "The Data is written into the database";
        
        //header("location: index.php?remarks=success");
        return true;
    
    }
    else
    {
        //return false;
        die('Could not fetch data: ' . mysql_error());
    }
    
    }
    //checking for the valid login
  
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
        echo $num;   
        session_start();
        $row = mysql_fetch_array($result);
        $_SESSION['na']=$row['name'];
        $_SESSION['uname']=$row['username'];        
        //$_SESSION['name'] = mysql_fetch_array($result,username);  
        //echo "The Data is written into the database";
        echo "Successful Login";
        return true ;
        //header("location: index.php?remarks=success");
    }
    else
    {
        return false;
    }
    }
    
   // feching the scraps from the scrap table
   
     function fetch_scrap($qr)
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
        die('Could not fetch data: ' . mysql_error());
    }
    }
   
  
     // posting the scraps to the scrap table
   
     function post_scrap($qr)
     
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
    echo $qr;
    $res = mysql_query($qr,$link);
    if(mysql_affected_rows()>0)
    {
        
        //echo "The Data is written into the database";
        return true ;
        //header("location: index.php?remarks=success");
    }
    else
    {
        return false;
    }
    }
        //fetch the like count from the scrap table and increment it by one
   
   function like_count($qr)
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
        $row = mysql_fetch_array($res);
        $count = $row['like_post'];
        $count++;
        return $count;
        
    }
    else
    {
        
        return false;
    }
    }
    
    
    //fetch the dislike count from the scrap table and increment it by one
   
   function dislike_count($qr)
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
        $row = mysql_fetch_array($res);
        $count = $row['dislike_post'];
        $count++;
        return $count;
        
    }
    else
    {
        
        return false;
    }
    }
       
    //update the like count for the post in scrapwall
                
        function update_counter($qr)
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
    }
    
    }
       //Delete any post from the scrap table
   
   function delete_post($qr)
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
    if(mysql_affected_rows()>0)
    {
        
        return true;
        
    }
    else
    {
        
        return false;
    }
    }
    
        //update the post in scrapwall
                
        function update_scrap($qr)
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
    }
    
    }
    
    function pics($qr)
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
        echo $qr;
        $res = mysql_query($qr,$link);
        if(mysql_num_rows($res)>0)
        {
            echo "here in true";
            return $res;
        }
        else
        {
            echo mysql_error();
            echo "here in the false loop";
            return false;
        }
    
    }
    
    
         function post_reply($qr)
     
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
    echo $qr;
    $res = mysql_query($qr,$link);
    if(mysql_affected_rows()>0)
    {
        
        //echo "The Data is written into the database";
        return true ;
        //header("location: index.php?remarks=success");
    }
    else
    {
        die('Could not post reply data: ' . mysql_error());
        return false;
    }
    }
       
    
    function full_fetch($qr)
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
        return $res;
        //$number = mysql_num_rows($res) ;  
        //echo $num;   
    }
    else
    {
       //die('Could not post reply data: ' . mysql_error());
        return false;
    }
    }
      
    
}
?>