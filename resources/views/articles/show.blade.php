@extends('layouts.app')

@section('titre', $article->titre)

@section('contenu')
    <article class="bg-white rounded-lg shadow p-8">

        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $article->titre }}</h1>

        <p class="text-gray-500 text-sm mb-6">
            Par <strong>{{ $article->user->name }}</strong>
            — {{ $article->created_at->format('d/m/Y à H:i') }}
        </p>

        <div class="text-gray-700 leading-relaxed mb-8 whitespace-pre-line">
            {{ $article->contenu }}
        </div>

        @auth
            @if(auth()->id() === $article->user_id)
                <div class="flex gap-4 pt-6 border-t">
                    <a href="{{ route('articles.edit', $article) }}"
                       class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                         Modifier
                    </a>

                    
                    <form method="POST" action="{{ route('articles.destroy', $article) }}"
                          onsubmit="return confirm('Supprimer cet article ?')">
                        @csrf
                        @method('DELETE') 
                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Supprimer
                        </button>
                    </form>
                </div>
            @endif
        @endauth

    </article>

    <a href="{{ route('articles.index') }}" class="inline-block mt-6 text-gray-500 hover:text-indigo-600">
        ← Retour aux articles
    </a>
@endsection