<?php
// Acessa o log de erros do PHP-FPM para verificar o erro
error_log("Recebi uma requisição!");

// Simula um tempo de processamento demorado
sleep(5);

echo "Olá, requisição processada!";