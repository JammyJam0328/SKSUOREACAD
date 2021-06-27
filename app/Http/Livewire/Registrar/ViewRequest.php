<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\ModelsDocument;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Request as RequestModel;
use App\Models\Transaction;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\GmailSending;
class ViewRequest extends Component
{
    public $request_id;
    public function render()
    {
        return view('livewire.registrar.view-request',[
            'request'=>RequestModel::where('id',$this->request_id)->first()
        ]);
    }
    public function mount($id)
    {
        $this->request_id=$id;
     
    }

    public function claimed($id)
    {
        $request=RequestModel::where('id',$id)->first();

        $request->update([
            'status'=>"Claimed"
        ]);
        
        $this->alert('success','Claimed !');
    }
}