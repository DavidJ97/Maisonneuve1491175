@extends('layouts.app')
@section('titre', __('messages.edit_article'))

@section('contenu')
<div class="card">
    <div class="card-header">
        <h2>{{ __('messages.edit_article') }}</h2>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.update', $article) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">{{ __('messages.title_fr') }}</label>
                <input type="text" class="form-control" name="title_fr" 
                    value="{{ old('title_fr', json_decode($article->getAttributes()['title'], true)['fr']) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.title_en') }}</label>
                <input type="text" class="form-control" name="title_en"
                    value="{{ old('title_en', json_decode($article->getAttributes()['title'], true)['en']) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.content_fr') }}</label>
                <textarea class="form-control" name="content_fr" rows="5">{{ old('content_fr', json_decode($article->getAttributes()['content'], true)['fr']) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.content_en') }}</label>
                <textarea class="form-control" name="content_en" rows="5">{{ old('content_en', json_decode($article->getAttributes()['content'], true)['en']) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
        </form>
    </div>
</div>
@endsection