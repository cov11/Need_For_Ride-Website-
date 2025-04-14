<?php
// Inclure le contrôleur pour la gestion des promotions
include __DIR__ . '/../../controller/promotioncontroller.php';

// Créer une instance du contrôleur
$promotionController = new PromotionController();

// Appeler la méthode pour lister toutes les promotions
$list = $promotionController->listPromotion(); // ✅ Correct si c'est bien son nom
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Promotions</title>
    <style>
        table {
            width: 80%;
            margin: 40px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #888;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .return-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
            display: block;
            margin: 20px auto;
        }
        .return-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Liste des Promotions</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Utilisateur</th>
            <th>Code</th>
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $promotion) { ?>
            <tr>
                <td><?= htmlspecialchars($promotion['id']) ?></td>
                <td><?= htmlspecialchars($promotion['user_id']) ?></td>
                <td><?= htmlspecialchars($promotion['code_promotion']) ?></td>
                <td><?= htmlspecialchars($promotion['date_debut']) ?></td>
                <td><?= htmlspecialchars($promotion['date_fin']) ?></td>
                <td><?= htmlspecialchars($promotion['valeur']) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Bouton retour -->
<button class="return-btn" onclick="window.history.back();">Retour</button>

</body>
</html>
