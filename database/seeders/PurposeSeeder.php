<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purpose;
use Illuminate\Support\Facades\DB;
class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purposes')->insert([
            [
                'description'=>'For Licensure examination',
            ],
            [
                'description'=>'For Transfer/evaluation',
            ],
            [
                'description'=>'For Enrollment',
            ],
            [
                'description'=>'For Employment',
            ],
            [
                'description'=>'Others',
            ],
        ]);
    }
}