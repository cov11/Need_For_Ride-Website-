<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Need For Ride</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f7f7f7;
            padding: 100px 20px;
        }
        h1 {
            color: #333;
            margin-bottom: 40px;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 40px;
        }
        .btn {
            padding: 20px 40px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
        }
        .btn-user {
            background-color: #4CAF50;
        }
        .btn-user:hover {
            background-color: #45a049;
        }
        .btn-admin {
            background-color: #2196F3;
        }
        .btn-admin:hover {
            background-color: #1e87e5;
        }
    </style>
</head>
<body>

    <h1>Bienvenue sur Need For Ride</h1>
    <p>Choisissez votre interface :</p>

    <div class="btn-container">
        <a href="../Front_office/showpromotion.php" class="btn btn-user">Utilisateur</a>
        <a href="../Back_office/admin_dashboard.php" class="btn btn-admin">Admin</a>
    </div>

</body>
</html>
