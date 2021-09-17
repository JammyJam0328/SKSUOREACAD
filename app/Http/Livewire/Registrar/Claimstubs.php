<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\Request;
use Illuminate\Database\Eloquent\Builder;

class Claimstubs extends Component
{
    public $claimDate;
    public function render()
    {
        return view('livewire.registrar.claimstubs',[
            'requests'=> Request::where('campus_id',auth()->user()->campus_id)
                            ->whereHas('transaction', function (Builder $query) {
                                $query->where('retrieval_date', $this->claimDate);
                            })->get(),
  
        ]);
    }
    public function mount($date)
    {
        $this->claimDate = $date;
    }
}