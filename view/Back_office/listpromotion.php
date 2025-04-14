<?php
include __DIR__ . '/../../controller/promotioncontroller.php';

$promotionC = new PromotionController();

// Suppression si un ID est passé dans l'URL
$successMessage = '';
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $promotionC->deletePromotion($id);
    $successMessage = "Suppression effectuée avec succès.";
}

// Récupération de la liste mise à jour
$list = $promotionC->listPromotion();
?>

<html>
<head>
    <title>Liste des Promotions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .message-success {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-top: 20px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 30px auto;
        }

        th, td {
            border: 1px solid #888;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        a {
            margin: 0 5px;
            text-decoration: none;
            color: blue;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Liste des Promotions</h2>

    <?php if (!empty($successMessage)) : ?>
        <div class="message-success"><?= htmlspecialchars($successMessage) ?></div>
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
        <?php foreach ($list as $promotion) { ?>
        <tr>
            <td><?= htmlspecialchars($promotion['id']) ?></td>
            <td><?= htmlspecialchars($promotion['user_id']) ?></td>
            <td><?= htmlspecialchars($promotion['code_promotion']) ?></td>
            <td><?= htmlspecialchars($promotion['date_debut']) ?></td>
            <td><?= htmlspecialchars($promotion['date_fin']) ?></td>
            <td><?= htmlspecialchars($promotion['valeur']) ?></td>
            <td>
                <a href="updatepromotion.php?id=<?= $promotion['id'] ?>">Modifier</a>
                <a href="listpromotion.php?delete_id=<?= $promotion['id'] ?>" onclick="return confirm('Supprimer cette promotion ?');">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
