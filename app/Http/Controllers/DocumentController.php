<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function page()
    {
        $documents = Document::select()
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('document.page', ['documents' => $documents]);
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);
        return view('document.show', compact('document'));
    }





    public function create()
    {

        return view('document.create');
    }




    public function store(Request $request)
    {
        $user_id = auth()->id();
        if (session('locale') === 'en') {
            $title = 'title_en';
        } else {
            $title = 'title';
        }
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:zip,pdf,doc,docx|max:2048',
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Generate a unique name for the file
        $fileName = $user_id . '_' . $file->getClientOriginalName();

        // Save the file to the storage folder
        $filePath = $file->storeAs('public/files', $fileName);

        // Create a new document record in the database
        $document = new Document([
            $title => $request->input('title'),
            'user_id' => $user_id,
            'file_path' => $filePath,
            'file_name' => $fileName,
        ]);
        $document->save();

        return redirect()->back()->with('success', 'Document uploaded successfully.');
    }

    public function download($id)
    {
        $document = Document::findOrFail($id);
        $path = storage_path('app/' . $document->file_path);
        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];
        return response()->download($path, $document->file_name, $headers);
    }
}
