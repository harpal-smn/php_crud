<?php 
      $servername = 'localhost';
      $username   = 'root';
      $password   ='';
      $dbname     = 'php_1';
      
   //   define('servername','localhost'); 
   //   define('username','root');
   //   define('password','');
   //   define('dbname','php_1');

     $conn  = mysqli_connect($servername,$username,$password,$dbname);
     
     if(!$conn){
        die('connection Failed'.  $conn-> connect_error);
     }
    
?>