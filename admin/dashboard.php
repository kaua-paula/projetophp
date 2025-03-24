<?php
include '../config/conexao.php';
if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h1>Bem-vindo, Admin!</h1>
    <p><a href="../produtos/listar.php" class="btn btn-success">Gerenciar Produtos</a></p>
    <a href="logout.php" class="btn btn-danger">Sair</a>
</div>
<?php include '../includes/footer.php'; ?>
