<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre', 'Mini Blog')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- NAVIGATION --}}
    <nav class="bg-white shadow mb-8">
        <div class="max-w-4xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('articles.index') }}" class="text-xl font-bold text-indigo-600">
                📝 Mini Blog
            </a>
            <div class="flex gap-4 items-center">
                @auth
                    {{-- Utilisateur connecté --}}
                    <span class="text-gray-600">Bonjour, {{ auth()->user()->name }} !</span>
                    <a href="{{ route('articles.create') }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        + Nouvel article
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-gray-500 hover:text-red-600">Déconnexion</button>
                    </form>
                @else
                    {{-- Visiteur --}}
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600">Connexion</a>
                    <a href="{{ route('register') }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        S'inscrire
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- MESSAGES FLASH --}}
    <div class="max-w-4xl mx-auto px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                ✅ {{ session('success') }}
            </div>
        @endif
    </div>

    {{-- CONTENU DE CHAQUE PAGE --}}
    <main class="max-w-4xl mx-auto px-4">
        @yield('contenu')
    </main>

</body>
</html>