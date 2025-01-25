<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .background-image {
            background-image: url('/images/inscription.jpg');
            background-size: cover;
            background-position: center;
            filter: blur(8px);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center relative">
    <div class="background-image"></div>
    <div class="overlay"></div>
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md relative z-10">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Créez votre compte</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                <input id="name" name="name" type="text" placeholder="Entrez votre nom" :value="old('name')" required autofocus
                    class="form-control block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input id="email" name="email" type="email" placeholder="Entrez votre email" :value="old('email')" required
                    class="form-control block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                <input id="password" name="password" type="password" placeholder="Entrez votre mot de passe" required
                    class="form-control block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirmez le mot de passe</label>
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmez votre mot de passe" required
                    class="form-control block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mb-4">
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Déjà inscrit ?</a>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="btn btn-primary w-full py-2">S'inscrire</button>
            </div>
        </form>
    </div>
</body>
</html>
