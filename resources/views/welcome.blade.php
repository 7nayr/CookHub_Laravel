<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CookHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
        }
        .welcome-section {
            position: relative;
            background-image: url('images/background.jpeg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .welcome-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6); /* Dark overlay */
            z-index: 1;
        }
        .header {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            width: 100%;
        }
        .header img {
            width: 120px;
        }
        .header .btn {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            margin-left: 10px;
            border-radius: 25px;
        }
        .btn-warning {
            background-color: #ff8c00;
            border-color: #ff8c00;
        }
        .btn-warning:hover {
            background-color: #e07c00;
            border-color: #e07c00;
        }
        .btn-green {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-green:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .welcome-content {
            position: relative;
            z-index: 2;
            margin-top: 100px;
            text-align: left;
            padding-left: 50px;
        }
        .welcome-content h1 {
            font-size: 3rem;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .welcome-content p {
            font-size: 1.2rem;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <section class="welcome-section">
        <div class="header">
            <img src="images/logo.png" alt="CookHub Logo"> <!-- Replace with your logo -->
            <div>
                <a href="/recipes" class="btn btn-warning text-white">Voir les recettes</a>
                <a href="{{ route('workshops.index') }}" class="btn btn-green text-white">Voir les ateliers</a>
                @if (Auth::check())
                    <a href="/logout" class="btn btn-secondary"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="/login" class="btn btn-secondary">Connexion</a>
                @endif
            </div>
        </div>
        <div class="welcome-content">
            <h1 style="font-size: 4rem;">Bienvenue sur CookHub</h1>
            <p style="font-size: 1.5rem;">La plateforme des passionnés de cuisine ! Découvrez des recettes uniques, partagez vos créations, et inspirez-vous de notre communauté.</p>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
