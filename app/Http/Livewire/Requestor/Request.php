<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Document;
use App\Models\Purpose;
use App\Models\Request as RequestModel;
use Illuminate\Support\Str;




use Livewire\WithFileUploads;

class Request extends Component
{

    use WithFileUploads;

    public $dontHaveInformation=true;
    public $sexList=[
        ['name'=>""],['name'=>'Male'],['name'=>'Female']
    ];

    public $statusList=[
        ['name'=>""],['name'=>'Ongoing'],['name'=>'Graduated'],['name'=>'Not Graduated']
    ];
    public $campuses=[];
    public $campus ="";
    public $my_campus_courses=[];
    // information
    public $first_name;
    public $middle_name;
    public $last_name;
    public $sex;
    public $address;
    public $email;
    public $course;
    public $status;
    public $student_number;
    public $contact_number;
    public $valid_id;

    public $my_campus_documents=[];
    public $purposes=[];
    public $others=false;
    public $purpose;
    public $specified_purpose="";

    public $selected_documents=[];
    public $receiver_name;
    // controlled variable
    public $send_to_msg="This request will be send to ";
    public $send_to_access;
    public $ongoing="Ongoing";
    public $not_graduated="Not graduated";
    public $graduated="Graduated";
   

    public function render()
    {
        $this->campuses=Campus::get();
        $this->send_to_access=$this->campuses->where('id','1')->first();
        if($this->campus){
            $this->my_campus_courses=Course::where('campus_id',$this->campus)->get();
        }
        if($this->dontHaveInformation==false)
        {
            $campus=Campus::find(auth()->user()->information->course->campus_id);
            $this->my_campus_documents=$campus->documents()->where('campus_documents.status','Available')->get();

        }
       
        return view('livewire.requestor.request');
    }


    public function selectChanged()
    {

        if($this->purpose=="7"){
            $this->others=true;
        }else{
            $this->specified_purpose="";
            $this->others=false;  
        }
    }

    public function mount()
    {
        $this->purposes=Purpose::get();
        $exist = Information::where('user_id',auth()->user()->id)->first();
        if ($exist==null) {
            $this->dontHaveInformation=true;
        }else{
            $this->dontHaveInformation=false;
        }
    }

    public function create()
    {
        $this->validate([
            'first_name'=>'required|regex:/^[a-zA-Z\s]+$/',
            'middle_name'=>'nullable|regex:/^[a-zA-Z\s]+$/',
            'last_name'=>'required|regex:/^[a-zA-Z\s]+$/',
            'sex'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'campus'=>'required',
            'contact_number'=>'required|digits:11|numeric',
            'student_number'=>'nullable|numeric',
            'course'=>'required',
            'valid_id'=>'required|image|max:2048',
            'status'=>'required'
        ]);

        $valid_id_url=$this->valid_id->store('ID','public');
 
        Information::create([
            "user_id"=>auth()->user()->id,
            "firstname"=>$this->first_name,
            "middlename"=>$this->middle_name,
            "lastname"=>$this->last_name,
            "sex"=>$this->sex,
            "email"=>$this->email,
            "address"=>$this->address,
            "contactnumber"=>$this->contact_number,
            "studentnumber"=>$this->student_number,
            "course_id"=>$this->course,
            "status"=>$this->status,
            "valid_id"=>$valid_id_url,
        ]);
        
        $this->alert('success','Successfully saved!');
        $this->dontHaveInformation=false;
    }

    public function requestdocument()
    {
        if($this->others==true){
            $this->validate([
                'receiver_name'=>'required',
                'purpose'=>'required',
                'specified_purpose'=>'required',
            ]);
            $documentsOfRequest=RequestModel::create([
                'information_id'=>auth()->user()->information->id,
                'receivername'=>$this->receiver_name,
                'purpose_id'=>$this->purpose,
                'campus_id'=>auth()->user()->information->course->campus_id,
                'other_purpose'=>$this->specified_purpose,
                'request_code'=>Str::random(6),
            ]);

         

            $request=RequestModel::find($documentsOfRequest->id);
            $request->documents()->attach($this->selected_documents);
            return redirect()->route('requestor-finalize',['id'=>$request->id]);
        }else{
            $this->validate([
                'selected_documents'=>'required',
                'receiver_name'=>'required',
                'purpose'=>'required',
                'specified_purpose'=>'nullable',
            ]);

            $documentsOfRequest=RequestModel::create([
                'information_id'=>auth()->user()->information->id,
                'receivername'=>$this->receiver_name,
                'purpose_id'=>$this->purpose,
                'campus_id'=>auth()->user()->information->course->campus_id,
                'other_purpose'=>$this->specified_purpose,
                'request_code'=>Str::random(6),
            ]);

            $request=RequestModel::find($documentsOfRequest->id);
            $request->documents()->attach($this->selected_documents);
            return redirect()->route('requestor-finalize',['id'=>$request->id]);
        }

    
    }

    public function nextStep()
    {
        $this->next=true;
    }
   
}