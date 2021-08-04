<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\Document as DocumentModel;
use App\Models\Campus;
use App\Models\DocumentCategory;
use Illuminate\Database\Eloquent\Builder;

class Document extends Component
{
    public $mycampus=[];
    public $categories=[];
    public $search;
 


    public $updateAmount=false;
    public function render()
    {
        $this->mycampus=Campus::where('id',auth()->user()->campus_id)->first();
        return view('livewire.registrar.document',[
            'documents' =>$this->mycampus->documents()->where('name','like','%'.$this->search.'%')->get()
                      
                        
        ]);
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