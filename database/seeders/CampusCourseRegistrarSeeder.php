<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Campus;
use App\Models\Course;
use App\Models\User;
use App\Models\Document;
use App\Models\DocumentCategory;



use Illuminate\Support\Facades\Hash;
class CampusCourseRegistrarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            "role" => "admin",
            "name" => "Administrator",
            "password" => Hash::make("adminsksyou123"),
            "email" => "sksuoroad@sksu.edu.ph",
        ]);

      


        $campus = Campus::create([
            'name'=>"Access Campus"
        ]);

        $campus->courses()->create([
            'name'=>"Bachelor of Physical Education (BPEd)"
        ]);

        $campus->courses()->create([
            'name'=>"Bachelor in Elementary Education (BEED)"
        ]);
        
        $campus->courses()->create([
            'name'=>"Bachelor in Secondary Education Major in English (BSEd-English)"
        ]);
        
        $campus->courses()->create([
            'name'=>"Bachelor in Secondary Education Major in Filipino (BSEd-Filipino)"
        ]);

        $campus->courses()->create([
            'name'=>"Bachelor in Secondary Education Major in Science (BSEd-Science)"
        ]);

        $campus->courses()->create([
            'name'=>"Bachelor in Secondary Education Major in Social Studies (BSEd-Social Studies)"
        ]);

        $campus->courses()->create([
            'name'=>"Bachelor in Secondary Education Major in Mathematics (BSEd-Mathematics)"
        ]);

        $campus->courses()->create([
            'name'=>"Diploma in Teaching (DIT)"
        ]);

        $campus->courses()->create([
            'name'=>"Bachelor of Science in Agricultural Technology (BAT)"
        ]);

        $campus->courses()->create([
            'name'=>"Bachelor of Science in Criminology"
        ]);

        $campus->courses()->create([
            'name'=>"Bachelor of Science in Nursing (BSN)"
        ]);

        $campus->courses()->create([
            'name'=>"Bachelor of Science in Midwifery (BSM)"
        ]);
        
        $campus->courses()->create([
            'name'=>"Bachelor of Science in Medical Technology"
        ]);

        
        $campus->courses()->create([
            'name'=>"Diploma in Midwifery"
        ]);

        
        $campus->courses()->create([
            'name'=>"Juris Doctor"
        ]);


        $campus->user()->create([
            "role" => "registrar",
            "name" => "Access Campus",
            "password" => Hash::make("access12345"),
            "email" => "accessreg@gmail.com",
        ]);


      

        
            $documents=Document::get();

            foreach ($documents as $document) {
                $campus->documents()->attach($document);
            }


        
        $campus = Campus::create([
            'name'=>"Isulan Campus"
        ]);

        $campus->courses()->create([
            'name'=>"Bachelor of Science in Civil Engineering (BSCE)"
        ]);
        $campus->courses()->create([
            'name'=>"Bachelor of Science in Computer Engineering (BSCpE)"
        ]);
        $campus->courses()->create([
            'name'=>"Bachelor of Science in Electronics Engineering (BSECE)"
        ]);
        $campus->courses()->create([
            'name'=>"Bachelor of Science in Computer Science (BSCS)"
        ]);
        $campus->courses()->create([
            'name'=>"Bachelor of Science in Information Technology (BSIT)"
        ]);

         $campus->courses()->create([
            'name'=>"Bachelor of Science in Information Systems (BSIS)"
        ]);
         $campus->courses()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Food Service Management"
        ]);
        $campus->courses()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Drafting Technology"
        ]);
        $campus->courses()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Automotive Technology"
        ]);
        $campus->courses()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Electrical Technology"
        ]);
        $campus->courses()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd)  Major in Electronic Technology"
        ]);
        $campus->courses()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd)   Major in Civil Technology"
        ]);

        $campus->user()->create([
            "role" => "registrar",
            "name" => "Isulan Campus",
            "password" => Hash::make("isulan12345"),
            "email" => "isulanreg@gmail.com",
        ]);

        $documents=Document::get();

        foreach ($documents as $document) {
            $campus->documents()->attach($document);
        }
    
            


        $campus = Campus::create([
            'name'=>"Tacurong Campus"
        ]);

        $campus->courses()->create([
            'name' => 'Bachelor of Arts in Economics'
        ]);
        $campus->courses()->create([
            'name' => 'Bachelor of Arts in Political Science'
        ]);
        $campus->courses()->create([
            'name' => 'Bachelor of Science in Biology'
        ]);
        $campus->courses()->create([
            'name' => 'Bachelor of Science in Environmental Science'
        ]);
        $campus->courses()->create([
            'name' => 'Bachelor of Science in Entrepreneurship'
        ]);
        $campus->courses()->create([
            'name' => 'Bachelor of Science in Accountancy'
        ]);
        $campus->courses()->create([
            'name' => 'Bachelor of Science in Management Accounting'
        ]);
        $campus->courses()->create([
            'name' => 'Bachelor of Science in Hospitality Management'
        ]);
        $campus->courses()->create([
            'name' => 'Bachelor of Science in Accounting Information System'
        ]);
        $campus->courses()->create([
            'name' => 'Bachelor of Science in Tourism Management'
        ]);

        $campus->user()->create([
            "role" => "registrar",
            "name" => "Tacurong Campus",
            "password" => Hash::make("tacurong12345"),
            "email" => "tacurongreg@gmail.com",
        ]);

        $documents=Document::get();

        foreach ($documents as $document) {
            $campus->documents()->attach($document);
        }
    
        
    $campus = Campus::create([
        "name" => "Kalamansig Campus"
    ]);

    $campus->courses()->create([
        'name' => 'Diploma in Teaching'
    ]);
    $campus->courses()->create([
        'name' => 'Bachelor of Science in Secondary Education'
    ]);
    $campus->courses()->create([
        'name' => 'Bachelor in Elementary Education'
    ]);
    $campus->courses()->create([
        'name' => 'Bachelor in Biology'
    ]);
    $campus->courses()->create([
        'name' => 'Bachelor in Fisheries'
    ]);

    $campus->courses()->create([
        'name' => 'Bachelor of Science in Criminology'
    ]);

    $campus->courses()->create([
        'name' => 'Bachelor of Science in Information Technology'
    ]);

    $campus->user()->create([
        "role" => "registrar",
        "name" => "Kalamansig Campus",
        "password" => Hash::make("kalamansig12345"),
        "email" => "kalamansigreg@gmail.com",
    ]);


    $documents=Document::get();

    foreach ($documents as $document) {
        $campus->documents()->attach($document);
    }



    $campus = Campus::create([
        "name" => "Bagumbayan Campus"
    ]);

    $campus->courses()->create([
        'name' => 'Bachelor of Science in Agribusiness'
    ]);
    $campus->courses()->create([
        'name' => 'Bachelor of Technology and Livelihood Education major in Agri-fisheries'
    ]);

    
    $campus->user()->create([
        "role" => "registrar",
        "name" => "Bagumbayan Campus",
        "password" => Hash::make("bagumbayan12345"),
        "email" => "bagumbayanreg@gmail.com",
    ]);


    $documents=Document::get();

    foreach ($documents as $document) {
        $campus->documents()->attach($document);
    }


    $campus = Campus::create([
        "name" => "Palimbang Campus"
    ]);



    $campus->courses()->create([
        'name' => 'Bachelor of Science in Agribusiness'
    ]);

  
    $campus->courses()->create([
        'name' => 'Bachelor in Elementary Education'
    ]);

    $campus->user()->create([
        "role" => "registrar",
        "name" => "Palimbang Campus",
        "password" => Hash::make("palimbang12345"),
        "email" => "palimbangreg@gmail.com",
    ]);

    $documents=Document::get();

    foreach ($documents as $document) {
        $campus->documents()->attach($document);
    }



    
    $campus = Campus::create([
        "name" => "Lutayan Campus"
    ]);



    $campus->courses()->create([
        'name' => 'Bachelor in Agricultural Technology'
    ]);
    $campus->courses()->create([
        'name' => 'Bachelor of Science in Agriculture'
    ]);


    $campus->courses()->create([
        'name' => 'Bachelor in Elementary Education'
    ]);

    $campus->user()->create([
        "role" => "registrar",
        "name" => "Lutayan Campus",
        "password" => Hash::make("lutayan12345"),
        "email" => "lutayanreg@gmail.com",
    ]);


    $documents=Document::get();

    foreach ($documents as $document) {
        $campus->documents()->attach($document);
    }





    }
}