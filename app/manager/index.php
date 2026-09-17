<?php
require_once '../../config/config.php';
require_once '../../config/functions.php';

requireRole('manager');

logActivity(
    $pdo, 
    $_SESSION['user_id'], 
    $_SESSION['user_email'], 
    'view_activity_logs',
);

#Query #3 Get ALL Activity Logs
$stmt = $pdo->query("
    SELECT * 
    FROM activity_logs 
    ORDER BY created_at DESC
");

$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello, Manager</h1>
    <a href="../auth/signout.php">Sign out</a>
</body>
</html>