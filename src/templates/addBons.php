<div class="container-fluid container-lg">
    <div class="titre p-2 my-2 rounded">
        <h1 class="title"><i class="fas fa-car-side"></i>Bon de commande</h1>
    </div>    

    <form id="formBons" name="formBons" onsubmit="return false" >
        <div class="form-group row">   
            <label for="orderDate" class="col-sm-6 col-form-label">Date de la commande :</label>
            <div class="col-sm-6">   
                <input type="text" class="form-control" id="orderDate" name="orderDate" readonly value="<?= date("d-m-yy"); ?>">
            </div>
        </div>
        <h4>Informations du client</h4>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="customerNumber">Client</label>
                <select id="customerNumber" name="customerNumber" class="form-control" onchange="donneesClient(this)" required>
                    <option value="">- Sélectionnez un client -</option>
                    <?php foreach($customers as $customer): ?>
                        <option value="<?= intval($customer['customerNumber'])?>"><?= htmlspecialchars($customer['customerName']) ?></>
                    <?php endforeach ?>
                </select>
            </div>
            
        </div>
        <div class="form-group">   
            <label for="address">Adresse :</label>   
            <input type="text" class="form-control" id="customerAddress" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="phone"> Ville :</label>
                <input type="text" class="form-control w-50" id="customerCity" disabled >
            </div>
            <div class="form-group col-md-4">
                <label for="phone"> Pays :</label>
                <input type="text" class="form-control w-50" id="customerCountry" disabled >
            </div>
            <div class="form-group col-md-4">
                <label for="phone"> Téléphone :</label>
                <input type="text" class="form-control w-50" id="customerPhone" disabled >
            </div>
        </div>
        <h4>Ajout de produits commandés<h4>

        
        <table id="tableProducts" class="table table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Description</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Montant</th>
                </tr>
            </thead>
            <tbody id="bodyTableProducts">
            </tbody>
        </table>
        <div class="text-center">
            <button type="button" class="btn btn-dark mb-5" onclick="ajouterProduitLigne()"><i class="fas fa-plus text-white"></i> Ajouter produit</button>
            <button type="button" class="btn btn-dark mb-5" onclick="supprimerProduitLigne()"><i class="fas fa-minus text-white"></i> Supprimer produit</button>
        </div>
        
        <div class="form-row">
            <div class="col-md-5 order-2 order-md-1">
                <div class="form-group">
                    <label for="comments">Commentaires :</label>
                    <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end order-1 order-md-2">
                <div class="form-group">
                    <div class="form-group row justify-content-end">   
                        <label for="total">Total : </label>
                        <div>   
                            <input type="number" class="form-control" id="total" name="total" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">   
                        <label for="tva">T.V.A ( 20% ) : </label>
                        <div>   
                            <input type="number" class="form-control" id="tva" name="tva" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">   
                        <label for="totalTtc">Total T.T.C : </label>
                        <div>   
                            <input type="number" class="form-control" id="totalTtc" name="totalTtc" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" id="saveOrder" class="btn btn-dark mb-5" onclick="commande(this)"><i class="text-white"></i> Sauvegarder</button>
            <button type="reset" class="btn btn-dark mb-5"><i class="text-white"></i> Réinitialiser</button>
        </div>
    </form>
    <div class="modal" id="reponseModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Commande enregistrée avec succès.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
            </div>
        </div>
    </div>
</div>
<script src="js/commandes.js" defer></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>