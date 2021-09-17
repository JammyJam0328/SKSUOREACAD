<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Notification;
use App\Models\Course;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Transaction;
use App\Models\Request as RequestModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\GmailSending;
use App\Events\RequestorEvent;
use Livewire\WithPagination;
class Request extends Component
{
    public $request_id;

    public $tab="";
    public $search="";
    public $paymentReview=false;
    public $countToPay;
    public $countToReview;
    public $countToClaim;
    public $countPending;
    public $retrieval_date;

    public $PaymentReviewRequest;

    protected $listeners = [
       
    ];

    use WithPagination;


      protected function getListeners()
    {
        return [
            "echo-private:new-request.".auth()->user()->campus_id.",NewRequest" => 'notify',
             'readyToClaim',
            'cancelRTC',
            'confirmDeny',
            'cancelDeny'
            ];
    }
     public function notify()
    {
        $this->emit('notify');
    }

    public function render()
    {

        $this->countToPay=RequestModel::where('status','Approved')->where('campus_id',auth()->user()->campus_id)
                        ->count();
        $this->countToReview=RequestModel::where('status','Payment Review')->where('campus_id',auth()->user()->campus_id)
                         ->count();
        $this->countToClaim=RequestModel::where('status','Ready To Claim')->where('campus_id',auth()->user()->campus_id)
                         ->count();
        $this->countPending=RequestModel::where('status','Pending')->where('campus_id',auth()->user()->campus_id)
                         ->count();
        return view('livewire.registrar.request',[
            'requests'=>RequestModel::where('status','like','%'.$this->tab.'%')           
                        ->where('campus_id',auth()->user()->campus_id)
                        ->whereHas('information',function(Builder  $q){
                            $q->where('lastname','like','%'.$this->search.'%');
                        })
                        ->orWhere('request_code',$this->search)
                        ->orderBy('created_at','DESC')
                        ->paginate(10)
        
        ]);
    }


    public function viewPaymentReview($id)
    {
        $this->PaymentReviewRequest=RequestModel::where('id',$id)->first();
        $this->paymentReview=true;
        
    }

    public function confirmRTC($id)
    {
        $this->request_id=$id;
          $this->confirm('Do you want to continue?', [
            'position' =>  'center', 
            'toast' =>  true, 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showConfirmButton' =>  true, 
            'onConfirmed' => 'readyToClaim',
            'onCancelled' => 'cancelRTC'
      ]);     
    }

    public function readyToClaim()
    {
       
        $todayDate = date('Y-m-d');
        $this->validate([
            'retrieval_date'=>'required|date_format:Y-m-d|after_or_equal:'.$todayDate,
        ]);

        $request=RequestModel::where('id',$this->request_id)->first();
        $request->update([
            'status'=>'Ready To Claim'
        ]);
        $request->transaction->update([
            'retrieval_date'=>$this->retrieval_date,
        ]);

        $emailDetails=[
            'request_id'=>$request->id,
            'name'=>$request->information->firstname,
            'status'=>'Ready To Claim',
            'message'=>'',
        ];
        Mail::to($request->information->email)->send(new GmailSending($emailDetails));
        event(new RequestorEvent($request->information->user->id));
         Notification::create([
                'message'=>"Your request is now ready to claim (".$request->request_code.")",
                'user_id'=>$request->information->user->id,
            ]);
        $this->paymentReview=false;
    }
    public function cancelRTC()
    {
        $this->paymentReview=false;
    }

    public function deny($id)
    {
        $this->request_id=$id;
        $this->confirm('Do you want to Deny this Request?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Nope',
            'onConfirmed' => 'confirmDeny',
            'onCancelled' => 'canceldeny'
        ]);
    }

    
    public function confirmDeny()
    {
        $request=RequestModel::where('id',$this->request_id)->first();
            $request->update([
                'status'=>'Denied',
                'response'=>'Payment Verification Failed',
            ]);

            $emailDetails=[
                'request_id'=>$request->id,
                'name'=>$request->information->firstname,
                'status'=>'Denied',
                'message'=>'Payment Verification Failed',
            ];

            Mail::to($request->information->email)->send(new GmailSending($emailDetails));
            event(new RequestorEvent($request->information->user->id));
            $this->paymentReview=false;
    }

    public function cancelDeny()
    {
            $this->paymentReview=false;
    }


    


}

// ->where('status', 'Ongoing')->orWhere('status','Not Graduated')
                            