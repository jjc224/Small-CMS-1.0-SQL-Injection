<?php

// This is not an executable PHP file: it is purely for viewing purposes with the aesthetics which come with syntax highlighting.

[+] Title:   Small-CMS 1.0 - SQL injection/Authentication Bypass
[+] Date:    02/10/2012
[+] Author:  Phizo (Joshua Coleman)
[+] Vendor:  http://www.small-cms.com/
[+] Version: 1.0
 
 
=================================
default.class.php ~ lines 220-230
=================================
 
    function checkCredentials($username, $password){     
        $obscure = $this->obscure($password);                
        $query = "SELECT * FROM ".$this->prefix_db."users WHERE user_name = '$username' AND user_pass = '$obscure' AND user_active = '1' LIMIT 1;";
            $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);        
        if ($row) {
            return true;
        } else {
            return false;
        }
    }
 
 
=================================
default.class.php ~ lines 260-275
=================================
 
    function setSession($username,$password,$cookie){
     
            $query = "SELECT id FROM ".$this->prefix_db."users WHERE user_name = '$username' AND user_pass = '$password' AND user_active = '1' LIMIT 1;";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
             
                     
        $values = array($username,$this->obscure($password),$row['id']);
        $session = implode(",",$values);
        if($cookie=='on'){
            //cookies
            setcookie("$this->session_name", $session, time()+60*60*24*100,'/');
        } else {
            $_SESSION["$this->session_name"] = $session;
        }
    }
 
 
=======================
login.php ~ lines 27-33
=======================
 
if ($login->checkCredentials($_POST['username'], $_POST['password'])){
        $login->setSession($_POST['username'],$_POST['password'],$_POST['cookie']);
        $login->redirect('index.php?page=admincp');
        } else {
        $error = '';  
        }
} 

?>
