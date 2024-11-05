<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collège Maisonneuve - @yield('titre')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 
</head>
<body>
<style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(-45deg, #73c8f0, #48d1e0, #1e90ff, #0066cc);
            background-size: 400% 400%;
            animation: gradient 10s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Ajustements pour la lisibilité */
        .navbar {
            background-color: rgba(255, 255, 255, 0.9) !important;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .alert {
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Gestion des étudiants</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('etudiant.index') }}">Liste des étudiants</a>
                <a class="nav-link" href="{{ route('etudiant.create') }}">Nouvel étudiant</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('contenu')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>