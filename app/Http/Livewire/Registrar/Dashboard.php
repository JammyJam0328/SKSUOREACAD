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
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

use Livewire\WithPagination;
class Dashboard extends Component
{
    public $search="";
    public $requestors=[];
    public $countPending;
    public $countUnread;
    public $countToReview;
    public $readyToClaim;


    public $customDate;
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

        $pendingAll =  Request::where('status','Pending')->where('campus_id',auth()->user()->campus_id)->count();
        $claimAll =  Request::where('status','Claimed')->where('campus_id',auth()->user()->campus_id)->count();
        $approvedAll =  Request::where('status','Approved')->where('campus_id',auth()->user()->campus_id)->count();

          $columnChartModel1 = 
                        (new ColumnChartModel())
                            ->setTitle('Request Chart')
                            ->addColumn('Pending', $pendingAll, '#f6ad55')
                            ->addColumn('Approved', $approvedAll, '#0aab78')
                            ->addColumn('Claimed', $claimAll, '#90cdf4')
                        ;
                        
            

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
          $this->readyToClaim=Request::where('status','Ready To Claim')->where('campus_id',$this->mycampus)
                            ->whereHas('transaction', function (Builder $query) {
                                $query->where('retrieval_date',  date('Y-m-d'));
                            })->count();
                            
        return view('livewire.registrar.dashboard',[
            'requests'=>Request::where('campus_id', auth()->user()->campus_id)->where('status','Pending')->orderBy('created_at','DESC')->paginate(10),
            'columnChartModel1'=>$columnChartModel1
        ]);
    }


    public function printToday()
    {
        $date = date('Y-m-d');
        return redirect()->route('print-stub',[
            'date'=>$date,
        ]);
    }

    public function customDatePrint()
    {
        if($this->customDate){
        return redirect()->route('print-stub',[
                    'date'=>$this->customDate,
        ]);
        }
    }
        


    
}