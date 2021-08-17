<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Document as DocumentModel;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Request;
use Illuminate\Database\Eloquent\Builder;



use Livewire\WithPagination;
class Document extends Component
{
    public $mode="";
    public $name;
    public $category=" ";
    public $amount;
    public $other_description;

    public $ename;
    public $ecategory;
    public $eamount;
    public $eother_description;
    public $document_id;
    public $del_document_id;

    use WithPagination;


    protected $listeners = [
        'confirmdel',
        'cancel',
     
    ];
    public function render()
    {

        return view('livewire.admin.document',[
            'documents'=>DocumentModel::paginate(10),
           
        ]);
    }

    public function create()
    {
        $this->validate([
            'name'=>'required',
            'amount'=>'required|nullable',
        ]);

        $campus_document=DocumentModel::create([
            'name'=>$this->name,
            'amount'=>$this->amount,
            'other_description'=>$this->other_description,
        ]);

        $campuses=Campus::get();
        foreach($campuses as $campus){
            $campus->documents()->attach($campus_document);
        };

        $this->name="";
        $this->other_description="";
        $this->amount="";

        $this->alert('success','Saved Successfully ! ');
        $this->mode='';
    }

    public function editDocument($id)
    {
        $document=DocumentModel::where('id',$id)->first();
        $this->document_id=$document->id;
        $this->ename=$document->name;
        $this->eother_description=$document->other_description;
        $this->eamount=$document->amount;
        $this->mode="edit";
    }

    public function update()
    {
        
        $this->validate([
            'ename'=>'required',
            'eamount'=>'required|nullable',
        ]);

        $update_data=DocumentModel::find($this->document_id);


        $update_data->update([
            'name'=>$this->ename,
            'amount'=>$this->eamount,
            'other_description'=>$this->eother_description,

        ]);

        $this->ename="";
        $this->eother_description="";
        $this->eamount="";

        $this->alert('success','Updated Successfully ! ');
        $this->mode='';
    }

    public function deleteDocument($id)
    {
        $this->mode="";
        $this->del_document_id=$id;
        $this->confirm('Are you sure you want to delete ?', [
            'position' =>  'center', 
            'toast' =>  true, 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showConfirmButton' =>  true, 
            'onConfirmed' => 'confirmdel',
            'onCancelled' => 'cancel'
      ]);    
    }

    public function confirmdel()
    {
        $document=DocumentModel::where('id',$this->del_document_id)->first();
        $document->delete();
        

        

        $this->alert('success','Deleted Successfully');
    }

    public function cancel()
    {
        $this->alert('info','Your data is safe');
    }
}