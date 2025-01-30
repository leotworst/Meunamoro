<?php
// Incluir o arquivo de conexão com o banco
include('includes/db.php');  // Caminho correto para a pasta 'includes'

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Adicionar um novo comentário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comentario = mysqli_real_escape_string($conn, $_POST['comentario']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    
    // Inserir o comentário no banco de dados (sem a data_comentario)
    $query = "INSERT INTO comentarios (comentario, nome) VALUES ('$comentario', '$nome')";

    if (mysqli_query($conn, $query)) {
        echo "Comentário adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar comentário: " . mysqli_error($conn);
    }
}

// Consultar os comentários
$query = "SELECT * FROM comentarios ORDER BY id DESC";  // Alterado para não considerar a data
$result = mysqli_query($conn, $query);

// Verificar se a consulta foi bem-sucedida
if ($result) {
    $comentarios = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Caso a consulta falhe, inicialize a variável como um array vazio
    $comentarios = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosso Namoro</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <!-- Retângulo Único para tudo -->
            <div class="info-box">
                <!-- Foto com borda roxa -->
                <div class="photo-container">
                    <img src="assets/images/nos.jpg" alt="Nossa Foto" class="photo">
                </div>
                
                <!-- Contagem dos Dias -->
                <div class="date-counter">
                    <p id="contador">Carregando...</p>
                    
                </div>
                
                <!-- Texto sobre o namoro -->
                <div class="info-text">
                    <p>Nosso namoro é uma jornada incrível de amor e cumplicidade. Cada momento é especial e estamos construindo algo ainda mais forte todos os dias.</p>
                </div>
                
                <!-- Seção de Comentários -->
                <div class="comment-section">
                    <h2>Deixe um Comentário</h2>
                    <form action="index.php" method="POST">
                        <textarea name="comentario" placeholder="Deixe um comentário..." required></textarea>
                        <input type="text" name="nome" placeholder="Seu nome (opcional)">
                        <button type="submit">Adicionar Comentário</button>
                    </form>

                    <div id="comentarios">
                        <?php if (!empty($comentarios)): ?>
                            <?php foreach ($comentarios as $comentario): ?>
                                <div class="comment">
                                    <p><strong><?php echo htmlspecialchars($comentario['nome']); ?>:</strong></p>
                                    <p><?php echo nl2br(htmlspecialchars($comentario['comentario'])); ?></p>
                                    <a href="delete_comment.php?id=<?php echo $comentario['id']; ?>">Excluir</a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Nenhum comentário ainda.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>
