<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer un fournisseur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: rgb(8, 41, 255);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: white;
        }

        input[type="number"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        textarea {
            height: 100px;
        }
    </style>
</head>
<body>
    
    <h1>Modifier le fournisseurs</h1>

        <form action="{{ route('fournisseurs.update', $fournisseurs->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom_fournisseurs">Nom</label>
                <input type="text" name="nom_fournisseurs" id="nom_fournisseurs" class="form-control" value="{{ $fournisseurs->nom_fournisseurs }}" required>
            </div>
            <div class="form-group">
                <label for="matricule_fournisseurs">Matricule</label>
                <input type="text" name="matricule_fournisseurs" id="matricule_fournisseurs" class="form-control" value="{{ $fournisseurs->matricule_fournisseurs }}" required>
            </div>
            <div class="form-group">
                <label for="societe">Société</label>
                <input type="text" name="societe" id="societe" class="form-control" value="{{ $fournisseurs->societe }}" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $fournisseurs->telephone }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $fournisseurs->email }}" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $fournisseurs->adresse }}">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
</body>
</html>
