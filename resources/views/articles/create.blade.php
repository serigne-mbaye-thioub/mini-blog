@extends('layouts.app')

@section('titre', 'Nouvel article')

@section('contenu')
    <div class="bg-white rounded-lg shadow p-8 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6"> Nouvel article</h1>

        <form method="POST" action="{{ route('articles.store') }}">

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Titre</label>
                <input type="text"
                       name="titre"
                       value="{{ old('titre') }}"
                       class="w-full border rounded px-4 py-2 focus:outline-none focus:border-indigo-500
                              {{ $errors->has('titre') ? 'border-red-500' : 'border-gray-300' }}"
                       placeholder="Le titre de votre article...">
                @error('titre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Contenu</label>
                <textarea name="contenu"
                          rows="8"
                          class="w-full border rounded px-4 py-2 focus:outline-none focus:border-indigo-500
                                 {{ $errors->has('contenu') ? 'border-red-500' : 'border-gray-300' }}"
                          placeholder="Rédigez votre article ici...">{{ old('contenu') }}</textarea>
                @error('contenu')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                    Publier l'article
                </button>
                <a href="{{ route('articles.index') }}" class="text-gray-500 hover:text-gray-700 py-2">
                    Annuler
                </a>
            </div>
        </form>
    </div>
@endsection