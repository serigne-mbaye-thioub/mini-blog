<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre'   => 'required|string|max:255',
            'contenu' => 'required|string|min:10',
        ]);

        $validated['user_id'] = Auth::id();

        Article::create($validated);

        return redirect()->route('articles.index')
                         ->with('success', 'Article publié avec succès !');
    }

    public function edit(Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }

        $validated = $request->validate([
            'titre'   => 'required|string|max:255',
            'contenu' => 'required|string|min:10',
        ]);

        $article->update($validated);

        return redirect()->route('articles.show', $article)
                         ->with('success', 'Article modifié !');
    }

    public function destroy(Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }

        $article->delete();

        return redirect()->route('articles.index')
                         ->with('success', 'Article supprimé.');
    }
}