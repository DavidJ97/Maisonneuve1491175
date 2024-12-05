@extends('layouts.app')
@section('titre', __('messages.forum'))

@section('contenu')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>{{ __('messages.articles_list') }}</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">{{ __('messages.add_article') }}</a>
    </div>
    <div class="card-body">
        @foreach($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $article->user->name }} - {{ $article->created_at->format('d/m/Y H:i') }}</h6>
                    <p class="card-text">{{ Str::limit($article->content, 200) }}</p>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-info">{{ __('messages.read_more') }}</a>
                    @if($article->user_id === Auth::id())
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-warning">{{ __('messages.edit') }}</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('{{ __('messages.confirm_delete') }}')">
                                {{ __('messages.delete') }}
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach

        {{ $articles->links() }}
    </div>
</div>
@endsection