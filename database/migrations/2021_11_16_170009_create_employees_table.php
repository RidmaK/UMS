<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middle_name')->nullable();
            $table->string('address');
            $table->foreignId('department_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->char('zip_code');
            $table->date('birthday')->nullable();
            $table->date('date_hired')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
