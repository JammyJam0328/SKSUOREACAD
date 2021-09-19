<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use App\Models\Request;
class Chart extends Component
{
    public function render()
    {

        $pendingAll =  Request::where('status','Pending')->count();
        $claimAll =  Request::where('status','Claimed')->count();
        $approvedAll =  Request::where('status','Approved')->count();

          $columnChartModel1 = 
                        (new ColumnChartModel())
                            ->setTitle('Request Chart')
                            ->addColumn('Pending', $pendingAll, '#f6ad55')
                            ->addColumn('Approved', $approvedAll, '#0aab78')
                            ->addColumn('Claimed', $claimAll, '#90cdf4')
                        ;
                        
            
                        


          $columnChartModel2 = 
                        (new ColumnChartModel())
                            ->setTitle('Request Per Campus')
                            ->addColumn('Access', Request::where('campus_id','1')->count(), '#f6ad55')
                            ->addColumn('Isulan', Request::where('campus_id','2')->count(), '#0aab78')
                            ->addColumn('Tacurong', Request::where('campus_id','3')->count(), '#90cdf4')
                            ->addColumn('Kalamansig', Request::where('campus_id','4')->count(), '#f51616')
                            ->addColumn('Bagumbayan', Request::where('campus_id','5')->count(), '#0003b3')
                            ->addColumn('Palimbang', Request::where('campus_id','6')->count(), '#bb14d9')
                            ->addColumn('Lutayan', Request::where('campus_id','7')->count(), '#f5dc1d')


                        ;
                        
        return view('livewire.admin.chart')->with([
            'columnChartModel1'=>$columnChartModel1,
            'columnChartModel2'=>$columnChartModel2,

        ]);
    }
}