<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('/images/connexion.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center relative">
    <div class="overlay"></div>
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md relative z-10">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Connectez-vous à votre compte</h2>

        <!-- Session Status -->
        <div id="session-status" class="mb-4 text-center text-green-500"></div>

        <form method="POST" action="/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input id="email" name="email" type="email" placeholder="Entrez votre email" required autofocus
                    class="form-control block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                <input id="password" name="password" type="password" placeholder="Entrez votre mot de passe" required
                    class="form-control block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center">
                    <input type="checkbox" id="remember_me" name="remember" class="form-check-input rounded border-gray-300">
                    <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                </label>

                <a href="/password/reset" class="text-sm text-blue-600 hover:underline">Mot de passe oublié ?</a>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="btn btn-primary w-full py-2">Se connecter</button>
            </div>

            <!-- Register Link -->
            <p class="text-sm text-center text-gray-600 mt-4">
                Vous n'avez pas de compte ? <a href="/register" class="text-blue-600 hover:underline">Inscrivez-vous</a>
            </p>
        </form>
    </div>
</body>
</html>
