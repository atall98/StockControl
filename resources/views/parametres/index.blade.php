<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paramètres d'Affichage et de Langue</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: none;
            background-color: #fff;
        }
        .card-header {
            background-color: #4a90e2;
            color: white;
            padding: 15px;
            font-size: 18px;
            border-bottom: none;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        h4, h5 {
            font-weight: normal;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-control {
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #4a90e2;
            color: white;
        }
        .btn-primary:hover {
            background-color: #357ab7;
        }
        .btn-secondary {
            background-color: #5a6268;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #4e555b;
        }
        hr {
            border-color: #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Paramètres d'Affichage et de Langue</h4>
                </div>
                <div class="card-body">
                    <!-- Formulaire de mise à jour des paramètres d'affichage -->
                    <h5>Paramètres d'Affichage</h5>
                    <form action="{{ route('parametres.update.affichage') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="theme">Thème</label>
                            <select name="theme" id="theme" class="form-control">
                                <option value="light" {{ session('theme') == 'light' ? 'selected' : '' }}>Clair</option>
                                <option value="dark" {{ session('theme') == 'dark' ? 'selected' : '' }}>Sombre</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 w-100">Enregistrer les paramètres d'affichage</button>
                    </form>

                    <hr class="my-4">

                    <!-- Formulaire de mise à jour des paramètres de langue -->
                    <h5>Paramètres de Langue</h5>
                    <form action="{{ route('parametres.update.langue') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="langue">Langue</label>
                            <select name="langue" id="langue" class="form-control">
                                <option value="fr" {{ session('langue') == 'fr' ? 'selected' : '' }}>Français</option>
                                <option value="en" {{ session('langue') == 'en' ? 'selected' : '' }}>Anglais</option>
                                <option value="es" {{ session('langue') == 'es' ? 'selected' : '' }}>Espagnol</option>
                                <option value="de" {{ session('langue') == 'de' ? 'selected' : '' }}>Allemand</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 w-100">Enregistrer les paramètres de langue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
