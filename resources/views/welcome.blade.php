<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-black via-gray-900 to-gray-800 text-white flex items-center justify-center">

    <div class="max-w-3xl text-center px-6">

        <!-- Badge -->
        <div class="inline-block px-4 py-1 mb-6 text-sm bg-white/10 rounded-full border border-white/20">
            Plateforme moderne & sécurisée
        </div>

        <!-- Title -->
        <h1 class="text-5xl font-extrabold leading-tight mb-6">
            Simplifiez la gestion de vos activités
        </h1>

        <!-- Subtitle -->
        <p class="text-gray-300 text-lg mb-10">
            Une solution rapide, fiable et intuitive pour gérer vos opérations au quotidien avec efficacité.
        </p>

        <!-- Buttons -->
        <div class="flex justify-center gap-4 flex-wrap">

            <a href="/login"
               class="px-8 py-3 bg-white text-black font-semibold rounded-xl hover:bg-gray-200 transition shadow-lg">
                Se connecter
            </a>

            <a href="/register"
               class="px-8 py-3 border border-white/40 rounded-xl hover:bg-white/10 transition">
                Créer un compte
            </a>

        </div>

        <!-- Footer -->
        <p class="mt-12 text-sm text-gray-500">
            © {{ date('Y') }} Tous droits réservés.
        </p>

    </div>

</body>
</html>