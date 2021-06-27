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





use Livewire\WithFileUploads;

class UpdateInformation extends Component
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
    public $categories=[];
    public $purposes=[];
    public $others=false;
    public $purpose;
    public $specified_purpose="";

    public $selected_documents=[];
    public $receiver_name;
    // controlled variable
    // public $send_to_msg="This request will be send to ";
    // public $send_to_access;
    // public $ongoing="Ongoing";
    // public $not_graduated="Not graduated";
    // public $graduated="Graduated";
    public function render()
    {
        $this->campuses=Campus::get();
        $this->send_to_access=$this->campuses->where('id','1')->first();
        if($this->campus){
            $this->my_campus_courses=Course::where('campus_id',$this->campus)->get();
        }
        return view('livewire.requestor.update-information');
    }
    public function mount()
    {
        $this->student_number = auth()->user()->information->studentnumber;
        $this->first_name = auth()->user()->information->firstname;
        $this->middle_name = auth()->user()->information->middlename;
        $this->last_name = auth()->user()->information->lastname;
        $this->sex = auth()->user()->information->sex;
        $this->address = auth()->user()->information->address;
        $this->email = auth()->user()->information->email;
        $this->contact_number = auth()->user()->information->contactnumber;
        $this->status = auth()->user()->information->status;

        $this->campus = auth()->user()->information->course->campus_id;
        $this->course = auth()->user()->information->course_id;
        

    }
    public function update()
    {
      
        $update_data=Information::find(auth()->user()->information->id);
        if ($this->valid_id) {
            $this->validate([
                'first_name'=>'required|regex:/^[a-zA-Z\s]+$/',
                'middle_name'=>'nullable|regex:/^[a-zA-Z\s]+$/',
                'last_name'=>'required|regex:/^[a-zA-Z\s]+$/',
                'sex'=>'required',
                'email'=>'required|email',
                'address'=>'required',
                'campus'=>'required',
                'contact_number'=>'required|digits:11',
                'student_number'=>'numeric',
                'course'=>'required',
                'valid_id'=>'required|image|max:2048',
                'status'=>'required'
            ]);

            $valid_id_url=$this->valid_id->store('ID','public');

            $update_data->update([
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

            $this->alert('success','Changes has been saved');

        }else{
            $this->validate([
                'first_name'=>'required|regex:/^[a-zA-Z\s]+$/',
                'middle_name'=>'nullable|regex:/^[a-zA-Z\s]+$/',
                'last_name'=>'required|regex:/^[a-zA-Z\s]+$/',
                'sex'=>'required',
                'email'=>'required|email|regex:/gmail/',
                'address'=>'required',
                'campus'=>'required',
                'contact_number'=>'required|digits:11',
                'student_number'=>'required|numeric',
                'course'=>'required',
                'status'=>'required'
            ]);


            $update_data->update([
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
            ]);

            $this->alert('success','Changes has been saved');

        }

       
    }
}