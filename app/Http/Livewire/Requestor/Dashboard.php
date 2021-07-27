<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\ModelsDocument;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Request as RequestModel;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $requests=[];
    public $drafts=[];
    public $notification = false;
    public $user_id;
    
   
    protected function getListeners()
    {

        return [
            "echo-private:requestor.".auth()->user()->id.",RequestorEvent" => 'notify'
        ];
    }
 
    public function notify()
    {
       $this->emit('notify');
    }
  
    public function render()
    {   

        $requestor = Information::where('user_id',auth()->user()->id)->first();
        if($requestor){
            $this->requests=RequestModel::where('information_id',$requestor->id)->where('status','!=','draft')->orderBy('created_at','DESC')->get();
        }
        if($requestor){
            $this->drafts=RequestModel::where('information_id',$requestor->id)->where('status','draft')->orderBy('created_at','DESC')->get();
        }                
        return view('livewire.requestor.dashboard');
    }


    
}