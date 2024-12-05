@extends('layouts.app')
@section('titre', __('messages.documents'))

@section('contenu')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>{{ __('messages.documents_list') }}</h1>
        <a href="{{ route('documents.create') }}" class="btn btn-primary">{{ __('messages.add_document') }}</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('messages.title') }}</th>
                    <th>{{ __('messages.owner') }}</th>
                    <th>{{ __('messages.date') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td>{{ $document->title }}</td>
                        <td>{{ $document->user->name }}</td>
                        <td>{{ $document->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('documents.download', $document) }}" class="btn btn-sm btn-info">
                                {{ __('messages.download') }}
                            </a>
                            @if($document->user_id === auth()->id())
                                <form action="{{ route('documents.destroy', $document) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('messages.confirm_delete') }}')">
                                        {{ __('messages.delete') }}
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $documents->links() }}
    </div>
</div>
@endsection