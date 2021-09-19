<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Request as RequestModel;
use App\Models\Information;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class RegistrarPage extends Controller
{
    public function dashboard()
    {
        
         $chart_options= [
            'chart_title' => 'Request',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Request',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
             'conditions'            => [
                 
            ['name' => 'Pending', 'condition' => 'status = "Pending"', 'condition' => 'campus_id = '.auth()->user()->campus_id.'', 'color' => 'black', 'fill' => true],
            // ['name' => 'Aprroved', 'condition' => 'status = "Approved"', 'color' => 'blue', 'fill' => true],
            // ['name' => 'Claimed', 'condition' => 'status = "Claimed"', 'color' => 'green', 'fill' => true],
         ],

             
        ];
        $chart1 = new LaravelChart($chart_options);
        return view('pages.registrar.dashboard');
        
    }
    public function request()
    {

        return view('pages.registrar.request');
    }

    public function document()
    {

        return view('pages.registrar.document');
    }
    public function requestdetails($id)
    {
        if($id==null){
            return back();
        }else{
            $myrequest=RequestModel::where('id',$id)->first();
            if($myrequest && $myrequest->campus_id==auth()->user()->campus_id){
                return view('pages.registrar.requestdetails',[
                    'id'=>$id
                ]);
            }else{
                abort(403);
            }
        }
    }

    public function graduatedDetails($id)
    {
        if($id==null){
            return back();
        }else{
            $myrequest=RequestModel::where('id',$id)->first();
            if($myrequest&& $myrequest->information->status=="Graduated" && $myrequest->status=="Cleared" && $myrequest->campus_id==auth()->user()->campus_id){
                return view('pages.registrar.graduate-request-details',[
                    'id'=>$id
                ]);
            }else{
                abort(403);
            }
        }
    }

    public function graduated()
    {
        return view('pages.registrar.graduate-request');
    }

    public function viewRequest($id)
    {

        if($id==null){
            return back();
        }else{
            $myrequest=RequestModel::where('id',$id)->first();
            if($myrequest && $myrequest->campus_id==auth()->user()->campus_id){
                return view('pages.registrar.view-request',[
                    'id'=>$id
                ]);
            }else{
                abort(403);
            }
        }
       
    }

    public function viewrequestor($id)
    {
       
            $requestor=Information::where('id',$id)->first();
         
            if($requestor->course->campus_id==auth()->user()->campus_id){
                return view('pages.registrar.view-requestor',[
                    'id'=>$id
                ]);
            }else{
                abort(403);
            }
        

      
    }
    public function reports()
    {
        return view('pages.registrar.reports');
    }
    public function printPDF($status,$startDate,$endDate)
    {
        
        return view('pages.registrar.pdfreport',[
            'status'=>$status,
            'startDate'=>$startDate,
            'endDate'=>$endDate,
        ]);
    }

    public function printStub(Request $request)
    {
        if(!$request->date){
            abort(404);
        }
        return view('pages.registrar.claimstubs',[
            'date'=>$request->date,
        ]);
    }
}