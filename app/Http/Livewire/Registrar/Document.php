<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\Document as DocumentModel;
use App\Models\Campus;
use App\Models\DocumentCategory;


class Document extends Component
{
    public $documents=[];
    public $mycampus=[];
    public $categories=[];

 


    public $updateAmount=false;
    public function render()
    {
        $this->mycampus=Campus::where('id',auth()->user()->campus_id)->first();
        $this->categories=DocumentCategory::get();
        return view('livewire.registrar.document');
    }
    public function available($document_id)
    {
        $document = $this->mycampus->documents()->whereDocumentId($document_id)->first();
        $document->pivot->update([
            'status' => 'Unavailable'
        ]);
    }

    public function unAvailable($document_id)
    {
        $document = $this->mycampus->documents()->whereDocumentId($document_id)->first();
        $document->pivot->update([
            'status' => 'Available'
        ]);
    }
  
}
