@extends('layouts.app')

@section('titre', 'Tous les articles')

@section('contenu')
    <h1 class="text-3xl font-bold mb-8 text-gray-800"> Tous les articles</h1>

    @forelse($articles as $article)
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-2">
                {{ $article->titre }}
            </h2>
            <p class="text-gray-500 text-sm mb-3">
                Par <strong>{{ $article->user->name }}</strong>
                — {{ $article->created_at->diffForHumans() }}
            </p>
            <p class="text-gray-600 mb-4">
                {{-- Affiche les 150 premiers caractères --}}
                {{ Str::limit($article->contenu, 150) }}
            </p>
            <a href="{{ route('articles.show', $article) }}"
               class="text-indigo-600 hover:underline font-medium">
                Lire la suite →
            </a>
        </div>
    @empty
        <div class="bg-white rounded-lg shadow p-12 text-center">
            <p class="text-gray-500 text-lg">Aucun article pour l'instant.</p>
            @auth
                <a href="{{ route('articles.create') }}"
                   class="mt-4 inline-block bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                    Créer le premier article
                </a>
            @endauth
        </div>
    @endforelse
@endsection