@extends('layouts.app')
@section('titre', $article->title)

@section('contenu')
<div class="card">
    <div class="card-body">
        <h1>{{ $article->title }}</h1>
        <h6 class="text-muted">{{ $article->user->name }} - {{ $article->created_at->format('d/m/Y H:i') }}</h6>
        <hr>
        <div class="my-4">
            {!! nl2br(e($article->content)) !!}
        </div>
        <div class="mt-4">
            @auth
                @if($article->user_id === auth()->id())
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">{{ __('messages.edit') }}</a>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('messages.confirm_delete') }}')">
                            {{ __('messages.delete') }}
                        </button>
                    </form>
                @endif
            @endauth
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">{{ __('messages.back_to_list') }}</a>
        </div>
    </div>
</div>
@endsection