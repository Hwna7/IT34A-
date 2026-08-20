<?php
session_start();

//define(",")
define('BASE_URL','http://localhost/it34a');

define('DB_HOST','localhost');
define('DB_NAME','it34q');
define('DB_USER','root');
define('DB_PASS','');

try{
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] 
    );
   // echo ("Connection Successfully");

    //logActivity($pdo,$user_id,$email,'connect_db','success');

}catch(PDOException $e){
    die("Connection Failed: " . $e->getMessage());

}

?>