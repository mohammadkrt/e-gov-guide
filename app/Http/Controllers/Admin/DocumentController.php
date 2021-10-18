<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Traits\DocumentTraits;
use PhpParser\Comment\Doc;

class DocumentController extends Controller
{
    use DocumentTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // get all documents
    public function getDocuments(){
        $documents = Document::select('id', 'document_name', 'document_path', 'service_id')->paginate(5);
        return view('documents.details', compact('documents'));
    }

    //add new document
    public function addDocument(){
        $services = Service::select('id', 'service_name')->get();
        return view('documents.add', compact('services'));
    }

    //store document in database
    public function storeDocument(Request $request){
        // save file in folder
        $file_name = $this->saveDocument($request->document_path, 'images/documents');

        //insert data
        Document::create([
            'document_name' => $request->document_name,
            'document_path' => $file_name,
            'service_id' => $request->service_id
        ]);
        return redirect()->route('document.details')->with(['success' => 'تم الحفظ بنجاح']);
    }

    //edit document
    public function ediDocument($document_id){
        $document = Document::find($document_id);
        if(!$document)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);
        $document = Document::select('id', 'document_name', 'document_path', 'service_id')->find($document_id);
        $services = Service::select('id', 'service_name')->get();
        return view('documents.edit', compact('document', 'services'));
    }

    //edit document
    public function updatingDocument(Request $request, $document_id){
        //check if document exists
        $document = Document::find($document_id);
        if(!$document)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);
        // save file in folder
        $file_name = $this->saveDocument($request->document_path, 'images/documents');

        // update document
        $document->update([
            'document_name' => $request->document_name,
            'document_path' => $file_name,
            'service_id' => $request->service_id
        ]);
        return redirect() -> route('document.details') -> with(['success' => 'تم التحديث بنجاح']);
    }

    //delete document
    public function deleteDocument($documnt_id){
        $document = Document::find($documnt_id);
        if(!$document)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $document->delete();
        return redirect() -> route('document.details') -> with(['success' => 'تم الحذف بنجاح']);
    }
}
