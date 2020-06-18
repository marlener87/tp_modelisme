<?php
    include "connect-bdd.php";

    $query = $pdo -> prepare 
        (
            "SELECT productName,
                    quantityInStock,
                    buyPrice    
            FROM    products
            WHERE   productCode = ?"
        );

    $query -> execute([$_POST["productNumber"]]);

    $donneesProduit = $query->fetchAll(PDO::FETCH_ASSOC);

    //le retour doit être un JSON 
    echo json_encode($donneesProduit);
    exit();
?>