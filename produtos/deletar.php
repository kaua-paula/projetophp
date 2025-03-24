<?php
include '../config/conexao.php';
if (!isset($_SESSION['logado'])) {
    header('Location: ../admin/login.php');
}

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: listar.php');