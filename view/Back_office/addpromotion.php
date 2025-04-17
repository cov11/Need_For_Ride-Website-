<?php
// Inclure le contrôleur pour la gestion des promotions
include '../../controller/promotioncontroller.php';

// Initialiser un tableau d'erreurs
$errors = [];

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $user_id = $_POST['user_id'];
    $code = $_POST['code'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $valeur = $_POST['valeur'];

    // Validation côté serveur
    if (strlen($user_id) != 4) {
        $errors[] = "L'ID utilisateur doit avoir 4 caractères.";
    }

    if (strlen($code) != 8) {
        $errors[] = "Le code promo doit avoir 8 caractères.";
    }

    if (strtotime($date_debut) > strtotime($date_fin)) {
        $errors[] = "La date de début doit être avant la date de fin.";
    }

    if ($valeur >= 100) {
        $errors[] = "La valeur de la promotion doit être inférieure à 100.";
    }

    // Si pas d'erreurs, ajouter la promotion
    if (empty($errors)) {
        $promotionController = new PromotionController();
        $promotionController->addPromotion($user_id, $code, $date_debut, $date_fin, $valeur);
        $success_message = "Promotion ajoutée avec succès.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Promotion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 100px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        input[type="text"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-message {
            text-align: center;
            color: green;
            font-weight: bold;
        }

        .error-message {
            text-align: center;
            color: red;
            font-weight: bold;
        }

        .back-btn {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            background-color: #e53935;
        }








        
    </style>
</head>
<body>

<div class="container">
    <h2>Ajouter une Nouvelle Promotion</h2>

    <?php
    if (isset($success_message)) {
        echo "<div class='success-message'>$success_message</div>";
    }
    
    // Afficher les erreurs s'il y en a
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='error-message'>$error</div>";
        }
    }
    ?>

    <form action="" method="post" id="promotionForm">
        <label for="user_id">ID Utilisateur (4 caractères):</label>
        <input type="text" name="user_id" id="user_id" value="<?= isset($user_id) ? $user_id : '' ?>" required maxlength="4">

        <label for="code">Code Promo (8 caractères):</label>
        <input type="text" name="code" id="code" value="<?= isset($code) ? $code : '' ?>" required maxlength="8">

        <label for="date_debut">Date de début:</label>
        <input type="date" name="date_debut" id="date_debut" value="<?= isset($date_debut) ? $date_debut : '' ?>" required>

        <label for="date_fin">Date de fin:</label>
        <input type="date" name="date_fin" id="date_fin" value="<?= isset($date_fin) ? $date_fin : '' ?>" required>

        <label for="valeur">Valeur de la promotion (inférieure à 100):</label>
        <input type="number" name="valeur" id="valeur" value="<?= isset($valeur) ? $valeur : '' ?>" required max="99">

        <button type="submit">Ajouter Promotion</button>
    </form>

    <!-- Bouton retour -->
    <a href="javascript:history.back()" class="back-btn">Retour</a>
</div>

<script>
    document.getElementById('promotionForm').addEventListener('submit', function(event) {
        let errors = [];
        
        // Récupérer les valeurs du formulaire
        let user_id = document.getElementById('user_id').value;
        let code = document.getElementById('code').value;
        let date_debut = document.getElementById('date_debut').value;
        let date_fin = document.getElementById('date_fin').value;
        let valeur = document.getElementById('valeur').value;

        // Validation des champs
        if (user_id.length !== 4) {
            errors.push("L'ID utilisateur doit avoir 4 caractères.");
        }

        if (code.length !== 8) {
            errors.push("Le code promo doit avoir 8 caractères.");
        }

        if (new Date(date_debut) > new Date(date_fin)) {
            errors.push("La date de début doit être avant la date de fin.");
        }

        if (valeur >= 100) {
            errors.push("La valeur de la promotion doit être inférieure à 100.");
        }

        // Si des erreurs existent, empêcher la soumission du formulaire
        if (errors.length > 0) {
            event.preventDefault();
            alert(errors.join('\n'));
        }
    });
</script>

</body>
</html>
