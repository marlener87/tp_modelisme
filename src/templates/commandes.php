<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>PHP</title>
    <link rel="stylesheet" href="css/order-form.css">
    <script src="js/commandes.js" defer></script>
</head>
<body>
    <section>
        <h1>Liste des commandes</h1>

        <table id="ordersTable" class="standard-table">
            <caption>Liste des commandes</caption>
            <thead>
                <tr>
                    <th>Commande</th>
                    <th>Date de la commande</th>
                    <th>Date de livraison</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                    <tr>
                        <td>
                            <a href="order-form.php?orderNumber=<?= $order['orderNumber'] ?>"><?= $order['orderNumber'] ?></a>
                        </td>
                        <td><?= $order['orderDate'] ?></td>
                        <td><?= $order['shippedDate'] ?></td>
                        <td><?= $order['status'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
    $('#ordersTable').DataTable({
    
        "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
                    }
    });
 </script>
</body>
</html>