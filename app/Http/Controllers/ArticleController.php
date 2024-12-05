<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|max:255',
            'title_en' => 'required|max:255',
            'content_fr' => 'required',
            'content_en' => 'required',
        ]);

        Article::create([
            'title' => [
                'fr' => $request->title_fr,
                'en' => $request->title_en
            ],
            'content' => [
                'fr' => $request->content_fr,
                'en' => $request->content_en
            ],
            'user_id' => Auth::id()
        ]);

        return redirect()->route('articles.index')
            ->with('success', __('messages.success_add'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            return redirect()->route('articles.index')
                ->with('error', __('messages.unauthorized'));
        }

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            return redirect()->route('articles.index')
                ->with('error', __('messages.unauthorized'));
        }

        $request->validate([
            'title_fr' => 'required|max:255',
            'title_en' => 'required|max:255',
            'content_fr' => 'required',
            'content_en' => 'required',
        ]);

        $article->update([
            'title' => [
                'fr' => $request->title_fr,
                'en' => $request->title_en
            ],
            'content' => [
                'fr' => $request->content_fr,
                'en' => $request->content_en
            ]
        ]);

        return redirect()->route('articles.show', $article)
            ->with('success', __('messages.success_edit'));
    }

    public function destroy(Article $article)
    {
        if ($article->user_id !== Auth::id()) {
            return redirect()->route('articles.index')
                ->with('error', __('messages.unauthorized'));
        }

        $article->delete();
        return redirect()->route('articles.index')
            ->with('success', __('messages.success_delete'));
    }
}