<?php
include '../config/conexao.php';
if (!isset($_SESSION['logado'])) {
    header('Location: ../admin/login.php');
}

$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll();
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Produtos</h2>
    <a href="adicionar.php" class="btn btn-primary mb-3">Adicionar Produto</a>
    <table class="table table-striped">
        <thead>
            <tr><th>Nome</th><th>Preço</th><th>Ações</th></tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['nome']) ?></td>
                <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                <td>
                    <a href="editar.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="deletar.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>
