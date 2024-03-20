<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csv_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('domain');
            $table->integer('year_founded')->nullable();
            $table->string('industry')->nullable();
            $table->string('size_range')->nullable();
            $table->string('locality')->nullable();
            $table->string('country')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->integer('current_employee_estimate')->nullable();
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
        Schema::dropIfExists('csv_data');
    }
}
