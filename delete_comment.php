<?php
// Incluir a conexão com o banco
include('includes/db.php');

// Verificar se o parâmetro de id está presente na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Excluir o comentário com o ID fornecido
    $query = "DELETE FROM comentarios WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        // Redirecionar de volta para a página principal
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao excluir o comentário: " . mysqli_error($conn);
    }
} else {
    echo "ID do comentário não fornecido.";
}
?>
