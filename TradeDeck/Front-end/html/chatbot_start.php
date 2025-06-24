<?php
$script = __DIR__ . DIRECTORY_SEPARATOR . "chatbotScript.py";

exec("taskkill /F /IM python3.13.exe");

usleep(200000);

$cmd = 'powershell -Command "Start-Process python -ArgumentList \'' . $script . '\' -PassThru | Select-Object -ExpandProperty Id"';
$pid = exec($cmd);

file_put_contents("bot.pid", $pid);

echo "Bot uruchomiony z PID: $pid";
?>