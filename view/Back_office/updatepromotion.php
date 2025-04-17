<?php
include_once __DIR__ . '/../../model/promotion.php';
include_once __DIR__ . '/../../controller/promotioncontroller.php';

$promotionController = new PromotionController();
$message = "";

// Mise à jour si formulaire soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Créer un objet Promotion avec les nouvelles données
    $promotion = new Promotion(
        $id,
        $_POST['user_id'],
        $_POST['code'],
        $_POST['date_debut'],
        $_POST['date_fin'],
        $_POST['valeur']
    );

    $promotionController->updatePromotion($promotion);

    // Stocker un message pour l'afficher après la redirection
    session_start();
    $_SESSION['message'] = "Promotion modifiée avec succès.";

    // Rediriger pour éviter la resoumission du formulaire
    header("Location: updatepromotion.php");
    exit();
}

// Pour récupérer le message de succès s'il existe
session_start();
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

// Suppression si demandé
if (isset($_GET['delete_id'])) {
    $idToDelete = $_GET['delete_id'];
    $promotionController->deletePromotion($idToDelete);
    $message = "Promotion supprimée avec succès.";
}

// Obtenir la liste mise à jour
$list = $promotionController->listPromotion();
$editingId = $_GET['id'] ?? null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une Promotion</title>
    <style>
        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #888;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f4f4f4;
        }
        input {
            width: 100%;
            padding: 6px;
            box-sizing: border-box;
        }
        .btn {
            padding: 8px 12px;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background: #45a049;
        }
        .msg {
            text-align: center;
            color: green;
            font-weight: bold;
        }
        .btn-delete {
            padding: 8px 12px;
            background: #f44336;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn-delete:hover {
            background: #e53935;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Modifier une Promotion</h2>

<?php if ($message): ?>
    <div class="msg"><?= $message ?></div>
<?php endif; ?>

<table>
    <tr>
        <th>ID</th>
        <th>ID Utilisateur</th>
        <th>Code</th>
        <th>Date Début</th>
        <th>Date Fin</th>
        <th>Valeur</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($list as $promotion): ?>
        <?php if ($promotion['id'] == $editingId): ?>
            <form method="post" action="updatepromotion.php">
                <tr>
                    <td><?= $promotion['id'] ?><input type="hidden" name="id" value="<?= $promotion['id'] ?>"></td>
                    <td><input type="text" name="user_id" value="<?= htmlspecialchars($promotion['user_id']) ?>" required></td>
                    <td><input type="text" name="code" value="<?= htmlspecialchars($promotion['code_promotion']) ?>" required></td>
                    <td><input type="date" name="date_debut" value="<?= htmlspecialchars($promotion['date_debut']) ?>" required></td>
                    <td><input type="date" name="date_fin" value="<?= htmlspecialchars($promotion['date_fin']) ?>" required></td>
                    <td><input type="number" name="valeur" value="<?= htmlspecialchars($promotion['valeur']) ?>" required></td>
                    <td><button class="btn" type="submit">Valider</button></td>
                </tr>
            </form>
        <?php else: ?>
            <tr>
                <td><?= $promotion['id'] ?></td>
                <td><?= htmlspecialchars($promotion['user_id']) ?></td>
                <td><?= htmlspecialchars($promotion['code_promotion']) ?></td>
                <td><?= htmlspecialchars($promotion['date_debut']) ?></td>
                <td><?= htmlspecialchars($promotion['date_fin']) ?></td>
                <td><?= htmlspecialchars($promotion['valeur']) ?></td>
                <td>
                    <a class="btn" href="updatepromotion.php?id=<?= $promotion['id'] ?>">Modifier</a>
                    <a class="btn-delete" href="updatepromotion.php?delete_id=<?= $promotion['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette promotion ?');">Supprimer</a>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

</body>
</html>
