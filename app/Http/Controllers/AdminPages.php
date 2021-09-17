<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
class AdminPages extends Controller
{
    public function dashboard()
    {
      
        
         $chart_options= [
            'chart_title' => 'Request',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Request',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
             'conditions'            => [
                 
        ['name' => 'Pending', 'condition' => 'status = "Pending"', 'color' => 'black', 'fill' => true],
        ['name' => 'Aprroved', 'condition' => 'status = "Approved"', 'color' => 'blue', 'fill' => true],
        ['name' => 'Claimed', 'condition' => 'status = "Claimed"', 'color' => 'green', 'fill' => true],
         ],

             
        ];
        $chart1 = new LaravelChart($chart_options);
       

        return view('pages.admin.dashboard', compact('chart1'));
    }

    public function users()
    {
        return view('pages.admin.user');

        
    }
    public function documents()
    {
        return view('pages.admin.document');

    }
}