<?php
$pool_info = [
    'script' => $_SERVER['SCRIPT_NAME'],
    'server_port' => $_SERVER['SERVER_PORT'] ?? 'unknown',
    'worker_pid' => getmypid(),
    'pool_type' => 'HEAVY (esperado na porta 9001)'
];

error_log("📙 HEAVY POOL - PID: " . getmypid() . " - Script: " . $_SERVER['SCRIPT_NAME']);

sleep(30);

echo "<pre>";
echo json_encode([
    'message' => 'Requisição processada no POOL HEAVY!',
    'pool_info' => $pool_info,
    'timestamp' => date('Y-m-d H:i:s')
]);
echo "</pre>";
?>