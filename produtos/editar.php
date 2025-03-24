<?php
include '../config/conexao.php';
if (!isset($_SESSION['logado'])) {
    header('Location: ../admin/login.php');
}

$id = $_GET['id'] ?? null;

// Buscar o produto pelo ID
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch();

if (!$produto) {
    die("Produto não encontrado.");
}

// Atualizar produto
if ($_POST) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, preco = ?, descricao = ? WHERE id = ?");
    $stmt->execute([$nome, $preco, $descricao, $id]);

    header('Location: listar.php');
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Editar Produto</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Preço:</label>
            <input type="text" name="preco" value="<?= $produto['preco'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="descricao" class="form-control"><?= htmlspecialchars($produto['descricao']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>