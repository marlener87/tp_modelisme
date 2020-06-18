$(document).ready(function () {
   ajouterProduitLigne();  
});

function donneesClient(client) {
    let idClient = parseInt(client.value);
    console.log(idClient);
    $.ajax({
        method: "POST",
        url: "donneesClient.php", //Chemin d'accès du script php
        data: {customerNumber : idClient} , //variables à envoyer 
        dataType: "json", //format
        success: function(response){ //Si tout se déroule bien on traite le retour
            console.log(response);
            var address = response[0].addressLine1 + ' ' + response[0].addressLine2; 
            console.log(address);
            var city = response[0].city;
            console.log(city);
            var country = response[0].country;
            console.log(country);
            var phone = response[0].phone;
            console.log(phone);
           

            //Remplir le formulaire avec les valeurs récupérées
            $('#customerAddress').val(address);
            $('#customerCity').val(city);  
            $('#customerCountry').val(country);   
            $('#customerPhone').val(phone);       
        },
        error: function(jqXHR, textStatus, errorThrown) { //si il y a une erreur 
            console.log(textStatus, errorThrown+"blabla");
        }
    });
}

$("#bodyTableProducts").delegate(".productCode","change",function(){
    console.log($(this));
    let idProduct = $(this).val();
    let tr = $(this).parent().parent();
    console.log(idProduct);
    $.ajax({
        method: "POST",
        url: "donneesProduit.php", //Chemin d'accès du script php
        data: {productNumber : idProduct} , //variables à envoyer 
        dataType: "json", //format
        success: function(response){ //Si tout se déroule bien on traite le retour
            console.log(response);
            var name = response[0].productName; 
            console.log(name);
            var price = response[0].buyPrice;
            console.log(price);
            var stock = response[0].quantityInStock;
            console.log(stock);
           

            //Remplir le formulaire avec les valeurs récupérées
            tr.find('.productName').val(name);
            tr.find('.buyPrice').val(price);  
            tr.find('.stock').val(stock); 
            tr.find('.quantityOrdered').val(1);
            tr.find('.totalItem').val(price);
            calculs();
        },
        error: function(jqXHR, textStatus, errorThrown) { //si il y a une erreur 
            console.log(textStatus, errorThrown);
        }
    })
})
    

// fonction pour calculer le montant total d'un produit (quantite * prix)
$("#bodyTableProducts").delegate(".quantityOrdered","change",function(){
    let quantite = $(this);
    console.log(quantite);
    let tr= $(this).parent().parent();
    let stock = tr.find('.stock').val()-0;
    
    if (quantite.val() <= 0) {
        alert("Inserez un nombre superieur à 0");
        quantite.val(1);
    }   else if ((quantite.val()-0) > stock) {
        alert("Quantité superieure à la disponibilité du produit, rectifiquez s'il vous plaît");
        quantite.val(1);
    }   else {
        console.log("quantite "+ quantite.val());
        console.log("prix "+tr.find(".buyPrice").val());
        console.log(quantite.val() * tr.find(".buyPrice").val());
        tr.find(".totalItem").val((quantite.val() * tr.find(".buyPrice").val()).toFixed(2));
        calculs();
    }
})

function ajouterProduitLigne() {
    $.ajax({
        url : "products.php",
        method : "POST",
        data : {getNewOrderItem:1},
        success : function(data){
            $("#bodyTableProducts").append(data);
            var n = 0;
            $(".number").each(function(){
                $(this).html(++n);
            })
        }
    })
}



function supprimerProduitLigne() {
    $("#bodyTableProducts").children("tr:last").remove();
    calculs();
}

function calculs() {
    let total = 0;
    $(".totalItem").each(function() {
        total = total + ($(this).val()*1);
    })
    $("#total").val(total);
    let tva = (total * 0.20).toFixed(2);
    $("#tva").val(tva);
    let totalTtc = (total + parseInt(tva)).toFixed(2);
    $("#totalTtc").val(totalTtc);
} 
