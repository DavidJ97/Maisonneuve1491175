<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class FileDocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('user')->latest()->paginate(10);
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|max:255',
            'title_en' => 'required|max:255',
            'document' => 'required|file|mimes:pdf,doc,docx,zip|max:2048'
        ]);

        $path = $request->file('document')->store('documents');

        Document::create([
            'title' => [
                'fr' => $request->title_fr,
                'en' => $request->title_en
            ],
            'file_path' => $path,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('documents.index')
            ->with('success', __('messages.success_add'));
    }

    public function download(Document $document)
    {
        return Storage::download($document->file_path, $document->file_name);
    }

    public function destroy(Document $document)
    {
        if ($document->user_id !== Auth::id()) {
            return redirect()->route('documents.index')
                ->with('error', __('messages.unauthorized'));
        }

        Storage::delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')
            ->with('success', __('messages.success_delete'));
    }
}