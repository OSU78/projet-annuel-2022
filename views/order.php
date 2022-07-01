<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="../public/css/order.css">
  <title>Gestion Commande</title>
</head>

<body>
  <div class="container">
    <?php require_once '../views/includes/header.php' ?>
    <main class="main-container" id="main">
      <!-- section du tableau -->
      <section class="table-section">
        <h1>Liste des commandes</h1>
        <table class="table-content">
          <thead>
            <tr>
              <th>N°</th>
              <th>Date commande</th>
              <th>Numéro Commande</th>
              <th>Montant</th>
              <th>Status</th>
              <th>Facture(s)</th>
              <th>Afficher Commande</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td>
                <a href="#" type="file" class="btn text-color">Telecharger <i class="fas fa-download"></i></a>
              </td>
              <td>
                <a href="#" class="btn text-color">Afficher<i class="fas fa-eye"></i></a>
              </td>
          </tbody>
        </table>
      </section>
    </main>
    <?php require_once '../views/includes/footer.php' ?>
  </div>
  <!-- <script src="../public/js/order.js"></script>
  <script src="../public/js/request.js"></script> -->

</body>

</html>