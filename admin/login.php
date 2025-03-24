<?php
include '../config/conexao.php';

if ($_POST) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE usuario = ? AND senha = SHA2(?, 256)");
    $stmt->execute([$usuario, $senha]);

    if ($stmt->rowCount() == 1) {
        $_SESSION['logado'] = true;
        header('Location: dashboard.php');
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Login Administrativo</h2>
    <?php if (isset($erro)): ?>
        <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label>Usuário:</label>
            <input type="text" name="usuario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Senha:</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
