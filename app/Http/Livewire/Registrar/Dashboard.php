<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Request;
use Illuminate\Database\Eloquent\Builder;

use Livewire\WithPagination;
class Dashboard extends Component
{
    public $search="";
    public $requestors=[];
    public $countPending;
    public $countUnread;
    public $countToReview;


    public $mycampus;

    use WithPagination;
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

        $this->mycampus=auth()->user()->campus_id;
       
        if($this->search){
            $this->requestors=Information::whereHas('course', function (Builder $query) {
                $query->where('campus_id', auth()->user()->campus_id);
            })->where('lastname','like','%'.$this->search.'%')->orWhere('studentnumber','like','%'.$this->search.'%')->get();
           
        }
        $this->countPending=Request::where('status','Pending')->where('campus_id',$this->mycampus)
                            ->count();
        $this->countToReview=Request::where('status','Payment Review')->where('campus_id',$this->mycampus)
                            ->count();

          $this->countUnread=Request::where('read','no')->where('campus_id',$this->mycampus)->where('status','!=','draft')
                            ->whereHas('information', function (Builder $query) {
                                $query->where('status', 'Ongoing')->orWhere('status','Not Graduated');
                            })->count();
  
        return view('livewire.registrar.dashboard',[
            'requests'=>Request::where('campus_id', auth()->user()->campus_id)->where('status','Pending')->orderBy('created_at','DESC')->paginate(20)
        ]);
    }


    
}