<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Transaction;

use App\Models\Request as RequestModel;


use Livewire\WithFileUploads;
class ViewRequestDetails extends Component
{
    use WithFileUploads;




    public $request_id;
    public $request=[];
    public $total_amount;
    public $proof_of_payment;

    
    public function render()
    {
        $this->request=RequestModel::where('id',$this->request_id)->first();
        $this->total_amount=$this->request->documents()->sum('total_amount');
        return view('livewire.requestor.view-request-details');
    }
    public function mount($id)
    {
        $this->request_id=$id;
    }
    public function saveProofOfPayment()
    {
        $transaction = $this->request->transaction;
      
        $this->validate([
            'proof_of_payment'=>'required|max:5026',
        ]);

        $proof_of_payment=$this->proof_of_payment->store('proof','public');
 
        $this->request->update([
            'status'=>'Payment Review'
        ]);

        $transaction->update([
           
            'proof_of_payment'=>$proof_of_payment,
        ]);
       
        

    }
}
