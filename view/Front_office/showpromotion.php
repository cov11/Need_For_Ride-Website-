<?php
include __DIR__ . '/../../controller/promotioncontroller.php';
$promotionController = new PromotionController();
$list = $promotionController->listPromotion();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Promotions</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      color: #333;
    }

    h2 {
      text-align: center;
      margin-top: 20px;
    }

    .search-container {
      text-align: center;
      margin: 20px;
    }

    .search-container input[type="text"],
    .search-container select {
      padding: 10px;
      font-size: 16px;
      margin: 0 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
      border: 1px solid #888;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #eee;
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
      border-radius: 5px;
    }

    .return-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<h2>Liste des Promotions</h2>

<div class="search-container">
  <select id="searchOption">
    <option value="0">ID</option>
    <option value="2">Code</option>
    <option value="3">Date Début</option>
    <option value="4">Date Fin</option>
    <option value="5">Valeur</option>
  </select>
  <input type="text" id="searchInput" placeholder="Rechercher..." onkeyup="filterTable()">
</div>

<table id="promotionTable">
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

<script>
function filterTable() {
  let input = document.getElementById("searchInput").value.toLowerCase();
  let option = parseInt(document.getElementById("searchOption").value);
  let table = document.getElementById("promotionTable");
  let rows = table.getElementsByTagName("tr");

  for (let i = 1; i < rows.length; i++) {
    let td = rows[i].getElementsByTagName("td")[option];
    if (td) {
      let txtValue = td.textContent || td.innerText;
      rows[i].style.display = txtValue.toLowerCase().includes(input) ? "" : "none";
    }
  }
}
</script>

</body>
</html>
