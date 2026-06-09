<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex bg-gray-950">

    <!-- LEFT -->
    <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white items-center justify-center p-12">
        <div class="max-w-md">
            <h1 class="text-5xl font-bold mb-6">Bienvenue</h1>
            <p class="text-white/80">
                Connectez-vous pour accéder à votre espace sécurisé.
            </p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6">

        <div class="w-full max-w-md">

            <h2 class="text-3xl font-bold text-white mb-6">
                Connexion
            </h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="text-gray-300 text-sm">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full mt-1 p-3 rounded-xl bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-indigo-500">
                    @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="text-gray-300 text-sm">Mot de passe</label>
                    <input type="password" name="password" required
                           class="w-full mt-1 p-3 rounded-xl bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-indigo-500">
                    @error('password')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between text-sm text-gray-400">
                    <label>
                        <input type="checkbox" name="remember" class="mr-2">
                        Se souvenir de moi
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-indigo-400">
                            Mot de passe oublié ?
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-semibold">
                    Se connecter
                </button>

            </form>

        </div>

    </div>

</body>
</html>