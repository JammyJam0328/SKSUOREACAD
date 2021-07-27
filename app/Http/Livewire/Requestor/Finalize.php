<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Document;
use App\Models\Purpose;
use App\Models\Request as RequestModel;
class Finalize extends Component
{
    public $request_id;
    public $copies_temp=5;
    public $copies;

    public function render()
    {
        return view('livewire.requestor.finalize',[
            'request'=>RequestModel::where('id',$this->request_id)->first()
        ]);
    }
    
    public function mount($id)
    {
        $this->request_id=$id;
    }
    public function authYes($id,$request)
    {
        $thisRequest=RequestModel::where('id',$request)->first();
        $document=$thisRequest->documents()->whereDocumentId($id)->first();
        $document->pivot->update([
            'isAuth'=>'yes',
        ]);
    }
    public function authNo($id,$request)
    {
        $thisRequest=RequestModel::where('id',$request)->first();
        $document=$thisRequest->documents()->whereDocumentId($id)->first();
        $document->pivot->update([
            'isAuth'=>'no',
        ]);
        
    }

    public function saveCopies($id,$request)
    {
        $this->validate([
            'copies'=>'required|numeric'
        ]);

        $thisRequest=RequestModel::where('id',$request)->first();
        $document=$thisRequest->documents()->whereDocumentId($id)->first();
        $document->pivot->update([
            'copies'=>$this->copies,
        ]);
        $this->copies="";
    }

    public function finalize()
    {
        $request = RequestModel::where('id',$this->request_id)->first();
        $request->update([
            'status'=>'Pending'
        ]);
        return redirect()->route('requestor-dashboard');
    }
}