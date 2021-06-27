<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\DocumentCategory;
use Illuminate\Support\Facades\DB;
class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=DocumentCategory::create([
            'name'=>'Transcript of Records'
        ]);
        $category->document()->create([
            'name'=>'TOR For UnderGrad (2 yr Course)',
            'amount'=>'125'
        ]);
        $category->document()->create([
            'name'=>'TOR For UnderGrad (4-5 Yr Degree) for Employment',
            'amount'=>'175'
        ]);
        $category->document()->create([
            'name'=>'TOR For UnderGrad (4-5 Yr Degree) for Board Exam',
            'amount'=>'250'
        ]);
        $category->document()->create([
            'name'=>'TOR For UnderGrad (4-5 Yr Degree) for Tansfer',
            'amount'=>'300'
        ]);
        $category->document()->create([
            'name'=>'TOR For Graduate School',
            'amount'=>'50',
            'other_description'=>'First Page-75 Succeeding-50'
        ]);


        $category=DocumentCategory::create([
            'name'=>'Certifications'
        ]);

        $category->document()->create([
            'name'=>'Certification (Undergrad students)',
            'amount'=>'20'
        ]);
        
        $category->document()->create([
            'name'=>'Certification (Graduate School)',
            'amount'=>'30'
        ]);
        
        
        $category->document()->create([
            'name'=>'Certification of Weighted Average',
            'amount'=>'30'
        ]);


        $category=DocumentCategory::create([
            'name'=>'Others'
        ]);
                     
        $category->document()->create([
            'name'=>'CAV',
            'amount'=>'50'
        ]);
   
         $category->document()->create([
            'name'=>'Re-issuance of Diploma',
            'amount'=>'250'
        ]);         
        $category->document()->create([
            'name'=>'Authentication',
            'amount'=>'15',
            'other_description'=>'15 per set'
        ]);

        $category->document()->create([
            'name'=>'Documentary Stamp',
            'amount'=>'30'
        ]);

      

    }
}
