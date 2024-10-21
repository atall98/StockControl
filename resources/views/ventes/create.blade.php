<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une vente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #007bff;
            font-weight: bold;
            margin-bottom: 2rem;
        }
        .table thead th {
            background-color: #17a2b8;
            color: white;
        }
        .table-responsive {
            border: 1px solid #dee2e6;
            padding: 1rem;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary, .btn-secondary {
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            border-radius: 0.5rem;
        }
        .btn-danger {
            padding: 0.5rem 1rem;
        }
        #add-product {
            margin-top: 1rem;
        }
        .prix-total, .prix-unitaire {
            font-weight: bold;
        }
        .alert-danger ul {
            margin-bottom: 0;
        }
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            .btn-primary, .btn-secondary {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ventes.store') }}" method="POST">
            <h1 class="mb-4 text-center">Créer une vente</h1>
            @csrf
            <div class="form-group">
                <label for="client_id" class="col-sm-3 col-form-label font-weight-bold">Client</label>
                <div class="col-sm-9">
                    <select name="client_id" class="form-control form-control-lg" required>
                        <option value="" disabled selected>Sélectionner un client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->nom_clients }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive mb-4">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr class="text-center bg-info text-white">
                            <th colspan="6">Informations de la facture</th>
                        </tr>
                        <tr>
                            <th>Date de la facture</th>
                            <th><input type="date" name="date_facture" class="form-control" required></th>
                            <th>Référence de la facture</th>
                            <th><input type="text" name="reference_facture" class="form-control" placeholder="Référence" required></th>
                            <th>Total Facture</th>
                            <th><label><strong> </strong><span id="total-vente">0.00</span></label></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>Référence</th>
                            <th>Libellé</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Prix Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="produit-fields">
                        <tr class="produit-row">
                            <td><input type="text" name="produits[0][reference]" class="form-control reference-input" onblur="fetchProduitInfo(this)" /></td>
                            <td><input type="text" class="form-control libelle-input" readonly /></td>
                            <td><input type="number" name="produits[0][quantite]" class="form-control quantite-input" min="1" value="1" onchange="updatePrixTotal(this)" /></td>
                            <td><span class="prix-unitaire">0.00</span></td>
                            <td><span class="prix-total">0.00</span></td>
                            <td><button type="button" class="btn btn-danger" onclick="removeProduitRow(this)">Supprimer</button></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" id="add-product" class="btn btn-secondary mb-2">Ajouter un produit</button>
            </div>

            <button type="submit" class="btn btn-primary">Valider la vente</button>
        </form>
    </div>


    <script>
        function fetchProduitInfo(input) {
            const value = input.value.trim();
            if (!value) return;

            const row = input.closest('.produit-row');
            const libelleInput = row.querySelector('.libelle-input');
            const prixUnitaireSpan = row.querySelector('.prix-unitaire');
            const quantiteInput = row.querySelector('.quantite-input');

            fetch(`/produits/search/${value}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Produit non trouvé');
                    }
                    return response.json();
                })
                .then(data => {
                    libelleInput.value = data.libelle || '';
                    prixUnitaireSpan.innerText = parseFloat(data.prix_vente).toFixed(2);
                    updatePrixTotal(quantiteInput);
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Produit non trouvé');
                });
        }

        function updatePrixTotal(quantiteInput) {
            const row = quantiteInput.closest('.produit-row');
            const prixUnitaire = parseFloat(row.querySelector('.prix-unitaire').innerText) || 0;
            const quantite = parseInt(quantiteInput.value) || 1;
            const prixTotal = prixUnitaire * quantite;

            row.querySelector('.prix-total').innerText = prixTotal.toFixed(2);
            updateTotal();
        }

        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.produit-row').forEach(function(row) {
                const prixTotal = parseFloat(row.querySelector('.prix-total').innerText) || 0;
                total += prixTotal;
            });
            document.getElementById('total-vente').innerText = total.toFixed(2);
        }

        function addProduitRow() {
            const produitIndex = document.querySelectorAll('.produit-row').length;
            const newRow = `
                <tr class="produit-row">
                    <td><input type="text" name="produits[${produitIndex}][reference]" class="form-control reference-input" onblur="fetchProduitInfo(this)" /></td>
                    <td><input type="text" class="form-control libelle-input" readonly /></td>
                    <td><input type="number" name="produits[${produitIndex}][quantite]" class="form-control quantite-input" min="1" value="1" onchange="updatePrixTotal(this)" /></td>
                    <td><span class="prix-unitaire">0.00</span></td>
                    <td><span class="prix-total">0.00</span></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeProduitRow(this)">Supprimer</button></td>
                </tr>
            `;
            document.getElementById('produit-fields').insertAdjacentHTML('beforeend', newRow);
        }

        function removeProduitRow(button) {
            const row = button.closest('.produit-row');
            row.remove();
            updateTotal();
        }

        document.getElementById('add-product').addEventListener('click', function () {
            addProduitRow();
        });
    </script>
</body>
</html>
