<!-- mysqli_connect(server,server_name,password,database_name) -->
<?php
    $_SERVER = 'localhost';
    $name = 'root';
    $pass = '';
    $dbname = 'php-crud';
    $db = mysqli_connect($_SERVER,$name,$pass,$dbname);
    if($db == false){
        die("some Error".mysqli_connect_error($db));
    }
    
?>