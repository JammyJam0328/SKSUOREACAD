<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\Gcash;
use App\Models\Remitance;

class PaymentInfo extends Component
{
    public $complete_name;
    public $phone_number;
    public $address;


    public $gcash_number;
    public $hasGcash=false;
    public $hasRemitance=false;
    // public $complete_name;
    // public $complete_name;
    // public $complete_name;

    public function render()
    {
        $gcash = Gcash::where('user_id',auth()->user()->id)->first();
        if($gcash){
            $this->hasGcash=true;
        }else{
            $this->hasGcash=false;
        }
        $remitance = Remitance::where('user_id',auth()->user()->id)->first();
        if($remitance){
            $this->hasRemitance=true;
        }else{
            $this->hasRemitance=false;
        }
        return view('livewire.registrar.payment-info');
    }
    public function creategcash()
    {
        $this->validate([
            'gcash_number'=>'required|digits:11',
        ]);
        Gcash::create([
            'user_id'=>auth()->user()->id,
            'phone_number'=>$this->gcash_number,
        ]);
        $this->alert('success','Gcash account has been saved');
    }

    public function createremitance()
    {
        $this->validate([
            'complete_name'=>'required|regex:/^[a-zA-Z\s]+$/',
            'address'=>'required',
            'phone_number'=>'required|digits:11',
        ]);
        Remitance::create([
            'user_id'=>auth()->user()->id,
            'receiver_name'=>$this->complete_name,
            'receiver_address'=>$this->address,
            'receiver_contact_number'=>$this->phone_number,

        ]);
        $this->alert('success','Remitance information has been saved');
    }

}
