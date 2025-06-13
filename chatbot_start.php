<?php
$command = "python chatbotScript.py > chatbot_log.txt 2>&1 &";
exec($command);
echo "Bot odpalony.";
?>