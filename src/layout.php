<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- JS -->
    <script src="js/main.js" defer></script>


    <title>Modélo, site de modélisme</title>
</head>
<body>
    <header>
        <h1 class="title">MODELO</h1>
        <p>Le site du modélisme</p>

        <nav id="navbar-example2" class="navbar navbar-light bg-light">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addBons.php">Bon de commande</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="commandes.php">Liste des commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Administrateur</a>
                </li>
            </ul>
        </nav>
    </header>



    <main>
        <!-- Chargement du template PHTML spécifié par le programme PHP -->
        <?php include $template.'.php' ?>
    </main>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

<footer>
    <div class="footer">
        <p>- Suivez-nous -</p>
        <div class="reso">
        <a href="https://www.facebook.com/"><img src="/images/reseau/facebook.png" alt="facebook" class="imgreso"></a> 
        <a href="https://www.instagram.com/?hl=fr"><img src="/images/reseau/insta.jpg" alt="insta" class="imgreso"></a> 
        <a href="https://www.pinterest.fr/"><img src="/images/reseau/pinterest.png" alt="pinterest" class="imgreso"></a>
        <a href="https://twitter.com/explore"><img src="/images/reseau/twitter.jpg" alt="twitter" class="imgreso"></a> 
        </div>
        <p><small>© 2020 - Modélo. Tous droits réservés.</small></p>
    </div>
</footer>
</html>