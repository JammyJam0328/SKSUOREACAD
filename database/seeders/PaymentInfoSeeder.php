<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Paymentmethod;
use App\Models\Remitance;

class PaymentInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymentmethods')->insert([
            [
                'description'=>"Seven Eleven to Lanbank"
            ],
            [
                'description'=>""
            ],
            [
                'description'=>"Remitance Center"
            ],
            [
                'description'=>"Gcash To GCash"
            ],
        ]);
    }
}
