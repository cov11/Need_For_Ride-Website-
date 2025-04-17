<?php
// index.php - Page d'accueil pour Need For Ride
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Accueil - Need For Ride</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #800000, #a83232);
      color: white;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
      text-align: center;
    }

    h1 {
      font-size: 3em;
      margin-bottom: 20px;
    }

    .btn {
      display: inline-block;
      margin: 10px;
      padding: 15px 30px;
      font-size: 1.2em;
      background-color: #fff;
      color: maroon;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      text-decoration: none;
      transition: 0.3s;
    }

    .btn:hover {
      background-color: maroon;
      color: white;
    }

    .btn-admin {
      background-color: #e1e1e1;
      color: maroon;
    }

    .btn-admin:hover {
      background-color: #c7c7c7;
    }
  </style>
</head>
<body>

  <h1>Bienvenue sur Need For Ride 🚗</h1>
  
  <!-- Lien vers la section Admin -->
  <a class="btn" href="view/Back_office/admin_dashboard.php" aria-label="Accéder à la section administrateur">Admin</a>
  
  <!-- Lien vers la section Utilisateur -->
  <a href="view/Front_office/showpromotion.php" class="btn btn-admin" aria-label="Accéder à la section utilisateur">Utilisateur</a>

</body>
</html>
