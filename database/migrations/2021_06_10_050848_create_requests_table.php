<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('information_id');
            $table->string('receivername');
            $table->unsignedBigInteger('purpose_id');
            $table->string('other_purpose')->nusllable();
            $table->unsignedBigInteger('campus_id');
            $table->string('status')->default('draft');
            $table->string('read')->default('no');
            $table->string('response')->nullable();
            $table->string('request_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}