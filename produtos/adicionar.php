<?php
include '../config/conexao.php';
if (!isset($_SESSION['logado'])) {
    header('Location: ../admin/login.php');
}

if ($_POST) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco, descricao) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $preco, $descricao]);

    header('Location: listar.php');
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Adicionar Produto</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Preço:</label>
            <input type="text" name="preco" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="descricao" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
