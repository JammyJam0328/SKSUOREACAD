<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\Request;

class GraduateCount extends Component
{
      protected function getListeners()
    {
        return [
            "echo-private:graduate.".auth()->user()->campus_id.",Graduates" => 'notifygrad'
        ];
    }
    public function notifygrad()
    {
        $this->emit('notifygrad');
    }
    public function render()
    {
        return view('livewire.registrar.graduate-count',[
            'count'=>Request::where('campus_id',auth()->user()->campus_id)->where('status','cleared')->count(),
        ]);
    }
}