<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Events\RequestorEvent;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Request;
use App\Models\Transaction;
use App\Models\Notification;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\GmailSending;
class GraduatedRequestDetails extends Component
{
    public $deny_id;
    public $request_id;
    public $page_count;
    public $checkAmountSave=false;
    public $total_amount;
    public $request;
    public $pageAmount;
    public $set_count;
    public $response;

    public $isAuthAmount=15;
    public $documentary_stamp;
    // Authentication document is 15 per set
    // TOR for Graduate school 75 first page and 50 for succeeding pages
    public $TOR_ID="5";


    protected $listeners = [
        'confirmed',
        'cancelled',
    ];

      protected function getListeners()
    {
        return [
            "echo-private:new-request.".auth()->user()->campus_id.",NewRequest" => 'notify'
        ];
    }
 public function notify()
    {
        $this->emit('notify');
    }
    
    public function render()
    {
        $this->request=Request::where('id',$this->request_id)->first();
        $this->total_amount=$this->request->documents()->sum('total_amount');
        return view('livewire.registrar.graduated-request-details');
    }


    public function mount($id)
    {
        $this->request_id=$id;
        $update_data=Request::find($this->request_id);
        $update_data->update([
            'read'=>'yes'
        ]);
    }



    public function savePageNumber($id,$request)
    {
        $this->validate([
            'page_count'=>'required|numeric|gt:0',
        ]);
        $thisRequest=Request::where('id',$request)->first();
        $document=$thisRequest->documents()->whereDocumentId($id)->first();
        $isAuthTotal;
        if($document->pivot->isAuth=="yes"){
            // TOR FORMULA
            $isAuthTotal = $this->isAuthAmount*$document->pivot->copies;
            if($this->page_count>1){
                $temp = $this->page_count-1;
                $sum=$document->amount*$temp;
                $total=$sum+75;
            }else{
                $total=75;
            }
            // end TOR FORMULA
            $totalAmount = $total*$document->pivot->copies;
            $this->pageAmount=$document->pivot->update([
                'number_of_page'=>$this->page_count,
                'total_amount'=>$totalAmount+$isAuthTotal,
            ]);
            $this->page_count="";
        }else{

            // TOR FORMULA
            if($this->page_count>1){
                $temp = $this->page_count-1;
                $sum=$document->amount*$temp;
                $total=$sum+75;
            }else{
                $total=75;
            }
            // end TOR FORMULA
            $totalAmount = $total*$document->pivot->copies;
            $this->pageAmount=$document->pivot->update([
                'number_of_page'=>$this->page_count,
                'total_amount'=>$totalAmount,
            ]);
            $this->page_count="";
            
        }
        
    }  




    // public function saveSet($id,$request)
    // {
    //     $thisRequest=Request::where('id',$request)->first();
    //     $document=$thisRequest->documents()->whereDocumentId($id)->first();

    //     $total=$document->pivot->number_of_page *$document->amount;
            
    //     $document->pivot->update([
    //         'total_amount'=>$total,
    //     ]);
    // }  






     public function saveTotal($id,$request)
    {
       
        $thisRequest=Request::where('id',$request)->first();
        $document=$thisRequest->documents()->whereDocumentId($id)->first();
        
        $isAuthTotal;
        $totalAmount = $document->amount*$document->pivot->copies;

        if ($document->pivot->isAuth=="yes") {
            $isAuthTotal = $this->isAuthAmount*$document->pivot->copies;
             $document->pivot->update([
                 'total_amount'=>$isAuthTotal+$totalAmount,
             ]);
        }else{
            $document->pivot->update([
                'total_amount'=>$totalAmount,
            ]);
        }
    }





    public function approvedRequest($id)
    {
        $request=Request::where('id',$id)->first();
        //Request document must have amount unless don't approved
        $check = $request->documents()->where('request_documents.total_amount','0')->count();

        if($check=="0"){

            $request->update([
                'status'=>'Approved',
                'response'=>$this->response,
            ]);

            Transaction::create([
                'request_id'=>$request->id,
                'amount'=>$request->documents()->sum('total_amount'),
                'documentary_stamp'=>$this->documentary_stamp,
            ]);



            $emailDetails=[
                'request_id'=>$request->id,
                'name'=>$request->information->firstname,
                'status'=>'Approved',
                'message'=>'Please log in to your account and proceed to payments'
            ];
            event(new RequestorEvent($request->information->user->id));
            Mail::to($request->information->email)->send(new GmailSending($emailDetails));
            Notification::create([
                'message'=>"Your request has been approved",
                'user_id'=>$request->information->user->id,
            ]);
            return redirect()->route('registrar-graduated');
        }else{
           $this->alert('error','Please check the documents');
        }



    }



    public function denyRequest($id)
    {
        $this->deny_id=$id;
        $this->confirm('Do you want to Deny this Request?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Nope',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    
    }


    public function confirmed()
    {
        $request=Request::where('id',$this->deny_id)->first();
            $request->update([
                'status'=>'Denied',
                'response'=>$this->response,
            ]);

            $emailDetails=[
                'request_id'=>$request->id,
                'name'=>$request->information->firstname,
                'status'=>'Denied',
                'message'=>'',
            ];
            event(new RequestorEvent($request->information->user->id));
            Mail::to($request->information->email)->send(new GmailSending($emailDetails));
            
            Notification::create([
                'message'=>"Your request has been approved",
                'user_id'=>$request->information->user->id,
            ]);
            return redirect()->route('registrar-graduated');
      
    }

    public function cancelled()
    {

        $this->alert('info', 'Cancelled');
    }

  
}