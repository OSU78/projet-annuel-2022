<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="../public/css/order.css">
  <script defer src="/Public/Js/function.js"></script>
  <script defer src="/Public/Js/getOrder.js"></script>
  <!-- <script defer src="/Public/Js/getDetailOrder.js"></script> -->

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
              <th>Montant</th>
              <th>Status</th>
              <th>Afficher Commande</th>
            </tr>
          </thead>
          <tbody>
            <tr id="content-cmd">
              <!-- contenu de la commande -->
            </tr>
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