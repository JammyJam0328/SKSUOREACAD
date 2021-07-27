<?php

namespace Database\Factories;

use App\Models\Request;
use App\Models\User;
use App\Models\Document;

use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    public $purpose_id =  ['1','2','3','4','5'];
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Request::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
    }
}