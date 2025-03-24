<?php
include 'config/conexao.php';

$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<!-- Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
</div>

<div class="container mt-5">
    <h1 class="text-center mb-5">Bem-vindo à Loja Real</h1>
    <div class="row">
        <?php foreach ($produtos as $p): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($p['nome']) ?></h5>
                    <p class="card-text"><?= nl2br(htmlspecialchars($p['descricao'])) ?></p>
                    <p class="card-text fw-bold text-success">R$ <?= number_format($p['preco'], 2, ',', '.') ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- Loading Script -->
<script>
    window.addEventListener("load", function() {
        const loader = document.getElementById("loader-wrapper");
        loader.style.display = "none";
    });
</script>