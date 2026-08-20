<?php
function logActivity($pdo,$user_id,$user_email,$action, $status='success'){
    try{
        //Get client IP Address
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';

        //String to Array
        if (strpos($ip,',') !== false){
            $ip = trim(explode(',', $ip)[0]);
        }

        //Get user agent (brower)
        $user_agent = substr($_SERVER['HTTP_USER_AGENT'] ?? 'unknown',0,255);

        //Application query #1
        $stmt = $pdo->prepare("
            INSERT INTO activity_logs(
               user_id,
               user_email,
               activity_log_action,
               activity_log_status,
               activity_log_ip_address,
               activity_log_user_agent
            ) VALUES (,?,?,?,?,?,?)   
        ");

        //Excute the INSERT
        $success = $stmt->execute([
            $user_id,
            $user_email,
            $action,
            $status,
            $ip,
        ])

    } catch (PDOException $e){
        error_log("Activity Log Error:" . $e->getMessage());
        return false;
    }
}
?>