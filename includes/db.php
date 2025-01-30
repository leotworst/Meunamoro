<?php
$host = 'localhost';
$user = 'root';  // ou seu usuário do banco
$password = '';  // ou sua senha do banco
$dbname = 'namoro'; // Substitua pelo nome do seu banco de dados

// Conectar ao banco de dados
$conn = mysqli_connect($host, $user, $password, $dbname);

// Verificar a conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
