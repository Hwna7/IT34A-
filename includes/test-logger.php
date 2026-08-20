<?php
require_once("config/comfig.php");
require_once("includes/activity-logger.php");

$user_id = "root" ?? null;
$user_email = "root" ?? null;

$success = logActivity($pdo,$user_id,$user_email,'test activity','success');

if($success){
    echo "Activity log inserted successfully";
} else {
    echo "Failed to inserted activity log";
}

?>