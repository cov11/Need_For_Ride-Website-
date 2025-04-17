<?php
$pageTitle = "Tableau de bord Admin - Need For Ride";
include __DIR__ . '/../../includes/header.php';
?>

<style>
  body {
    background-color: #111;
    color: #fff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
  }

  .dashboard-container {
    max-width: 800px;
    margin: 100px auto;
    text-align: center;
    padding: 40px;
    background-color: #1a1a1a;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.05);
  }

  .dashboard-container h2 {
    font-size: 32px;
    margin-bottom: 10px;
    color: #4CAF50;
  }

  .dashboard-container p {
    font-size: 18px;
    color: #ccc;
  }

  .dashboard-buttons {
    margin-top: 40px;
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .dashboard-buttons a {
    padding: 15px 30px;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.2s;
  }

  .btn-ajouter {
    background-color: #4CAF50;
    color: #fff;
  }

  .btn-ajouter:hover {
    background-color: #45a049;
    transform: scale(1.03);
  }

  .btn-update {
    background-color: #a83232;
    color: #fff;
  }

  .btn-update:hover {
    background-color: #8c2626;
    transform: scale(1.03);
  }

  .btn-lister {
    background-color: #000;
    color: #fff;
    border: 1px solid #4CAF50;
  }

  .btn-lister:hover {
    background-color: #222;
    transform: scale(1.03);
  }
</style>

<div class="dashboard-container">
  <h2>Bienvenue dans le tableau de bord Admin</h2>
  <p>Choisissez une option :</p>

  <div class="dashboard-buttons">
    <a href="addpromotion.php" class="btn-ajouter">Ajouter une Promotion</a>
    <a href="updatepromotion.php" class="btn-update">Mettre à jour une Promotion</a>
    <a href="listpromotion.php" class="btn-lister">Afficher les Promotions</a>
  </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
