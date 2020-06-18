<?php
    include 'connect-bdd.php';

    if(empty($_POST)){
        $query = $pdo -> prepare
            (
                "SELECT customerNumber, 
                        customerName
                FROM   customers
                ORDER BY  customerName;"
            );


        $query->execute();

        $customers = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $query = $pdo -> prepare
            (
                "SELECT productCode
                FROM    products
                ORDER BY productCode;"
            );

        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $template = "templates/addBons";
        include 'layout.php'; 
    } else {
        if (isset($_POST["customerNumber"]) AND isset($_POST["productCode"])) {
            $query = $pdo -> prepare 
            (
                "INSERT INTO 
                    orders
                        (orderDate,status,comments,customerNumber)
                VALUES 
                        (NOW(),'In process',?,?)"
            );

            $query->execute([$_POST["comments"],$_POST["customerNumber"]]);

            $query2 = $pdo -> prepare 
            (
                "SELECT MAX(orderNumber) orderId
                 FROM orders"
            );

            $query2->execute();
            
            $resultat = $query2->fetchAll(PDO::FETCH_ASSOC);

            $query = $pdo -> prepare 
            (
                "INSERT INTO 
                    orderdetails
                        (orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber)
                VALUES 
                        (?,?,?,?,?)"
            );


            $n =  count($_POST["productCode"]);

            $productCode = $_POST["productCode"];
            $quantityOrdered = $_POST["quantityOrdered"];
            $priceEach = $_POST["buyPrice"];
            var_dump($resultat) ; 
            $orderNumber = $resultat[0];
            // var_dump($orderNumber);
            $quantityInStock = $_POST["stock"];
           
            $query2 = $pdo -> prepare 
                (
                    "UPDATE products
                     SET quantityInStock = ? 
                     WHERE productCode = ? "
                );

            for ($i=0; $i < $n ; $i++) { 
                $query->execute([$orderNumber["orderId"],$productCode[$i] ,$quantityOrdered[$i],
                                 $priceEach[$i], $i+1]);
                $stock = $quantityInStock[$i] - $quantityOrdered[$i];
                $query2->execute([$stock, $productCode[$i]]);                
            }
            
            //returner au formulaire de bons de commandes
            // header('Location: addBons.php');                  
            // exit();
            echo "La commande a bien été enregistrée";
        }
    }
?>