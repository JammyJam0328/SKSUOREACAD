<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Request;
use App\Models\Transaction;

use Illuminate\Database\Eloquent\Builder;
class Dashboard extends Component
{
 
    public $documentsCount;

    public $paymentSum;
    public $usersCount;
    public $requestCount;







    public function render()
    {
        return view('livewire.admin.dashboard');
    }
    public function mount()
    {
        $this->usersCount=User::where('role','requestor')->count();
        $this->documentsCount=Document::count();
        $this->paymentSum=Transaction::sum('amount');
        $this->requestCount=Request::count();
    }
}